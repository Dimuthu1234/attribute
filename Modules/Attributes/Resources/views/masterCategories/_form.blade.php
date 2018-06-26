@include('_partials.form.text', ['name' => 'name', 'title' => 'Name', 'placeholder' => 'Name'])
@include('_partials.form.textarea', ['name' => 'description', 'title' => 'Description', 'placeholder' => 'Description'])
@include('_partials.form.select', ['name' => 'parent_id', 'title' => 'Parent Category', 'placeholder' => 'Parent Category', 'list' => $masterCategories])
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
        $(function() {
            $('#attribute_label_list').select2({ placeholder: 'Choose attribute labels' });
        });
    </script>
@endpush