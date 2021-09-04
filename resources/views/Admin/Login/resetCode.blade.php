@extends("Admin.Login.master")

@section("title")
    Reset Code
@endsection

@section("body")
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Reset Password Link</h2>

                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">


                            You can reset password from bellow link:
                            <a href="{{ route('reset.password.get',$token) }}">Reset Password</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
