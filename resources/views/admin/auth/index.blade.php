@extends('admin.layouts.base')
@section('title', 'Les utilisateurs')
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
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Catégories</li>
                        </ol>
                    </div> --}}
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                {{-- <div>
                                    <a type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addUserModal">Ajouter un utilisateur</a>
                                </div> --}}

                                @permission('user-create')
                                @include('admin.shared.add-list-btn', [
                                    'createRoute' => 'users.create',
                                    'createText' => 'Enregistrer un utilisateur',
                                    'indexRoute' => 'users.index',
                                    'indexText' => 'Liste des utilisateurs',
                                ])
                                @endpermission

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nom</th>
                                            <th>Pseudo</th>
                                            <th>Email</th>
                                            <th>Rôles</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                     @foreach ($user->roles as $role)
                                                        <span class="badge bg-info">
                                                            {{ $role->display_name }}
                                                        </span>
                                                    @endforeach
                                                </td>
                                                <td class="text-center">
                                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                                        @csrf
                                                        @csrf
                                                        @method('DELETE')
                                                        @permission('user-read')
                                                        <a class="btn btn-icon btn-secondary" title="Afficher"
                                                            href="{{ route('users.show', $user) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        @endpermission

                                                        @permission('user-update')
                                                        <a class="btn btn-icon btn-info" title="Éditer"
                                                            href="{{ route('users.edit', $user) }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        @endpermission

                                                        @permission('user-delete')
                                                        <button type="submit" class="btn btn-icon btn-danger delete"
                                                            title="Supprimer">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        @endpermission
                                                    </form>
                                                </td>

                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('scripts')
    {{-- Datatable script--}}
    {{-- <script src="{{asset('admin-assets/custom/datatable_script.js')}}"></script> --}}
@endsection
