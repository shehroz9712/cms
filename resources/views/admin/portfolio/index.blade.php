@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Portfolio Data</div>

                    <div class="card-body">
                        <a href="{{ route('portfolio.create') }}" class="btn btn-primary mb-4" style="float: right;">Create
                            Portfolio</a>
                        <table class="table table-bordered table-responsive  w-100 data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>service ID</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Is on Home</th>
                                    <th>Order</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>

                    @section('js')
                        <script>
                            $(function() {

                                var table = $('.data-table').DataTable({
                                    processing: true,
                                    serverSide: true,
                                    responsive: true, // Enable DataTables Responsive extension
                                    ajax: "{{ route('portfolio.index') }}",
                                    columns: [{
                                            data: 'id',
                                            name: 'id'
                                        },
                                        {
                                            data: 'service.title',
                                            name: 'service.title'
                                        },
                                        {
                                            data: 'image',
                                            name: 'image',
                                            render: function(data, type, full, meta) {
                                                return '<img src="' + data + '" alt="Image" width="100">';
                                            },
                                        },
                                        {
                                            data: 'status',
                                            name: 'status'
                                        },
                                        {
                                            data: 'is_on_home',
                                            name: 'is_on_home'
                                        },
                                        {
                                            data: 'order',
                                            name: 'order'
                                        },
                                        {
                                            data: 'created_at',
                                            name: 'created_at'
                                        },
                                        {
                                            data: 'updated_at',
                                            name: 'updated_at'
                                        },
                                        {
                                            data: 'action',
                                            name: 'action',
                                            orderable: false,
                                            searchable: false
                                        }
                                    ]
                                });

                            });
                        </script>
                    @endsection
                    {{-- @dd($attendance_all); --}}
                </div>
            </div>
        </div>
    @endsection
