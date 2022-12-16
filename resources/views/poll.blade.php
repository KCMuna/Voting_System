<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Poll') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <form action="#" method="POST">
                        @csrf
                    <label for="votes" class="sr-only">Choose a Poll</label>

                    <select id="votes">
                        <option selected>Choose a Poll</option>
                       
                    @foreach ($polldata as $data )
                        <option name="poll">{{ $data->poll_title }}</option>
                    @endforeach
                    </select>

                    <p>Please select Your Choice:</p>
                    <input type="radio" name="option" value="1">
                    <label for="option1">Option 1</label><br>
                    <input type="radio" name="option" value="2">
                    <label for="option2">Option 2</label><br>  
                    <input type="radio" name="option" value="3">
                    <label for="option3">Option 3</label><br><br>
                    <button type="submit">Submit</a></button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
