@extends('front.portfolio.projects.layout')
@section('title', 'Mes réalisations | Portfolio de Ouattara Zié Aboubacar')
@section('seo')
    <meta name="description"
          content="Réalisations de OUATTARA Zié Aboubacar, Développeur web full stack au Canada">
    <meta name="keywords"
          content="Création de site web, Développeur web Full-Stack, Développeur Laravel, Développeur Freelance"/>
    <meta property="og:url" content="{{route('projects.index')}}"/>
    <link rel="canonical" href="https://www.oza.dev/réalisations" />
    <meta property="og:title" content="Mes réalisations | Portfolio de Ouattara Zié Aboubacar'"/>
    <meta property="og:description" content="Réalisations de OUATTARA Zié Aboubacar, Développeur web full stack au Canada"/>
    <meta name="twitter:author" content="@oza_dev_"/>
@endsection
@section('content')
    <div class="container realisations">
        <div class="project-header">
            <h1 class="project-title fade">Mes réalisations</h1>
            <p class="project-desc fade" data-delay="1">Voici un éventail des projets sur lesquels je suis intervenus.</p>
        </div>

        <div class="projects" id="projects-slider">
            <div class="project-card fade" data-delay="2">
                <div class="project-img-wrapper">
                    <picture>
                        <source srcset="{{asset('assets/images/projects/nossaveurs/nossaveurs.webp')}}" type="image/webp">
                        <source srcset="{{asset('assets/images/projects/nossaveurs/nossaveurs.png')}}" type="image/png">
                        <img loading="lazy" data-src="{{asset('assets/images/projects/nossaveurs/nossaveurs.png')}}"
                             class="project-img"
                             alt="Nossaveurs">
                    </picture>
                </div>
                <div class="project-details">
                    <div class=" flex align-center space-between project-card-header">
                        <span class="project-title">Nossaveurs.fr</span>
                        <a href="{{route('projects.nossaveurs')}}" rel="nofollow" class="project-link">Détails</a>
                    </div>
                    <div class="project-desc">
                        Chef de projet, développeur back-end et front-end pour la plateforme nossaveurs.fr.
                        nossaveurs.fr est un site web d'annonce de produits alimentaires.
                    </div>
                </div>
            </div>
            <div class="project-card fade" data-delay="3">
                <div class="project-img-wrapper">
                    <img loading="lazy" data-src="{{asset('assets/images/projects/happy-closet.png')}}"
                         class="project-img"
                         alt="Happy closet">
                </div>
                <div class="project-details">
                    <div class=" flex align-center space-between project-card-header">
                        <span class="project-title">Happy closet</span>
                        <a href="{{route('projects.happy-closet')}}" rel="nofollow" class="project-link">Détails</a>
                    </div>
                    <div class="project-desc">
                        Chef de projet, développement back-end et front-end avec le responsive de la plateforme Happy
                        closet.
                        Happy closet est une plateforme de e-commerce spécialiser dans le domaine de la maternité.
                    </div>
                </div>
            </div>
            <div class="project-card fade" data-delay="4">
                <div class="project-img-wrapper">
                    <img loading="lazy" data-src="{{asset('assets/images/projects/urbateur.png')}}" class="project-img"
                         alt="Urbateur">
                </div>
                <div class="project-details">
                    <div class=" flex align-center space-between project-card-header">
                        <span class="project-title">Urbateur</span>
                        <a href="{{route('projects.urbateur')}}" rel="nofollow" class="project-link">Détails</a>
                    </div>
                    <div class="project-desc">Développement back-end et front-end de la plateforme Urbateur.
                        Urbateur est un réseau social mettant en relations les différents acteurs de l'artisanat et de
                        l'architecture.
                    </div>
                </div>
            </div>
            <div class="project-card fade" data-delay="5">
                <div class="project-img-wrapper">
                    <img loading="lazy" data-src="{{asset('assets/images/projects/fink.ma.png')}}" class="project-img"
                         alt="Fink.ma">
                </div>
                <div class="project-details">
                    <div class=" flex align-center space-between project-card-header">
                        <span class="project-title">Fink.ma</span>
                        <a href="{{route('projects.fink')}}" class="project-link">Détails</a>
                    </div>
                    <div class="project-desc">Développement back-end et front-end de Fink.ma. Fink.ma est un annuaire
                        marocain recensant les différentes entreprises au maroc.
                    </div>
                </div>
            </div>
            <div class="project-card fade" data-delay="6">
                <div class="project-img-wrapper">
                    <img loading="lazy" data-src="{{asset('assets/images/projects/123bain.fr.png')}}"
                         class="project-img"
                         alt="123Bain.fr">
                </div>
                <div class="project-details">
                    <div class=" flex align-center space-between project-card-header">
                        <span class="project-title">123Bain.fr</span>
                        <a href="{{route('projects.123bain')}}" class="project-link">Détails</a>
                    </div>
                    <div class="project-desc">Intégration du design de 123bain.fr. 123bain.fr est un site e-commerce de
                        vente d'équipement de salle de bain.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
