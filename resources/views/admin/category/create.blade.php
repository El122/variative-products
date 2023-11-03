<form action="{{route('admin.category.store')}}" method="POST">
    @csrf
    @include('admin.category._form')
</form>
