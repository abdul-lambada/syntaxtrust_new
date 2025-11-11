<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string)$request->get('q'));
        $items = ContactInfo::query()
            ->when($q, function($query) use ($q){
                $query->where('type','like',"%$q%")
                      ->orWhere('label','like',"%$q%")
                      ->orWhere('value','like',"%$q%");
            })
            ->orderBy('order')
            ->orderBy('id','desc')
            ->paginate(10)
            ->withQueryString();
        return view('admin.contacts.index', compact('items','q'));
    }

    public function create()
    {
        $item = new ContactInfo();
        return view('admin.contacts.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        ContactInfo::create($data);
        return redirect()->route('admin.contacts.index')->with('ok','Kontak dibuat.');
    }

    public function edit(ContactInfo $contact)
    {
        $item = $contact;
        return view('admin.contacts.form', compact('item'));
    }

    public function update(Request $request, ContactInfo $contact)
    {
        $data = $this->validateData($request);
        $contact->update($data);
        return redirect()->route('admin.contacts.index')->with('ok','Kontak diperbarui.');
    }

    public function destroy(ContactInfo $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('ok','Kontak dihapus.');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'type' => ['required','max:50'],
            'label' => ['nullable','max:100'],
            'value' => ['required','max:255'],
            'order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);
    }
}
