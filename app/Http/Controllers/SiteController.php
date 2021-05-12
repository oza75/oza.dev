<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeetingRequest;
use App\Mail\NewContactMailable;
use App\Mail\NewMeetingMailable;
use App\Models\Contact;
use App\Models\Meeting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveContact(Request $request): RedirectResponse
    {
        $request->validate([
            'full_name' => ['required', 'min:3', 'max:255', 'string'],
            'email' => ['required', 'email'],
            'site_type' => ['required'],
            'description' => ['required', 'min:30']
        ]);

        $attributes = $request->only(['full_name', 'email', 'site_type', 'description']);

        /** @var Contact $contact */
        $contact = Contact::query()->create($attributes);

        Mail::to(config('mail.my_mail'))->send(new NewContactMailable($contact));

        return back()->with('success', 'contact');
    }

    /**
     * @param StoreMeetingRequest $request
     * @return RedirectResponse
     */
    public function saveMeeting(StoreMeetingRequest $request): RedirectResponse
    {
        $attributes = [
            'full_name' => $request->get('full_name_rdv'),
            'email' => $request->get('email_rdv'),
            'site_type' => $request->get('site_type_rdv'),
            'date' => $request->get('date'),
            'time' => $request->get('time'),
        ];

        /** @var Meeting $meeting */
        $meeting = Meeting::query()->create($attributes);

        Mail::to(config('mail.my_mail'))->send(new NewMeetingMailable($meeting));

        return redirect(route('portfolio.contact').'#rdv')->with('success', 'meeting');
    }
}
