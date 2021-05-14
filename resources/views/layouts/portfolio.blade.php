@extends('layouts.base')
@section('scripts')
    <script src="{{ mix('js/portfolio.js', 'assets') }}" type="module" defer></script>
@endsection
@section('styles')
    <link href="{{ mix('css/portfolio.css', 'assets') }}" rel="stylesheet">
@endsection()
