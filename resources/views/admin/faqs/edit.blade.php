@extends('admin.layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Shipment</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('faqs.update', $faq->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="question">Question</label>
                                    <input type="text" class="form-control @error('question') is-invalid @enderror"
                                        id="question" name="question" value="{{ old('question', $faq->question) }}">
                                    @error('question')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="answer">Answer</label>
                                    <textarea class="form-control" id="answer" name="answer">{{ old('answer', $faq->answer) }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="page_id">Page</label>
                                    <select class="form-select @error('page_id') is-invalid @enderror" id="page_id"
                                        name="page_id" required>
                                        <option value="">Select page</option>
                                        <option value="0" {{ old('page_id', $faq->page_id) == 0 ? 'selected' : '' }}>
                                            Inner Service
                                        </option>
                                        @foreach ($pages as $page)
                                            <option value="{{ $page->id }}"
                                                {{ old('page_id', $faq->page_id) == $page->id ? 'selected' : '' }}>
                                                {{ $page->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('page_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4" style="display: none;" id="showservices">
                                <div class="form-group">
                                    <label for="service_id">Service</label>
                                    <select class="form-select @error('service_id') is-invalid @enderror" id="service_id"
                                        name="service_id" >
                                        <option value="">Select service</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}"
                                                {{ old('service_id', $faq->service_id) == $service->id ? 'selected' : '' }}>
                                                {{ $service->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="order">Order</label>
                                    <input type="number" class="form-control @error('order') is-invalid @enderror"
                                        id="order" name="order" value="{{ old('order', $faq->order) }}">
                                    @error('order')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="status">
                                        <option value="1" {{ old('status', $faq->status) == 1 ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="0" {{ old('status', $faq->status) == 0 ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update FAQ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // Get references to the page and service dropdowns
        var pageDropdown = document.getElementById('page_id');
        var serviceDropdown = document.getElementById('showservices');

        // Add an event listener to the page dropdown
        pageDropdown.addEventListener('change', function() {
            // Check if the selected value in the page dropdown is "0" (Inner Service)
            if (pageDropdown.value === '0') {
                // If "Inner Service" is selected, show the service dropdown
                serviceDropdown.style.display = 'block';
            } else {
                // If a different option is selected, hide the service dropdown
                serviceDropdown.style.display = 'none';
            }
        });

        // Initialize the visibility of the service dropdown based on the initial value of the page dropdown
        if (pageDropdown.value === '0') {
            serviceDropdown.style.display = 'block';
        } else {
            serviceDropdown.style.display = 'none';
        }
    </script>
@endsection
