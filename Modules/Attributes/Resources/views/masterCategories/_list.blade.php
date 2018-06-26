<div style="overflow-x: auto">

    <table class="table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Parent Category</th>
            <th>Attribute Labels</th>
            <th>Description</th>
            <th width="1%"></th>
            <th width="1%"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($masterCategories as $masterCategory)
            <tr>
                <td><img class="img-list" src="{{asset('images/masterCategory/'.$masterCategory->image)}}"></td>
                <td>{{ $masterCategory->name }}</td>
                <td>{{ $masterCategory->parent == null ? '-':$masterCategory->parent->name}}</td>
                <td>{{ $masterCategory->attributeLabels->implode('name', ' | ') }}</td>
                <td>{{ $masterCategory->description }}</td>
                <td>@modifyButton(route('master_category.edit', $masterCategory->id), 'fa-pencil')</td>
                <td>@deleteButton(route('master_category.destroy', $masterCategory->id), 'fa-pencil')</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>