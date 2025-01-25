@extends('layouts.base')
@section('title', 'Evènements')



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


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8">
                    <div class="row g-5">
                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="{{asset('front-assets/img/forum.jpg')}}" alt="">
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-user me-2"></i>GADO Abou</small>
                                        <small><i class="far fa-calendar-alt me-2"></i>01 Juillet, 2024</small>
                                    </div>
                                    <h4 class="mb-3">Assemblée générale du Club des DSI Niger</h4>
                                    <p>L’association « Club DSI-NIGER » est une association qui regroupe les Directeurs des Systèmes d’Information et Responsables Informatiques des entreprises...</p>
                                    <a class="text-uppercase" href="">Lire <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="{{asset('front-assets/img/forum2.jpg')}}" alt="">
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-user me-2"></i>GADO Abou</small>
                                        <small><i class="far fa-calendar-alt me-2"></i>14 Mars, 2024</small>
                                    </div>
                                    <h4 class="mb-3">Séance de formation au bon usage des outils de l’intelligence artificielle (IA)</h4>
                                    <p>Dans les mesures d’application des orientations stratégiques pour l’intégration de l’intelligence artificielle (IA)...</p>
                                    <a class="text-uppercase" href="">Lire <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="{{asset('front-assets/img/about2.jpg')}}" alt="">
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-user me-2"></i>GADO Abou</small>
                                        <small><i class="far fa-calendar-alt me-2"></i>11 Janvier, 2024</small>
                                    </div>
                                    <h4 class="mb-3">Lancement Officiel du Club des DSI Niger</h4>
                                    <p>Il est créé au NIGER, une Association dénommée « Club des Directeurs des Systèmes d’Information du Niger», en abrégé « Club DSI NIGER »...</p>
                                    <a class="text-uppercase" href="">Lire <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="{{asset('front-assets/img/forum.jpg')}}" alt="">
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-user me-2"></i>GADO Abou</small>
                                        <small><i class="far fa-calendar-alt me-2"></i>01 Juillet, 2024</small>
                                    </div>
                                    <h4 class="mb-3">Assemblée générale du Club des DSI Niger</h4>
                                    <p>L’association « Club DSI-NIGER » est une association qui regroupe les Directeurs des Systèmes d’Information et Responsables Informatiques des entreprises...</p>
                                    <a class="text-uppercase" href="">Lire <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="{{asset('front-assets/img/forum2.jpg')}}" alt="">
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-user me-2"></i>GADO Abou</small>
                                        <small><i class="far fa-calendar-alt me-2"></i>14 Mars, 2024</small>
                                    </div>
                                    <h4 class="mb-3">Séance de formation au bon usage des outils de l’intelligence artificielle (IA)</h4>
                                    <p>Dans les mesures d’application des orientations stratégiques pour l’intégration de l’intelligence artificielle (IA)...</p>
                                    <a class="text-uppercase" href="">Lire <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="{{asset('front-assets/img/about2.jpg')}}" alt="">
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-user me-2"></i>GADO Abou</small>
                                        <small><i class="far fa-calendar-alt me-2"></i>11 Janvier, 2024</small>
                                    </div>
                                    <h4 class="mb-3">Lancement Officiel du Club des DSI Niger</h4>
                                    <p>Il est créé au NIGER, une Association dénommée « Club des Directeurs des Systèmes d’Information du Niger», en abrégé « Club DSI NIGER »...</p>
                                    <a class="text-uppercase" href="">Lire <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="{{asset('front-assets/img/forum.jpg')}}" alt="">
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-user me-2"></i>GADO Abou</small>
                                        <small><i class="far fa-calendar-alt me-2"></i>01 Juillet, 2024</small>
                                    </div>
                                    <h4 class="mb-3">Assemblée générale du Club des DSI Niger</h4>
                                    <p>L’association « Club DSI-NIGER » est une association qui regroupe les Directeurs des Systèmes d’Information et Responsables Informatiques des entreprises...</p>
                                    <a class="text-uppercase" href="">Lire <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="{{asset('front-assets/img/forum2.jpg')}}" alt="">
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-user me-2"></i>GADO Abou</small>
                                        <small><i class="far fa-calendar-alt me-2"></i>14 Mars, 2024</small>
                                    </div>
                                    <h4 class="mb-3">Séance de formation au bon usage des outils de l’intelligence artificielle (IA)</h4>
                                    <p>Dans les mesures d’application des orientations stratégiques pour l’intégration de l’intelligence artificielle (IA)...</p>
                                    <a class="text-uppercase" href="">Lire <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="{{asset('front-assets/img/about2.jpg')}}" alt="">
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-user me-2"></i>GADO Abou</small>
                                        <small><i class="far fa-calendar-alt me-2"></i>11 Janvier, 2024</small>
                                    </div>
                                    <h4 class="mb-3">Lancement Officiel du Club des DSI Niger</h4>
                                    <p>Il est créé au NIGER, une Association dénommée « Club des Directeurs des Systèmes d’Information du Niger», en abrégé « Club DSI NIGER »...</p>
                                    <a class="text-uppercase" href="">Lire <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow slideInUp" data-wow-delay="0.1s">
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-lg m-0">
                                    <li class="page-item disabled">
                                        <a class="page-link rounded-0" href="#" aria-label="Previous">
                                            <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link rounded-0" href="#" aria-label="Next">
                                            <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Blog list End -->

                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" placeholder="Keyword">
                            <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                    <!-- Search Form End -->

                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Catégories</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Forum</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Conférances</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Formations</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Assemblée général</a>
                        </div>
                    </div>
                    <!-- Category End -->

                    <!-- Recent Post Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Récents activités</h3>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="{{asset('front-assets/img/about.jpg')}}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Assemblée générale du Club des DSI Niger
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="{{asset('front-assets/img/about.jpg')}}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Séance de formation à l'usage de l'IA
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="{{asset('front-assets/img/about.jpg')}}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Assemblée générale du Club des DSI Niger
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="{{asset('front-assets/img/about.jpg')}}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Séance de formation à l'usage de l'IA
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="{{asset('front-assets/img/about.jpg')}}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Assemblée générale du Club des DSI Niger
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="{{asset('front-assets/img/about.jpg')}}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Séance de formation à l'usage de l'IA
                            </a>
                        </div>
                    </div>
                    <!-- Recent Post End -->

                    <!-- Image Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <img src="{{asset('front-assets/img/photo.jpg')}}" alt="" class="img-fluid rounded">
                    </div>
                    <!-- Image End -->

                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->

@endsection
