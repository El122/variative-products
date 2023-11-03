@foreach($categories as $category)
    <a href="{{route('admin.category.get', ['category' => $category])}}">{{$category->name}}</a>
@endforeach
