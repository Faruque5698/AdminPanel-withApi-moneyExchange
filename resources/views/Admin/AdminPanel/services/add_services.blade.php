@extends('Admin.AdminPanel.master')



@section('title')
    Add Services
@endsection

@section('body')

    <section class="content">
        <div class=" offset-2 col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Service</h3>
                </div>
                @if(Session::get('message'))

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{Session::get('message')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        @endif

                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{url('save_services')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label >Account Name</label>
                                <input type="text" class="form-control @error('account_name') is-invalid @enderror" name="account_name" placeholder="Enter Account Name">
                                @error('account_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Account Number</label>
                                <input type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" placeholder="Enter Account Number">
                                @error('account_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Bank Name</label>
                                <input type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" placeholder="Enter Bank Name">
                                @error('bank_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Account Logo</label>
                                <input type="file" class="form-control @error('logo_image') is-invalid @enderror" name="logo_image" >
                                @error('logo_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Publication Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option >---Select Status---</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Service</button>
                            </div>
                        </div>
                    </form>

            </div>
        </div>

    </section>


@endsection


