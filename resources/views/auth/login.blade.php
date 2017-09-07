@extends('layouts.themes.theme2.layout')
@section('scripts')
<script type="text/javascript" src="{{ mix('/js/views/auth/login.js') }}"></script>
@endsection
@section('header')

@endsection
@section('content')

<div class="row">
    <bootstrap-card class="card-signup" data-background-color="link" use-body="true">
        <template slot="header"></template>
        <template slot="body">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="header header-primary text-center">
                    <h4 >Login</h4>

                </div>
                <div class="content">
                    <!-- Email -->
                    <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label>Email Address</label>
                        {{ Form::text('email', old('email'),['class'=>'form-control','type'=>'email']) }}
                        <div class="{{ ($errors->has('email')) ? '' : 'hide' }}">
                            <small class="form-control-feedback">{{ $errors->first('email') }}</small>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        <div class="{{ ($errors->has('password')) ? '' : 'hide' }}">
                            <small class="form-control-feedback">{{ $errors->first('password') }}</small>
                        </div>
                    </div>

                    <div class="col-12">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                    
                </div>
                <div class="footer text-center">
                    <button type="submit" class="btn btn-secondary btn-round">
                        Login
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color:#ffffff;">
                        Forgot Your Password?
                    </a>
                </div>
            </form>
        </template>
    </bootstrap-card>
</div>
@endsection
