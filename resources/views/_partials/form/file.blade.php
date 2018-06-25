<div class="field">
    <label class="label" style="margin-bottom: 0;">{{ $title }}</label>
    <div class="control">
        @if(isset($multiple))
            {!! Form::file($name, ['multiple' => 'multiple', 'class' => 'input ', 'placeholder' => $placeholder ?? '']) !!}
        @else
            {!! Form::file($name, ['class' => 'input', 'placeholder' => $placeholder ?? '']) !!}
        @endif
        {!! $errors->first($name, '<span class="help-block">:message</span>') !!}
    </div>
</div>