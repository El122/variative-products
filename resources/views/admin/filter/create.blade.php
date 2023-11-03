<form action="{{route('admin.filter.store', ['category' => $category])}}" method="POST">
    @csrf
    @include('admin.filter._form')
</form>
