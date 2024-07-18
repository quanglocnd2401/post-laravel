<div>
    @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->parent_id }}</td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
            <th>
                <a class="btn btn-primary" href="#">Xem</a>
                <a class="btn btn-secondary" href="{{route('admin.categories.edit', $category )}}">Sửa</a>

                <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </th>
        </tr>
        @if ($category->children->isNotEmpty())
            <x-admin-category :categories="$category->children" />
        @endif
    @endforeach
</div>
