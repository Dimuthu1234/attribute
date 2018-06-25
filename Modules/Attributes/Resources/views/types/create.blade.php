@extends('layouts.main')

@section('sub_content')
    @include('_partials._breadcrumb', [
    'one_href' => route('home'), 'one' => 'Attribute',
    'two_href' => route('type.index'), 'two' => 'Type',
    'three_href' => route('type.create'), 'three' => 'Create'
    ])

    <section class="info-tiles">
        <div class="wrapping">
            <h2 class="title is-2">Add Type</h2>
            <hr class="hr">
            {!! Form::open(['files' => true, 'route' => 'type.store']) !!}
            @include('attributes::types._form')
            {!! Form::close() !!}
        </div>
    </section>
@endsection
