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
                    
                <form action="{{ route('vote_store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="criteria" value="{{Auth::user()->id}}">
                    <label for="votes" class="sr-only">Choose a Poll</label>

                    <select id="votes" name="poll_title">
                        <option selected disabled>Choose a Poll</option>
                       
                    @foreach ($polldata as $data )
                        <option value="{{ $data->poll_title }}">{{ $data->poll_title }}</option>
                    @endforeach
                    </select>

                    {{-- <p>Please select Your Choice:</p> --}}
                   
                    {{-- @foreach ($optiondata as $odata)
                
                        <label for="option3" name="oname" value="{{ $odata->option_name }}"></label><br><br> 
                        <input type="radio" name="option_name" value="{{ $odata->option_name }}">

                    @endforeach  --}}
                    {{-- <label for="option1">{{ $odata->option_name }}</label><br> --}}
                    {{-- <input type="radio" name="option_name" value="2">
                    <label for="option2">Option 2</label><br>  
                    
                    <input type="radio" name="option_name" value="3">
                    <label for="option3">Option 3</label><br><br> --}}

                    <p>Please select Your Choice:</p>

                    <input type="radio" name="option_name" value="1">
                    <label for="option1">Option 1</label><br>
                    <input type="radio" name="option_name" value="2">
                    <label for="option2">Option 2</label><br>  
                    <input type="radio" name="option_name" value="3">
                    <label for="option3">Option 3</label><br><br>
                    
                    @if (Auth::user()->status==0)
                        <input class="btn btn-primary" onclick="return confirm('Thank You for Voting!')" type="submit" name="votebtn" value="Vote" id="votebtn"> 
                    @else
                        <button disabled class="btn btn-success" type="button" name="votebtn" id="voted">Voted</button>
                    @endif
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
