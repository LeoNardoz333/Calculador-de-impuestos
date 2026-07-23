@php

    $alerts = ['success', 'danger', 'warning', 'info'];

@endphp

@foreach ($alerts as $alert)
    @if (session($alert))
        <div class="alert alert-{{ $alert }} text-center auto-dismiss" role="alert"
            id="alert{{ ucfirst($alert) }}">
            {{ session($alert) }}
        </div>
    @endif
@endforeach
