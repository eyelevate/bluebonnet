@extends('layouts.themes.theme2.layout')
@section('scripts')
<script type="text/javascript" src="{{ mix('/js/views/auth/register.js') }}"></script>
@endsection
@section('content')
<div class="row">
    <bootstrap-card class="card-signup" use-body="true">
        <template slot="header"></template>
        <template slot="body">
            <form class="" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="header header-primary text-center" style="padding:0px !important;">
                    <h4 style="margin-top:0px !important;">Register</h4>
                    <hr>
                </div>

                <div class="form-group {{ $errors->has('first_name') ? ' has-danger' : '' }}">
                    <label>First Name</label>
                    {{ Form::text('first_name', old('first_name'),['class'=>'form-control']) }}
                    <div class="{{ ($errors->has('first_name')) ? '' : 'hide' }}">
                        <small class="form-control-feedback">{{ $errors->first('first_name') }}</small>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('last_name') ? ' has-danger' : '' }}">
                    <label>Last Name</label>
                    {{ Form::text('last_name', old('last_name'),['class'=>'form-control']) }}
                    <div class="{{ ($errors->has('last_name')) ? '' : 'hide' }}">
                        <small class="form-control-feedback">{{ $errors->first('last_name') }}</small>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                    <label>Phone</label>
                    {{ Form::text('phone', old('phone'),['class'=>'form-control']) }}
                    <div class="{{ ($errors->has('phone')) ? '' : 'hide' }}">
                        <small class="form-control-feedback">{{ $errors->first('phone') }}</small>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label>Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    <div class="{{ ($errors->has('email')) ? '' : 'hide' }}">
                        <small class="form-control-feedback">{{ $errors->first('email') }}</small>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                    <div class="{{ ($errors->has('password')) ? '' : 'hide' }}">
                        <small class="form-control-feedback">{{ $errors->first('password') }}</small>
                    </div>
                </div>

                <div class="form-group ">
                    <label>Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    
                </div>

                <hr/>
                <div class="form-group">
                    <div >
                        <button type="submit" class="btn btn-primary btn-block">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </template>
    </bootstrap-card>
</div>

@endsection
