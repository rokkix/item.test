@if($product)

    {{ var_dump($product->getattributes()) }}

   @else
    Пусто
@endif 
