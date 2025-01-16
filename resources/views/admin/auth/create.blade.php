@extends('admin.layouts.base')
@section('title', 'Enregistrer un utilisateur')
@push('style')
    {{-- Select2 --}}
    <link rel="stylesheet" href="/admin-assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/admin-assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label" for="roles">
                                            Rôles :
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="select2-success">
                                            <select class="form-control select2 @error('roles') is-invalid @enderror"
                                                id="roles" name="roles[]" data-placeholder="Choisir..." multiple>
                                                <option value="">Choisir...</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" @selected(in_array($role->id, old('roles', [])))>
                                                        {{ $role->display_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                        @error('roles')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    @include('admin.shared.input', [
                                        'class' => 'col',
                                        'name' => 'name',
                                        'required_label' => '*',
                                        'label' => 'Nom',
                                        'placeholder' => 'Ex : Vault',
                                    ])
                                </div>

                                <div class="row">
                                    @include('admin.shared.input', [
                                        'class' => 'col',
                                        'name' => 'username',
                                        'required_label' => '*',
                                        'label' => 'Pseudo',
                                        'placeholder' => 'Ex : user123',
                                    ])

                                    @include('admin.shared.input', [
                                        'type' => 'email',
                                        'class' => 'col',
                                        'name' => 'email',
                                        'required_label' => '*',
                                        'label' => 'Email',
                                        'placeholder' => 'Ex : example@example.co',
                                    ])
                                </div>

                                <div class="row">
                                    @include('admin.shared.input', [
                                        'type' => 'password',
                                        'class' => 'col',
                                        'name' => 'password',
                                        'required_label' => '*',
                                        'label' => 'Mot de passe',
                                    ])

                                    @include('admin.shared.input', [
                                        'type' => 'password',
                                        'class' => 'col',
                                        'name' => 'password_confirmation',
                                        'required_label' => '*',
                                        'label' => 'Confirmer',
                                    ])

                                </div>
                                @include('admin.shared.btn-save')
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    {{-- Select2 --}}
    <script src="/admin-assets/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        });
    </script>

@endsection
