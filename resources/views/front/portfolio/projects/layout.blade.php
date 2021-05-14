@extends('layouts.base')
    @section('scripts')
        <script src="{{ mix('js/project.js', 'assets') }}" type="module" defer></script>
    @endsection
    @section('styles')
        <link href="{{ mix('css/project.css', 'assets') }}" rel="stylesheet">
    @endsection
@section('footer')
@include('front.portfolio.partials.footer')
@endsection
