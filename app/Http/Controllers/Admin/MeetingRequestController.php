<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MeetingRequest;
use Illuminate\Http\Request;

class MeetingRequestController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string)$request->get('q'));
        $items = MeetingRequest::query()
            ->when($q, function($query) use ($q){
                $query->where('name','like',"%$q%")
                      ->orWhere('topic','like',"%$q%")
                      ->orWhere('method','like',"%$q%")
                      ->orWhere('status','like',"%$q%");
            })
            ->orderByDesc('when_at')
            ->paginate(10)
            ->withQueryString();
        return view('admin.meetings.index', compact('items','q'));
    }

    public function edit(MeetingRequest $meeting_request)
    {
        $item = $meeting_request;
        return view('admin.meetings.form', compact('item'));
    }

    public function update(Request $request, MeetingRequest $meeting_request)
    {
        $data = $request->validate([
            'name' => ['required','max:150'],
            'method' => ['required','in:meet,wa'],
            'topic' => ['required'],
            'when_at' => ['required','date'],
            'meet_link' => ['nullable','max:255'],
            'wa_target' => ['nullable','max:30'],
            'msg_preview' => ['nullable'],
            'status' => ['required','in:pending,sent,confirmed,cancelled'],
            'sent_via' => ['nullable','max:30'],
        ]);
        $meeting_request->update($data);
        return redirect()->route('admin.meeting-requests.index')->with('ok','Data meeting diperbarui.');
    }

    public function destroy(MeetingRequest $meeting_request)
    {
        $meeting_request->delete();
        return redirect()->route('admin.meeting-requests.index')->with('ok','Data meeting dihapus.');
    }
}
