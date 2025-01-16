@extends('admin.layouts.base')
@section('title', 'Modifier un produit')
@push('style')
    {{-- Select2 --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

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
                                'createRoute' => 'admin.products.create',
                                'createText' => 'Enregistrer un produit',
                                'indexRoute' => 'admin.products.index',
                                'indexText' => 'Liste des produits',
                            ])
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.products.update', $product) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="category_id">
                                                Catégorie :
                                                <span class="text-danger">*</span>
                                            </label>
                                            {{-- <div class="select2-success"> --}}
                                            <select
                                                class="form-control select2bs4 @error('category_id') is-invalid @enderror"
                                                id="category_id" name="category_id" data-placeholder="Choisir..."
                                                style="width: 100%;">
                                                <option value="" hidden>Choisir...</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            {{-- </div> --}}
                                            <div class="help-block with-errors"></div>
                                            @error('category_id')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    @include('shared.input', [
                                        'class' => 'col-md-6',
                                        'name' => 'name',
                                        'required_label' => '*',
                                        'label' => 'Nom',
                                        'placeholder' => 'Ex : Armoire vitré 3 niveau',
                                        'value' => $product->name,
                                    ])

                                    @include('shared.input', [
                                        'type' => 'number',
                                        'class' => 'col-md-6',
                                        'name' => 'sale_price',
                                        'required_label' => '*',
                                        'label' => 'Prix de vente',
                                        'placeholder' => 'Ex : 135 000',
                                        'value' => $product->sale_price,
                                    ])

                                    @include('shared.input', [
                                        'type' => 'number',
                                        'class' => 'col-md-6',
                                        'name' => 'marketing_price',
                                        'required_label' => '',
                                        'label' => 'Prix de marketing',
                                        'placeholder' => 'Ex : 145 000',
                                        'value' => $product->marketing_price,
                                    ])

                                    @include('shared.input', [
                                        'type' => 'textarea',
                                        'class' => 'col-md-6',
                                        'name' => 'short_description',
                                        'required_label' => '*',
                                        'label' => 'Description courte',
                                        'placeholder' => 'Ex : ',
                                        'value' => $product->short_description,
                                    ])

                                    @include('shared.input', [
                                        'type' => 'textarea',
                                        'class' => 'col-md-6',
                                        'name' => 'long_description',
                                        'required_label' => '*',
                                        'label' => 'Description longue',
                                        'placeholder' => 'Ex : ',
                                        'value' => $product->long_description,
                                    ])
                                </div>

                                <div class="row">
                                    @include('shared.input', [
                                        'type' => 'file',
                                        'class' => 'col-md-6',
                                        'name' => 'main_image_path',
                                        'required_label' => '*',
                                        'label' => 'Image principale',
                                        'accept' => '.jpg,.jpeg,.png',
                                    ])

                                    <div class="form-group col">
                                        <label class="form-label" for="tags">
                                            Tags:
                                            <span class="text-danger"></span>
                                        </label>
                                        <div class="select2-success">
                                            <select class="form-control select2 @error('tags') is-invalid @enderror"
                                                id="tags" name="tags[]" data-placeholder="Choisir..." multiple>
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}" @selected($product->tags->pluck('id')->contains($tag->id))>
                                                        {{ $tag->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                        @error('tags')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <img src="{{ asset('storage/' . $product->main_image_path) }}"
                                        style="width: 150px; height: 150px; object-fit: cover;" alt="Image du produit">
                                </div>

                                <table class="table table-bordered mt-2 table-add-more">
                                    @php
                                        $key = 0;
                                    @endphp
                                    <thead>
                                        <tr>
                                            <th>Images du produts</th>
                                            <th>
                                                <button class="btn btn-primary btn-sm btn-add-more"><i
                                                        class="fa fa-plus"></i>Ajouter</button>
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
                                                    <td>
                                                        <div class="d-flex gap-5">
                                                            <img src="{{ asset('storage/' . $image->path) }}"
                                                                style="width: 150px; height: 150px; object-fit: cover;"
                                                                alt="Image du produit">
                                                            {{-- @dump($image->path) --}}
                                                            <div class="d-flex justify-items-center align-items-center">
                                                                <div class="col-10">
                                                                    <label for="images[{{ $image->id }}][path]">Changer
                                                                        l'image</label>
                                                                    <input type="file"
                                                                        name="images[{{ $image->id }}][path]"
                                                                        class="form-control" placeholder=""
                                                                        accept=".jpg,.jpeg,.png" value="" />
                                                                    @error("images.{$image->id}.path")
                                                                        <span class="text-danger">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
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


@section('scripts')
    <script src="{{ asset('admin-assets/plugins/select2/js/select2.full.min.js') }}"></script>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" /> --}}
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            let i = "{{ $key }}";
            $(".btn-add-more").click(function(e) {
                e.preventDefault();
                if (i <= 4) {
                    i++;
                    $(".table-add-more tbody").append(
                        `<tr>
                        <td>
                            <input type="file" accept=".jpg,.jpeg,.png" name="images[` + i + `][path]" class="form-control"/>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm btn-add-more-rm">
                                <i class="fa fa-trash"></i>
                            </button>
                         </td>
                    </tr>`
                    );
                } else {
                    alert("Vous ne pouvez pas ajouter plus de 5 images à cet instant")
                }
            });
            $(document).on('click', '.btn-add-more-rm', function() {
                $(this).parents("tr").remove();
            });

        });
    </script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2();

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

        });
    </script>
@endsection
