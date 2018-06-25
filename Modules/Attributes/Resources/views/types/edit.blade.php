@extends('layouts.main')

@section('sub_content')
    @include('_partials._breadcrumb', [
    'one_href' => route('home'), 'one' => 'Attribute',
    'two_href' => route('home'), 'two' => 'Type',
    'three_href' => route('type.edit', $type->id), 'three' => 'Edit'
    ])

    <section class="info-tiles">
        <div class="wrapping">
            <h2 class="title is-2">Edit Type</h2>
            <hr class="hr">
            {!! Form::model($type, ['files' => true, 'route' => ['type.update', $type->id], 'method' => 'PATCH']) !!}
            @include('attributes::types._form')
            {!! Form::close() !!}
        </div>
    </section>
@endsection