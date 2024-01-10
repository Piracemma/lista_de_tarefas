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
    
    @if ($put)
        @method('PUT')
    @endif
    
    @if ($delete)
        @method('DELETE')
    @endif

    {{ $slot }}

</form>