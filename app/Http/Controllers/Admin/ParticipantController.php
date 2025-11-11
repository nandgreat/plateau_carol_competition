<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\ChildRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\JsonResponse;

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

    public function downloadPdf($id)
    {
        $participant = ChildRegistration::findOrFail($id);
        $urlImage = asset('public/' . $participant->child_image_path);

        $imageData = base64_encode(file_get_contents($urlImage));
        $image = 'data:image/jpeg;base64,' . $imageData;

        // Generate PDF
        $pdf = PDF::loadView('pdf.participant-profile', compact('participant', 'image'));

        // Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Download PDF with filename
        $filename = "participant-profile-{$participant->unique_code}-" . now()->format('Y-m-d') . '.pdf';

        return $pdf->download($filename);
    }

    public function downloadListPdf()
    {
        // Get all participants with pagination for large datasets
        $participants = ChildRegistration::latest()->get();

        $stats = [
            'total' => $participants->count(),
            'male' => $participants->where('gender', 'Male')->count(),
            'female' => $participants->where('gender', 'Female')->count(),
            'average_age' => number_format($participants->avg('age'), 1),
        ];

        // Generate PDF
        $pdf = PDF::loadView('pdf.participant-list', compact('participants', 'stats'));

        // Set paper size to landscape for better table display
        $pdf->setPaper('A4', 'landscape');

        // Set options
        $pdf->setOptions([
            'defaultFont' => 'dejavu sans',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'isPhpEnabled' => true,
            'margin_top' => 10,
            'margin_right' => 10,
            'margin_bottom' => 10,
            'margin_left' => 10,
        ]);

        // Download PDF with filename
        $filename = "participants-list-" . now()->format('Y-m-d') . '.pdf';

        return $pdf->download($filename);
    }

    public function search(Request $request): JsonResponse
    {
        $searchTerm = $request->input('search');

        $participants = ChildRegistration::query()
            ->where(function ($query) use ($searchTerm) {
                $query->where('fullname', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('unique_code', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('organization', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('parent_name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('parent_phone', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('lga', 'LIKE', "%{$searchTerm}%");
            })
            ->get();

        // Calculate stats for search results
        $maleCount = $participants->where('gender', 'male')->count();
        $femaleCount = $participants->where('gender', 'female')->count();
        $averageAge = $participants->avg('age') ? number_format($participants->avg('age'), 1) : '0.0';

        $stats = [
            'total' => $participants->count(),
            'maleCount' => $maleCount,
            'femaleCount' => $femaleCount,
            'averageAge' => $averageAge
        ];

        $html = view('admin.partials.participants-table-body', compact('participants'))->render();

        return response()->json([
            'success' => true,
            'html' => $html,
            'stats' => $stats,
            'participants' => $participants
        ]);
    }

    public function destroy($id)
    {
        $child = ChildRegistration::findOrFail($id);
        $child->delete();

        return redirect()->back()->with('success', 'Participant deleted successfully.');
    }
}
