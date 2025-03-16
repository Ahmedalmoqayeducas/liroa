<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Models\contact;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd('hello world');           // Get paginated contacts to display
        $data = Contact::paginate(3);

        // Return a view with the data
        return view('pages.org-pages.contact-manage', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type'  => 'required|in:revenue,expense,discount',
            'text' => 'required|string|max:255',
        ]);

        $contact = new Contact();
        $contact->type  = $request->type;
        $contact->text  = $request->text;

        $saved = $contact->save();

        if ($saved) {
            return response()->json([
                'status'  => true,
                'message' => 'Contact created successfully!',
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Failed to create contact.',
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // Validate request
        $request->validate([
            'type'  => 'required|in:revenue,expense,discount',
            'text' => 'required|string|max:255',
        ]);

        // Find contact by ID
        $contact = Contact::findOrFail($id);
        $contact->name  = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $updated = $contact->save();

        if ($updated) {
            return response()->json([
                'status'  => true,
                'message' => 'Contact updated successfully!',
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Failed to update contact.',
            ], 500);
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        $contact = Contact::findOrFail($id);
        $deleted = $contact->delete();

        if ($deleted) {
            return response()->json([
                'status'  => true,
                'message' => 'Contact deleted successfully!',
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Failed to delete contact.',
            ], 500);
        }
    }

    public function sendEmail(Request $request)
    {
        // التحقق من البيانات
        $validated = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'subject' => 'required|min:8',
            'message' => 'required'
        ]);
        ContactMessage::create($validated);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];


        try {
            Mail::to('your-email@example.com')->send(new ContactEmail($data));
            return back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error sending message: ' . $e->getMessage());
        }
    }
    public function showEmails()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(5);
        return view('pages.org.messages', ['data' => $messages]);
    }
}
