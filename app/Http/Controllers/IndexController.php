<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cache;
use App\Product;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    protected $p_rep;
    protected $update_cache;

    /**
     * check update product and update cache
     * IndexController constructor.
     * @param ProductsRepository $p_rep
     */
    public function __construct(ProductsRepository $p_rep)
    {
        $this->p_rep = $p_rep;
        $this->update_cache = $this->p_rep->checkUpdateProduct();
        if($this->update_cache->data) {
            Cache::flush();
            $this->p_rep->updateCheckCache();
        }
    }


    /**
     * 
     * @param Requests\ProductRequest $request
     * @return $this
     */
    public function index(Requests\ProductRequest $request)
    {
        $sort = $request->only('sort');
        $catalogs = Cache::rememberForever('sort:' . implode($request->only('sort', 'page')), function () use ($sort) {
            $res = $this->getProducts($sort);
            return $res;

        });

    //generate path if exist get parametr
        if (isset($sort['sort'])) {

            $catalogs->setPath('?sort=' . $sort['sort']);
        }

        return view(Config::get('settings.theme') . '.catalog')->with('products', $catalogs);

    }

    /**
     * get one product by slug
     * @param $slug
     * @return $this
     */
    public function show($slug)
    {
        $product = Cache::rememberForever('product:' . $slug, function () use ($slug) {
            $res = $this->p_rep->one($slug);
            return $res;

        });


        return view(Config::get('settings.theme') . '.product')->with('product', $product);

    }

    /**
     * return collection products sort by name or date
     * @param $sort
     * @return mixed
     */
    public function getProducts($sort)
    {
        $catalogs = $this->p_rep->get('*', Config::get('settings.paginate'), $sort);
        return $catalogs;
    }


}
