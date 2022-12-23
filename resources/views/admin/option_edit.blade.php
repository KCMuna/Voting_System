<x-admin-layout>
  <x-slot name="header">
      <style>
          table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
      </style>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit Option Information') }}
      </h2>
  </x-slot>
  <form method="post" action="{{ route('admin.option-edit-action') }}" style="margin-left: 10%">
    {{-- <form> --}}
    @csrf
    <input type="hidden" name="criteria" value="{{ $data->id }}">
    <label for="fname">Option Name:</label><br>
    <input type="text" id="oname" name="oname" value="{{ $data->option_name  }}"><br>
  
    <label for="fname">Poll ID:</label><br>
    <input type="text" id="pollid" name="pollid" value="{{ $data->poll_id  }}"><br>
    
    <input type="submit" value="Update">
  </form>
  
</x-admin-layout>


