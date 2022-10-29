@extends('home_page.master')
@section('content')
    @include('home_page.pages.thanh_phan.slide')
    @include('home_page.pages.thanh_phan.slide_below')
    @include('home_page.pages.thanh_phan.top_categories')
    @include('home_page.pages.thanh_phan.exclusive_products')
    @include('home_page.pages.thanh_phan.trending_product')
    @include('home_page.pages.thanh_phan.logo')
    {{-- @include('home_page.pages.thanh_phan.contact') --}}
@endsection
