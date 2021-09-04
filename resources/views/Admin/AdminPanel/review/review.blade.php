@extends('Admin.AdminPanel.master')


@section('title')
    Reviews
@endsection

@section('body')

    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Reviews</h3>
                <a href="{{url('add_services')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Customer_id</th>
                        <th>Customer_name</th>
                        <th>Review Description</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($reviews as $review)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$review->customer_id}}</td>
                            <td>{{$review->customer->name}}</td>
                            <td>{{$review->review_description}}</td>
                            <td>{{$review->created_at}}</td>
                            <td>{{$review->status == 1 ? 'Published':'Unpublished'}}</td>
                            <td>

                                @if($review->status == 1)
                                    <a href="{{route('unpublished-review',['id' => $review->id])}}" class="btn btn-sm btn-info"
                                       onclick="return confirm('Are you want to Unpublished it')"><i class="fa fa-arrow-circle-up"></i></a>
                                @else
                                    <a href="{{route('published-review',['id' => $review->id])}}" class="btn btn-sm btn-warning"
                                       onclick="return confirm('Are you want to publish it')" ><i class="fa fa-arrow-circle-down"></i></a>
                                @endif

{{--                                <a href="{{route('service-edit',['id' => $service->id])}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>--}}

                                <a href="{{route('delete-review',['id' => $review->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sl.</th>
                        <th>Customer_id</th>
                        <th>Customer_name</th>
                        <th>Review Description</th>
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
