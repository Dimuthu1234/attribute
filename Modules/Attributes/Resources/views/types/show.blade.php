@extends('layouts.main')

@section('sub_content')
    @include('_partials._breadcrumb', [
    'one_href' => route('home'), 'one' => 'Attribute',
    'two_href' => route('home'), 'two' => 'Type',
    'three_href' => '', 'three' => 'View'
    ])

    <section class="info-tiles">
        <div class="wrapping">
            <h1 class="title is-1">text</h1>
        </div>
    </section>
@endsection