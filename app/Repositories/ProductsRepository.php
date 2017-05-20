<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 13.05.2017
 * Time: 18:13
 */

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
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

    /**
     * check update data product
     * @return $boolen flag update data product
     */
    public function checkUpdateProduct()
    {
        return DB::select('select data from check_cache WHERE id = ?', [1])[0];

    }


    /**
     * set data = 0 after delete cache
     * @return bool
     */
    public function updateCheckCache()
    {
        DB::table('check_cache')
            ->where('id', 1)
            ->update(['data' => 0]);
        return TRUE;
    }
}