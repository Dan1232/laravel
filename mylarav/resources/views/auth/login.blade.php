@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Войти</div>
                <div class="panel-body">
                    @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                                        <li>{{ session('error')}}</li>
                                    </div>
                    @endif
                @if ($errors->any())
                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        <li>{{ $error }}</li>
                                    </div>
                                    @endforeach
                                @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Адресс</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Пароль</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Войти
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection