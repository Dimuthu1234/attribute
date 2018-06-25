<div class="field">
  <label class="label">{{ $title }}</label>
  @if(isset($multiple))
      <div class="control">
         <div class="select">
            {!! Form::select($name, $list, null, ['multiple' => 'multiple', 'class' => 'input']) !!}
         </div>
          @if(isset($help))<span class="help is-default">{{ $help }}</span>@endif
          {!! $errors->first($name, '<span class="help is-danger">:message</span>') !!}
      </div>
  @else
  <div class="control">
      {{--<div class="select is-fullwidth">--}}
      <div class="select">
          {!! Form::select($name, isset($nullable) ? $list->prepend('-- Select --', '') : $list, $default ?? null, ['onChange' => isset($navigate) ? 'navigate(event, this)' : null, 'class' => 'input']) !!}
      </div>
          @if(isset($help))<span class="help is-default">{{ $help }}</span>@endif
          {!! $errors->first($name, '<span class="help is-danger">:message</span>') !!}
      {{--</div>--}}
  </div>
  @endif
</div>
