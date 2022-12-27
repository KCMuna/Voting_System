<x-admin-layout>
    <x-slot name="header">
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Option Candidates') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <tr>
                        <th>Option ID</th>
                        <th>Option Name</th> 
                        <th>Poll ID</th>
                        <th>Action</th>
                        </tr>
                        @foreach ($optiondata as $key=>$i )
                        <tr>
                        <td>{{ $i->id}}</td>
                        <td>{{ $i->option_name }}</td>
                        <td>{{ $i->poll_id }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.option_edit').'/'.$i->id }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('admin.option_delete').'/'.$i->id }}">Delete</a> 
                        </td>
                        </tr>
                        @endforeach 
                    </table>
                    <button class="btn btn-success"><a href="{{ url('admin/option_form') }}">Add Data</a></button>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
