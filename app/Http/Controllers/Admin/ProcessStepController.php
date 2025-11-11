<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProcessStep;
use Illuminate\Http\Request;

class ProcessStepController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string)$request->get('q'));
        $items = ProcessStep::query()
            ->when($q, function($query) use ($q){
                $query->where('title','like',"%$q%")
                      ->orWhere('description','like',"%$q%");
            })
            ->orderBy('order')
            ->orderBy('id','desc')
            ->paginate(10)
            ->withQueryString();
        return view('admin.process.index', compact('items','q'));
    }

    public function create()
    {
        $item = new ProcessStep();
        return view('admin.process.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        ProcessStep::create($data);
        return redirect()->route('admin.process.index')->with('ok','Langkah proses dibuat.');
    }

    public function edit(ProcessStep $process)
    {
        $item = $process;
        return view('admin.process.form', compact('item'));
    }

    public function update(Request $request, ProcessStep $process)
    {
        $data = $this->validateData($request);
        $process->update($data);
        return redirect()->route('admin.process.index')->with('ok','Langkah proses diperbarui.');
    }

    public function destroy(ProcessStep $process)
    {
        $process->delete();
        return redirect()->route('admin.process.index')->with('ok','Langkah proses dihapus.');
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
