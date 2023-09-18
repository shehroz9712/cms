@extends('admin.layouts.app')

@section('css')
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">portfolio</div>

                <div class="card-body">

                    <form action="{{ route('portfolios.update', ['portfolio' => $portfolio->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Use PUT or PATCH method for editing -->

                        <div class="form-group">
                            <label for="service_id">Service</label>
                            <select class="form-control @error('service_id') is-invalid @enderror" id="service_id"
                                name="service_id">
                                <option value="">Select a service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}"
                                        {{ old('service_id', $portfolio->service_id) == $service->id ? 'selected' : '' }}>
                                        {{ $service->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" accept="image/*">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="is_on_home">Is on Home</label>
                            <select class="form-control @error('is_on_home') is-invalid @enderror" id="is_on_home"
                                name="is_on_home">
                                <option value="1"
                                    {{ old('is_on_home', $portfolio->is_on_home) == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0"
                                    {{ old('is_on_home', $portfolio->is_on_home) == 0 ? 'selected' : '' }}>No</option>
                            </select>
                            @error('is_on_home')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="order">Order</label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order"
                                name="order" value="{{ old('order', $portfolio->order) }}">
                            @error('order')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status"
                                name="status">
                                <option value="1" {{ old('status', $portfolio->status) == 1 ? 'selected' : '' }}>
                                    Active</option>
                                <option value="0" {{ old('status', $portfolio->status) == 0 ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
