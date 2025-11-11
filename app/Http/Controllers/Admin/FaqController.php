<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string)$request->get('q'));
        $items = Faq::query()
            ->when($q, function($query) use ($q){
                $query->where('question','like',"%$q%")
                      ->orWhere('answer','like',"%$q%")
                      ->orWhere('category','like',"%$q%");
            })
            ->orderBy('order')
            ->orderBy('id','desc')
            ->paginate(10)
            ->withQueryString();
        return view('admin.faqs.index', compact('items','q'));
    }

    public function create()
    {
        $item = new Faq();
        return view('admin.faqs.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        Faq::create($data);
        return redirect()->route('admin.faqs.index')->with('ok','FAQ dibuat.');
    }

    public function edit(Faq $faq)
    {
        $item = $faq;
        return view('admin.faqs.form', compact('item'));
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $this->validateData($request);
        $faq->update($data);
        return redirect()->route('admin.faqs.index')->with('ok','FAQ diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('ok','FAQ dihapus.');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'question' => ['required','max:255'],
            'answer' => ['required'],
            'category' => ['nullable','max:100'],
            'order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);
    }
}
