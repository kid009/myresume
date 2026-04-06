@extends('layouts.app')

@section('content')
<!-- Hero Section -->
@include('portfolio.partials.hero_section')
<!-- /Hero Section -->
<hr>
<!-- About Section -->
@include('portfolio.partials.about_section')
<!-- /About Section -->
<hr>
<!-- Resume Section -->
@include('portfolio.partials.resume_section')
<!-- /Resume Section -->
<hr>
<!-- Portfolio Section -->
@include('portfolio.partials.portfolio_section')
<!-- /Portfolio Section -->
<hr>
<!-- Services Section -->
@include('portfolio.partials.services_section')
<!-- /Services Section -->
<hr>
<!-- Contact Section -->
@include('portfolio.partials.contact_section')
<!-- /Contact Section -->
@endsection
