<?php

namespace App\Http\Controllers;


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

        $catalogs = $this->getProducts($sort);

        if (isset($sort['sort'])) {

            $catalogs->setPath('?sort=' . $sort['sort']);
        }

        return view(env('THEME') . '.catalog')->with('products', $catalogs);

    }

    public function show($slug)
    {

        $product = $this->p_rep->one($slug);
        return view(env('THEME') . '.product')->with('product', $product);

    }

    public function getProducts($sort)
    {
        $catalogs = $this->p_rep->get('*', 2, 1, $sort);
        return $catalogs;
    }


}
