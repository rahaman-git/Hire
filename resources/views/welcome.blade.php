@extends('app')

@section('content')
    <div class="container" style="margin-top: 0">
        <div class="jumbotron" style="margin-top: 0; background-color: white; padding: 0">
            <h2>Freelancer</h2>
            <p>Hiring a freelancer and getting a freelancer job made easy</p>
            <hr/>
        </div>
        <div class="row" style="margin-top: 2em">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align: center; color: white; background-color: #333" >
                            User Registration</div>

                        <div class="panel-body">
                            <form method="POST" action="{{ url('/register') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name')  }}"
                                       placeholder="Name" >
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <div class="form-group">
                                <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}" placeholder="Email" >
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <div class="form-group">
                                <input id="password" type="password" class="form-control" name="password"
                                               placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" placeholder="Password Confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <button type="submit" class="btn btn-block" style="background-color: black; color: white">
                                    Register</button>
                            </form>
                            <hr/>
                            <h5 style="text-align: center">Already have an account?</h5>
                            <a class="btn btn-block" style="background-color: black; color: white;" href="/login">Login</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align: center; color: white; background-color: #333" >Freelancer Registration</div>

                        <div class="panel-body">
                            <form method="POST" action="{{ url('/doRegister') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <input id="freelancer_name" type="text" class="form-control" name="freelancer_name"
                                           value="{{ old('freelancer_name')  }}"
                                           placeholder="Name" >
                                    @if ($errors->has('freelancer_name'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('freelancer_name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input id="freelancer_email" type="email" class="form-control" name="freelancer_email"
                                           value="{{ old('freelancer_email') }}" placeholder="Email" >
                                    @if ($errors->has('freelancer_email'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('freelancer_email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input id="freelancer_password" type="password" class="form-control" name="freelancer_password"
                                           placeholder="Password">
                                    @if ($errors->has('freelancer_password'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('freelancer_password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input id="freelancer_password_confirm" type="password" class="form-control"
                                           name="freelancer_password_confirm" placeholder="Password Confirmation">
                                    @if ($errors->has('freelancer_password_confirm'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('freelancer_password_confirm') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-block" style="background-color: black; color: white">
                                    Register</button>
                            </form>
                            <hr/>
                            <h5 style="text-align: center">Already have an account?</h5>
                            <a class="btn btn-block" style="background-color: black; color: white;"
                               href="/doLogin">Login</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
