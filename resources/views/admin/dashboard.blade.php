
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
  <link rel="stylesheet" href="{{url('bootstrap/css/style.css')}}"><!--external css linked-->

<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome To Admin Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="height:70%;">
                    <div class="col-sm-12 products" style="display:flex;height:65%; margin-top:60px; width:90%;">  
                        <div class="col-sm-2 card">
                            <img src="/images/image1.png" class="card-img-top"style="height: 160px;width: 250px; " alt="poll">
                            <div class="card-body">
                                <h5 class="card-title">Total Number of Poll</h5>
                                <p class="card-text">{{$pollCount}}</p>
                                <a href="poll" class="btn btn-primary">Know More</a>
                            </div>
                        </div>
                        <div class="col-sm-2 card">
                            <img src="/images/image2.jpg" class="card-img-top"  alt="option">
                            <div class="card-body">
                                <h5 class="card-title">Total Number of Option</h5>
                                <p class="card-text">{{$optionCount}}</p>
                                <a href="option" class="btn btn-primary">Know More</a>
                            </div>
                        </div>
                        <div class="col-sm-2 card">
                            <img src="/images/image.jpg" class="card-img-top"  alt="option">
                            <div class="card-body">
                                <h5 class="card-title">Total Number of Submitted Votes</h5>
                                <p class="card-text">{{$submittedCount}}</p><br>
                                <a href="submitted" class="btn btn-primary">Know More</a>
                            </div>
                        </div>
                        <div class="col-sm-2 card">
                            <div class="card-body">
                                <h5 class="title"><b>Total Number of Votes</b></h5><br>
                                <p style="color: black">Option One:</p>
                                <p style="color: black" class="text"><b>{{$localCount1}}</b></p>
                          
                                <p style="color: black">Option Two:</p>
                                <p style="color: black" class="text"><b>{{$localCount2}}</b></p>
                            
                                <p style="color: black">Option Three:</p>
                                <p style="color: black" class="text"><b>{{$localCount3}}</b></p>
                            </div>
                        </div>
                        
                    </div>
           
        </div>
    </div>
</x-admin-layout>