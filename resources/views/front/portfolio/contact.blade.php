@extends('layouts.portfolio')
@section('title', "Obtenez gratuitement un devis pour votre futur projet web")
@section('seo')
    <meta name="description" content="Obtenez gratuitement une estimation du coût de votre futur projet web">
    <meta name="keywords"
          content="Développeur de site web, Développeur web, Développeur front-end, Développeur back-end, Développeur maroc, Développeur Casablanca">
@endsection
@section('styles')
    <link href="{{ mix('css/contact.css', 'assets') }}" rel="stylesheet">
@endsection()
@section('body-classes', 'contact-page')
@section('content')
    <?php $setting = \App\Models\Setting::query()->latest()->first() ?>
    <?php $optionTypes = \App\Models\Contact::$types ?>
    <?php $status = session('success', null) ?>
    <section class="container contact-container">
        <div class="contact-form-wrapper">
            <div class="contact-header">
                <p class="contact-header-label fade">Obtenir un devis</p>
                <h1 class="contact-header-title fade" data-delay="2">Obtenez gratuitement un devis</h1>
                <p class="contact-header-desc fade" data-delay="3">Merci de donner quelques détails sur votre projet
                    afin d'obtenir un devis gratuitement. Plus vos informations seront précises plus votre devis sera
                    réaliste. <span class="hide-on-desktop">Vous pouvez aussi <a
                            href="#rdv">planifier un rendez-vous</a> sur Google Meet pour discuter de votre projet en visio.</span>
                </p>
            </div>
            @error('recaptcha')
            <div class="alert alert-error">{{$message}}</div>
            @enderror
            @if($status == 'contact')
                <div class="alert alert-success contact-form fade" data-delay="3">
                    Votre demande de devis a été bien reçu. Je vous répondrais bientôt. En attendant, vous pouvez lire
                    les questions fréquentes <a href="#faq">ici</a>
                </div>
            @else
                <form action="{{route('contact.store')}}" method="post" class="contact-form fade" data-delay="3">
                    @csrf
                    <div class="grid grid-cols-2 grid-col-gap-1 mobile-grid-1">
                        <x-input name="full_name" required minlength="3" label="Votre nom et prénom"
                                 placeholder="Nom et prénom"></x-input>
                        <x-input name="email" type="email" required label="Votre Email"
                                 placeholder="Votre adresse email"></x-input>
                    </div>
                    <x-select name="site_type" required id="type" label="Sélectionner un type"
                              :options="$optionTypes"></x-select>
                    <x-textarea name="description" required label="Description"
                                placeholder="Description de votre projet" rows="10" minlength="30"></x-textarea>
                    <button type="submit" class="btn btn-primary mobile-full recaptcha" id="contact-btn">Envoyer
                    </button>
                    <div id="contact-btn-recaptcha" class="hide"></div>
                </form>
            @endif
        </div>
        <div>
            <div class="contact-header" id="rdv">
                <p class="contact-header-label fade">Prendre un rendez-vous</p>
                <h1 class="contact-header-title fade" data-delay="2">Planifier un rendez-vous</h1>
                <p class="contact-header-desc fade" data-delay="3">
                    Organiser une réunion sur Google Meet pour parler de votre projet plus en profondeur.
                </p>
            </div>
            @error('recaptcha')
            <div class="alert alert-error">{{$message}}</div>
            @enderror
            @if($status == 'meeting')
                <div class="alert alert-success contact-form fade" data-delay="4">
                    Votre demande de rendez-vous a été prise en compte. Vous recevrez très vite un mail pour vous
                    confirmer le rendez-vous. En attendant, vous pouvez lire
                    les questions fréquentes <a href="#faq" style="color: white; text-decoration: underline">ici</a>
                </div>
            @else
                <form action="{{route('meeting.store')}}#rdv" method="post" class="contact-form fade" data-delay="4">
                    @csrf
                    <div class="grid grid-cols-2 grid-col-gap-1 mobile-grid-1">
                        <x-input name="full_name_rdv" id="full_name_rdv" required minlength="3"
                                 label="Votre nom et prénom" placeholder="Nom et prénom"></x-input>
                        <x-input name="email_rdv" id="email_rdv" type="email" required label="Votre Email"
                                 placeholder="Votre adresse email"></x-input>
                    </div>
                    <x-select name="site_type_rdv" required id="type_rdv" label="Sélectionner un type"
                              :options="$optionTypes"></x-select>
                    <div class="grid grid-cols-2 grid-col-gap-1 mobile-grid-1">
                        <x-input name="date" label="Sélectionner une date" required min="{{now()->toDateString()}}"
                                 placeholder="Sélectionner une date" type="date"></x-input>
                        <x-input name="time" label="Sélectionner une heure" required
                                 placeholder="Sélectionner une heure" type="time"></x-input>
                    </div>
                    <button type="submit" class="btn btn-primary mobile-full recaptcha" id="meeting-btn">Planifier</button>
                    <div id="meeting-btn-recaptcha" class="hide"></div>
                </form>
            @endif
        </div>
    </section>
    <section class="container faq-container " id="faq">
        <div class="faq-header ">
            <p class="faq-label fade">FAQ</p>
            <h2 class="faq-title fade" data-delay="1">Les questions <br class="hide-on-mobile">fréquentes</h2>
        </div>
        <ul class="faq-questions">
            <li class="faq-question fade" data-delay="2">
                <div class="faq-question-title">Quels sont vos disponibilités ?</div>
                @if(!$setting->isAvailable())
                    <p class="faq-question-desc">
                        Je suis actuellement en mission et je ne serai pas disponible avant le
                        <strong>{{$setting->availableDate()}}</strong>.
                        Vous pouvez
                        toutefois faire une demande de devis afin de prévoir en amont un planning et réserver un créneau
                        pour le développement de votre projet.
                    </p>
                @else
                    <p class="faq-question-desc">
                        Je suis actuellement disponible. Vous pouvez faire une demande de devis et je vous répondrais
                        dans les meilleurs délai.
                    </p>
                @endif
            </li>
            <li class="faq-question fade" data-delay="3">
                <div class="faq-question-title">Quels sont vos tarifs ?</div>
                <p class="faq-question-desc">
                    La tarification dépend du projet et surtout du temps qui sera nécessaire pour le mener à bien. À
                    titre indicatif mon tarif journalier moyen se situe aux alentour
                    de @include('front.portfolio.partials.price').
                </p>
            </li>
            <li class="faq-question fade" data-delay="3">
                <div class="faq-question-title">Effectuez-vous des missions en Agence ?</div>
                <p class="faq-question-desc">
                    J'effectue l'ensemble de mes missions à distance.
                </p>
            </li>
            <li class="faq-question fade" data-delay="3">
                <div class="faq-question-title">Faites-vous la partie design des projets ?</div>
                <p class="faq-question-desc">
                    Je ne suis malheureusement pas en capacité d'effectuer le design d'une application. Il sera donc
                    nécessaire de fournir le design si la mission le nécessite. <strong>Je vous invite à contacter un
                        graphiste.</strong>
                </p>
            </li>
        </ul>
    </section>
    @include('front.portfolio.partials.footer')
@endsection
