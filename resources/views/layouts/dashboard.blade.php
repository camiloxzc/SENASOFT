@extends('layouts.app')

@section('content')
    {{-- Sidebar --}}
    @include('includes.sidebar')

    {{-- Main panel --}}
    <div class="main-panel">
        {{-- Navbar --}}
        @include('includes.nav')

        {{-- Content --}}
        <div class="content">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @yield('dashboard-content')
            </div>
        </div>

        {{-- Footer --}}
        @include('includes.footer')
    </div>
@endsection
