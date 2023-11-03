<label>
    Название
    <input type="text" name="name" value="{{ old('name', isset($product) ? $product->name : null)}}">
    @if ($errors->has('name'))
        <span><strong>{{ $errors->first('name') }}</strong></span>
    @endif
</label>
<label>
    Код
    <input type="text" name="vendor" value="{{ old('vendor', isset($product) ? $product->vendor : null)}}">
    @if ($errors->has('vendor'))
        <span><strong>{{ $errors->first('vendor') }}</strong></span>
    @endif
</label>
<label>
    Описание
    <input type="text" name="description"
           value="{{ old('description', isset($product) ? $product->description : null)}}">
    @if ($errors->has('description'))
        <span><strong>{{ $errors->first('description') }}</strong></span>
    @endif
</label>

{{--@foreach($category->filters as $filter)--}}
{{--    <label>--}}
{{--        {{$filter->name}}--}}
{{--        <input type="text" name="variation[{{$filter->id}}]" value="{{ old('variation[' . $filter->id . ']')}}">--}}
{{--        @if ($errors->has('variation[' . $filter->id . ']'))--}}
{{--            <span><strong>{{ $errors->first('variation[' . $filter->id . ']') }}</strong></span>--}}
{{--        @endif--}}
{{--    </label>--}}
{{--@endforeach--}}

<button>Сохранить</button>
