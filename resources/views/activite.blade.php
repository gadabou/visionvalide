@extends('partials.base')
@section('title', 'Pathologie')



@section('content')


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Pathologie </h1>
                <a href="" class="h4 text-white">Accueil</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Pathologie</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


   <!-- About Start -->
   <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <!-- Section "About Us" -->
                <div class="col-lg-7">
                    <div class="section-title mb-4">
                        <!-- Titre avec trait dynamique -->
                        <h5 class="position-relative d-inline-block text-uppercase">Pathologie</h5>
                        <h1 class="display-5 mb-0">Sécheresse oculaire</h1>
                    </div>
                    <!-- Sous-titre et description -->
                    <h4 class="text-body fst-italic mb-4">
                        Qu’est-ce que la sécheresse oculaire ? <br>
                       <p class="mb-4">
                        Les larmes sont produites en permanence par les glandes lacrymales puis étalées sur toute la surface de l’œil grâce au clignement des paupières. Principalement composées d’eau et de corps gras, elles agissent comme une fine barrière devant la cornée. Elles la protègent des agressions extérieures (poussière, bactéries), l’humidifient, la nourrissent… lui évitant ainsi de s’infecter et/ou de s’altérer.
                        On parle de sécheresse oculaire quand la quantité et/ou la qualité des larmes d’un individu est insuffisante. En pratique, celle-ci provoque un inconfort visuel et peut, dans certains cas, entraîner des irritations de la cornée ainsi que des infections oculaires.
                        Ces dernières années, les cas de sécheresse oculaire ont nettement augmenté, face à la détérioration de nos conditions de vie (pollution, climatisation, etc.). Aujourd’hui, près d’un tiers de la population adulte est concerné.    
                       </p> 
                    </h4>
                    <p class="mb-4">
                        Quels sont les symptômes de la sécheresse oculaire ? <br>Prendre un rendez vous.html
                        La sécheresse oculaire peut se manifester de diverses manières : <br>

                        • Picotements, démangeaisons, sensations de brûlure, de sable ou de corps étranger dans les yeux; <br>
                        • Sensibilité à la lumière, à la fumée de tabac ou au vent ;<br>
                        • Gêne à l’ouverture des yeux le matin, sensation de paupières collées ;<br>
                        • Absence de larmes dans des situations connues pour déclencher leur sécrétion : lors d’émotion, d’épluchage d’oignons... ; <br>
                        • À l’opposé, présence d’un larmoiement au vent, au froid, à la lecture... ;<br>
                        • Impression de voir moins bien ;<br>
                        • Difficultés à porter des lentilles de contact. <br>
                        La sensation d’yeux secs n’est pas forcément synonyme de sécheresse oculaire ! <br>
                        Il arrive en effet que cette sensation soit purement subjective et que la sécrétion de larmes soit normale. Cela arrive, par exemple, lorsque vos yeux sont surmenés ou exposés à des produits irritants. Si cette impression perdure, consultez un ophtalmologiste.
                    </p>
                    <!-- Liste des avantages -->
                    <!-- Bouton -->
                    <a href="{{route('appointment')}}" class="btn btn-primary py-3 px-5 mt-4 wow zoomIn" data-wow-delay="0.6s">Prendre un rendez vous</a>
                </div>
                <!-- Image de présentation -->
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
                            src="{{ asset('assets/img/about.jpg') }}" alt="About Us" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <br><br><br><br><br>
@endsection
