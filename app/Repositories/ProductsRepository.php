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

    public function get($select = '*',$take = FALSE, $pagination = FALSE, $where = FALSE,$sort = FALSE)
    {
        $builder = $this->model->select($select);
        if ($take) {
            $builder->take($take);
            
        }

        if ($where) {
            $builder->where($where[0], $where[1]);
        }
        if($sort) {

            $builder->orderBy('created_at','desc');
        }

        if ($pagination) {
            return $builder->paginate($pagination);
        }

        return $builder->get();
    }
}