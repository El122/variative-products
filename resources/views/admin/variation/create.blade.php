<form action="{{route('admin.product.variation.store', ['product' => $product])}}" method="POST">
    @csrf

    <label>
        Цена
        <input type="text" name="price" value="{{old('price')}}">
    </label>
    <label>
        Описание
        <input type="text" name="description" value="{{old('description')}}">
    </label>

    @foreach($product->category->filters as $filter)
        <label>
            {{$filter->name}}
            <input type="text" name="variation[{{$filter->id}}]" value="{{old('variation[' . $filter->id . ']')}}">
        </label>
    @endforeach
    <button>Сохранить</button>
</form>
