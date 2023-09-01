@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Faqs Data</div>

                    <div class="card-body">
                        <a href="{{ route('faqs.create') }}" class="btn btn-primary mb-4" style="float: right;">Create
                            Faq</a>
                        <table class="table table-bordered table-responsive  data-table">
                            <thead>
                                <tr>
                                    <th>service_id</th>
                                    <th>question</th>
                                    <th>answer</th>
                                    <th>page_id</th>
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
    </div>
@section('js')
    <script>
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('faqs.index') }}",

                columns: [{
                        data: 'service_id',
                        name: 'service_id'
                    },
                    {
                        data: 'question',
                        name: 'question'
                    },
                    {
                        data: 'answer',
                        name: 'answer'
                    },
                    {
                        data: 'page_id',
                        name: 'page_id'
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
                        orderable: false, // Disable sorting for this column
                        searchable: false // Disable searching for this column
                    }
                ]
            });

        });
    </script>
@endsection

@endsection
