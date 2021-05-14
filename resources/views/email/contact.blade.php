@component('mail::message')
# Bonjour Aboubacar

Vous avez reçu une nouvelle demande de contact. Voici ces informations de contact:

- **Nom et Prénom**: {{$contact->full_name}}
- **Email**: {{$contact->email}}
- **Type**: {{$contact->parsedSiteName()}}
- **Pays**: {{$contact->country}}

@component('mail::button', ['url' => route('hubble.show', ['key' => $contact->id, 'name' => 'contacts'])])
    Voir les details
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
