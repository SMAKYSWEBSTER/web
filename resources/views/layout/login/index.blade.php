@extends('layouts.app')

@section('content')
    <div class="wrapper card">
        <div class="card-body">
            <div class="content">
                <i class="fas fa-user-circle"></i>
                <form id="login_form" action="{{ route('login') }}" method="POST">
                    <label form="login_form" class="inp">
                        <input type='text' form="login_form" name='username' placeholder="&nbsp;" autocomplete="off">
                        <span class="label">Username</span>
                        <span class="border"></span>
                    </label>
                    <label form="login_form" class="inp">
                        <input type='password' form="login_form" name='password' placeholder='&nbsp;'>
                        <span class="label">Password</span>
                        <span class="border"></span>
                    </label>
                    @if ($errors->has('username'))
                        <span class="alert error">{{ $errors->first('username') }}</span>
                    @endif
                    @if ($errors->has('password'))
                        <span class="alert error">{{ $errors->first('password') }}</span>
                    @endif
                    <input id="hidden-submit" class="hidden" type='submit'>
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="action-bar">
                <label for="hidden-submit" class="btn">Login</label>
            </div>
        </div>
    </div>
@endsection