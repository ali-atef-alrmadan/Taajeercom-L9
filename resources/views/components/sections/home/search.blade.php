<div class="p-4 bg-gray-200 shadow-sm" id="search">
    <form action="" method="POST">
        @csrf
        <div class="p-4 flex justify-center items-center gap-x-14">
            {{--Date-start--}}
            <div>
                <div class="text-gray-800 font-bold text-2xl">
                    <span>Date</span>
                </div>
                <div class="flex gap-x-4">
                    <div class="flex flex-col">
                        <label for="date-from">From</label>
                        <input class="p-2 rounded-md w-[12rem]" type="date" id="date-from" name="date-from">
                    </div>
                    <div class="flex flex-col">
                        <label for="date-to">To</label>
                        <input class="p-2 rounded-md w-[12rem]" type="date" id="date-to" name="date-to">
                    </div>
                </div>
            </div>
            {{--Date-end--}}

            {{--Price-start--}}
            <div>
                <div class="text-gray-800 font-bold text-2xl">
                    <span>Price</span>
                </div>
                <div class="flex gap-x-4">
                    <div class="flex flex-col">
                        <label for="min-price">Min</label>
                        <input class="p-2 rounded-md w-[12rem]" type="number" id="min-price" name="min-price" value="0">
                    </div>
                    <div class="flex flex-col">
                        <label for="max-price">Max</label>
                        <input class="p-2 rounded-md w-[12rem]" type="number" id="max-price" name="max-price" value="0">
                    </div>
                </div>
            </div>
            {{--Price-end--}}

            {{--Location-start--}}
            <div>
                <div class="text-gray-800 font-bold text-2xl">
                    <span>City</span>
                </div>
                <div class="flex flex-col">
                    <label for="location">Select City</label>
                    <select class="p-2 rounded-md w-[12rem]" name="location" id="location">
                        <option value="0"> Empty </option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}"> {{  $city->city }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{--Location-end--}}

            {{--Brand-start--}}
            <div>
                <div class="text-gray-800 font-bold text-2xl">
                    <span>Brand</span>
                </div>
                <div class="flex flex-col">
                    <label for="brand">Select brand</label>
                    <select class="p-2 rounded-md w-[12rem]" name="brand" id="brand">
                        <option value="0"> Empty </option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}"> {{  $brand->brand }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{--Brand-end--}}
        </div>
        <div class="p-4 ml-14">
            <input type="submit" name="search" value="Search" class="px-12 py-4 rounded-md bg-blue-500 text-white transition-colors hover:bg-blue-700 cursor-pointer">
        </div>
    </form>
</div>
