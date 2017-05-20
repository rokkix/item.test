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

    /**
     * @param string $select
     * @param bool $pagination
     * @param bool $sort
     * @return mixed
     */
    public function get($select = '*', $pagination = FALSE, $sort = FALSE)
    {

        $builder = $this->model->select($select);

        if ($sort['sort'] == 'sort_date') {

            $builder->orderBy('created_at', 'desc');
        }

        if ($sort['sort'] == 'sort_name') {

            $builder->orderBy('name');
        }

        if ($sort['sort'] == 'sort_name_desc') {

            $builder->orderBy('name', 'desc');
        }

        if ($pagination) {
            return $builder->paginate($pagination);
        }

        return $builder->get();
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function one($slug)
    {
        $builder = $this->model->select('*')->slug($slug);
        return $builder->first();


    }
}