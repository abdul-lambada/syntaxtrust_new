<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function index()
    {
        $items = SiteSetting::query()->orderBy('id','desc')->paginate(10);
        return view('admin.settings.index', compact('items'));
    }

    public function create()
    {
        $item = new SiteSetting();
        return view('admin.settings.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        if ($request->hasFile('logo_file')) {
            $path = $request->file('logo_file')->store('uploads/logos', 'public');
            $data['logo_path'] = $path;
        }
        $data['is_active'] = (bool)($data['is_active'] ?? false);
        SiteSetting::create($data);
        return redirect()->route('admin.settings.index')->with('ok', 'Pengaturan dibuat.');
    }

    public function edit(SiteSetting $setting)
    {
        $item = $setting;
        return view('admin.settings.form', compact('item'));
    }

    public function update(Request $request, SiteSetting $setting)
    {
        $data = $this->validateData($request);
        if ($request->boolean('remove_logo')) {
            $data['logo_path'] = null;
        }
        if ($request->hasFile('logo_file')) {
            $path = $request->file('logo_file')->store('uploads/logos', 'public');
            $data['logo_path'] = $path;
        }
        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $setting->update($data);
        return redirect()->route('admin.settings.index')->with('ok', 'Pengaturan diperbarui.');
    }

    public function destroy(SiteSetting $setting)
    {
        $setting->delete();
        return redirect()->route('admin.settings.index')->with('ok', 'Pengaturan dihapus.');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'site_name' => ['required','max:150'],
            'is_active' => ['nullable','boolean'],
            'logo_file' => ['nullable','image','max:2048'],
            'remove_logo' => ['nullable','boolean'],
        ]);
    }
}
