@extends('admin.layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">View Portfolio</div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>service</th>
                            <td>{{ $portfolio->service->title }}</td>
                        </tr>
                        <tr>
                            <th>image</th>
                            <td><img src="{{ frontImage('portfolio/' . $portfolio->image) }}" alt=""></td>
                        </tr>

                        <tr>
                            <th>Show on home </th>

                            <td>
                                @if ($portfolio->is_on_home == 1)
                                    show on desktop
                                @else
                                    not show
                                @endif


                            </td>
                        </tr>

                        <tr>
                            <th>order</th>
                            <td>{{ $portfolio->order }}</td>
                        </tr>
                        <tr>
                            <th>status</th>
                            <td>
                                @if ($portfolio->status == 1)
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
