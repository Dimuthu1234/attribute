@if(isset($navigate))

    <div class="field">
        {!! Form::label($name, $title, ['class' => 'label']) !!}
        <div class="control input-container">
            {!! Form::select($name, ( isset($nullable) ? $list->prepend('-', '') : $list ), $default ?? null, ['class' => 'form-control input-sm', 'onChange' => 'navigate(event, this)']) !!}
            {!! $errors->first($name, '<span class="help-block">:message</span>') !!}
        </div>
    </div>

@else

    <div class="field">
        {!! Form::label($name, $title, ['class' => 'label']) !!}
        <div class="control input-container">
            {!! Form::select($name, ( isset($nullable) ? $list->prepend('-', '') : $list ), $default ?? null, ['class' => 'form-control input-sm', 'style' => 'width: 100%']) !!}
            {!! $errors->first($name, '<span class="help-block">:message</span>') !!}
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() { $('#{{ $name }}').select2(); });
        </script>
    @endpush

@endif