@extends("Admin.Login.master")

@section("title")
    Reset Password
@endsection

@section("body")
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Reset Password</h2>

                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">


                            <form action="{{route('reset.password.post')}}" method="post">
                                @csrf

                                <input type="hidden" name="token" value="{{$token}}">

                                @if(session('message'))
                                    <div class="alert alert-success">
                                        {{session('message')}}
                                    </div>
                                @endif
                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{session('error')}}
                                </div>
                                @endif

                                    <div class="form-group mb-3">
                                        <label class="label" for="name">Email</label>
                                        <input type="text" class="form-control" name="email" placeholder="Enter Your Email" value="{{$email ?? old('email')}}" autofocus>
                                        <span class="text-danger">@error('email'){{ $message  }} @enderror</span>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="label" for="name">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter New Password" required>
                                        <span class="text-danger">@error('password'){{ $message  }} @enderror</span>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="label" for="name">Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                        <span class="text-danger">@error('password_confirmation'){{ $message  }} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-primary submit px-3">Send Password Link</button>
                                    </div>
                            </form>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
