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
                    
                    {{-- <label for="votes" class="sr-only" style="font-family:sans-serif; font-size:20px;"><b></b></label><br> --}}
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Choose a Poll:
                    </h2>
                       
                    @foreach ($polldata as $data )
                    
                    <hr><a href="{{ route('showpoll',$data->id) }}" class="btn btn-light">{{ $data->poll_title }}</a><hr>
                        
                    @endforeach
                   

                    
                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
