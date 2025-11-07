<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\ChildRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = ChildRegistration::latest()->paginate(10);
        Log::info($participants);
        $maleCount = ChildRegistration::where('gender', 'Male')->count();
        $femaleCount = ChildRegistration::where('gender', 'Female')->count();
        return view('admin.participants', compact('participants', 'maleCount', 'femaleCount'));
    }

    public function show($id)
    {
        $child = ChildRegistration::findOrFail($id);
        return view('admin.participant_view', compact('child'));
    }

    public function participantDetails($id)
    {
        $participant = ChildRegistration::findOrFail($id);
        $nextStage = "";
        if ($participant) {
            $nextStage = $participant->stage == "Initial" ? "First Stage" : ($participant->stage == "First Stage" ? "Semi Final" : ($participant->stage == "Semi Final" ? "Final" : ""));
        }

        // Get related participants for navigation
        $previousParticipant = ChildRegistration::where('id', '<', $id)->latest('id')->first();
        $nextParticipant = ChildRegistration::where('id', '>', $id)->oldest('id')->first();

        return view('admin.participant-details', compact(
            'participant',
            'previousParticipant',
            'nextParticipant',
            'nextStage'
        ));
    }
    public function moveParticipants($id)
    {
        $participant = ChildRegistration::findOrFail($id);
        $nextStage = "";
        if ($participant) {
            $nextStage = $participant->stage == "Initial" ? "First Stage" : ($participant->stage == "First Stage" ? "Semi Final" : ($participant->stage == "Semi Final" ? "Final" : ""));

            Log::info($participant);

            $participant->stage = $nextStage;
            $participant->save();
            return redirect()->back()->with('success', "Participant Successfully moved to $nextStage");
        }
    }

    public function destroy($id)
    {
        $child = ChildRegistration::findOrFail($id);
        $child->delete();

        return redirect()->back()->with('success', 'Participant deleted successfully.');
    }
}
