<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 13.05.2017
 * Time: 18:13
 */

namespace App\Repositories;


use App\Product;

class ProductsRepository
{
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function get($select = '*', $pagination = FALSE, $where = FALSE,$sort = FALSE)
    {
        $builder = $this->model->select($select);
        
        $builder = $this->model->active();

        
        dd($builder->get());
        return $builder->get();
    }
}