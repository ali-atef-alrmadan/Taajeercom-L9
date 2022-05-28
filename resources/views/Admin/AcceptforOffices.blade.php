<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accept for Offices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-validation-errors class="mb-4" />
                
                <table>
                    <tr class="tableHead">
                        <th class="px-1">name</th>
                        <th class="px-1">phone_number</th>
                        <th class="px-1">description</th>
                        <th class="px-1">status</th>
                        <th class="px-1">Accept</th>
                    </tr>
                    @foreach ($offices as $item)
                        <tr class="tableBody">
                            <td class="border-r px-1">{{$item->name}}</td>
                            <td class="border-r px-1">{{$item->phone_number}}</td>
                            <td class="border-r px-1">{{$item->description}}</td>
                            <td class="border-r px-1">{{$item->status}}</td>
                            <td>
                                <form class="md:w-100 w-full" name="Add Offices" method="post" action="{{route('updateAcceptforOffices')}}"enctype="multipart/form-data">
                                    @csrf
                                    <input type="number" name="Offices_id" value="{{$item->id}}" hidden>
                                    <input type="number" name="admin_id" value="{{$item->admin_id}}" hidden>
                                    <div class="flex items-center justify-end mt-4">
                                        <x-jet-button class="ml-4">
                                            {{ __('Add Offices') }}
                                        </x-jet-button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
