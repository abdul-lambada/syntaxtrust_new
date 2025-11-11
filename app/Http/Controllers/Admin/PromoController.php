<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string)$request->get('q'));
        $items = Promo::query()
            ->when($q, function($query) use ($q){
                $query->where('title','like',"%$q%")
                      ->orWhere('description','like',"%$q%");
            })
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();
        return view('admin.promos.index', compact('items','q'));
    }

    public function create()
    {
        $item = new Promo(['discount_type'=>'percent','amount'=>0,'is_active'=>true]);
        return view('admin.promos.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        Promo::create($data);
        return redirect()->route('admin.promos.index')->with('ok','Promo dibuat.');
    }

    public function edit(Promo $promo)
    {
        $item = $promo;
        return view('admin.promos.form', compact('item'));
    }

    public function update(Request $request, Promo $promo)
    {
        $data = $this->validateData($request);
        $promo->update($data);
        return redirect()->route('admin.promos.index')->with('ok','Promo diperbarui.');
    }

    public function destroy(Promo $promo)
    {
        $promo->delete();
        return redirect()->route('admin.promos.index')->with('ok','Promo dihapus.');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required','max:150'],
            'description' => ['nullable'],
            'discount_type' => ['required','in:percent,fixed'],
            'amount' => ['required','numeric','min:0'],
            'starts_at' => ['nullable','date'],
            'ends_at' => ['nullable','date','after_or_equal:starts_at'],
            'is_active' => ['nullable','boolean'],
        ]);
    }
}
