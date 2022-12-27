<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Poll') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <tr>
                        <th>Poll ID</th>
                        <th>Poll Name</th> 
                        <th>End At</th>
                        <th>Action</th>
                        </tr>
                        @foreach ($data as $key=> $Poll )
                        <tr>
                        <td>{{ $Poll->id}}</td>
                        <td>{{ $Poll->poll_title }}</td>
                        <td>{{ $Poll->end_at }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.edit').'/'.$Poll->id }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('admin.delete').'/'.$Poll->id }}">Delete</a>
                            <a class="btn btn-warning" href="{{route('admin.show_stats', $Poll->id)}}">View stats</a>

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
