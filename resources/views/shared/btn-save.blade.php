@php
    $btnText ??= 'Enregistrer';
    $faIconClass ??= 'fa fa-save';
    $class ??= 'btn btn-success col-md-5'
@endphp
<div class="text-center mb-3">
    <button @class([$class])>
        <span @class([$faIconClass])></span>
        <strong>{{ $btnText }}</strong>
    </button>
</div>
