<div style="overflow-x: auto">

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Types</th>
            <th>Master Categories</th>
            <th width="1%"></th>
            <th width="1%"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($attributeLabels as $attributeLabel)
            <tr>
                <td>{{ $attributeLabel->name }}</td>
                <td>{{ $attributeLabel->types->implode('name', ' | ') }}</td>
                <td>{{ $attributeLabel->masterCategories->implode('name', ' | ') }}</td>
                <td>@modifyButton(route('attribute_label.edit', $attributeLabel->id), 'fa-pencil')</td>
                <td>@deleteButton(route('attribute_label.destroy', $attributeLabel->id), 'fa-pencil')</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>