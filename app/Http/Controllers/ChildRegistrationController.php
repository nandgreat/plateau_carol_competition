<?php

namespace App\Http\Controllers;

use App\Models\ChildRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Mail\ChildRegistrationSuccess;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ChildRegistrationController extends Controller
{
    public function create()
    {
        return view('public.register');
    }

    public function store(Request $request)
    {
        Log::info($request->all());
        try {
            $validated = $request->validate([
                'fullname' => 'required|string|max:255',
                'organization' => 'nullable|string|max:255',
                'age' => 'required|integer|min:1|max:18',
                'gender' => 'required|string|in:Male,Female',
                'child_image' => 'required|image|mimes:jpg,jpeg,png|max:1024', // ✅ 1MB limit
                'birth_certificate' => 'required|file|mimes:jpg,png,pdf|max:1024',
                'parent_name' => 'required|string|max:255',
                'parent_email' => 'required|email|max:255',
                'parent_phone' => 'required|string|max:15',
                'lga' => 'required|in:Jos North,Jos South',
                'interest_area' => 'required|in:Quiz,Bible Recitation',
            ], [
                'child_image.max' => 'The child image must not be larger than 1MB.',
                'birth_certificate.max' => 'The birth certificate must not be larger than 1MB.',
                'child_image.mimes' => 'The child image must be a JPG or PNG file.',
                'birth_certificate.mimes' => 'The birth certificate must be a JPG or PNG file.',
            ]);

            if ($request->hasFile('birth_certificate')) {

                $file = $request->file('birth_certificate');
                $filename = time() . '_' . $file->getClientOriginalName();

                $file->move(public_path('birth_certificates'), $filename);

                $url = "birth_certificates/{$filename}";

                $validated['birth_certificate_path'] = $url;
            }

            if ($request->hasFile('child_image')) {
                $file = $request->file('child_image');
                $filename = time() . '_' . $file->getClientOriginalName();

                $file->move(public_path('child_images'), $filename);

                $url = "child_images/{$filename}";
                $validated['child_image_path'] = $url;
            }

            $validated['unique_code'] = $this->generateUniqueCode($validated['interest_area']);
            $baseUrl = url('/');

            // Define the QR code filename
            $qrFilename = $validated['unique_code'] . '.png';

            // Define the folder inside public
            $qrFolder = public_path('qrcodes');

            // Make sure the folder exists
            if (!file_exists($qrFolder)) {
                mkdir($qrFolder, 0755, true);
            }

            // Full path to save the QR code
            $qrFullPath = $qrFolder . '/' . $qrFilename;
 
            // Generate and save the QR code directly to public/qrcodes
            QrCode::format('png')
                ->size(200)
                ->generate("{$baseUrl}/child-status/{$validated['unique_code']}", $qrFullPath);

            // Generate the publicly accessible URL
            $validated['qr_code_path'] = "qrcodes/{$qrFilename}";

            $child = ChildRegistration::create($validated);

            Mail::to($validated['parent_email'])->send(new ChildRegistrationSuccess($child));

            return redirect()->route('register.success');
        } catch (\Illuminate\Validation\ValidationException $e) {

            Log::error($e->getMessage());
            // ❌ Return validation errors
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Validation failed.',
                    'errors' => $e->errors(),
                ], 422);
            }

            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            // ❌ Log and handle unexpected errors
            Log::error('Child registration error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Something went wrong. Please try again later.',
                    'error' => $e->getMessage(),
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'Something went wrong. Please try again later.')
                ->withInput();
        }
    }

    public function generateRandomString($length = 16)
    {
        return substr(bin2hex(random_bytes($length)), 0, $length);
    }

    public function index(Request $request)
    {
        $stage = $request->get('stage', 'Initial');
        $registrations = ChildRegistration::where('stage', $stage)->paginate(15);
        $stages = ['Initial', 'First Stage', 'Semi Final', 'Final'];

        return view('admin.registrations', compact('registrations', 'stage', 'stages'));
    }

    public function promote(ChildRegistration $child)
    {
        $stages = ['Initial', 'First Stage', 'Semi Final', 'Final'];
        $currentIndex = array_search($child->stage, $stages);

        if ($currentIndex < count($stages) - 1) {
            $child->update(['stage' => $stages[$currentIndex + 1]]);
            return back()->with('success', "{$child->fullname} promoted to {$stages[$currentIndex + 1]}.");
        }

        return back()->with('info', "{$child->fullname} is already in the Final stage.");
    }

    /**
     * Generate unique code like PL2025QUIZ-92399023
     */
    private function generateUniqueCode(string $interest): string
    {
        do {
            $randomNumber = mt_rand(10000000, 99999999);
            $prefix = 'PL2025' . strtoupper(substr($interest, 0, 4)); // e.g. QUIZ or BIBL
            $code = $prefix . '-' . $randomNumber;
        } while (ChildRegistration::where('unique_code', $code)->exists());

        return $code;
    }

        public function participantDetails($uniqueCode)
    {
        $participant = ChildRegistration::where('unique_code',$uniqueCode)->first();
        $nextStage = "";
        if ($participant) {
            $nextStage = $participant->stage == "Initial" ? "First Stage" : ($participant->stage == "First Stage" ? "Semi Final" : ($participant->stage == "Semi Final" ? "Final" : ""));
        }

        return view('public.participant-details', compact(
            'participant',
        ));
    }
}
