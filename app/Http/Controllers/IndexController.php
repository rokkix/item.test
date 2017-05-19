<?php

namespace App\Http\Controllers;


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

    public function index() {
        $catalogs = $this->getProducts();
        return view(env('THEME').'.catalog')->with('products',$catalogs); 
        
    }
    public function show($slug) {

    }

    public function getProducts() {
        $catalogs = $this->p_rep->get('*',2,1);
        return $catalogs;
    }
    
}
