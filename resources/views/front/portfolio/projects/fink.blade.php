@extends('front.portfolio.projects.layout')
@section('title', 'Projet Fink | Portfolio de Ouattara Zié Aboubacar')
@section('seo')
    <meta name="description"
          content="Projet Fink | OUATTARA Zié Aboubacar, Développeur web full stack connu sous le nom de @oza">
    <meta name="keywords"
          content="Développeur web, Développeur web full-stack, Développeur web au Quebec, Développeur web au Canada"/>
@endsection
@section('content')
    <div class="container">
        <div class="project-header">
            <h1 class="project-title fade">Fink.ma</h1>
            <p class="project-desc fade" data-delay="1">Développement back-end et front-end de la plateforme
                fink</p>
        </div>

        <section class="">
            <div class="flex align-center space-between project-columns fade" data-delay="2">
                <div class="project-title no-mb">Développement front-end & back-end</div>
                <div class="flex flex-end align-center mobile-flex-start">
                    <a rel="noopener noreferrer" href="https://fink.ma" target="_blank"
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
                    Fink est un annuaire permettant de retrouver les meilleurs business au maroc. L'objectif de ce
                    projet était de recenser toutes les entreprises au maroc et d'offrir une solution de recherche
                    efficace pour les visiteurs.
                </p>
                <p>
                    Le principal challenge était donc de mettre en place une solution pour le recensement des
                    entreprises tout en gardant en tête les critères de performance lors de la recherche.
                </p>
            </div>
        </section>
        <section class="project-columns ">
            <picture>
                <source srcset="{{asset('assets/images/projects/fink/recherche.webp')}}" type="image/webp">
                <source srcset="{{asset('assets/images/projects/fink/recherche.png')}}" type="image/png">
                <img loading="lazy" data-src="{{asset('assets/images/projects/fink/recherche.webp')}}" width="100%"
                     height="auto"
                     class="project-image mobile-mb-20 fade" data-delay="2" alt="Page de recherche de Fink">
            </picture>

            <div class="fade" data-delay="4">
                <h2 class="project-sub-title ">Recherche</h2>
                <p>L'objectif premier de Fink est permettre aux visiteurs de rechercher une entreprise ou société en
                    fonction de son nom, sa catégorie ou de la ville.</p>
                <h2 class="project-sub-title ">Une recherche pertinente</h2>
                <p>
                    La performance et la pertinence étant des critères très important pour Fink, nous avons opter pour
                    le
                    moteur de recherche <a href="https://www.elastic.co/fr/elasticsearch/" rel="noopener noreferrer">Elasticsearch</a>
                    comme étant notre base de données lors du recensement des
                    entreprises.
                </p>
                <p>
                    Grâce a ce moteur de recherche, les résultat de recherches sont plus pertinent que si nous avions
                    utilisé une base de données classique comme MySql. Aussi, Elasticsearch offre une interface REST qui
                    nous permet de récupérer ou d'enregistrer facilement les informations dont nous avons besoin.
                </p>
                <p>
                    De plus, Elasticsearch fait parti de la suite Elastic parmi lesquelles il y'a des produits comme
                    <a href="https://www.elastic.co/fr/kibana">Kibana</a> qui offre une interface utilisateur permettant
                    de visualiser et explorer les données Elasticsearch.
                </p>
            </div>
        </section>
        <section class="project-columns ">
            <div class="fade" data-delay="2">
                <h2 class="project-sub-title">Profil d'une entreprise</h2>
                <p>
                    Les sociétés et entreprises ainsi recensés par Fink possède une page de profil où leurs informations
                    y sont
                    affichées. Les visiteurs peuvent noter les entreprises en fonction de la qualité de services qu'ils
                    y
                    ont reçu.
                </p>
                <p>
                    Pour ce qui concerne le développement front, la plateforme a été développé en utilisant <a
                        href="https://angular.io/"> Angular 9</a>,
                    un framework Javascript développé par Google. Ce framework qui est dédié à la création des
                    applications web de type SPA (Single Page Application), permet d'offrir une grande interactivité et
                    fluidité
                    pour l'utilisateur.
                </p>
            </div>
            <picture>
                <source srcset="{{asset('assets/images/projects/fink/page-entreprise.webp')}}" type="image/webp">
                <source srcset="{{asset('assets/images/projects/fink/page-entreprise.png')}}" type="image/png">
                <img loading="lazy" data-src="{{asset('assets/images/projects/fink/age-entreprise.webp')}}" width="100%"
                     height="auto"
                     class="project-image mobile-mb-20 fade" data-delay="3" alt="Page d'une entreprise sur Fink">
            </picture>
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
                    <li>ExpressJs</li>
                    <li>Angular 9</li>
                    <li>ElasticSearch</li>
                </ul>
            </div>
        </section>

        <section class="project-navigations fade" data-delay="1">
            <div class="project-navigation">
                <div class="label">Projet précédent</div>
                <a href="{{route('projects.urbateur')}}" class="title">Urbateur</a>
            </div>
            <div class="project-navigation">
                <div class="label">Projet suivant</div>
                <a href="{{route('projects.123bain')}}" class="title">123bain.fr</a>
            </div>
        </section>
    </div>
@endsection
