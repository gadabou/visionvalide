@extends('admin.layouts.base')
@section('title', 'Les catégories')
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
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @include('shared.input', [
                                'class' => 'col',
                                'name' => 'title',
                                'required_label' => '*',
                                'label' => 'Titre',
                                'help_text' => 'Ex : Chaise VIP',
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

                        @include('shared.input', [
                            'type' => 'textarea',
                            'class' => 'col',
                            'name' => 'caption',
                            'required_label' => '*',
                            'label' => 'Légende',
                            'help_text' => 'Ex : Chaise VIP',
                        ])

                        @include('shared.btn-save')
                    </form>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    <b>{{ Session::get('error') }}</b>
                                </div>
                            @endif
                            {{-- <div class="card-header">
                                @include('shared.add-list-btn', [
                                    'createRoute' => 'admin.categories.create',
                                    'createText' => 'Enregistrer une catégorie',
                                    'indexRoute' => 'admin.categories.index',
                                    'indexText' => 'Liste des catégories',
                                ])
                            </div> --}}

                            <div class="card-body">
                                <table id="example1" class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Image</th>
                                            <th>Titre</th>
                                            <th class="text-center">Légende</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sliders as $slider)
                                            <tr>
                                                <td class="align-middle">{{ $loop->iteration }}</td>
                                                <td class="align-middle">
                                                    <img src="{{ asset('storage/' . $slider->image_path) }}"
                                                        alt="Image du produit"
                                                        style="object-fit: cover; width: 50px; height: 50px;">
                                                </td>
                                                <td class="align-middle">{{ $slider->title }}</td>
                                                <td class="align-middle text-justify" style="max-width: 20rem;">{!! $slider->caption !!}</td>
                                                <td class="align-middle text-center">
                                                    <form action="{{ route('admin.sliders.destroy', $slider) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <a class="btn btn-icon btn-info" title="Éditer"
                                                            href="{{ route('admin.sliders.edit', $slider) }}">
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
