<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use Illuminate\Http\Request;

class PricingPackageController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string)$request->get('q'));
        $items = PricingPackage::query()
            ->when($q, function ($query) use ($q) {
                $query->where('name', 'like', "%$q%")
                    ->orWhere('tagline', 'like', "%$q%")
                    ->orWhere('price_text', 'like', "%$q%");
            })
            ->orderBy('order')
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.pricing.index', compact('items', 'q'));
    }

    public function create()
    {
        $item = new PricingPackage();
        return view('admin.pricing.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        $features = [];
        if ($request->has('feature_texts')) {
            foreach ($request->feature_texts as $idx => $text) {
                if (!empty($text)) {
                    $features[] = [
                        'text' => $text,
                        'active' => isset($request->feature_actives[$idx]),
                    ];
                }
            }
        }

        $data['features'] = $features;
        $data['is_highlighted'] = $request->boolean('is_highlighted');
        $data['is_active'] = $request->boolean('is_active');

        PricingPackage::create($data);

        return redirect()->route('admin.pricing.index')->with('ok', 'Paket harga berhasil ditambahkan.');
    }

    public function edit(PricingPackage $pricing)
    {
        $item = $pricing;
        return view('admin.pricing.form', compact('item'));
    }

    public function update(Request $request, PricingPackage $pricing)
    {
        $data = $this->validateData($request, $pricing->id);

        $features = [];
        if ($request->has('feature_texts')) {
            foreach ($request->feature_texts as $idx => $text) {
                if (!empty($text)) {
                    $features[] = [
                        'text' => $text,
                        'active' => isset($request->feature_actives[$idx]),
                    ];
                }
            }
        }

        $data['features'] = $features;
        $data['is_highlighted'] = $request->boolean('is_highlighted');
        $data['is_active'] = $request->boolean('is_active');

        $pricing->update($data);

        return redirect()->route('admin.pricing.index')->with('ok', 'Paket harga berhasil diperbarui.');
    }

    public function destroy(PricingPackage $pricing)
    {
        $pricing->delete();
        return redirect()->route('admin.pricing.index')->with('ok', 'Paket harga berhasil dihapus.');
    }

    protected function validateData(Request $request, $id = null): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'price_text' => 'required|string|max:255',
            'price_subtext' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'whatsapp_message' => 'nullable|string',
            'feature_texts' => 'nullable|array',
            'feature_actives' => 'nullable|array',
        ]);
    }
}
