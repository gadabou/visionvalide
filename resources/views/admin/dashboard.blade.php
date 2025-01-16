@extends('admin.layouts.base')
@section('title', 'Dashborad')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tableau de bord</h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('admin.sliders.index') }}">
                            <div class="small-box">
                                <div class="card-body" style="text-align: center">
                                    <p><b>Carousels</b></p>
                                    <h3>{{ $slider_count }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('admin.tags.index') }}">
                            <div class="small-box">
                                <div class="card-body" style="text-align: center">
                                    <p><b>Tags</b></p>
                                    <h3>{{ $tag_count }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('admin.categories.index') }}">
                            <div class="small-box">
                                <div class="card-body" style="text-align: center">
                                    <p><b>Catégories</b></p>
                                    <h3>{{ $category_count }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('admin.products.index') }}">
                            <div class="small-box">
                                <div class="card-body" style="text-align: center">
                                    <p><b>Produits</b></p>
                                    <h3>{{ $product_count }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('admin.publicities.index') }}">
                            <div class="small-box">
                                <div class="card-body" style="text-align: center">
                                    <p><b>Publicités</b></p>
                                    <h3>{{ $publicity_count }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('admin.images.index') }}">
                            <div class="small-box">
                                <div class="card-body" style="text-align: center">
                                    <p><b>Images</b></p>
                                    <h3>{{ $image_count }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
