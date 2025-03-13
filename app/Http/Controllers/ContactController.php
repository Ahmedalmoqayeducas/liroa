<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd('hello world');           // Get paginated contacts to display
           $data = Contact::paginate(10);

           // Return a view with the data
           return view('pages.org-pages.contact-manage', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        // Create the contact
        $contact = new Contact();
        $contact->name  = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,int $id)
    {
           // Validate request
           $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
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

}
