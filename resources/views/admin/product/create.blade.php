@extends('admin.layouts.base')
@section('title', 'Enregistrer un produit')
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
                            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="category_id">
                                                Catégorie :
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select
                                                class="form-control select2bs4 @error('category_id') is-invalid @enderror"
                                                id="category_id" name="category_id" data-placeholder="Choisir..."
                                                style="width: 100%;">
                                                <option value="" hidden>Choisir...</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                    ])

                                    @include('shared.input', [
                                        'type' => 'number',
                                        'class' => 'col-md-6',
                                        'name' => 'sale_price',
                                        'required_label' => '*',
                                        'label' => 'Prix de vente',
                                        'placeholder' => 'Ex : 135 000',
                                    ])

                                    @include('shared.input', [
                                        'type' => 'number',
                                        'class' => 'col-md-6',
                                        'name' => 'marketing_price',
                                        'required_label' => '',
                                        'label' => 'Prix de marketing',
                                        'placeholder' => 'Ex : 145 000',
                                    ])

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
                                                    <option value="{{ $tag->id }}" @selected(in_array($tag->id, old('tags', [])))>
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

                                <div class="row">
                                    @include('shared.input', [
                                        'type' => 'textarea',
                                        'class' => 'col-md-6',
                                        'name' => 'short_description',
                                        'required_label' => '*',
                                        'label' => 'Description courte',
                                        'placeholder' => 'Ex : ',
                                    ])

                                    @include('shared.input', [
                                        'type' => 'textarea',
                                        'class' => 'col-md-6',
                                        'name' => 'long_description',
                                        'required_label' => '*',
                                        'label' => 'Description longue',
                                        'placeholder' => 'Ex : ',
                                    ])
                                </div>

                                <table class="table table-bordered mt-2 table-add-more">
                                    <thead>
                                        <tr>
                                            <th>Les images du produit</th>
                                            <th>
                                                <button class="btn btn-primary btn-sm btn-add-more"><i
                                                        class="fa fa-plus"></i>Ajouter</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $key = 0;
                                        @endphp
                                        @if (request()->old('images'))
                                            @foreach (request()->old('images') as $key => $image)
                                                <tr>
                                                    <td>
                                                        <input type="file" name="images[{{ $key }}][path]"
                                                            class="form-control" placeholder="" value="" />
                                                        @error("images.{$key}.path")
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </td>

                                                    <td>
                                                        <button class="btn btn-danger btn-sm btn-add-more-rm"><i
                                                                class="fa fa-trash"></i>
                                                        </button>
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

                                @include('shared.btn-save')
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
                if (i < 4) {
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
