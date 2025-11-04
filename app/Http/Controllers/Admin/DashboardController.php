<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\ChildRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $totalParticipants = ChildRegistration::count();
        $males = ChildRegistration::where('gender', 'Male')->count();
        $females = ChildRegistration::where('gender', 'Female')->count();

        Log::info($females);

        return view('admin.dashboard', compact('totalParticipants', 'males', 'females'));
    }
}
