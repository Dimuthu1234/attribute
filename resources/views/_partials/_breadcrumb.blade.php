<nav class="breadcrumb" aria-label="breadcrumbs">
    <ul>
        @if(!($three == null))
            @if(!($one == null))
                <li><a href="{{ $one_href }}">{{ $one }}</a></li>@endif
            @if(!($two == null))
                <li><a href="{{ $two_href }}" aria-current="page">{{ $two }}</a></li>@endif
            @if(!($three == null))
                <li class="is-active"><a href="{{ $three_href }}" aria-current="page">{{ $three }}</a></li>@endif
        @else
            @if(!($one == null))
                <li><a href="{{ $one_href }}">{{ $one }}</a></li>@endif
            @if(!($two == null))
                <li class="is-active"><a href="{{ $two_href }}" aria-current="page">{{ $two }}</a></li>@endif
        @endif
    </ul>
</nav>