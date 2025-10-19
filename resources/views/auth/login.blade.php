@extends('layouts.auth')

@section('content')
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900"><b>Login SIMRS</b></h1>
                        </div>
                        <img src="{{ asset('template/img/karuna.png') }}" alt="Login Image" class="img-fluid rounded">
                    </div>

                    <!-- Form login -->
                    <div class="col-lg-12">
                        <div class="card-body">
                            <!-- Error Message -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="user" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                        placeholder="Password" name="password" required autocomplete="current-password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                            <div class="text-center mt-3">
                                <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
