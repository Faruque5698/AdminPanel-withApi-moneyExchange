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
                    <form action="{{url('publication_status_changed')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label >Send</label>
                               <input type="text" class="form-control" value="{{$order->send}} " readonly>
                               <input type="hidden" class="form-control" value="{{$order->id}} " name="id">
                                @error('send')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Send Money</label>
                                <input type="text" class="form-control @error('send_money') is-invalid @enderror" name="send_money" value="{{$order->send_money}}" readonly placeholder="">
                                @error('send_money')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label >Receive</label>
                            <input type="text"  class="form-control" value="{{$order->receive}} " readonly>
                            </div>

                            @error('receive')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label >Receive Money</label>
                            <input type="text" class="form-control" value="{{$order->receive_money}} " readonly>
                            @error('send')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label >Delivery Status</label>
                            <select class="form-control @error('delivery_status') is-invalid @enderror" name="delivery_status">
                                <option >---Select Status---</option>
                                <option value="Send">Send</option>
                                <option value="Processing">Processing</option>
                                <option value="Received">Received</option>
                                <option value="Delivered">Delivered</option>
                                <option value="Cancel">Cancel</option>
                            </select>
                            @error('delivery_status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

{{--                        <div class="form-group ">--}}
{{--                            <label >Publication Status</label>--}}
{{--                            <input type="text" value="{{$order->status}}" readonly>--}}
{{--                            @error('status')--}}
{{--                            <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

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


