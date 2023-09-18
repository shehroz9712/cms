@extends('admin.layouts.app')

@section('css')
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">service</div>

                <div class="card-body">

                    <form action="{{ route('faqs.store') }}" method="POST" role="form">
                        @csrf
                        @method('POST')

                        <div class="row">

                            <div class="col-lg-4">

                                <div class="form-group">
                                    <label for="question">Question</label>
                                    <input type="text" class="form-control @error('question') is-invalid @enderror"
                                        style="padding: 10px;" id="question" name="question" value="{{ old('question') }}">
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
                                    <textarea class="form-control  " id="answer" name="answer">{{ old('answer') }}</textarea>

                                </div>
                            </div>



                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="page_id">Page</label>
                                    <select class="form-select @error('page_id') is-invalid @enderror" id="page_id"
                                        name="page_id" required>
                                        <option value="">Select page</option>
                                        <option value="0">Inner Service</option>

                                        @foreach ($pages as $page)
                                            <option value="{{ $page->id }}">{{ $page->title }}</option>
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
                                            <option value="{{ $service->id }}">{{ $service->title }}</option>
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
                                        id="order" name="order" value="{{ old('order') }}">
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
                                    <select class="form-control @error('status') is-invalid @enderror" id="status"
                                        name="status">
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>
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

                        <button type="submit" class="btn btn-primary">Submit</button>
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

{{-- <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="step_heading_1">Step 1 Heading</label>
                                        <input type="text"
                                            class="form-control @error('step_heading_1') is-invalid @enderror"
                                            id="step_heading_1" name="step_heading_1" value="{{ old('step_heading_1') }}">
                                        @error('step_heading_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-8">

                                    <div class="form-group">
                                        <label for="step_1">Step 1 Description</label>
                                        <textarea class="form-control ckeditor @error('step_1') is-invalid @enderror" id="step_1" name="step_1">{{ old('step_1') }}</textarea>
                                        @error('step_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">

                                    <div class="form-group">
                                        <label for="step_heading_2">Step 2 Heading</label>
                                        <input type="text"
                                            class="form-control @error('step_heading_2') is-invalid @enderror"
                                            id="step_heading_2" name="step_heading_2"
                                            value="{{ old('step_heading_2') }}">
                                        @error('step_heading_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-8">

                                    <div class="form-group">
                                        <label for="step_2">Step 2 Description</label>
                                        <textarea class="form-control ckeditor @error('step_2') is-invalid @enderror" id="step_2" name="step_2">{{ old('step_2') }}</textarea>
                                        @error('step_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">

                                    <div class="form-group">
                                        <label for="step_heading_3">Step 3 Heading</label>
                                        <input type="text"
                                            class="form-control @error('step_heading_3') is-invalid @enderror"
                                            id="step_heading_3" name="step_heading_3"
                                            value="{{ old('step_heading_3') }}">
                                        @error('step_heading_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-8">

                                    <div class="form-group">
                                        <label for="step_3">Step 3 Description</label>
                                        <textarea class="form-control ckeditor @error('step_3') is-invalid @enderror" id="step_3" name="step_3">{{ old('step_3') }}</textarea>
                                        @error('step_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">

                                    <div class="form-group">
                                        <label for="step_heading_4">Step 4 Heading</label>
                                        <input type="text"
                                            class="form-control @error('step_heading_4') is-invalid @enderror"
                                            id="step_heading_4" name="step_heading_4"
                                            value="{{ old('step_heading_4') }}">
                                        @error('step_heading_4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-8">

                                    <div class="form-group">
                                        <label for="step_8">Step 4 Description</label>
                                        <textarea class="form-control ckeditor @error('step_4') is-invalid @enderror" id="step_4" name="step_4">{{ old('step_4') }}</textarea>
                                        @error('step_4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">

                                    <div class="form-group">
                                        <label for="step_heading_5">Step 5 Heading</label>
                                        <input type="text"
                                            class="form-control @error('step_heading_5') is-invalid @enderror"
                                            id="step_heading_5" name="step_heading_5"
                                            value="{{ old('step_heading_5') }}">
                                        @error('step_heading_5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-8">

                                    <div class="form-group">
                                        <label for="step_5">Step 5 Description</label>
                                        <textarea class="form-control ckeditor @error('step_5') is-invalid @enderror" id="step_5" name="step_5">{{ old('step_5') }}</textarea>
                                        @error('step_5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
