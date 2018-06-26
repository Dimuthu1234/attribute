@extends('layouts.main')

@section('sub_content')
    @include('_partials._breadcrumb', [
    'one_href' => route('home'), 'one' => 'Attribute',
    'two_href' => route('attribute_label.index'), 'two' => 'Label',
    'three_href' => route('attribute_label.index'), 'three' => 'List'
    ])

    <section class="info">
        <div class="columns">
            <div class="column">
                @include('_partials.alert.sessionsMessage')
            </div>
        </div>
        <div class="add-button is-pulled-right">
            <a href="{{ route('attribute_label.create') }}">
                <button class="button is-create">
                    <i class="fa fa-plus"></i>&nbsp; Add Attribute Label
                </button>
            </a>
        </div>
        <div class="columns">
            <div class="column">
                @include('attributes::attributeLabels._list')
            </div>
        </div>
    </section>
@endsection