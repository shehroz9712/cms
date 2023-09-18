@extends('admin.layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">View Faq</div>
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
                            <td>{{ $faq->page->title ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>service</th>
                            <td>{{ $faq->service->title ?? '' }}</td>
                        </tr>

                        <tr>
                            <th>order</th>
                            <td>{{ $faq->order }}</td>
                        </tr>
                        <tr>
                            <th>status</th>
                            <td>
                                @if ($faq->status == 1)
                                    <div class="alert alert-success">Active</div>
                                @else
                                    <div class="alert alert-danger">Inactive</div>
                                @endif
                            </td>
                        </tr>
                    </table>



                </div>
            </div>
        </div>
    </div>
@endsection
