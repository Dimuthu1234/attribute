@extends('layouts.main')

@section('sub_content')
    @include('_partials._breadcrumb', [
    'one_href' => route('home'), 'one' => 'Attribute',
    'two_href' => route('master_category.index'), 'two' => 'Master Category',
    'three_href' => route('master_category.index'), 'three' => 'List'
    ])

    <section class="info">
        <div class="columns">
            <div class="column">
                @include('_partials.alert.sessionsMessage')
            </div>
        </div>
        <div class="add-button is-pulled-right">
            <a href="{{ route('master_category.create') }}">
                <button class="button is-create">
                    <i class="fa fa-plus"></i>&nbsp; Add Master Category
                </button>
            </a>
        </div>
        <div class="columns">
            <div class="column">
                @include('attributes::masterCategories._list')
            </div>
        </div>
    </section>
@endsection