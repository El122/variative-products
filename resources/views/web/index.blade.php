@foreach($categories as $category)
    <div>
        <p>{{$category->name}}</p>
        <form>
            @foreach($category->filters as $filter)
                <label>
                    {{$filter->name}}
                    @if($filter->type == \App\Enums\FilterType::CHECKBOX->value)
                    @elseif($filter->type == \App\Enums\FilterType::RADIO->value)
                    @elseif($filter->type == \App\Enums\FilterType::SLIDER->value)
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
