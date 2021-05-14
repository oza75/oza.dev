@extends('front.portfolio.projects.layout')
@section('title', 'Projet Nossaveurs | Portfolio de Ouattara Zié Aboubacar')
@section('seo')
    <meta name="description"
          content="Projet Nossaveurs réalisé par OUATTARA Zié Aboubacar, Développeur web full stack connu sous le nom de @oza">
    <meta name="keywords"
          content="Développeur web, Développeur web full-stack, Développeur web à casablanca, Développeur web au maroc"/>
@endsection
@section('content')
    <div class="container">
        <div class="project-header">
            <h1 class="project-title fade">Nossaveurs</h1>
            <p class="project-desc fade" data-delay="1">Développement back-end et front-end de la plateforme
                nossaveurs.fr</p>
        </div>

        <section class="">
            <div class="flex align-center space-between project-columns fade" data-delay="2">
                <div class="project-title no-mb">Développement front-end & back-end</div>
                <div class="flex flex-end align-center mobile-flex-start">
                    <a rel="noopener noreferrer" href="https://nossaveurs.fr" target="_blank"
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
                <p>
                    Ce projet consistait à la création d'un site web d'annonce permettant de vendre ou de trouver des
                    plats ou autres produits alimentaires. Il s'agissait donc de mettre en place une marketplace
                    permettant aux personnes ayant des talents culinaires de vendre leurs plats ou autres produits
                    alimentaires.
                </p>
                <p>
                    La principale difficulté de cette mission était la recherche de produits alimentaires. En effet,
                    la plateforme offre plusieurs façons aux utilisateurs de rechercher un produit notamment la
                    recherche à proximité, la recherche dans une région, ville, département ou commune etc...
                </p>
            </div>
        </section>
        <section class="project-columns ">
            <picture>
                <source srcset="{{asset('assets/images/projects/nossaveurs/home.webp')}}" type="image/webp">
                <source srcset="{{asset('assets/images/projects/nossaveurs/home.png')}}" type="image/png">
                <img loading="lazy" data-src="{{asset('assets/images/projects/nossaveurs/home.webp')}}" width="100%"
                     height="auto"
                     class="project-image mobile-mb-20 fade" data-delay="2" alt="Page de recherche de nossaveurs">
            </picture>

            <div class="fade" data-delay="3">
                <h2 class="project-sub-title ">Intégration de la maquette</h2>
                <p>
                    La maquette ayant été fourni par le designer, il a fallu passer à son intégration et commencer à
                    donner vie au
                    projet.
                    L'outil <a href="https://sass-lang.com/">SASS</a> a été utilisé afin de faciliter l'écriture du CSS
                    et de mieux l'organiser.
                </p>
                <p>
                    Le Javascript et notamment le framework VueJs intervient pour rendre le site plus interactive pour
                    l'utilisateur.
                    VueJs a été utilisé pour les composants qui interagissent avec un état et dont l'interface s'adapte
                    en fonction de cet état.
                </p>

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
        <section class="project-columns ">
            <div class="fade" data-delay="2">
                <h2 class="project-sub-title">Une recherche pertinente</h2>
                <p>
                    La recherche étant un critère très important pour un site de ce genre, nous avons utilisé
                    différentes technologies afin d'améliorer la performance et efficacité de la recherche. Notamment
                    pour la recherche à proximité, il a fallu utiliser des techniques permettant de faire une recherche
                    spatiale à travers les données GeoJson des différentes villes, région, commune etc...
                </p>
                <p>
                    Pouvoir utiliser le site sur n'importe quel appareil avec n'importe quelle taille écran étant un
                    aspect vital pour le site web, il a fallu trouver un moyen d'adapter correctement l'interface de la
                    recherche pour les appareils mobile et les tablettes.
                </p>
            </div>
            <picture>
                <source srcset="{{asset('assets/images/projects/nossaveurs/carte.webp')}}" type="image/webp">
                <source srcset="{{asset('assets/images/projects/nossaveurs/carte.png')}}" type="image/png">
                <img loading="lazy" data-src="{{asset('assets/images/projects/nossaveurs/carte.webp')}}" width="100%"
                     height="auto"
                     class="project-image mobile-mb-20 fade" data-delay="2" alt="Page de recherche de nossaveurs">
            </picture>
        </section>
        <section class="project-columns mobile-reverse-columns">
            <picture>
                <source srcset="{{asset('assets/images/projects/happy-closet/admin.webp')}}" type="image/webp">
                <source srcset="{{asset('assets/images/projects/happy-closet/admin.png')}}" type="image/png">
                <img loading="lazy" data-src="{{asset('assets/images/projects/happy-closet/admin.webp')}}" width="100%"
                     height="auto"
                     class="project-image fade" data-delay="2" alt="Administration de happy closet">
            </picture>
            <div class="fade" data-delay="3">
                <h2 class="project-sub-title">Administration</h2>
                <p>
                    L'administration permet de gérer les différentes resources du projet. La gestion est presque
                    similaire pour chacune de ces resources. Nous avons une page d'indexation, une page de modification,
                    de création, de suppression etc...
                    Toutes ces pages se répètent pour chaque resource. Il a fallu trouver un moyen pour générer ces
                    pages automatiquement et accélérer le development de la plateforme.
                </p>

                <p>
                    J'ai donc utilisé le package laravel <a href="https://github.com/oza75/laravel-hubble"><strong>oza75/laravel-hubble</strong></a>
                    que j'avais créé pour un de mes projets qui me permet de générer des administrations à la volée.
                    Le package <a href="https://github.com/oza75/laravel-hubble"><strong>oza75/laravel-hubble</strong>
                    </a> est disponible gratuitement sur github et packagist.
                </p>
            </div>
        </section>
        <section class="project-roles">
            <div class="project-role fade">
                <h3 class="project-role-title">Roles</h3>
                <ul class="project-role-list">
                    <li>Chef du projet</li>
                    <li>Développeur Back-end</li>
                    <li>Développeur Front-end</li>
                </ul>
            </div>
            <div class="project-role fade" data-delay="1">
                <h3 class="project-role-title">Technologies</h3>
                <ul class="project-role-list">
                    <li>Laravel</li>
                    <li>VueJs</li>
                    <li>Socket.io</li>
                </ul>
            </div>
        </section>
        <section class="project-navigations fade" data-delay="1">
            <div></div>
            <div class="project-navigation">
                <div class="label">Projet suivant</div>
                <a href="{{route('projects.happy-closet')}}" class="title">Happy Closet</a>
            </div>
        </section>
    </div>
@endsection
