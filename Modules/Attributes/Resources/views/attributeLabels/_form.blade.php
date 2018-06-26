@include('_partials.form.text', ['name' => 'name', 'title' => 'Name', 'placeholder' => 'Name'])
<div class="field">
    <label class="label">Assigned Types</label>
    <div class="control input-container">
        {!! Form::select('type_list[]', $typeList, null, ['id' => 'type_list', 'class' => 'input', 'multiple']) !!}
    </div>
</div>

<div class="field">
    <label class="label">Assigned Master Categories</label>
    <div class="control input-container">
        {!! Form::select('master_category_list[]', $masterCategoryList, null, ['id' => 'master_category_list', 'class' => 'input', 'multiple']) !!}
    </div>
</div>
@include('_partials.form.continue', ['value' => 'Save'])

@push('scripts')
    <script>
        $(function() {
            $('#type_list').select2({ placeholder: 'Choose types' });
        });
    </script>

    <script>
        $(function() {
            $('#master_category_list').select2({ placeholder: 'Choose master categories' });
        });
    </script>
@endpush
