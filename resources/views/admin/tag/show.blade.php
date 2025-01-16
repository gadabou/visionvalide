@extends('admin.layouts.base')
@section('title', 'Détail d\'une vente')
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
                            @permission('category-read')
                            @include('admin.shared.add-list-btn', [
                                'createRoute' => 'sales.create',
                                'createText' => 'Enregistrer une vente',
                                'indexRoute' => 'sales.index',
                                'indexText' => 'Liste des ventes',
                            ])
                            @endpermission
                        </div>
                        <div class="card-body text-center">
                            <div class="form-group">
                                <div style="display: inline; font-size: 17px">Nom:</div><br>
                                <p style="display: inline; color:#a6b4cd; font-size: 17px">{!! $sale->name !!}</p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
