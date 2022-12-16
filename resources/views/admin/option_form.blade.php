<x-admin-layout>
  <x-slot name="header">
      <style>
          table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
      </style>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Option Candidates') }}
      </h2>
  </x-slot>
  <form method="post" action="{{ route('admin.option_store') }}" style="margin-left:10%;">
    {{-- <form> --}}
    @csrf
    <label for="fname">Option Name:</label><br>
    <input type="text" id="oname" name="oname"><br>
  
    <label for="fname">Poll Name:</label><br>
    <input type="text" id="opname" name="opname"><br>
    
    <input type="submit" value="Submit">
  </form>
  
</x-admin-layout>


