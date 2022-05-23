<div class="flex justify-center items-center mt-8">
    <div class="w-4/5 bg-white shadow-sm rounded-md p-4">
        <h1 class="text-gray-500 mb-4">{{ is_null($attributes['title']) ? app()->view->getSections()['title'] : $attributes['title'] }}</h1>
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
