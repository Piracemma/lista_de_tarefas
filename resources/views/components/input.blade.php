@props([
    'name',
    'label' => null,
    'type' => 'text',
    'placeholder' => null,
])
<div class="mb-5">

    @if ($label)
        <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    @endif
    
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="{{ $placeholder }}" value="{{ old($name) }}">

    @error($name)
        <span class=" text-red-500 mt-1">{{ $message }}</span>
    @enderror

</div>