@extends('layouts.base')
@section('title', 'Accueil')

<style>
    .ribbon {
        width: 96px;
        font-size: 14px;
        padding: 4px;
        /* margin: 0px; */
        position: absolute;
        right: -12px;
        top: 28px;
        text-align: center;
        border-radius: 25px;
        transform: rotate(50deg);
        background-color: #ff9800;
        color: white;
        font-weight: bold;
    }
</style>

@section('content')
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($sliders as $key => $slider)
                            <li data-target="#header-carousel" data-slide-to="{{ $key }}"
                                class="{{ $loop->first ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @if ($sliders->isEmpty())
                            <div class="carousel-item position-relative active" style="height: 500px;">
                                <img class="position-absolute w-100 h-100" src="{{ asset('front-assets/chaise.jpg') }}"
                                    style="object-fit: cover;">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">ABW
                                            MARKET
                                        </h1>
                                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn">ABW Market votre
                                            partenaire de qualité</p>
                                        <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp rounded"
                                            href="{{ route('shop') }}">
                                            <b><i>Voir nos produits</i></b>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @foreach ($sliders as $slider)
                            <div class="carousel-item position-relative {{ $loop->first ? 'active' : '' }}"
                                style="height: 500px;">
                                <img class="position-absolute w-100 h-100"
                                    src="{{ asset('storage/' . $slider->image_path) }}" style="object-fit: cover;"
                                    alt="Imag">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                            {{ $slider->title }}
                                        </h1>
                                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn">
                                            {!! $slider->caption !!}
                                        </p>
                                        <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp rounded"
                                            href="{{ route('shop') }}">
                                            <b><i>Voir nos produits</i></b>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 235px;">
                    <img class="img-fluid"
                        src="{{ $sliders->count() > 2 ? asset('storage/' . $sliders[rand(0, 2)]->image_path) : asset('front-assets/img/product-9.jpg') }}"
                        alt="Image">
                    <div class="offer-text">
                        <h3 class="text-white mb-3">Confort & Qualité</h3>
                        <a href="{{ route('shop') }}" class="btn btn-primary rounded">Commandez maintenant</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 235px;">
                    <img class="img-fluid"
                        src="{{ $sliders->count() > 4 ? asset('storage/' . $sliders[rand(2, 4)]->image_path) : asset('front-assets/img/for_you.jpeg') }}"
                        alt="Image">
                    <div class="offer-text">
                        <h3 class="text-white mb-3">Confort & Durabilité</h3>
                        <a href="{{ route('shop') }}" class="btn btn-primary rounded">Commandez maintenant</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- About Start  --}}
    <div class="container-fluid py-3 about wow fadeInUp" data-wow-delay="1s">
        <div class="container py-5">
            <div class="row g-3">
                <div class="col-lg-7">
                    <div class="position-relative pb-3 mb-3">
                        <h1 class="mb-0 text-uppercase">Bienvenue chez ABW MARKET !</h1>
                    </div>
                    <h6>Votre Expert en mobilier de Bureau</h6>
                    <p class="text-justify mb-1">
                        Chez ABW Market, nous savons que l'environnement de travail joue un rôle crucial dans la
                        productivité et le bien-être de vos équipes. C'est pourquoi nous nous engageons à offrir une vaste
                        gamme de mobilier de bureau de haute qualité, alliant confort, fonctionnalité et style.
                    </p>
                    <h5 class="text-center text-primary mb-4"><i>Découvrez Notre Gamme de Produits</i></h5>
                    <h6>Chaises de Bureau</h6>
                    <p class="text-justify">
                        Confort et ergonomie sont au cœur de notre sélection de chaises de bureau. Que vous cherchiez une
                        chaise de direction élégante ou une chaise ergonomique pour de longues heures de travail, vous
                        trouverez le modèle parfait pour améliorer votre posture et votre confort.
                    </p>

                    <h6>Armoires et Bureaux</h6>
                    <p class="text-justify">
                        Organisez votre espace de travail avec nos bureaux et armoires robustes et stylées. Disponibles dans
                        une
                        variété de tailles et de finitions, elles sont conçues pour maximiser votre espace de rangement tout
                        en ajoutant une touche professionnelle à votre bureau.
                    </p>

                </div>
                {{-- Pourquoi Choisir ABW Market ?
Qualité Premium : Nos produits sont sélectionnés avec soin pour leur durabilité et leur design.
Service Client Exemplaire : Notre équipe est à votre disposition pour vous aider à choisir les articles qui répondent le mieux à vos besoins.
Livraison Rapide et Fiable : Nous assurons une livraison efficace pour que vous puissiez profiter de vos nouveaux meubles dans les plus brefs délais.
Contactez-Nous
N’hésitez pas à nous contacter pour toute question ou demande spécifique. Notre équipe est prête à vous assister dans la création d’un espace de travail optimal et agréable.

ABW Market – L’excellence du mobilier de bureau à portée de main ! --}}
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
                            src="{{ asset('front-assets/img/abwmarket/about.jpg') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- About End --}}

    {{-- Featured Start --}}
    <div class="container-fluid pt-3">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Produits de qualité</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Livraison</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Garantie</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Disponible</h5>
                </div>
            </div>
        </div>
    </div>
    {{-- Featured End  --}}

    {{-- Categories Start  --}}
    <div class="container-fluid pt-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">Categories</span>
        </h2>
        <div class="row px-xl-5 pb-3">
            @foreach ($categories as $category)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <a class="text-decoration-none" href="">
                        <div class="cat-item img-zoom d-flex align-items-center mb-4">
                            <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                <img class="img-fluid" src="{{ asset('storage/' . $category->image_path) }}"
                                    style="object-fit: cover; width: 150px; height: 100px;" alt="Image">
                            </div>
                            <div class="flex-fill pl-3">
                                <h6>{{ $category->name }}</h6>
                                <small class="text-body"></small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    {{-- Categories End  --}}

    {{-- Products Start  --}}
    <div class="container-fluid pt-3 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">Produits recents</span>
        </h2>
        <div class="row px-xl-5">
            @foreach ($products as $product)
                @if ($loop->iteration <= 4)
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4 pb-2 rounded">
                            <div class="product-img position-relative overflow-hidden">
                                <span class="ribbon">Nouvauté</span>
                                <img class="img-fluid w-100 rounded"
                                    src="{{ asset('storage/' . $product->main_image_path) }}"
                                    style="object-fit: cover; width: 500px; height: 320px;" alt="Image du produit">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark rounded"
                                        href="{{ route('product.detail', $product) }}"><i class="fa fa-eye"></i>
                                        Détails
                                    </a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate"
                                    href="{{ route('product.detail', $product) }}">{{ $product->name }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{ number_format($product->sale_price, 0, ' ', ' ') }} FCFA</h5>
                                    <h6 class="text-muted ml-2">
                                        <del>{{ $product->marketing_price ? number_format($product->marketing_price, 0, ' ', ' ') . ' FCFA' : '' }}
                                        </del>
                                    </h6>
                                </div>
                                <div>
                                    @foreach ($product->tags as $tag)
                                        <span class="badge bg-primary rounded text-white">
                                            #{{ $tag->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="container-fluid pt-3 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">Produits phares</span>
        </h2>
        <div class="row px-xl-5">
            @foreach ($products->reverse() as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4 pb-2 rounded">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100 rounded"
                                src="{{ asset('storage/' . $product->main_image_path) }}"
                                style="object-fit: cover; width: 500px; height: 320px;" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark rounded" href="{{ route('product.detail', $product) }}"><i
                                        class="fa fa-eye"></i>
                                    Détails
                                </a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate"
                                href="{{ route('product.detail', $product) }}">
                                {{ $product->name }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{ number_format($product->sale_price, 0, ' ', ' ') }} FCFA</h5>
                                <h6 class="text-muted ml-2">
                                    <del>{{ $product->marketing_price ? number_format($product->marketing_price, 0, ' ', ' ') . ' FCFA' : '' }}
                                    </del>
                                </h6>
                            </div>
                            <div>
                                @foreach ($product->tags as $tag)
                                    <span class="badge bg-primary rounded text-white">
                                        #{{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center text-white">
            <a class="btn btn-outline-dark rounded text-uppercase" href="{{ route('shop') }}">
                <b>Voir nos produits</b>
            </a>
        </div>
    </div>
    {{-- Products End  --}}


    {{-- Offer Start  --}}
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid"
                        src="{{ $sliders->count() > 2 ? asset('storage/' . $sliders[rand(0, 2)]->image_path) : asset('front-assets/img/product-9.jpg') }}"
                        alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Economisez 20%</h6>
                        <h3 class="text-white mb-3">Offre spéciale</h3>
                        <a href="{{ route('shop') }}" class="btn btn-secondary rounded">Nos produits</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="{{ asset('front-assets/img/for_you.jpeg') }}" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Economisez 20%</h6>
                        <h3 class="text-white mb-3">Offre spéciale</h3>
                        <a href="{{ route('shop') }}" class="btn btn-secondary rounded">Nos produits</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Offer End  --}}

@endsection
