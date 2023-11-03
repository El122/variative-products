<form action="{{route('admin.category.update', ['category' => $category])}}" method="POST">
    @csrf
    @include('admin.category._form')
</form>
