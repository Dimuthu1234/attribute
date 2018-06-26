@extends('layouts.main')

@section('sub_content')
    @include('_partials._breadcrumb', [
    'one_href' => route('home'), 'one' => 'Attribute',
    'two_href' => route('master_category.index'), 'two' => 'Master Category',
    'three_href' => route('master_category.index'), 'three' => 'Create'
    ])

    <section class="info-tiles">
        <div class="wrapping">
            <h2 class="title is-2">Add Master Category</h2>
            <hr class="hr">
            {!! Form::open(['files' => true, 'route' => 'master_category.store']) !!}
            @include('attributes::masterCategories._form')
            {!! Form::close() !!}
        </div>
    </section>
@endsection