@extends('layouts.front')

@section('content')
  <!-- Hero Section -->
  @include('partials.hero')
  <!-- /Hero Section -->

  <!-- About Section -->
  @include('partials.about')
  <!-- /About Section -->

  <!-- Resume Section -->
  @include('partials.resume')
  <!-- Resume Section -->

  <!-- Portfolio Section -->
  @include('partials.portfolio')
  <!-- /Portfolio Section -->

  <!-- Contact Section -->
  @include('partials.contact')
  <!-- /Contact Section -->
@endsection
