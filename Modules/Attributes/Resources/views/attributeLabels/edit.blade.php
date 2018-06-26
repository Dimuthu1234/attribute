@extends('layouts.main')

@section('sub_content')
    @include('_partials._breadcrumb', [
    'one_href' => route('home'), 'one' => 'Attribute',
    'two_href' => route('attribute_label.index'), 'two' => 'Label',
    'three_href' => route('attribute_label.edit', $attributeLabel->id), 'three' => 'Edit'
    ])

    <section class="info-tiles">
        <div class="wrapping">
            <h2 class="title is-2">Edit Attribute Label</h2>
            <hr class="hr">
            {!! Form::model($attributeLabel, ['files' => true, 'route' => ['attribute_label.update', $attributeLabel->id], 'method' => 'PATCH']) !!}
            @include('attributes::attributeLabels._form')
            {!! Form::close() !!}
        </div>
    </section>
@endsection