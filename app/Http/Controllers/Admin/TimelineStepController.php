<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimelineStep;
use Illuminate\Http\Request;

class TimelineStepController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string)$request->get('q'));
        $items = TimelineStep::query()
            ->when($q, function($query) use ($q){
                $query->where('title','like',"%$q%")
                      ->orWhere('description','like',"%$q%");
            })
            ->orderBy('order')
            ->orderBy('id','desc')
            ->paginate(10)
            ->withQueryString();
        return view('admin.timeline.index', compact('items','q'));
    }

    public function create()
    {
        $item = new TimelineStep();
        return view('admin.timeline.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        TimelineStep::create($data);
        return redirect()->route('admin.timeline.index')->with('ok','Timeline step dibuat.');
    }

    public function edit(TimelineStep $timeline)
    {
        $item = $timeline;
        return view('admin.timeline.form', compact('item'));
    }

    public function update(Request $request, TimelineStep $timeline)
    {
        $data = $this->validateData($request);
        $timeline->update($data);
        return redirect()->route('admin.timeline.index')->with('ok','Timeline step diperbarui.');
    }

    public function destroy(TimelineStep $timeline)
    {
        $timeline->delete();
        return redirect()->route('admin.timeline.index')->with('ok','Timeline step dihapus.');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required','max:150'],
            'description' => ['nullable'],
            'order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);
    }
}
