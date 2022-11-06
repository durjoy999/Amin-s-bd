<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * List of all contacts
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.pages.contact.index', [
            'contacts' => $contacts
        ]);
    }
    /**
     * show single contact details
     */
    public function show($id)
    {
        $Contact = Contact::findOrFail($id);
        return view('admin.pages.contact.show', [
            'contacts' => $Contact
        ]);
    }
}
