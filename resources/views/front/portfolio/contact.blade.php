@extends('layouts.portfolio')
@section('seo')
    <meta name="description" content="Développeur web full-stack à casablanca au maroc">
    <meta name="keywords"
          content="Développeur de site web, Développeur web, Développeur front-end, Développeur back-end, Développeur maroc, Développeur Casablanca">
@endsection
@section('styles')
    <link href="{{ mix('css/contact.css', 'assets') }}" rel="stylesheet">
@endsection()
@section('body-classes', 'contact-page')
@section('content')
    <section class="container contact-container">
        <div class="contact-header">
            <p class="contact-header-label fade">Obtenir un devis</p>
            <h1 class="contact-header-title fade" data-delay="1">Me contacter</h1>
            <p class="contact-header-desc fade" data-delay="2">Merci de donner un maximum de détail sur le projet afin
                que je puisse évaluer
                correctement la charge de travail que représente votre projet. Cela permettra aussi d'avoir un premier
                chiffrage au plus prêt du devis final.
            </p>
        </div>
        <form action="" class="contact-form fade" data-delay="3">
            <div class="grid grid-cols-2 grid-col-gap-1 mobile-grid-1">
                <div class="form-group">
                    <label for="full_name">Nom et prénom</label>
                    <input type="text" name="full_name" class="form-input" id="full_name" placeholder="Nom et prénom">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-input" id="email" placeholder="Votre adresse email">
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea rows="10" class="form-input" name="description" id="description"
                          placeholder="Description de votre projet"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mobile-full">Envoyer</button>
        </form>
    </section>
    <section class="container faq-container " id="faq">
        <div class="faq-header " >
            <p class="faq-label fade">FAQ</p>
            <h2 class="faq-title fade" data-delay="1">Les questions <br class="hide-on-mobile">fréquentes</h2>
        </div>
        <ul class="faq-questions" >
            <li class="faq-question fade" data-delay="2">
                <div class="faq-question-title">Quels sont vos disponibilités ?</div>
                <p class="faq-question-desc">
                    Je suis actuellement en mission et je ne serai pas disponible avant <strong>fin avril 2021</strong>.
                    Vous pouvez
                    toutefois faire une demande de devis afin de prévoir en amont un planning et réserver un créneau
                    pour le développement de votre projet.
                </p>
            </li>
            <li class="faq-question fade" data-delay="3">
                <div class="faq-question-title">Quels sont vos tarifs ?</div>
                <p class="faq-question-desc">
                    La tarification dépend du projet et surtout du temps qui sera nécessaire pour le mener à bien. À
                    titre indicatif mon tarif journalier moyen se situe aux alentour de <strong>1000dhs/jour</strong>.
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
                    Je ne suis malheureusement pas en capacité d'effectuer le design d'une application aussi il sera
                    nécessaire de fournir le design si la mission le nécessite. <strong>Je vous invite à contacter un graphiste.</strong>
                </p>
            </li>
        </ul>
    </section>
    @include('front.portfolio.partials.footer')
@endsection
