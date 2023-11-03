<form action="{{route('admin.product.variation.update', ['variation' => $variation])}}" method="POST">
    @csrf

    <label>
        Цена
        <input type="text" name="price" value="{{old('price')}}">
    </label>
    <label>
        Описание
        <input type="text" name="description" value="{{old('description')}}">
    </label>

    @foreach($variation->filters as $filter)
        <label>
            {{$filter->filter->name}}
            <input type="text" name="variation[{{$filter->filter_id}}]"
                   value="{{old('variation[' . $filter->filter_id . ']', $filter->value)}}">
        </label>
    @endforeach
    <button>Сохранить</button>
</form>
