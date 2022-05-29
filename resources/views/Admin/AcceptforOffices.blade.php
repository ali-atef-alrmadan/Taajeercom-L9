<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accept for Offices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="tableContanier text-center">
                    <div class="mb-5">
                        <x-jet-validation-errors class="mb-4" />
                    </div>
                    <div class="tableContent text-center w-full">
                        @if ($offices->isempty())
                            <h1 class="msg text-bold">
                                You have not any Request Offices.
                            </h1>
                        @else
                        <div class="px-4 ">
                            <table class="w-full">
                                <tr class="tableHead px-4">
                                    <th class="px-1">name</th>
                                    <th class="px-1">phone_number</th>
                                    <th class="px-1">description</th>
                                    <th class="px-1">status</th>
                                    <th class="px-1">Accept</th>
                                </tr>
                                @foreach ($offices as $item)
                                    <tr class="tableBody border-b border-gray-300">
                                        <td class="px-3">{{$item->name}}</td>
                                        <td class="px-3">{{$item->phone_number}}</td>
                                        <td class="px-3">{{$item->description}}</td>
                                        <td class="px-3">
                                                @if ($item->Status ==0)
                                                    On request
                                                @elseif($item->Status ==1)
                                                    Done
                                                @else
                                                    rejecte
                                                @endif
                                        </td>
                                        <td class="flex w-full">
                                            <form class="inline" name="Add Offices" method="post" action="{{route('updateAcceptforOffices')}}"enctype="multipart/form-data">
                                                @csrf
                                                <input type="number" name="Offices_id" value="{{$item->id}}" hidden>
                                                <input type="number" name="admin_id" value="{{$item->admin_id}}" hidden>
                                                <div class="flex items-center justify-end mt-4">
                                                    <x-jet-button class="ml-4 bg-green-700">
                                                        {{ __('Add Offices') }}
                                                    </x-jet-button>
                                                </div>
                                            </form>
                                            <form class="inline " name="rejecteforOffices" method="post" action="{{route('updaterejecteforOffices')}}"enctype="multipart/form-data">
                                                @csrf
                                                <input type="number" name="Offices_id" value="{{$item->id}}" hidden>
                                                <div class="flex items-center justify-end mt-4">
                                                    <x-jet-button class="ml-4 bg-red-700">
                                                        {{ __('rejecte Offices') }}
                                                    </x-jet-button>
                                                </div>
                                            </form>
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
