@extends('layouts.themes.theme2.layout')
@section('scripts')
<script type="text/javascript" src="{{ mix('/js/views/auth/login.js') }}"></script>
@endsection
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="row">
    <bootstrap-card class="card-signup" data-background-color="link" use-body="true">
        <template slot="header"></template>
        <template slot="body">
             <form class="" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="header header-primary text-center">
                    <h4 >Reset Password</h4>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail Address</label>

                    <div class="">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-primary btn-block">
                            Send Password Reset Link
                        </button>
                    </div>
                </div>
            </form>
        </template>
    </bootstrap-card>
</div>

@endsection
