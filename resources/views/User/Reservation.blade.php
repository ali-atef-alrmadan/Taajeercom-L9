<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="text-lg  leading-tight">
                Reservation
            </h2>
        </div>
    </x-slot>
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mx-1 my-3">
            <div class="w-full h-100 overflow-y-auto" >
                <div class="tableContanier text-center">
                    <div class="mb-5">
                        <x-jet-validation-errors class="mb-4" />
                    </div>
                    <div class="tableContent">
                        @if ($Reservations->isempty())
                            <h1 class="msg text-bold">
                                You have not any reservations.
                            </h1>
                        @else
                        <div class="px-4 ">
                            <table class="w-full">
                                <tr class="tableHead px-4">
                                    <th>brand</th>
                                    <th>type</th>
                                    <th>model</th>
                                    <th>year</th>
                                    <th>color</th>
                                    <th>capacity</th>
                                    <th>offices</th>
                                    <th>Price</th>
                                    <th>locations</th>
                                    <th>Status</th>
                                    <th>Start_date</th>
                                    <th>End_date</th>
                                </tr>
                                @foreach($Reservations as $item)
                                    <tr class="tableBody border-b border-gray-300">
                                        <td class="px-3">
                                            {{$item->brand}}
                                        </td>
                                        
                                        <td class="px-3">
                                                {{$item->type}}
                                        </td>
                                        <td class="px-3">
                                            {{$item->model}}
                                        </td>
                                        <td class="px-3">
                                            {{$item->year}}
                                        </td>
                                        
                                        <td class="px-3">
                                            <div class="fix">
                                                {{$item->color}}
                                            </div>
                                        </td>
                                        <td class="px-3">
                                            <div class="fix">
                                                {{$item->capacity}}
                                            </div>
                                        </td>
                                        <td class="px-3">
                                            {{$item->name}}
                                        </td>
                                        <td class="px-3">
                                            {{$item->Price}}
                                        </td>
                                        <td class="px-3">
                                            {{$item->city}} {{$item->address_description}} 
                                        </td>
                                        <td class="px-3">
                                            @if ($item->Status === '0')
                                                On request
                                            @elseif($item->Status === '1')
                                                Done
                                            @else
                                                rejecte
                                            @endif
                                        </td>
                                        <td class="px-3">
                                            {{$item->Start_date}}
                                        </td>
                                        <td class="px-3">
                                            {{$item->End_date}}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div> 
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>