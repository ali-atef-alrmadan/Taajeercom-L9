<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg  leading-tight">
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:inline">
                <x-jet-nav-link href="{{ route('AddWorker') }}" :active="request()->routeIs('AddWorker')">
                    {{ __('Add Worker') }}
                </x-jet-nav-link>
            </div>
        
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:inline">
                <x-jet-nav-link href="{{ route('EditWorker') }}" :active="request()->routeIs('EditWorker')">
                    {{ __('Edit Worker') }}
                </x-jet-nav-link>
            </div>
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mx-1 my-3">
                <div class="tableContanier">
                    <div class="mb-5">
                        <x-jet-validation-errors class="mb-4" />
                    </div>
                    <div class="tableContent ">
                        @if ($Employee->isempty())
                            <h1 class="msg text-bold">
                                This Office Have Not Employee.
                            </h1>
                        @else
                        <div class="px-4">
                            <table class="w-full text-center">
                                <tr class="tableHead px-4">
                                    <th>Delete</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                                @foreach($Employee as $item)
                                    <tr class="tableBody border-b border-gray-300">
                                        <td class="px-3">
                                            <form method="POST" class="inline" action="{{route("storeDeWorker")}}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="text" name="id" value="{{$item->id}}" hidden>
                                                <input class="sm:inline w-20 p-2 rounded-lg inline-block bg-red-500 text-white hover:bg-red-600 cursor-pointer" type="submit" name="submit" value="Delete">
                                            </form>
                                        </td>
                                        
                                        <td class="px-3">
                                                {{$item->name}}
                                        </td>
                                        <td class="px-3">
                                            {{$item->email}}
                                        </td>
                                        <td class="px-3">
                                            {{$item->phone_number}}
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
