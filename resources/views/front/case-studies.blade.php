@extends('front.layouts.app')
@section('meta')
    <title>{{ $page->meta_title ?? '' }} </title>
    <meta name="description" content="{{ $page->meta_desc ?? '' }}">
    <meta name="keywords" content="{{ $page->meta_keyword ?? '' }}">
@endsection
@section('css')
@endsection
@section('content')
    <section>
        <div class="row">
            <div class="col-lg-12">

                <img src="{{ frontImage('comingsoon.png') }}" alt="" srcset="" style="    width: 100%;">

            </div>
        </div>
    </section>
    <div class="break"></div>
@endsection
