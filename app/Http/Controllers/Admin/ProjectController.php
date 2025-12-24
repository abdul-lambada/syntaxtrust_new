<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string)$request->get('q'));
        $projects = Project::query()
            ->when($q, function($query) use ($q){
                $query->where(function($qq) use ($q){
                    $qq->where('title','like',"%$q%")
                       ->orWhere('category','like',"%$q%")
                       ->orWhere('description','like',"%$q%")
                       ->orWhere('client_name','like',"%$q%");
                });
            })
            ->orderBy('order')
            ->orderBy('id','desc')
            ->paginate(10)
            ->withQueryString();
        return view('admin.projects.index', compact('projects','q'));
    }

    public function create()
    {
        $project = new Project();
        return view('admin.projects.form', compact('project'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        if ($request->boolean('remove_image')) {
            $data['image'] = null;
        } elseif ($request->hasFile('image_file')) {
            $data['image'] = $request->file('image_file')->store('uploads/projects', 'public');
        }
        $project = Project::create($data);
        return redirect()->route('admin.projects.index')->with('ok','Project dibuat.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $this->validateData($request, $project->id);
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        if ($request->boolean('remove_image')) {
            $data['image'] = null;
        } elseif ($request->hasFile('image_file')) {
            $data['image'] = $request->file('image_file')->store('uploads/projects', 'public');
        }
        $project->update($data);
        return redirect()->route('admin.projects.index')->with('ok','Project diperbarui.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('ok','Project dihapus.');
    }

    protected function validateData(Request $request, $id = null): array
    {
        return $request->validate([
            'title' => ['required','max:150'],
            'slug' => ['nullable','max:160','unique:projects,slug,'.($id ?? 'NULL').',id'],
            'category' => ['nullable','max:100'],
            'description' => ['nullable'],
            'image' => ['nullable','max:255'],
            'image_file' => ['nullable','image','max:3072'],
            'remove_image' => ['nullable','boolean'],
            'link' => ['nullable','url','max:255'],
            'client_name' => ['nullable','max:150'],
            'order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);
    }
}
