<x-admin-layout>
    <x-slot name="header">
        <style>
            table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
        </style>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Poll') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table style="width:75%" class="table">
                        <tr>
                        <th>S.N</th>
                        <th>Poll Name</th> 
                        <th>End At</th>
                        <th>Action</th>
                        </tr>
                        @foreach ($data as $key=> $i )
                        <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $i->poll_title }}</td>
                        <td>{{ $i->end_at }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.edit').'/'.$i->id }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('admin.delete').'/'.$i->id }}">Delete</a>
                        </td>
                        </tr>
                        @endforeach
                    </table>
                    <button class="btn btn-success"><a href="{{ url('admin/form') }}">Add Data</a></button>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
