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
        return view('admin.participants', compact('participants'));
    }

    public function show($id)
    {
        $child = ChildRegistration::findOrFail($id);
        return view('admin.participant_view', compact('child'));
    }

    public function destroy($id)
    {
        $child = ChildRegistration::findOrFail($id);
        $child->delete();

        return redirect()->back()->with('success', 'Participant deleted successfully.');
    }
}
