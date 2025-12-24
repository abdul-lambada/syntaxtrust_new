<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string)$request->get('q'));
        $items = Technology::query()
            ->when($q, fn($qr)=>$qr->where('name','like',"%$q%"))
            ->orderBy('order')
            ->orderBy('id','desc')
            ->paginate(10)
            ->withQueryString();
        return view('admin.technologies.index', compact('items','q'));
    }

    public function create()
    {
        $item = new Technology();
        return view('admin.technologies.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        if (empty($data['slug'])) $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = isset($data['is_active']) ? (bool)$data['is_active'] : false;
        $data['color'] = $this->normalizeColor($data['color'] ?? null);
        if ($request->hasFile('icon_file')) {
            $data['icon'] = $request->file('icon_file')->store('uploads/technologies', 'public');
        }
        Technology::create($data);
        return redirect()->route('admin.technologies.index')->with('ok','Teknologi dibuat.');
    }

    public function edit(Technology $technology)
    {
        $item = $technology;
        return view('admin.technologies.form', compact('item'));
    }

    public function update(Request $request, Technology $technology)
    {
        $data = $this->validateData($request, $technology->id);
        if (empty($data['slug'])) $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = isset($data['is_active']) ? (bool)$data['is_active'] : false;
        $data['color'] = $this->normalizeColor($data['color'] ?? null);
        if ($request->hasFile('icon_file')) {
            $data['icon'] = $request->file('icon_file')->store('uploads/technologies', 'public');
        }
        $technology->update($data);
        return redirect()->route('admin.technologies.index')->with('ok','Teknologi diperbarui.');
    }

    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('ok','Teknologi dihapus.');
    }

    protected function validateData(Request $request, $id=null): array
    {
        return $request->validate([
            'name' => ['required','max:120'],
            'slug' => ['nullable','max:150','unique:technologies,slug,'.($id ?? 'NULL').',id'],
            'icon' => ['nullable','max:255'],
            'icon_file' => ['nullable','image','max:1024'],
            'color' => ['nullable','max:20','regex:/^#([0-9a-fA-F]{3}|[0-9a-fA-F]{6})$/'],
            'order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);
    }

    protected function normalizeColor(?string $value): ?string
    {
        if (!$value) {
            return null;
        }
        $value = trim($value);
        if (!Str::startsWith($value, '#')) {
            $value = '#'.$value;
        }
        return strtoupper($value);
    }
}
