@extends('layouts.app')

@section('content')
<!-- Hero Section -->
@include('portfolio.partials.hero_section')
<!-- /Hero Section -->

<!-- About Section -->
@include('portfolio.partials.about_section')
<!-- /About Section -->

<!-- Resume Section -->
@include('portfolio.partials.resume_section')
<!-- /Resume Section -->

<!-- Portfolio Section -->
@include('portfolio.partials.portfolio_section')
<!-- /Portfolio Section -->

<!-- Services Section -->
@include('portfolio.partials.services_section')
<!-- /Services Section -->

<!-- Contact Section -->
@include('portfolio.partials.contact_section')
<!-- /Contact Section -->
@endsection
