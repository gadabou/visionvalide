@extends('admin.layouts.base')
@section('title', 'Les tags')
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
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">Catégories</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <form action="{{ route('admin.tags.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            @include('shared.input', [
                                'class' => 'col-md-12',
                                'name' => 'name',
                                'required_label' => '*',
                                'label' => 'Nom du tag',
                                'help_text' => 'Ex : luxe',
                            ])

                        </div>
                        @include('shared.btn-save', [
                            'btnText' => 'Enregistrer',
                            'faIconClass' => 'fa fa-plus',
                            'class' => 'btn btn-success col-md-3',
                        ])
                    </form>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    <b>{{ Session::get('error')}}</b>
                                </div>
                            @endif
                            {{-- <div class="card-header">
                                    @include('shared.add-list-btn', [
                                        'createRoute' => 'admin.tags.create',
                                        'createText' => 'Enregistrer un tag',
                                        'indexRoute' => 'admin.tags.index',
                                        'indexText' => 'Liste des tags',
                                    ])
                            </div> --}}

                            <div class="card-body">
                                <table id="example1" class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nom</th>
                                            <th class="text-center">Nombre de produit associés</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tags as $tag)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $tag->name }}</td>
                                                <td class="text-center">{{ $tag->products_count }}</td>
                                                <td class="text-center">
                                                    <form action="{{ route('admin.tags.destroy', $tag) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                            <a class="btn btn-icon btn-secondary" title="Afficher les détails"
                                                                href="{{ route('admin.tags.show', $tag) }}">
                                                                <i class="fa fa-eye"></i>
                                                            </a>

                                                            <a class="btn btn-icon btn-info" title="Éditer"
                                                                href="{{ route('admin.tags.edit', $tag) }}">
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
