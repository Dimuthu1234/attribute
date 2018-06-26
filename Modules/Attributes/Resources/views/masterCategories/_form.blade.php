@include('_partials.form.text', ['name' => 'name', 'title' => 'Name', 'placeholder' => 'Name'])
@include('_partials.form.textarea', ['name' => 'description', 'title' => 'Description', 'placeholder' => 'Description'])
@include('_partials.form.select', ['name' => 'parent_id', 'title' => 'Master Category', 'placeholder' => 'Parent Category', 'list' => $masterCategories])
{{--@include('_partials.form.select', ['name' => 'parent_id', 'title' => 'Category', 'placeholder' => 'Parent Category', 'list' => $masterCategories])--}}
{{--<div class="field">--}}
    {{--<label class="label">Parent Category</label>--}}
    {{--<div class="control">--}}
        {{--<div class="select">--}}
            {{--<select class="parent" name="parent_id">--}}
                {{--@foreach($masterCategories as $masterCategory)--}}
                    {{--<option value="{{ $masterCategory->id }}">{{ $masterCategory->name }}</option>--}}
                    {{--@if($masterCategory->parent)--}}
                        {{--<optgroup label="{{ $masterCategory->name." 's parent category is"}}">--}}
                            {{--<option value="{{ $masterCategory->parent->id }}">{{ $masterCategory->parent->name }}</option>--}}
                        {{--</optgroup>--}}
                    {{--@endif--}}
                {{--@endforeach--}}
            {{--</select>--}}
        {{--</div>--}}
        {{--@if(isset($help))<span class="help is-default">{{ $help }}</span>@endif--}}
        {{--{!! $errors->first('parent_category', '<span class="help is-danger">:message</span>') !!}--}}
    {{--</div>--}}
{{--</div>--}}


<div class="field">
    <label class="label">Assigned Attribute Labels</label>
    <div class="control input-container">
        {!! Form::select('attribute_label_list[]', $attributeLabelList, null, ['id' => 'attribute_label_list', 'class' => 'input', 'multiple']) !!}
    </div>
</div>
@include('_partials.form.file', ['name' => 'image', 'title' => 'Master Category Image', 'placeholder' => 'Image'])
@include('_partials.form.continue', ['value' => 'Save'])

@push('scripts')
    <script>
        $(function () {
            $('#attribute_label_list').select2({
                tags: true,
                placeholder: 'Choose attribute labels'
            });
        });
    </script>
@endpush