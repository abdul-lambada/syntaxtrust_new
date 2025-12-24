<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string)$request->get('q'));
        $items = Testimonial::query()
            ->when($q, function($query) use ($q){
                $query->where('author_name','like',"%$q%")
                      ->orWhere('author_role','like',"%$q%")
                      ->orWhere('content','like',"%$q%");
            })
            ->orderBy('order')
            ->orderBy('id','desc')
            ->paginate(10)
            ->withQueryString();
        return view('admin.testimonials.index', compact('items','q'));
    }

    public function create()
    {
        $item = new Testimonial();
        return view('admin.testimonials.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        if ($request->hasFile('avatar_file')) {
            $data['avatar'] = $request->file('avatar_file')->store('uploads/testimonials','public');
        }
        Testimonial::create($data);
        return redirect()->route('admin.testimonials.index')->with('ok','Testimoni dibuat.');
    }

    public function edit(Testimonial $testimonial)
    {
        $item = $testimonial;
        return view('admin.testimonials.form', compact('item'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $this->validateData($request);
        if ($request->hasFile('avatar_file')) {
            $data['avatar'] = $request->file('avatar_file')->store('uploads/testimonials','public');
        }
        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')->with('ok','Testimoni diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('ok','Testimoni dihapus.');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'author_name' => ['required','max:150'],
            'author_role' => ['nullable','max:150'],
            'avatar' => ['nullable','max:255'],
            'avatar_file' => ['nullable','image','max:2048'],
            'content' => ['required'],
            'rating' => ['nullable','integer','min:1','max:5'],
            'order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);
    }
}
