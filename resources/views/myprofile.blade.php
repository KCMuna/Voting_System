<x-app-layout>
    <style>
        body{
background:#eee;
}
.separator {
    border-right: 1px solid #dfdfe0; 
}
.icon-btn-save {
    padding-top: 0;
    padding-bottom: 0;
}
.input-group {
    margin-bottom:10px; 
}
.btn-save-label {
    position: relative;
    left: -12px;
    display: inline-block;
    padding: 6px 12px;
    background: rgba(0,0,0,0.15);
    border-radius: 3px 0 0 3px;
}
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="row">
                      
                        <div style="margin-top:80px;" class="col-xs-6 col-sm-6 col-md-6 login-box">
                            {{-- <div class="col-xs-6 col-sm-6 col-md-6 social-login-box" style="border-radius: 10px"> <br> --}}
                                <img alt="" src="/images/user.png" height="130px" width="130px" style="border-radius: 100px; margin-left:70px;"><br>                   
                             {{-- </div> --}}
                            <form method="post" action="{{ route('updateprofile') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"></div>
                                        <input class="form-control" name="name" type="text" value="{{ Auth::user()->name }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"></div>
                                        <input class="form-control" type="email" value="{{ Auth::user()->email }}" disabled>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <div class="input-group">
                                    <div class="input-group-addon"></span></div>
                                    <input class="form-control" type="password" placeholder="Current Password" name="oldpassword">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span></div>
                                    <input class="form-control" type="password" placeholder="New Password" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span></div>
                                    <input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation">
                                    </div>
                                </div>
                                <button class="btn icon-btn-save btn-success" style="margin-left:60px;">
                                    Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</x-app-layout>