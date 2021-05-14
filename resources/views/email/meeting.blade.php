@component('mail::message')
# Bonjour Aboubacar

Vous avez reçu une nouvelle demande de rendez-vous. Voici ces informations de contact:

- **Nom et Prénom**: {{$meeting->full_name}}
- **Email**: {{$meeting->email}}
- **Type**: {{$meeting->parsedSiteName()}}
- **Pays**: {{$meeting->country}}
- **Date**: {{$meeting->date}}
- **Heure**: {{$meeting->time}}

@component('mail::button', ['url' => ''])
    Voir les details
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
