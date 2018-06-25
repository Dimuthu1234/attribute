<div class="field">
    <label class="label">{{ $title }}</label>
    <div class="control input-container">
        <input type="password" name="{{ $name }}" class="input {{ $errors->has($name) ? 'input is-danger' : 'input' }}" />
        <label>{{$placeholder}}</label>
        @if(isset($help))<span class="help is-default">{{ $help }}</span>@endif
        {!! $errors->first($name, '<span class="help is-danger">:message</span>') !!}
    </div>
</div>