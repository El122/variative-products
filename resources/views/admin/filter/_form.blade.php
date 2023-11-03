<label>
    Название
    <input type="text" name="name" value="{{ old('name', isset($filter) ? $filter->name : null)}}">
    @if ($errors->has('name'))
        <span><strong>{{ $errors->first('name') }}</strong></span>
    @endif
</label>
<label>
    Тип
    <select name="type">
        @foreach($filterTypes as $type)
            <option
                value="{{$type->value}}" {{old('type', isset($filter) ? $filter->type : null) == $type->value ? 'selected' : ''}}>
                {{$type->label()}}
            </option>
        @endforeach
    </select>
    @if ($errors->has('type'))
        <span><strong>{{ $errors->first('type') }}</strong></span>
    @endif
</label>
<button>Сохранить</button>
