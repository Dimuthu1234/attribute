@include('_partials.form.text', ['name' => 'name', 'title' => 'Name', 'placeholder' => 'Name'])
@include('_partials.form.textarea', ['name' => 'description', 'title' => 'Description', 'placeholder' => 'Description'])
@include('_partials.form.file', ['name' => 'image', 'title' => 'Type Image', 'placeholder' => 'Image'])
@include('_partials.form.continue', ['value' => 'Save'])