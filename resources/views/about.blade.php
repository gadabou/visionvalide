@extends('partials.base')
@section('title', 'A propos')



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
                <h1 class="display-3 text-white animated zoomIn">A Propos </h1>
                <a href="" class="h4 text-white">Accueil</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">A Propos</a>
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
                        <h5 class="position-relative d-inline-block text-uppercase">Qui sommes-nous ?</h5>
                        <h1 class="display-5 mb-0">CLINIQUE VISION VALIDE</h1>
                    </div>
                    <!-- Sous-titre et description -->
                    <h4 class="text-body fst-italic mb-4">
                        L’objectif de la clinique vision valide, est de proposer aux usagers de la région des savanes et au-delà, un service libéral, hautement qualitatif, permettant de répondre à la totalité des besoins en ophtalmologie. Une attention toute particulière est portée au degré d’équipements techniques ainsi qu’à la complémentarité et la synergie des professionnels. Le service ophtalmologique de la clinique vision valide propose à ses patients une offre personnalisée de soins humains, de qualité et innovants.
                    </h4>
                    <p class="mb-4">
                        La présence de ressource importante en personnel permet à chaque patient de bénéficier d’un bilan ophtalmologique complet, approfondi avec avis hyper-spécialisé, au cours d’une seule et même visite.
                    </p>
                    <!-- Liste des avantages -->
                    <div class="row g-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.3s">
                            <h5 class="mb-3"><i class="fa fa-check-circle me-3"></i>Bénéficier d’un contrôle de la vision</h5>
                            <h5 class="mb-3"><i class="fa fa-check-circle me-3"></i>Renouveler lunettes ou lentilles de contact</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s">
                            <h5 class="mb-3"><i class="fa fa-check-circle me-3"></i>Ouvert 24 Heure/24 7 Jours/ 7</h5>
                            <h5 class="mb-3"><i class="fa fa-check-circle me-3"></i>Effectuer un bilan visuel d’aptitude professionnelle.</h5>
                        </div>
                    </div>
                    <!-- Bouton -->
                    <a href="Prendre un rendez vous.html" class="btn btn-primary py-3 px-5 mt-4 wow zoomIn" data-wow-delay="0.6s">Prendre un rendez vous</a>
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
