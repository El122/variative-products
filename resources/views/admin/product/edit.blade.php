<form action="{{route('admin.product.update', ['product' => $product])}}" method="POST">
    @csrf
    @include('admin.product._form')
</form>
