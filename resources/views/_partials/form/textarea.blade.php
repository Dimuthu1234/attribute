<div class="field">
  <label class="label">{{ $title }}</label>
  <div class="control">
		{!! Form::textarea($name, $default ?? null, ['class' => $errors->has($name) ? 'textarea is-danger' : 'textarea', 'placeholder' => $placeholder ?? '', 'style' => 'height: 200px']) !!}
{!! $errors->first($name, '<span class="help is-danger">:message</span>') !!}
  </div>
</div>
