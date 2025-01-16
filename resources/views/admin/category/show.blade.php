@extends('admin.layouts.base')
@section('title', "Détail d'une catégorie ")
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Categorie : <span class="text-uppercase text-bold" style="text-decoration: underline;">{{ $category->name }}</span></h1>
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
                                'createText' => 'Enregistrer une catégorie',
                                'indexRoute' => 'admin.categories.index',
                                'indexText' => 'Liste des catégories',
                            ])
                        </div>
                        <div class="card-body">
                            {{-- <div class="">
                                <h2>Catégorie : <span class="text-bold underline"></span></h2><br>
                            </div> --}}
                            <table id="example1" class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Produit</th>
                                        <th class="text-center">Prix vente</th>
                                        <th class="text-center">Prix barré</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($category->products as $product)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">
                                                <img src="{{ asset('storage/' . $product->main_image_path) }}"
                                                    alt="Image du produit"
                                                    style="object-fit: cover; width: 50px; height: 50px;">
                                                <b class="ml-1">{{ $product->name }}</b>
                                            </td>
                                            <td class="align-middle text-center">{{ $product->sale_price }}</td>
                                            <td class="align-middle text-center">{{ $product->marketing_price }}</td>
                                            <td class="align-middle text-right">
                                                <form action="{{ route('admin.products.destroy', $product) }}"
                                                    class="" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-icon btn-secondary" title="Afficher les détails"
                                                        href="{{ route('admin.products.show', $product) }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <a class="btn btn-icon btn-info" title="Éditer"
                                                        href="{{ route('admin.products.edit', $product) }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-icon btn-danger delete"
                                                        title="Supprimer">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
