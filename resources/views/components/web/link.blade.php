<a href="{{ $href }}" @class(['text-gray-800 hover:text-blue-500 transition-colors duration-200 ease-in-out',
                              'underline underline-offset-8 decoration-blue-500 text-blue-500' => $is_active() ])>
    {{ $content }}
</a>
