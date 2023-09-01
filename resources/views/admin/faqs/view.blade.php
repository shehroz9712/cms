@extends('admin.layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">View Services</div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>Question</th>
                            <td>{{ $faq->question }}</td>
                        </tr>
                        <tr>
                            <th>answer</th>
                            <td>{{ $faq->answer }}</td>
                        </tr>

                        <tr>
                            <th>page</th>
                            <td>{{ $faq->page }}</td>
                        </tr>
                        <tr>
                            <th>service</th>
                            <td>{{ $faq->service }}</td>
                        </tr>

                        <tr>
                            <th>order</th>
                            <td>{{ $faq->order }}</td>
                        </tr>
                        <tr>
                            <th>status</th>
                            <td>{{ $faq->status }}</td>
                        </tr>
                    </table>



                    <table></table>
                </div>
            </div>
        </div>
    </div>
@endsection
