@foreach(['danger','warning','success','info'] as $mes)
    @if(session()->has($mes))
      <div class="flash-message">
      <p class="alert alert-{{ $mes }}">
        {{ session()->get($mes) }}
      </p>
    </div>
    @endif
@endforeach
