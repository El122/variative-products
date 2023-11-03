<form action="{{route('admin.product.store', ['category' => $category])}}" method="POST">
    @csrf
    @include('admin.product._form')
</form>
