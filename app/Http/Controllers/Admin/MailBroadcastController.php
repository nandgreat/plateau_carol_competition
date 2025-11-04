<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailBroadcastController extends Controller
{
    public function index()
    {
        return view('admin.emails');
    }

    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $parents = Child::whereNotNull('parent_email')->pluck('parent_email');

        foreach ($parents as $email) {
            Mail::raw($request->message, function ($mail) use ($email, $request) {
                $mail->to($email)
                     ->subject($request->subject);
            });
        }

        return back()->with('success', 'Emails have been sent successfully!');
    }
}
