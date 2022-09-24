<ul>
    @if($products -> isEmpty())
    <h3 class="text-center text-danger">Product Not Found</h3>
    @else
    @foreach($products as $item)
    <li>
        <img href="{{url('product/details/'.$item->id.'/'.$item->product_slug_en)}}" src="{{asset($item->product_thumbnail)}}" class="search-img">
        <a href="{{url('product/details/'.$item->id.'/'.$item->product_slug_en)}}" style=" color: #477699; ">{{$item->product_name_en}}</a>
        <span style=" color: #e36464; ">| $ {{$item->selling_price}}</span>
    </li>
    <hr style=" margin: 10px 0 5px 0; ">
    @endforeach

    @endif
</ul>