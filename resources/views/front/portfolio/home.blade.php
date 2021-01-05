@extends('layouts.portfolio')

@section('content')
    <section class="container portfolio-section hero-section flex align-center ">
        <div class="hero-image-wrapper fade ">
            <picture class="hide-on-mobile">
                <source srcset="{{asset('assets/images/me-desktop.webp')}}" type="image/webp">
                <source srcset="{{asset('assets/images/me-desktop.png')}}" type="image/png">
                <img src="{{asset('assets/images/me-desktop.png')}}" alt="Ouattara Aboubacar">
            </picture>
            <picture class="hide-on-desktop">
                <source srcset="{{asset('assets/images/me-mobile.webp')}}" type="image/webp">
                <source srcset="{{asset('assets/images/me-mobile.png')}}" type="image/png">
                <img src="{{asset('assets/images/me-mobile.png')}}" width="200" height="200" alt="Ouattara Aboubacar">
            </picture>
        </div>
        <div class="hero-description">
            <h1 class="hero-title fade " data-delay="1">Bonjour, je suis Aboubacar</h1>
            <div class="hero-desc fade " data-delay="2">
                <p>Je suis développeur web full stack basé au maroc.</p>
                <p>
                    Je suis spécialisé dans la création de site web de type boutique en ligne, site d'annonces ou encore
                    des sites vitrines.
                    J'interviens dans le développement back-end et du front-end et j'apprécie créer des applications de
                    type SPA avec une API Rest.
                </p>
                <p>J'apprécie également travailler sur des projets sous Laravel, VueJs ou Angular. N'hésitez pas à me
                    contacter pour discuter de votre projet d'application web ! </p>
            </div>
            <div class="hero-actions flex align-center fade " data-delay="3">
                <a href="" class="btn btn-primary">Me contacter</a>
                <a href="" class="btn btn-outline-primary">Questions</a>
            </div>
        </div>
    </section>

    <section class="container portfolio-section what-i-do-section fade">
        <h2 class="section-title fade" data-delay="1">Mes compétences</h2>
        <ul class="competence-cards flex align-center">
            <li class="competence-card-wrapper fade" data-delay="2">
                <div class="competence-card red">
                    <img data-src="{{asset('assets/images/laravel.svg')}}" loading="lazy" alt="Laravel" class="icon">
                    <div class="card-title">Laravel</div>
                    <div class="card-desc">
                        Je developpe des applications PHP depuis plus de 5 ans et je maîtrise le framework Laravel qui
                        est l'un des frameworks PHP les plus populaires.
                    </div>
                </div>
            </li>
            <li class="competence-card-wrapper green fade" data-delay="3">
                <div class="competence-card">
                    <img loading="lazy" data-src="{{asset('assets/images/vuejs.png')}}" alt="VueJs" class="icon">
                    <div class="card-title">VueJs</div>
                    <div class="card-desc">
                        Si vous avez besoin d'une application réactive, je maitrise le framework VueJS.
                    </div>
                </div>
            </li>
            <li class="competence-card-wrapper yellow fade" data-delay="4">
                <div class="competence-card">
                    <img loading="lazy" data-src="{{asset('assets/images/angular.svg')}}" alt="Angular" class="icon">
                    <div class="card-title">Angular</div>
                    <div class="card-desc">
                        Si vous avez besoin de développer une application dynamique et réactive, je maitrise aussi le
                        framework Javascript Angular.
                    </div>
                </div>
            </li>
        </ul>
    </section>

    <section class="container portfolio-section project-section fade">
        <div class="section-title fade" data-delay="1">Mes récentes réalisations</div>
        <ul class="projects flex align-center" id="projects-slider">
            <li class="project-card fade" data-delay="2">
                <div class="project-img-wrapper">
                    <img loading="lazy" data-src="{{asset('assets/images/projects/happy-closet.png')}}"
                         class="project-img"
                         alt="Happy closet">
                </div>
                <div class="project-details">
                    <div class=" flex align-center space-between project-header">
                        <span class="project-title">Happy closet</span>
                        <a href="{{route('projects.happy-closet')}}" rel="nofollow" class="project-link">Détails</a>
                    </div>
                    <div class="project-desc">
                        Chef de projet, développement back-end et front-end avec le responsive de la plateforme Happy
                        closet.
                        Happy closet est une plateforme de e-commerce spécialiser dans le domaine de la maternité.
                    </div>
                </div>
            </li>
            <li class="project-card fade" data-delay="3">
                <div class="project-img-wrapper">
                    <img loading="lazy" data-src="{{asset('assets/images/projects/urbateur.png')}}" class="project-img"
                         alt="Urbateur">
                </div>
                <div class="project-details">
                    <div class=" flex align-center space-between project-header">
                        <span class="project-title">Urbateur</span>
                        <a href="" class="project-link">Détails</a>
                    </div>
                    <div class="project-desc">Développement back-end et front-end de la plateforme Urbateur.
                        Urbateur est un réseau social mettant en relations les différents acteurs de l'artisanat et de
                        l'architecture.
                    </div>
                </div>
            </li>
            <li class="project-card fade" data-delay="4">
                <div class="project-img-wrapper">
                    <img loading="lazy" data-src="{{asset('assets/images/projects/fink.ma.png')}}" class="project-img"
                         alt="Fink.ma">
                </div>
                <div class="project-details">
                    <div class=" flex align-center space-between project-header">
                        <span class="project-title">Fink.ma</span>
                        <a href="" class="project-link">Détails</a>
                    </div>
                    <div class="project-desc">Développement back-end et front-end de Fink.ma. Fink.ma est un annuaire
                        marocain recensant les différentes entreprises au maroc.
                    </div>
                </div>
            </li>
            <li class="project-card fade" data-delay="5">
                <div class="project-img-wrapper">
                    <img loading="lazy" data-src="{{asset('assets/images/projects/123bain.fr.png')}}"
                         class="project-img"
                         alt="123Bain.fr">
                </div>
                <div class="project-details">
                    <div class=" flex align-center space-between project-header">
                        <span class="project-title">123Bain.fr</span>
                        <a href="" class="project-link">Détails</a>
                    </div>
                    <div class="project-desc">Intégration du design de 123bain.fr. 123bain.fr est un site e-commerce de
                        vente d'équipement de salle de bain.
                    </div>
                </div>
            </li>
        </ul>
        <div id="projects-sliders-dots"></div>
    </section>

    <section class="container portfolio-section social-networks-section fade">
        <div class="section-title fade" data-delay="1">Me retrouver</div>
        <ul class="flex align-center social-network-cards">
            <li>
                <a href="https://github.com/oza75" target="_blank"
                   class="social-network-card flex align-center github fade" data-delay="2">
                    <div class="card-content">
                        <div class="card-title">Github</div>
                        <div class="card-link">github.com/oza75</div>
                    </div>
                    <img loading="lazy" data-src="{{asset('assets/images/github.svg')}}" class="card-icon" alt="Github"
                         width="50" height="50">
                </a>
            </li>
            <li>
                <a href="https://twitter.com/oza_dev_" target="_blank"
                   class="social-network-card flex align-center twitter fade" data-delay="3">
                    <div class="card-content">
                        <div class="card-title">Twitter</div>
                        <div class="card-link">twitter.com/oza_dev_</div>
                    </div>
                    <img loading="lazy" data-src="{{asset('assets/images/twitter.svg')}}" class="card-icon"
                         alt="Twitter" width="50" height="50">
                </a>
            </li>
            <li>
                <a href="https://www.facebook.com/mrOza.dev" target="_blank"
                   class="social-network-card flex align-center facebook fade" data-delay="4">
                    <div class="card-content">
                        <div class="card-title">Facebook</div>
                        <div class="card-link">facebook.com/mrOza.dev</div>
                    </div>
                    <img loading="lazy" data-src="{{asset('assets/images/facebook.svg')}}" class="card-icon"
                         alt="Facebook" width="50" height="50">
                </a>
            </li>
        </ul>
    </section>
@endsection
