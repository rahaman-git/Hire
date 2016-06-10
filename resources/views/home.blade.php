@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center; color: white; background-color: #333" >User</div>

                <div class="panel-body">
                    <form action="{{ url('/register') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input type="text" id="name" name="name" placeholder="Name" class="form-control" />
                        </div>
                        @include('partials.form')
                        <input type="submit" id="user-register-btn" name="user-register"
                               value="Register" class="btn btn-block"
                               style="background-color: black; margin-bottom: 5px; color: white" />
                    </form>
                    <hr/>
                    <h5 style="text-align: center">Already have an account?</h5>
                    <a class="btn btn-block" style="background-color: black; color: white;" href="/login">Login</a>
                </div>
            </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center; color: white; background-color: #333" >Freelancer</div>

                    <div class="panel-body">
                        <a class="btn btn-block" style="border: 1px solid black; color: black"
                            href="freelancers/register">Register</a>
                        <a class="btn btn-block" style="border: 1px solid black; color: black"
                           href="freelancers/login">Login</a>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
