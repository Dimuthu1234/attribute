@if(session('success') || session('error'))
    <div class="column is-12 is-paddingless">
        @if (session('success'))
            <div class="notification is-warning">
                {{ session('success') }}
                <button class="delete"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="notification is-danger">
                {{ session('error') }}
                <button class="delete"></button>
            </div>
        @endif
    </div>
@endif