@extends('admin.layouts.base')
@section('title', 'Les produits')
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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Catégories</li>
                        </ol>
                    </div> --}}
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @include('shared.add-list-btn', [
                                    'createRoute' => 'admin.products.create',
                                    'createText' => 'Enregistrer un produit',
                                    'indexRoute' => 'admin.products.index',
                                    'indexText' => 'Liste des produits',
                                ])
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Produit</th>
                                            <th class="text-center">Prix vente</th>
                                            <th class="text-center">Prix barré</th>
                                            <th>Catégorie</th>
                                            <th class="text-center">Desc. courte</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $product)
                                            <tr>
                                                <td class="align-middle">{{ $loop->iteration }}</td>
                                                <td class="align-middle">
                                                    <img src="{{ asset('storage/' . $product->main_image_path) }}"
                                                        alt="Image du produit"
                                                        style="object-fit: cover; width: 50px; height: 50px;">
                                                    <b>{{ $product->name }}</b>
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ number_format($product->sale_price, 0, ' ', ' ') }}</td>
                                                <td class="align-middle text-center">
                                                    {{ number_format($product->marketing_price, 0, ' ', ' ') }}</td>
                                                <td class="align-middle">{{ $product->category->name }}</td>
                                                <td class="align-middle text-justify" style="max-width: 20rem;">
                                                    {!! Str::words($product->short_description, 25, '...') !!}
                                                    @if (str_word_count($product->short_description) > 25)
                                                        <a href="{{ route('admin.products.show', $product) }}">Voir plus</a>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-right">
                                                    <form action="{{ route('admin.products.destroy', $product) }}"
                                                        class="d-flex gap-5 justify-items-center align-items-center"
                                                        method="POST">
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
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    {{-- Delete confirmation script --}}
    <script src="{{ asset('admin-assets/custom/swalert2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/custom/delete-confirm.js') }}"></script>

    {{-- Datatable script --}}
    {{-- <script src="{{asset('admin-assets/custom/datatable_script.js')}}"></script> --}}
@endsection
