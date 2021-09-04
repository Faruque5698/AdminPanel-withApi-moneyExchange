@extends('Admin.AdminPanel.master')


@section('title')
    Orders
@endsection

@section('body')

    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Orders</h3>
                <a href="{{url('add_orders')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Customer id</th>
                        <th>Order id</th>
                        <th>Send</th>
                        <th>Send Money</th>
                        <th>Receive</th>
                        <th>Receive Money</th>
                        <th>Date</th>
                        <th>Delivery Status</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$order->customer_id}}</td>
                            <td>{{$order->order_id}}</td>
                            <td>{{$order->send}}</td>
                            <td>{{$order->send_money}}</td>
                            <td>{{$order->receive}}</td>
                            <td>{{$order->receive_money}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td>{{$order->status == 1 ? 'Published':'Unpublished'}}</td>
                            <td>

                                @if($order->status == 1)
                                    <a href="{{route('unpublished-orders',['id' => $order->id])}}" class="btn btn-sm btn-info"
                                       onclick="return confirm('Are you want to Unpublished it')"><i class="fa fa-arrow-circle-up"></i></a>
                                @else
                                    <a href="{{route('published-orders',['id' => $order->id])}}" class="btn btn-sm btn-warning"
                                       onclick="return confirm('Are you want to publish it')" ><i class="fa fa-arrow-circle-down"></i></a>
                                @endif

                                <a href="{{route('delivery_status',['id' => $order->id])}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>

                                <a href="{{route('delete-order',['id' => $order->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sl.</th>
                        <th>Customer_id</th>
                        <th>Order_id</th>
                        <th>Credit From</th>
                        <th>Total customer Credit</th>
                        <th>Credit To</th>
                        <th>Total Payable Credit To</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </section>


@endsection


@section('js')
    <script src="{{asset('/Admin/AdminPanel')}}/plugins/datatables/jquery.dataTables.js"></script>
    <script src="{{asset('/Admin/AdminPanel')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>


@endsection
