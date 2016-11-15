@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">LOGIN</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <style type="text/css">
                            .sharify-container{
                                position: relative;
                                display: block;
                                width: 100%;
                                padding: 20px 0;
                                overflow: hidden;
                            }
                            .sharify-container li{
                                width: 33%;
                                list-style: none;
                                height: 35px;
                                line-height: 36px;
                                float: left;
                                margin: 0 !important;
                                padding-left: 2.5px;
                            }
                            .sharify-container li a{
                                border: 0;
                                border-radius: 1px;
                                display: block;
                                font-size: 15px;
                                line-height: 40px;
                                height: 100%;
                                color: #fff;
                                position: relative;
                                text-align: center;
                                text-decoration: none;
                                text-transform: uppercase;
                                width: 100%;
                                transition: all .2s ease-in-out;
                            }
                            .sharify-container li .facebook{
                                background-color: #3b5998;
                            }
                            .sharify-container li.facebook a:hover{
                                background-color: #0e2e6f;
                            }
                            .sharify-container li .twitter{
                                background-color: #4db2ec;
                            }
                            .sharify-container li.twitter a:hover{
                                background-color: #3498db;
                            }
                            .sharify-container li .google{
                                background-color: #bb0000;
                            }
                            .sharify-container li.google a:hover{
                                background-color: #a30505;
                            }
                        </style>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="col-md-8 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                        <button type="button" class="btn btn-primary">
                                            Forgot Your Password?
                                        </button>
                                    </a>
                                </div>
                                <div class="sharify-container">
                                    <ul>
                                        <li class="facebook">
                                            <a href="redirect" class="facebook">FACEBOOK <span><i class="fa fa-facebook-square" style="font-size:24px"></i></span><span> +5</span>

                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="redirect/twitter" class="twitter">TWITTER
                                            <span class="sharify-icon"><i class="fa fa-twitter" style="font-size:24px"></i></span><span> +2</span>
                                            </a>
                                        </li>
                                        <li class="google">
                                            <a href="redirect/google" class="google">GOOGLE <span class="sharify-icon"><i class="fa fa-google-plus-square" style="font-size:24px"></i></span><span> +1</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
