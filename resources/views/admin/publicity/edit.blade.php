@extends('admin.layouts.base')
@section('title', 'Enregistrer une image slider')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('title')</h1>
                    </div>
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">General Form</li>
                        </ol>
                    </div> --}}
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="">
                    <div class="card">
                        <div class="card-header">
                            @include('shared.add-list-btn', [
                                'createRoute' => 'admin.publicities.create',
                                'createText' => 'Enregistrer un catégorie',
                                'indexRoute' => 'admin.publicities.index',
                                'indexText' => "Liste d'images",
                            ])
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.publicities.update', $publicity) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    @include('shared.input', [
                                        'class' => 'col',
                                        'name' => 'title',
                                        'required_label' => '*',
                                        'label' => 'Titre',
                                        'help_text' => 'Ex : Méga promo',
                                        'value' => $publicity->title,
                                    ])

                                    @include('shared.input', [
                                        'type' => 'url',
                                        'class' => 'col',
                                        'name' => 'url',
                                        'required_label' => '*',
                                        'label' => 'Lien de la video',
                                        'value' => $publicity->url,
                                    ])

                                </div>
                                @include('shared.btn-save', [
                                    'btnText' => 'Modifier',
                                    'faIconClass' => 'fa fa-edit',
                                    'class' => 'btn btn-info col-md-3',
                                ])
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
