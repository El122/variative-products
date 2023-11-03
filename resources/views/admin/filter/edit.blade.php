<form action="{{route('admin.filter.update', ['filter' => $filter])}}" method="POST">
    @csrf
    @include('admin.filter._form')
</form>
