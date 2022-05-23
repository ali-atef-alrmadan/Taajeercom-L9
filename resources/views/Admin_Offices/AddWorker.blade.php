<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Worker') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mx-1 my-3">
                
                <form class="md:w-100 w-full" method="POST" action="{{route("storeAddWorker")}}" enctype="multipart/form-data" >
                    @csrf
                    <div>
                        <x-jet-label for="email" value="{{ __('email') }}" class="p-3"/>
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                    </div>

                    <div>
                        <x-jet-label for="salary" value="{{ __('Salary') }}" class="p-3"/>
                        <x-jet-input id="salary" class="block mt-1 w-full" type="text" name="salary" :value="old('salary')" required autofocus autocomplete="salary" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="bg-green-500 text-white hover:bg-green-600 m-4 w-full justify-center">
                            {{ __('Add Employee') }}
                        </x-jet-button>
                    </div>
                    
                </form>
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
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Salary</th>
                                </tr>
                                @foreach($Employee as $item)
                                    <tr class="tableBody border-b border-gray-300">
                                        <td class="px-3">
                                            {{$item->id}}
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
                                        <td class="px-3">
                                            {{$item->Salary}}
                                        </td>
                                        
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
