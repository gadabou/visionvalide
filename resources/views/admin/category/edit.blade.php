@extends('admin.layouts.base')
@section('title', 'Modifier la catégorie')
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
                                'createRoute' => 'admin.categories.create',
                                'createText' => 'Enregistrer un catégorie',
                                'indexRoute' => 'admin.categories.index',
                                'indexText' => 'Liste des catégories',
                            ])
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.categories.update', $category) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="d-flex justify-items-center align-items-center">
                                    <div class="col-md-2">
                                        <img src="{{ asset('storage/' . $category->image_path) }}"
                                            style="width: 150px; height: 150px; object-fit: cover;" alt="Image du produit">
                                    </div>
                                    <div class="col-md-10">
                                        @include('shared.input', [
                                            'class' => 'col',
                                            'name' => 'name',
                                            'required_label' => '*',
                                            'label' => 'Nom',
                                            'help_text' => 'Ex : R5S',
                                            'value' => $category->name,
                                        ])

                                        @include('shared.input', [
                                            'type' => 'file',
                                            'class' => 'col',
                                            'name' => 'image_path',
                                            'required_label' => '',
                                            'label' => 'Charger nouvelle image',
                                            'accept' => '.jpg,.jpeg,.png',
                                        ])
                                    </div>
                                </div>
                                @include('shared.btn-save', [
                                    'btnText' => 'Modifier',
                                    'faIconClass' => 'fa fa-edit',
                                    'class' => 'btn btn-info col-md-5',
                                ])
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
