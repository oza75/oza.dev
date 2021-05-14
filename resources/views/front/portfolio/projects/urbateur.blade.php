@extends('front.portfolio.projects.layout')
@section('title', 'Projet Urbateur | Portfolio de Ouattara Zié Aboubacar')
@section('seo')
    <meta name="description"
          content="Projet Urbateur réalisé par OUATTARA Zié Aboubacar, Développeur web full stack connu sous le nom de @oza">
    <meta name="keywords"
          content="Développeur web, Développeur web full-stack, Développeur web à casablanca, Développeur web au maroc"/>
@endsection
@section('content')
    <div class="container">
        <div class="project-header">
            <h1 class="project-title fade">Urbateur</h1>
            <p class="project-desc fade" data-delay="1">Développement back-end et front-end de la plateforme
                urbateur</p>
        </div>

        <section class="">
            <div class="flex align-center space-between project-columns fade" data-delay="2">
                <div class="project-title no-mb">Développement front-end & back-end</div>
                <div class="flex flex-end align-center mobile-flex-start">
                    <button disabled="disabled" title="Pas encore mis en ligne"
                            class="btn btn-outline-primary btn-arrow visit-website-btn" aria-disabled="true">
                        Voir le site
                        <svg width="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex space-between project-columns fade" data-delay="3">
                <p>
                    Ce projet consistait à la création d'un réseau social permettant de mettre en relations les
                    différents acteurs du domaine de l'artisanat et de l'architecture. L'objectif principal était de
                    construire une plateforme permettant aux utilisateurs d'interagir entre eux. Lumen et Angular 9 ont
                    été utilisés durant ce projet.
                </p>
                <p>
                    Dans un premier temps, j'ai commencé à découper le projet en de petits modules afin de
                    pouvoir mieux m'organiser. Ainsi, un module est chargé du <strong>Mur</strong>
                    de l'utilisateur,
                    un autre pour son <strong>Réseau</strong>, un autre pour la <strong>Messagerie Instantanée</strong>
                    etc...
                </p>
            </div>
        </section>
        <section class="project-columns ">
            <picture>
                <source srcset="{{asset('assets/images/projects/urbateur/profil.webp')}}" type="image/webp">
                <source srcset="{{asset('assets/images/projects/urbateur/profil.png')}}" type="image/png">
                <img loading="lazy" data-src="{{asset('assets/images/projects/urbateur/profil.webp')}}" width="100%"
                     height="auto"
                     class="project-image mobile-mb-20 fade" data-delay="2" alt="Page d'accueil de happy closet">
            </picture>

            <div class="fade" data-delay="4">
                <h2 class="project-sub-title ">Intégration de la maquette</h2>
                <p>
                    La maquette ayant été fourni par le graphiste, il a fallu passer à son intégration et commencer à
                    donner vie au projet. <a href="https://angular.io/">Angular 9</a> a été utilisé pour le development
                    front de la plateforme ce qui
                    permet d'avoir une interface très interactive et fluide pour l'utilisateur.
                </p>
                <p>
                    J'ai utilisé Angular 9 car il est entièrement basé sur <a
                        href="https://www.typescriptlang.org/">TypeScript</a>.
                    TypeScript étant du JavaScript typé, il permet de valider le code Javascript à l'avance et de
                    rendre la maintenance du projet un peu plus abordable.
                    En ce qui concerne le CSS, j'ai utilisé <a href="https://sass-lang.com/">SASS</a> afin de
                    faciliter l'écriture du CSS
                    et de mieux l'organiser.
                </p>

                <h2 class="project-sub-title">Profil de l'utilisateur</h2>
                <p>
                    Urbateur présente différents types d'utilisateur et l'interface doit s'adapter en fonction du type
                    de l'utilisateur. Ainsi, en fonction des données qui seront envoyé par le back-end, nous activons ou
                    désactivons les différents modules de la plateforme.
                </p>
            </div>
        </section>
        <section class="project-columns ">
            <div class="fade" data-delay="2">
                <h2 class="project-sub-title">Système de publication</h2>
                <p>
                    Comme tout réseau social, Urbateur permet à ses utilisateurs de publier sur leur profil. La
                    publication peut être de type texte, vidéos, photos, offre d'emploi ou encore demande d'emploi. Les
                    options de publication s'affichent en fonction du type de l'utilisateur.
                </p>
                <p>
                    Pour le téléversement des vidéos ou des photos, le fichier est divisé en de petites parties
                    d'environ 1 méga et chaque morceau est par la suite envoyé au serveur. Si l'envoi d'un morceau
                    échoue à cause d'une erreur ou d'un problème d'internet, on continue de réessayer l'envoie jusqu'à
                    cela
                    fonctionne. Ainsi l'utilisateur n'aura pas besoin de reprendre tout le téléversement lors d'un
                    problème d'internet.
                </p>
            </div>
            <video loading="lazy" data-src="{{asset('assets/images/projects/urbateur/creation.mp4')}}"
                   width="100%" height="auto"
                   class="project-image fade" data-delay="3" autoplay muted loop playsinline></video>
        </section>
        <section class="project-columns mobile-reverse-columns">
            <picture>
                <source srcset="{{asset('assets/images/projects/urbateur/messagerie.webp')}}" type="image/webp">
                <source srcset="{{asset('assets/images/projects/urbateur/messagerie.png')}}" type="image/png">
                <img loading="lazy" data-src="{{asset('assets/images/projects/happy-closet/messagerie.webp')}}" width="100%"
                     height="auto"
                     class="project-image fade" data-delay="2" alt="Messagerie de Urbateur">
            </picture>
            <div class="fade" data-delay="3">
                <h2 class="project-sub-title">Une Messagerie instantanée</h2>
                <p>
                    Urbateur possède une messagerie instantanée permettant à ses membres d'interagir entre eux.
                    Un utilisateur peut donc envoyé un message, une photo ou une vidéo à un membre de son réseau.
                    Il est aussi possible de créer des groupes de conversations.
                </p>
                <h2 class="project-sub-title">Websocket</h2>
                <p>
                    Le protocole websocket, grâce aux canaux full-duplex qu'il crée par dessus la couche TCP permet
                    d'assurer une communication bidirectionnelle entre le serveur et le client.
                    Il intervient ainsi dans la messagerie pour permettre aux utilisateurs de recevoir les
                    messages instantanément.
                </p>
            </div>
        </section>
        <section class="project-roles">
            <div class="project-role fade">
                <h3 class="project-role-title">Roles</h3>
                <ul class="project-role-list">
                    <li>Développeur Back-end</li>
                    <li>Développeur Front-end</li>
                </ul>
            </div>
            <div class="project-role fade" data-delay="1">
                <h3 class="project-role-title">Technologies</h3>
                <ul class="project-role-list">
                    <li>Lumen</li>
                    <li>Angular 9</li>
                    <li>Socket.io</li>
                </ul>
            </div>
        </section>

        <section class="project-navigations fade" data-delay="1">
            <div class="project-navigation">
                <div class="label">Projet précédent</div>
                <a href="{{route('projects.happy-closet')}}" class="title">Happy Closet</a>
            </div>
            <div class="project-navigation">
                <div class="label">Projet suivant</div>
                <a href="{{route('projects.fink')}}" class="title">Fink.ma</a>
            </div>
        </section>
    </div>
@endsection
