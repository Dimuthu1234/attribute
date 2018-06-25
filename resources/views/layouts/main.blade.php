@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            @include('_partials._side_menu')
            <div class="column is-9">
                @yield('sub_content')
            </div>
        </div>
    </div>
@endsection