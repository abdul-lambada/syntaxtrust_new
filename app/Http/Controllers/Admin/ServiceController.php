<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string)$request->get('q'));
        $services = Service::query()
            ->when($q, function($query) use ($q){
                $query->where(function($qq) use ($q){
                    $qq->where('title','like',"%$q%")
                       ->orWhere('excerpt','like',"%$q%")
                       ->orWhere('description','like',"%$q%");
                });
            })
            ->orderBy('order')
            ->orderBy('id','desc')
            ->paginate(10)
            ->withQueryString();
        return view('admin.services.index', compact('services','q'));
    }

    public function create()
    {
        $service = new Service();
        return view('admin.services.form', compact('service'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        if ($request->boolean('remove_icon')) {
            $data['icon'] = null;
        } elseif ($request->hasFile('icon_file')) {
            $path = $request->file('icon_file')->store('uploads/services','public');
            $data['icon'] = Storage::disk('public')->url($path);
        }
        $service = Service::create($data);
        return redirect()->route('admin.services.index')->with('ok','Service dibuat.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $this->validateData($request, $service->id);
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        if ($request->boolean('remove_icon')) {
            $data['icon'] = null;
        } elseif ($request->hasFile('icon_file')) {
            $path = $request->file('icon_file')->store('uploads/services','public');
            $data['icon'] = Storage::disk('public')->url($path);
        }
        $service->update($data);
        return redirect()->route('admin.services.index')->with('ok','Service diperbarui.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('ok','Service dihapus.');
    }

    protected function validateData(Request $request, $id = null): array
    {
        return $request->validate([
            'title' => ['required','max:150'],
            'slug' => ['nullable','max:160','unique:services,slug,'.($id ?? 'NULL').',id'],
            'excerpt' => ['nullable','max:255'],
            'description' => ['nullable'],
            'icon' => ['nullable','max:255'],
            'icon_file' => ['nullable','image','max:2048','dimensions:min_width=48,min_height=48'],
            'remove_icon' => ['nullable','boolean'],
            'order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);
    }
}
