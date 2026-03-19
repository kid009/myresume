@extends('layouts.app')

@section('title', 'Mark Andersen - Creative Designer Portfolio')

@section('content')
<!-- Hero Section -->
@include('portfolio.partials.hero_section')
<!-- /Hero Section -->

<!-- About Section -->
@include('portfolio.partials.about_section')
<!-- /About Section -->

<!-- Stats Section -->
@include('portfolio.partials.stats_section')
<!-- /Stats Section -->

<!-- Skills Section -->
@include('portfolio.partials.skills_section')
<!-- /Skills Section -->

<!-- Resume Section -->
@include('portfolio.partials.resume_section')
<!-- /Resume Section -->

<!-- Portfolio Section -->
@include('portfolio.partials.portfolio_section')
<!-- /Portfolio Section -->

<!-- Services Section -->
@include('portfolio.partials.services_section')
<!-- /Services Section -->

<!-- Testimonials Section -->
@include('portfolio.partials.testimonials_section')
<!-- /Testimonials Section -->

<!-- Contact Section -->
@include('portfolio.partials.contact_section')
<!-- /Contact Section -->
@endsection
