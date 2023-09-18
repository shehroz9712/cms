@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Testimonial Data</div>

                    <div class="card-body">
                        <a href="{{ route('testimonials.create') }}" class="btn btn-primary mb-4" style="float: right;">Create
                            Testimonial</a>
                        <table class="table table-bordered table-responsive  w-100 data-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>content</th>
                                    <th>platform</th>
                                    <th>Order</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    @section('js')
        <script>
            $(function() {

                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('testimonials.index') }}",
                    columns: [{
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'image',
                            name: 'image',
                            render: function(data, type, full, meta) {
                                var imageUrl = "{{ frontImage('testimonials/') }}" + '/' + data;
                                return '<img src="' + imageUrl + '" alt="Image" >';
                            },
                        },
                        {
                            data: 'content',
                            name: 'content'
                        }, {
                            data: 'platform.name',
                            name: 'platform.name'
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

@endsection
