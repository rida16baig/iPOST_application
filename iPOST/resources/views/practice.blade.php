{{-- @verbatim
    This is some text with {{ $variables }} and {{ Blade::directives() }} that Blade won't process.
@endverbatim
@php
    echo '<br>';
@endphp
@php $c=5; @endphp
@for ($i = 0; $i <= 10; $i++)
    {{ $c }} x {{ $i }} = {{ $i * $c }}
    @php
        echo '<br>';
    @endphp
@endfor

@php
    $array = ['rida', 'jabeen', 'sara', 'ahmed', 'ali'];
@endphp

@foreach ($array as $key => $values)
    @if ($loop->first)
        <p style="color:red">{{ $loop->iteration }}- {{ $values }}</p>
    @elseif ($loop->last)
        <p style="color:green">{{ $loop->iteration }}- {{ $values }}</p>
    @else
        <p>{{ $loop->iteration }}- {{ $values }}</p>
    @endif
@endforeach


@php
    $name = 'Rida Fatima';
@endphp
<script>
    //    let name = {{ Js::from($name) }}
    let name = @json($name);
    console.log(name);
</script> --}}
