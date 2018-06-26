@extends('layouts.main')

@section('sub_content')
    @include('_partials._breadcrumb', [
    'one_href' => route('home'), 'one' => 'Attribute',
    'two_href' => route('master_category.index'), 'two' => 'Master Category',
    'three_href' => route('master_category.edit', $masterCategory->id), 'three' => 'Edit'
    ])

    <section class="info-tiles">
        <div class="wrapping">
            <h2 class="title is-2">Edit Master Category</h2>
            <hr class="hr">
            {!! Form::model($masterCategory, ['files' => true, 'route' => ['master_category.update', $masterCategory->id], 'method' => 'PATCH']) !!}
            @include('attributes::masterCategories._form')
            {!! Form::close() !!}
        </div>
    </section>
@endsection