<label>
    Название
    <input type="text" name="name" value="{{ old('name', isset($category) ? $category->name : null)}}">
    @if ($errors->has('name'))
        <span><strong>{{ $errors->first('name') }}</strong></span>
    @endif
</label>
<button>Сохранить</button>
