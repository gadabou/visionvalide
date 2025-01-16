@extends('admin.layouts.base')
@section('title', 'Ensemble des images')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
                <div class="card p-4">
                    {{-- <form action="{{ route('admin.ima.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @include('shared.input', [
                                'class' => 'col',
                                'name' => 'name',
                                'required_label' => '*',
                                'label' => 'Nom de catégorie',
                                'help_text' => 'Ex : R5S',
                            ])

                            @include('shared.input', [
                                'type' => 'file',
                                'class' => 'col',
                                'name' => 'image_path',
                                'required_label' => '*',
                                'label' => 'Image',
                                'accept' => '.jpg,.jpeg,.png',
                            ])

                        </div>
                        @include('shared.btn-save', [
                            'btnText' => 'Enregistrer',
                            'faIconClass' => 'fa fa-plus',
                            'class' => 'btn btn-success col-md-3',
                        ])
                    </form> --}}
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    <b>{{ Session::get('error') }}</b>
                                </div>
                            @endif

                            <div class="card-body">
                                <table id="example1" class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Image</th>
                                            <th class="">Produits(prix)</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($images as $image)
                                            <tr>
                                                <td class="align-middle">{{ $loop->iteration }}</td>
                                                <td class="align-middle">
                                                    <img src="{{ asset('storage/'.$image->path) }}" alt="Image" style="object-fit: cover; width: 50px; height: 50px;" >
                                                    {{ $image->name }}
                                                </td>
                                                <td class="align-middle">{{ $image->product->name }} ({{ number_format($image->product->sale_price, 0, '', ' ') }}F)</td>
                                                <td class="align-middle text-center">
                                                    <form action="{{ route('admin.images.destroy', $image) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

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
