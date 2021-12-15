<?php

namespace App\Http\Controllers\Admin;

use App\Events\ContactAdminResponded;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::where('parent_id', null)
            ->orderBy('id', 'desc')
            ->get();
        $page_title = 'Contact form submissions';
        $page_description = 'From here you can view and manage your contact form submissions.';

        return view('pages.contacts.index', compact('page_title', 'page_description', 'contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = Contact::find($request->contact_id);

        $contact->update(['status' => 3]);

        $response = Contact::create([
            'parent_id' => $contact->id,
            'name'      => Auth::user()->fullName(),
            'email'     => 'noreply@myhomestoragesolutions.com',
            'message'   => $request->response,
            'url'       => $this->generateRandomString(89)
        ]);

        activity()
            ->performedOn($contact)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Contact replied to'])
            ->log('Contact submission was replied to');

        event(new ContactAdminResponded($response, $contact));

        flash('Your response has been successfully sent', 'success');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $contact->update(['status' => 2]);
        $page_title = 'Viewing contact submission';
        $page_description = 'View and respond to the contact form submission';

        return view('pages.contacts.show', compact('page_title', 'page_description', 'contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        flash('Contact submission successfully deleted', 'success');

        return back();
    }
}
