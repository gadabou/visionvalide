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
                                'createRoute' => 'admin.sliders.create',
                                'createText' => 'Enregistrer un catégorie',
                                'indexRoute' => 'admin.sliders.index',
                                'indexText' => "Liste d'images",
                            ])
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.sliders.update',  $slider) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="d-flex justify-items-center align-items-center">
                                    <div class="col-md-2">
                                        <img src="{{ asset('storage/' . $slider->image_path) }}"
                                            style="width: 150px; height: 150px; object-fit: cover;" alt="Image du produit">
                                    </div>
                                    <div class="col-md-10">
                                        @include('shared.input', [
                                            'class' => 'col',
                                            'name' => 'title',
                                            'required_label' => '*',
                                            'label' => 'Titre',
                                            'help_text' => 'Ex : Chaise VIP',
                                            'value' => $slider->title,
                                        ])

                                        @include('shared.input', [
                                            'type' => 'file',
                                            'class' => 'col',
                                            'name' => 'image_path',
                                            'required_label' => '',
                                            'label' => 'Image',
                                            'accept' => '.jpg,.jpeg,.png',
                                        ])
                                    </div>
                                </div>

                                @include('shared.input', [
                                    'type' => 'textarea',
                                    'class' => 'col',
                                    'name' => 'caption',
                                    'required_label' => '*',
                                    'label' => 'Légende',
                                    'help_text' => 'Ex : Chaise VIP',
                                    'value' => $slider->caption,
                                ])

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
