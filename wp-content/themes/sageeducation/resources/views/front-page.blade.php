@extends('layouts.app')

@section('content')
    @include('partials.page-header')

    @include('partials/education-block')
    @include('partials/features-block')
    @include('partials/courses-block')
    @include('partials/teachers-block')
    @include('partials/programs-block')
    @include('partials/client-comments-block')
    @include('partials/blog-block')
@endsection
