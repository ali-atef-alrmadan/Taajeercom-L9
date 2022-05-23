@extends('layouts.user.app')

@section('title', 'Home')

@section('content')

    @include('components.sections.home.hero')

    @include('components.sections.home.search')

    @include('components.sections.home.cars')

    @include('components.sections.home.footer')

@endsection
