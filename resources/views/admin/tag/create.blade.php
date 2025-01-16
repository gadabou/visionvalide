@extends('admin.layouts.base')
@section('title', 'Enregistrer un tag')
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
                                'createRoute' => 'admin.tags.create',
                                'createText' => 'Enregistrer un catégorie',
                                'indexRoute' => 'admin.tags.index',
                                'indexText' => 'Liste des catégories',
                            ])
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.tags.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    @include('shared.input', [
                                        'class' => 'col-md-12',
                                        'name' => 'name',
                                        'required_label' => '*',
                                        'label' => 'Nom',
                                        'help_text' => 'Ex : Confort',
                                    ])

                                </div>
                                @include('shared.btn-save')
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
