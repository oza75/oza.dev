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
use Stevebauman\Location\Facades\Location;

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

        [$ip, $countryName] = $this->locationInfo();
        $attributes['ip_address'] = $ip;
        $attributes['country'] = $countryName;

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

        [$ip, $countryName] = $this->locationInfo();
        $attributes['ip_address'] = $ip;
        $attributes['country'] = $countryName;

        /** @var Meeting $meeting */
        $meeting = Meeting::query()->create($attributes);

        Mail::to(config('mail.my_mail'))->send(new NewMeetingMailable($meeting));

        return back()->with('success', 'meeting');
    }

    /**
     * @return array
     */
    private function locationInfo(): array
    {
        $position = Location::get();

        if (!$position) return [null, null];

        return [$position->ip, $position->countryName];
    }
}
