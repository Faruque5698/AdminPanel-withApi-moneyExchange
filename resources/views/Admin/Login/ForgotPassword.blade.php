@extends("Admin.Login.master")

@section("title")
    Forgot Password
@endsection

@section("body")
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Forgot Password</h2>

                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">


                            <form action="{{route('forget.password.post')}}" method="post">
                                @csrf

                                @if(session('message'))
                                    <div class="alert alert-success">
                                        {{session('message')}}
                                    </div>
                                @endif


                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Enter Your Email" required>
                                    <span class="text-danger">@error('email'){{ $message  }} @enderror</span>
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
