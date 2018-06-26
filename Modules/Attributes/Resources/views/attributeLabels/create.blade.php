@extends('layouts.main')

@section('sub_content')
    @include('_partials._breadcrumb', [
    'one_href' => route('home'), 'one' => 'Attribute',
    'two_href' => route('attribute_label.index'), 'two' => 'Label',
    'three_href' => route('attribute_label.index'), 'three' => 'Create'
    ])

    <section class="info-tiles">
        <div class="wrapping">
            <h2 class="title is-2">Add Attribute Label</h2>
            <hr class="hr">
            {!! Form::open(['files' => true, 'route' => 'attribute_label.store']) !!}
            @include('attributes::attributeLabels._form')
            {!! Form::close() !!}
        </div>
    </section>
@endsection