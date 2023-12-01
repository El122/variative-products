@foreach($categories as $category)
    <div>
        <p>{{$category->name}}</p>
        <form>
            @foreach($category->filters as $filter)
                <label>
                    {{$filter->name}}
                    @if($filter->type == \App\Enums\FilterType::CHECKBOX->value)
                        @foreach($filter->variations?->unique('value') as $value)
                            <input type="checkbox" value="{{$value}}">
                        @endforeach
                    @elseif($filter->type == \App\Enums\FilterType::RADIO->value)
                        @foreach($filter->variations?->unique('value') as $value)
                            <input type="radio" value="{{$value}}">
                        @endforeach
                    @elseif($filter->type == \App\Enums\FilterType::SLIDER->value)
                            <input type="range">
                    @endif
                </label>
            @endforeach
        </form>
        @foreach($category->products as $products)
            <div>
                <p>{{$product->name}}</p>
                <p>{{$products->description}}</p>
            </div>
        @endforeach
    </div>
@endforeach
