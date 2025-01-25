@extends('partials.base')
@section('title', 'Notre Boutique')



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
                <h1 class="display-3 text-white animated zoomIn">Notre Boutique</h1>
                <a href="" class="h4 text-white">Accueil</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Boutique</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    {{-- Shop Product Start  --}}
    <div class="container-fluid px-5">
        <h1 class="text-center">Nos produits</h1>
        <div class="row pb-2 pt-4">
            {{-- <div class="col-12 pb-1">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                        <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                    </div>
                    <div class="ml-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                    data-toggle="dropdown">Sorting
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Latest</a>
                                <a class="dropdown-item" href="#">Popularity</a>
                                <a class="dropdown-item" href="#">Best Rating</a>
                            </div>
                        </div>
                        <div class="btn-group ml-2">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                    data-toggle="dropdown">Showing
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">10</a>
                                <a class="dropdown-item" href="#">20</a>
                                <a class="dropdown-item" href="#">30</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-12 p-2">
                    <div class="product-item bg-light mb-4 rounded shadow">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100 rounded" src="{{ asset('storage/' . $product->main_image_path) }}"
                                 style="object-fit: cover; width: 500px; height: 320px;" alt="Image du produit">
                            <div class="product-action">
                                <a class="btn btn-outline-dark rounded" href="{{ route('product.detail', $product) }}"><i
                                        class="fa fa-eye"></i>
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
            @endforeach
        </div>
        <hr>
        <div class="d-flex justify-content-center">
            <p class="">{{ $products->links('pagination::bootstrap-4') }}</p>
        </div>
    </div>
    {{-- Shop Product End   --}}


@endsection
