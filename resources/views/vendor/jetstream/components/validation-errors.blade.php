@if ($errors->any())
    <div {{ $attributes }}>
        {{-- <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div> --}}

        <ul class="mt-3 w-full list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
            @if($error == 'Done add employee'
                || $error == 'The request to establish the office is under approval.'
                || $error == 'Vehicles Updated.'
                || $error == 'Vehicles Deleted.'
                || $error == 'Employee has been added successfully.'
                || $error == 'Done add offices'
                || $error == 'Done Reservations.'
                || $error == 'Save Reservation.'
                || $error == 'Vehicles Updated.'
                || $error == 'Done Add Vehicle.'

                )
                
                <div class="bg-green-500 text-white p-5 rounded-lg"> 
                    <li>{{ $error }}</li>
                </div>

            @else
            <div class="bg-red-500 text-white p-5 rounded-lg"> 
                <li>{{ $error }}</li>
            </div>
            @endif

            @endforeach
        </ul>
    </div>
@endif
