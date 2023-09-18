@extends('front.layouts.app')
@section('meta')
    <title>{{ $page->meta_title ?? '' }} </title>
    <meta name="description" content="{{ $page->meta_desc ?? '' }}">
    <meta name="keywords" content="{{ $page->meta_keyword ?? '' }}">
@endsection

@section('content')
    <section>
        <div class="row">
            <div class="col-lg-12">
                @foreach ($images as $image)
                    <img src="{{ frontImage('images/' . $image) }}" alt="PDF Page">
                @endforeach
            </div>
        </div>
    </section>
    <div class="break"></div>
@endsection
