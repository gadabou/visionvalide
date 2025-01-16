@extends('admin.layouts.base')
@section('title', 'Les publicités')
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
                    <form action="{{ route('admin.publicities.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @include('shared.input', [
                                'class' => 'col',
                                'name' => 'title',
                                'required_label' => '*',
                                'label' => 'Titre',
                                'help_text' => 'Ex : Méga promo',
                            ])

                            @include('shared.input', [
                                'type' => 'url',
                                'class' => 'col',
                                'name' => 'url',
                                'required_label' => '*',
                                'label' => 'Lien de la video',
                            ])

                        </div>
                        @include('shared.btn-save')
                    </form>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Titre</th>
                                            <th class="">Lien</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($publicities as $publicity)
                                            <tr>
                                                <td class="align-middle">{{ $loop->iteration }}</td>
                                                <td class="align-middle">{{ $publicity->title }}</td>
                                                <td class="align-middle text-justify" style="max-width: 20rem;">
                                                    <a href="{{ $publicity->url }}" target="_blank">{{ $publicity->url }}</a>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <form action="{{ route('admin.publicities.destroy', $publicity) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <a class="btn btn-icon btn-info" title="Éditer"
                                                            href="{{ route('admin.publicities.edit', $publicity) }}">
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
