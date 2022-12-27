<x-admin-layout>
    <x-slot name="header">
        
    </x-slot>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <table class="table table-striped">
                        <tr>
                        <th>Option Name</th>
                        <th>Vote</th> 
                        <th>Total Vote</th>
                        </tr>
                    @for ($i = 0; $i < (count($label)); $i++)
                        <tr>
                        <td>{{ $label[$i] }}</td>
                        <td>{{ $var[$i] }}</td>
                        <td>{{ $totalVotes }}</td>
                        </tr>
                    @endfor
                </table>    
                
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>