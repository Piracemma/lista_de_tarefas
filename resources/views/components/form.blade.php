@props([
    'post' => null,
    'patch' => null,
    'put' => null,
    'delete' => null,
    'action'
])
<form action="{{ $action }}" method="post" {{ $attributes }}>
    
    @csrf
    
    @if ($patch)
        @method('PATCH')
    @endif
    
    @if ($patch)
        @method('PUT')
    @endif
    
    @if ($patch)
        @method('DELETE')
    @endif

    {{ $slot }}

</form>