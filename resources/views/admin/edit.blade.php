<x-admin-layout>
  <x-slot name="header">
      <style>
          table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
      </style>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit Poll Information') }}
      </h2>
  </x-slot>
  <form method="post" action="{{ route('admin.edit-action') }}" style="margin-left: 10%">
    @csrf
  
  <input type="hidden" name="criteria" value="{{ $data->id }}">
  <label for="fname">Poll Name:</label><br>
  <input type="text" id="name" name="name" value="{{ $data->poll_title }}"><br>
 
  <label for="date">End at:</label><br>
  <input type="date" id="date" name="date" value="{{ $data->end_at }}"><br>
  
  <button class="btn btn-primary">Update</button>
</form>
</x-admin-layout>

