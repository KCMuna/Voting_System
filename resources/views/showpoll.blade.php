<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Poll') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <h1>{{ $poll->poll_title }}</h1>
                <form action="{{ route('vote_store') }}" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="criteria" value="{{Auth::user()->id}}"> --}}
                        <input type="hidden" name="poll_id" value="{{ $poll->id  }}">
                 
                    <p>Please select Your Choice:</p>
                    @php($votedPoll = Auth::user()->votedPolls()->where(['poll_id'=>$poll->id])->count())
                
                    @foreach ($poll->options as $option)
                    <label for="option1">{{ $option->option_name }}</label><br>
                    <input type="radio" name="option_id" value="{{ $option->id }}"><br>
                    @endforeach
                    
                    @if($votedPoll == 0)
                    <button class="btn btn-primary" onclick="return confirm('Thank You for Voting!')">Vote</button>
                      @else
                        <button disabled class="btn btn-success" type="button" name="votebtn" id="voted">Voted</button>
                    @endif
                    
                  </form>
                </div> 
            </div>
        </div>
    </div>
</x-app-layout> 
