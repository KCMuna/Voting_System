<x-admin-layout>
    <x-slot name="header">
        <style>
            table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
        </style>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submitted Votes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table style="width:75%">
                        <tr>
                        <th>S.N</th>
                        <th>User Name</th>
                        <th>Option Name</th> 
                        <th>Poll Name</th>
                        </tr>
                        {{-- @foreach ($optiondata as $key=>$i )
                        <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $i->option_name }}</td>
                        <td>{{ $i->name }}</td>
                        
                        </tr>
                        @endforeach  --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
