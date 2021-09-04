@extends("Admin.Login.master")

@section("title")
    Sign Up
@endsection

@section("body")
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Welcome to Registration</h2>
                                <p>If you have an account than</p>
                                <a href="{{url("login")}}" class="btn btn-white btn-outline-white">Sign In</a>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign Up</h3>
                                </div>

                            </div>
                            <form action="{{url("register")}}" class="signin-form" method="post">
                                @csrf
                                <div class="result">
                                    @if(Session::get('success'))
                                        <div class="alert alert-success">
                                            {{Session::get('success')}}
                                        </div>
                                        @endif
                                        @if(Session::get('fail'))
                                            <div class="alert alert-danger">
                                                {{Session::get('fail')}}
                                            </div>
                                        @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                                    <span class="text-danger">@error('name'){{ $message  }} @enderror</span>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                                    <span class="text-danger">@error('email'){{ $message  }} @enderror</span>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    <span class="text-danger">@error('password'){{ $message  }} @enderror</span>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Retype Password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
