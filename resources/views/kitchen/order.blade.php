@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Order Listings</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container-fluid">
            <a href="{{ route('dishes.create') }}" class="btn btn-info btn-sm float-right">
              <i class="fas fa-plus"></i>  Create Dish</a>
            <div class="clearfix"></div>
            @if (session('success'))
                <div class="col-md-6 offset-md-2">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                </div>
            @endif
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Dish Name</th>
                        <th>Table Number</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->dish_id }}</td>
                            <td>{{ $order->table_id }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <div>
                                    <a href="{{ route('order_approve', $order->id) }}" class="btn btn-warning btn-sm">Approve</a>
                                    <a href="{{ route('order_cancel', $order->id) }}" class="btn btn-danger btn-sm">Cancel</a>
                                    <a href="{{ route('order_ready', $order->id) }}" class="btn btn-success btn-sm">Ready</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- /.content -->
    </div>
@endsection





@section('script')
    <script>
        $(function() {
            // $("#example1").DataTable({
            //     "responsive": true,
            //     "lengthChange": false,
            //     "autoWidth": false,
            //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@endsection
