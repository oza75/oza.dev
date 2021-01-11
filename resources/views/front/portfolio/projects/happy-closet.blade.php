@extends('front.portfolio.projects.layout')
@section('title', 'Projet Happy Closet | Portfolio de Ouattara Zié Aboubacar')
@section('seo')
    <meta name="description"
          content="Projet Happy Closet réalisé par OUATTARA Zié Aboubacar, Développeur web full stack connu sous le nom de @oza">
    <meta name="keywords"
          content="Développeur web, Développeur web full-stack, Développeur web à casablanca, Développeur web au maroc"/>
@endsection
@section('content')
    <div class="container">
        <div class="project-header">
            <h1 class="project-title fade">Happy Closet</h1>
            <p class="project-desc fade" data-delay="1">Développement back-end et front-end de la plateforme
                happycloset.ma</p>
        </div>

        <section class="">
            <div class="flex align-center space-between project-columns fade" data-delay="2">
                <div class="project-title no-mb">Développement front-end & back-end</div>
                <div class="flex flex-end align-center mobile-flex-start">
                    <a rel="noopener noreferrer" href="https://happycloset.ma" target="_blank"
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
                    Ce projet consistait à la création d'une plateforme de vente d'articles pour bébé, enfant et maman.
                    L'objectif principal était de construire un site d'annonce mettant en relation les mères marocaines.
                    Laravel et VueJs ont été choisit comme framework PHP et Javascript.
                </p>
                <p>
                    Dans un premier temps il a fallu concevoir la maquette du site afin de bien cerner les besoins du
                    client et d'avoir une vision globale du projet. Ensuite, il a fallu concevoir la structure des
                    données et de la base de données afin de répondre au mieux aux attentes de la plateforme.
                </p>
            </div>
        </section>
        <section class="project-columns ">
            <picture>
                <source srcset="{{asset('assets/images/projects/happy-closet/home.webp')}}" type="image/webp">
                <source srcset="{{asset('assets/images/projects/happy-closet/home.png')}}" type="image/png">
                <img loading="lazy" data-src="{{asset('assets/images/projects/happy-closet/home.webp')}}" width="100%"
                     height="auto"
                     class="project-image mobile-mb-20 fade" data-delay="2" alt="Page d'accueil de happy closet">
            </picture>

            <div class="fade" data-delay="3">
                <h2 class="project-sub-title ">Intégration de la maquette</h2>
                <p>
                    Une fois la maquette constitué, il a fallu passer à son intégration et commencer à donner vie au
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
                <h2 class="project-sub-title">Défilement infini</h2>
                <p>Le défilement infini permet de charger automatiquement du contenu lors du scroll de l'utilisateur.
                    Ceci permet de capter l'attention
                    de l'utilisateur et de le garder le plus longtemps possible sur le site. </p>

                <p>
                    C'est une fonctionnalité que nous trouvons sur les sites comme facebook, twitter, youtube etc...
                    Nous l'avons donc utiliser pour charger automatiquement des annonces et maintenir le plus longtemps
                    possible l'utilisateur sur le site.
                </p>
            </div>
            <video loading="lazy" data-src="{{asset('assets/images/projects/happy-closet/infinite-scroll.mp4')}}"
                   width="100%" height="auto"
                   class="project-image fade" data-delay="3" autoplay muted loop playsinline></video>
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
                    J'ai donc du créer un package laravel qui me permettra de générer des administration a la volet et
                    qui pourra être
                    utiliser pour mes projets future. Le package <a
                        href="https://github.com/oza75/laravel-hubble"><strong>oza75/laravel-hubble</strong> </a>est
                    disponible sur github et packagist.
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
                <a href="{{route('projects.urbateur')}}" class="title">Urbateur</a>
            </div>
        </section>
    </div>
@endsection
