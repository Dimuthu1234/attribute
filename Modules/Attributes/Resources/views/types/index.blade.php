@extends('layouts.main')

@section('sub_content')
    @include('_partials._breadcrumb', [
    'one_href' => route('home'), 'one' => 'Attribute',
    'two_href' => route('type.index'), 'two' => 'Type',
    'three_href' => route('type.index'), 'three' => 'List'
    ])

    <section class="info">
            <div class="columns">
                <div class="column">
                    @include('_partials.alert.sessionsMessage')
                </div>
            </div>
            <div class="add-button is-pulled-right">

                {{--<div class="column">--}}
                    <a href="{{ route('type.create') }}">
                        <button class="button is-create">
                            <i class="fa fa-plus"></i>&nbsp; Add Type
                        </button>
                    </a>
                {{--</div>--}}
            </div>


            <div class="columns">
                <div class="column">
                @include('attributes::types._list')
                </div>
            </div>
    </section>
@endsection