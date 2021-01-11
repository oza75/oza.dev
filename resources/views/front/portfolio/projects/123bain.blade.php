@extends('front.portfolio.projects.layout')
@section('title', 'Projet 123bain.fr | Portfolio de Ouattara Zié Aboubacar')
@section('seo')
    <meta name="description"
          content="Projet 123bain.fr | OUATTARA Zié Aboubacar, Développeur web full stack connu sous le nom de @oza">
    <meta name="keywords"
          content="Développeur web, Développeur web full-stack, Développeur web à casablanca, Développeur web au maroc"/>
@endsection
@section('content')
    <div class="container">
        <div class="project-header">
            <h1 class="project-title fade">123bain.fr</h1>
            <p class="project-desc fade" data-delay="1">Intégration de la maquette de 123bain.fr</p>
        </div>

        <section class="">
            <div class="flex align-center space-between project-columns fade" data-delay="2">
                <div class="project-title no-mb">Intégration web</div>
                <div class="flex flex-end align-center mobile-flex-start">
                    <a rel="noopener noreferrer" href="https://123bain.fr" target="_blank"
                       class="btn btn-outline-primary btn-arrow visit-website-btn">
                        Voir le site
                        <svg width="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex space-between project-columns fade" data-delay="3">
                <p> 123bain est un site de vente en ligne de robinets pour la cuisine et la salle de bain.
                </p>
                <p>
                    L'objectif de ce projet était d'intégré la maquette du site avec le responsive design.
                </p>
            </div>
        </section>
        <section class="project-columns ">
            <picture>
                                <source srcset="{{asset('assets/images/projects/123bain/accueil.webp')}}" type="image/webp">
                <source srcset="{{asset('assets/images/projects/123bain/accueil.png')}}" type="image/png">
                <img loading="lazy" data-src="{{asset('assets/images/projects/123bain/accueil.webp')}}" width="100%"
                     height="auto"
                     class="project-image mobile-mb-20 fade" data-delay="2" alt="Page d'accueil de 123bain">
            </picture>

            <div class="fade" data-delay="4">
                <h2 class="project-sub-title ">Intégration de la maquette</h2>
                <p>La maquette ayant été fourni par le graphiste, il a fallu commencer à l'intégrer. L'utilitaire <a
                        href="https://sass-lang.com/">SASS</a> a
                    été utilisé pour faciliter l'écriture du CSS. Le Javascript intervient pour animer certaines sections
                    du site là où le CSS ne peut faire l'animation.</p>
                <h2 class="project-sub-title">Un design responsive (adaptative)</h2>
                <p>
                    De nos jours, il existe différents types d'appareils avec des tailles d'écran différentes. Ce projet
                    a été pensé de sorte qu'il s'affiche convenablement en fonction d'écran de l'appareil de
                    l'utilisateur.
                </p>
                <p>
                    Que l'on soit sur un smartphone, une tablette ou un ordinateur; le site web s'adaptera pour offrir
                    une interface adaptée. De plus, d'après les statistiques, la plupart des utilisateurs utilisent leur
                    smartphone pour consulter un site web. il était donc indispensable que le site soit
                    responsive.
                </p>
            </div>
        </section>
        <section class="project-roles">
            <div class="project-role fade">
                <h3 class="project-role-title">Roles</h3>
                <ul class="project-role-list">
                    <li>Développeur Front-end</li>
                </ul>
            </div>
            <div class="project-role fade" data-delay="1">
                <h3 class="project-role-title">Technologies</h3>
                <ul class="project-role-list">
                    <li>Sass/SCSS</li>
                    <li>Javascript</li>
                </ul>
            </div>
        </section>

        <section class="project-navigations fade" data-delay="1">
            <div class="project-navigation">
                <div class="label">Projet précédent</div>
                <a href="{{route('projects.fink')}}" class="title">Fink</a>
            </div>
            <div class="project-navigation">
            </div>
        </section>
    </div>
@endsection
