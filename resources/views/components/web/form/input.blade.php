<div class="flex justify-start items-start flex-col mb-4">
    <label for="{{ $name }}" class="text-gray-500 mb-2">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $name }}"
        @class(['w-full border-2 p-2 rounded-md bg-transparent focus:border-blue-500 outline-none',
                'border-red-500' => $errors->has($name)]) value="{{ old($name) }}">
    @error($name)
        <div class="text-red-500 mt-2">
            {{ $message }}
        </div>
    @enderror
</div>

