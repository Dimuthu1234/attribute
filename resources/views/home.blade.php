@extends('layouts.main')

@section('sub_content')
    @include('_partials._breadcrumb', [
    'one_href' => route('home'), 'one' => 'Attribute',
    'two_href' => route('home'), 'two' => 'Admin',
    'three_href' => '', 'three' => ''
    ])
    <section class="hero is-info welcome is-small">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Hello, {{ Auth::user()->name }}.
                </h1>
                <h2 class="subtitle">
                    I hope you are having a great day!
                </h2>
            </div>
        </div>
    </section>
    <section class="info-tiles">
        <div class="tile is-ancestor has-text-centered">
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <p class="title">439k</p>
                    <p class="subtitle">Attribute Labels</p>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <p class="title">59k</p>
                    <p class="subtitle">Master Categories</p>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <p class="title">3.4k</p>
                    <p class="subtitle">Types</p>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <p class="title">19</p>
                    <p class="subtitle">Products</p>
                </article>
            </div>
        </div>
    </section>
@endsection
