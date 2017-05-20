@if($products)
    @foreach($products as $product)
        {!! var_dump($product->getattributes()) !!}
        <p><a href="{{ route('slug',['slug'=>$product->slug]) }}">ссылка на {{$product->slug}} </a></p>

    @endforeach
    {{ $products->links() }}
    <div>
        <p><a href="{{ route('cat')}}?sort=sort_date">сортировать по дате создания</a></p>
        <p><a href="{{ route('cat')}}?sort=sort_name_desc">сортировать в обратном порядке</a></p>
        <p><a href="{{ route('cat')}}?sort=sort_name">сортировать по уменьш</a></p>
    </div>
@else 
    Пусто
@endif    