@extends('layouts.base')
@section('title', "Les produits $category->name")
@section('content')
    {{-- Shop Product Start  --}}
    <div class="container-fluid px-5">
        <h1 class="text-center">{{ $category->name }}</h1>
        <div class="row pb-2 pt-4">
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
