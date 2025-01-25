@php
    $createRoute ??= '';
    $createText ??= 'Ajouter';
    $indexRoute ??= '';
    $indexText ??= 'Liste';
@endphp

<div class="">
    @if ($indexRoute && Route::is($indexRoute))
        <a class="btn btn-outline-primary float-right" href="{{ route($createRoute) }}">
            <i class="fa fa-plus-square me-1"></i>
            <b>{{ $createText }}</b>
        </a>
    @endif

    @if ($indexRoute && !Route::is($indexRoute))
        <a class="btn btn-outline-primary float-right" href="{{ route($indexRoute) }}">
            <i class="fa fa-list me-1"></i>
            <b>{{ $indexText }}</b>
        </a>
    @endif
</div>
