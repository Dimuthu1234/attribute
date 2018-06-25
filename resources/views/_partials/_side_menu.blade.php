<div class="column is-3">
    <aside class="menu">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
            <li><a class="is-active" href="{{ route('home') }}">Dashboard</a></li>
            <li><a>Products</a></li>
        </ul>
        <p class="menu-label">
            Attribute Master Cruds
        </p>
        <ul class="menu-list">
            {{--<li><a>Team Settings</a></li>--}}
            <li>
                <a>Masters</a>
                <ul>
                    <li><a href="{{ route('type.index') }}">Types</a></li>
                    <li><a href="{{ route('master_category.index') }}">Master Categories</a></li>
                    <li><a href="{{ route('attribute_label.index') }}">Attribute Label</a></li>
                </ul>
            </li>
            {{--<li><a>Invitations</a></li>--}}
            {{--<li><a>Cloud Storage Environment Settings</a></li>--}}
            {{--<li><a>Authentication</a></li>--}}
        </ul>
        {{--<p class="menu-label">--}}
            {{--Transactions--}}
        {{--</p>--}}
        {{--<ul class="menu-list">--}}
            {{--<li><a>Payments</a></li>--}}
            {{--<li><a>Transfers</a></li>--}}
            {{--<li><a>Balance</a></li>--}}
        {{--</ul>--}}
    </aside>
</div>