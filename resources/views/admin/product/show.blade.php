@extends('admin.layouts.base')
@section('title', 'Détail du produit')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Produit : <span class="text-uppercase text-bold"
                                style="text-decoration: underline;">{{ $product->name }}</span></h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="">
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
                            <div class="row">
                                <div class="col">
                                    <span style="">Code : </span>
                                    <b style="display: inline; color:#a6b4cd; font-size: 17px">
                                        {{ $product->code }}</b>
                                </div>

                                <div class="col">
                                    <span style="">Catégorie : </span>
                                    <b style="display: inline; color:#a6b4cd; font-size: 17px">
                                        {{ $product->category->name }}</b>
                                </div>
                            </div>
                            <table class="table table-bordered mt-2 table-add-more">
                                @php
                                    $key = 0;
                                @endphp
                                <thead>
                                    <tr>
                                        <th class="text-center">Images du produts</th>
                                        <th class="text-center">Changer l'image</th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($product->images->isNotEmpty())
                                        @foreach ($product->images as $inc => $image)
                                            @php
                                                $key++;
                                            @endphp
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <img src="{{ asset('storage/' . $image->path) }}"
                                                        style="width: 150px; height: 150px; object-fit: cover;"
                                                        alt="Image du produit">

                                                </td>

                                                <td class="text-center align-middle">
                                                    <input type="file" name="images[{{ $image->id }}][path]"
                                                        class="form-control" placeholder="" accept=".jpg,.jpeg,.png"
                                                        value="" />
                                                    @error("images.{$image->id}.path")
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </td>

                                                <td>
                                                    {{-- <button class="btn btn-danger btn-sm btn-add-more-rm"><i
                                                            class="fa fa-trash"></i>
                                                    </button> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>
                                                <input type="file" accept=".jpg,.jpeg,.png" name="images[0][path]"
                                                    class="form-control" />
                                            </td>
                                            <td></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
