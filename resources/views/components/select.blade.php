@props(['disabled' => false, 'label' => '', 'name' => '', 'options' => []])

<div>
    <label for="{{ $attributes->get('id') }}" class="block font-medium text-sm text-gray-700">{{ $label }}</label>
    <input
        list="{{ $attributes->get('id') }}-list"
        id="{{ $attributes->get('id') }}"
        name="{{ $name }}"
        @disabled($disabled)
        {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}
    />
    <datalist id="{{ $attributes->get('id') }}-list">
        @foreach ($options as $option)
            <option value="{{ $option }}"></option>
        @endforeach
    </datalist>
</div>
