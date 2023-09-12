@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Blog Data</div>

                    <div class="card-body">
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-4" style="float: right;">Create
                            Blog</a>
                        <table class="table table-bordered table-responsive  w-100 data-table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Thumbnail</th>
                                    <th>Status</th>
                                    <th>Order</th>
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
                    ajax: "{{ route('blogs.index') }}",
                    columns: [{
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'slug',
                            name: 'slug'
                        },

                        {
                            data: 'thumbnail',
                            name: 'thumbnail',
                            render: function(data, type, full, meta) {
                                var imageUrl = "{{ frontImage('blog/') }}" + '/' + data;
                                return '<img src="' + imageUrl + '" alt="Image" >';
                            },
                        },
                        {
                            data: 'status',
                            name: 'status',
                            render: function(data, type, row) {
                                if (data == 1) {
                                    return '<div class="alert alert-success">Active</div>';
                                } else {
                                    return '<div class="alert alert-danger">Inactive</div>';
                                }
                            }
                        },
                        {
                            data: 'order',
                            name: 'order'
                        }, {
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
