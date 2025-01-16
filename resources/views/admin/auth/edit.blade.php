@extends('admin.layouts.base')
@section('title', 'Modifier un utiliateur')
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
                            @permission('user-read')
                                @include('admin.shared.add-list-btn', [
                                    'createRoute' => 'users.create',
                                    'createText' => 'Enregistrer un utilisateur',
                                    'indexRoute' => 'users.index',
                                    'indexText' => 'Liste des utilisateurs',
                                ])
                            @endpermission
                        </div>

                        <div class="card-body">

                            <form action="{{ route('users.update', $user) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="roles">
                                            Rôle :
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="select2-success">
                                            <select class="form-control select2 @error('roles') is-invalid @enderror"
                                                id="roles" name="role" data-placeholder="Choisir...">
                                                <option value="" hidden>Choisir...</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role }}" @selected(old('role', $user->role) == $role)>
                                                        {{ $role }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                        @error('roles')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    @include('admin.shared.input', [
                                        'class' => 'col-md-6',
                                        'name' => 'name',
                                        'required_label' => '*',
                                        'label' => 'Nom',
                                        'placeholder' => 'Ex : Vault',
                                        'value' => $user->name,
                                    ])

                                    @include('admin.shared.input', [
                                        'class' => 'col-md-6',
                                        'name' => 'username',
                                        'required_label' => '*',
                                        'label' => 'Pseudo',
                                        'placeholder' => 'Ex : user123',
                                        'value' => $user->username,
                                    ])

                                    @include('admin.shared.input', [
                                        'type' => 'email',
                                        'class' => 'col-md-6',
                                        'name' => 'email',
                                        'required_label' => '*',
                                        'label' => 'Email',
                                        'placeholder' => 'Ex : example@example.co',
                                        'value' => $user->email,
                                    ])

                                    @include('admin.shared.input', [
                                        'type' => 'password',
                                        'class' => 'col-md-6',
                                        'name' => 'password',
                                        'required_label' => '*',
                                        'label' => 'Mot de passe',
                                    ])

                                    @include('admin.shared.input', [
                                        'type' => 'password',
                                        'class' => 'col-md-6',
                                        'name' => 'password_confirmation',
                                        'required_label' => '*',
                                        'label' => 'Mot de passe',
                                    ])

                                </div>
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
