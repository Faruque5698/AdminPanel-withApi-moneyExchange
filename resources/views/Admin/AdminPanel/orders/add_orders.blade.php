@extends('Admin.AdminPanel.master')



@section('title')
    Add Orders
@endsection

@section('body')

    <section class="content">
        <div class=" offset-2 col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Orders</h3>
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
                    <form action="{{url('save_orders')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label >Send</label>
                                <select class="form-control @error('send') is-invalid @enderror" name="send">
                                    <option >---Select Category---</option>
                                    @foreach($services as $service)
                                        <option value="{{$service->account_name}}">{{$service->account_name}}</option>
                                    @endforeach
                                </select>
                                @error('send')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Send Money</label>
                                <input type="text" class="form-control @error('send_money') is-invalid @enderror" name="send_money" placeholder="">
                                @error('send_money')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label >Receive</label>
                            <select class="form-control @error('receive') is-invalid @enderror" name="receive">
                                <option >---Select Category---</option>
                                @foreach($services as $service)
                                    <option value="{{$service->account_name}}">{{$service->account_name}}</option>
                                @endforeach
                            </select>
                            @error('receive')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label >Receive Money</label>
                            <input type="text" class="form-control @error('receive_money') is-invalid @enderror" name="receive_money" placeholder="">
                            @error('receive_money')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div><div class="form-group ">
                            <label >Publication Status</label>
                            <select class="form-control @error('delivery_status') is-invalid @enderror" name="delivery_status">
                                <option >---Select Status---</option>
                                <option value="0">Send</option>
                                <option value="2">Processing</option>
                                <option value="3">Received</option>
                                <option value="4">Delivered</option>
                                <option value="1">Cancel</option>
                            </select>
                            @error('delivery_status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                            <div class="form-group ">
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
                                <button type="submit" class="btn btn-primary">Add Orders</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>

    </section>


@endsection

@section('js')
    <script>
        CKEDITOR.replace( 'sub_cat_desc' );
    </script>
@endsection


