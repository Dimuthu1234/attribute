<div style="overflow-x: auto">

    <table class="table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th width="1%"></th>
            <th width="1%"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($types as $type)
            <tr>
                <td><img class="img-list" src="{{asset('images/type/'.$type->image)}}"></td>
                <td>{{ $type->name }}</td>
                <td>{{ $type->description }}</td>
                <td>@modifyButton(route('type.edit', $type->id), 'fa-pencil')</td>
                <td>@deleteButton(route('type.destroy', $type->id), 'fa-pencil')</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
