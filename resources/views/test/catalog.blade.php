@if($products)
    @foreach($products as $product)
        {{ var_dump($product->getattributes()) }}
    @endforeach
    {{ $products->links() }}
@else 
    Пусто
@endif    