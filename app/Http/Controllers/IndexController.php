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

    public function __construct(ProductsRepository $p_rep)
    {
        $this->p_rep = $p_rep;
    }

    public function index(Request $request)
    {
        $sort = $request->only('sort');

        $catalogs = Cache::rememberForever('sort:' . implode($request->only('sort', 'page')), function () use ($sort) {
            $res = $this->getProducts($sort);
            return $res;

        });


        if (isset($sort['sort'])) {

            $catalogs->setPath('?sort=' . $sort['sort']);
        }

        return view(env('THEME') . '.catalog')->with('products', $catalogs);

    }

    public function show($slug)
    {
        $product = Cache::rememberForever('product:' . $slug, function () use ($slug) {
            $res = $this->p_rep->one($slug);
            return $res;

        });


        return view(env('THEME') . '.product')->with('product', $product);

    }

    public function getProducts($sort)
    {
        $catalogs = $this->p_rep->get('*', Config::get('settings.paginate'), $sort);
        return $catalogs;
    }


}
