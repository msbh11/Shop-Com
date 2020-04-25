<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Brand;
use Illuminate\Http\Request;

class NewshopController extends Controller
{
    //
   
    public function index()
    { 
        //$categories  = Category:: where ('publication_status', 1)->get();
        $newProducts = Product :: where('publication_status', 1)
                                  ->orderBy('id', 'ASC')
                                  //->skip(2)
                                  ->take(8)
                                  ->get();
        //return $newProducts;

    	return view('front-end.home.home', [
            'newProducts'=>$newProducts
        ]);
    }
	
	public function categoryProduct($id)
    { 
       $categoryProducts = Product::where('category_id', $id) 
                                    ->where('publication_status', 1)
                                    ->get();

    	return view('front-end.category.category-content',[
            'categoryProducts' => $categoryProducts 

        ]);

        /*$categories  = Category:: where ('publication_status', 1)->get();

        return view('front-end.category.category-content',[
            'categories' => $categories
        ]);*/
    }

    public function product()
    { 
    	return view('front-end.product.product');
    }

    public function checkout()
    { 
    	return view('front-end.product.product-checkout');
    }

    public function cart()
    { 
    	return view('front-end.product.product-cart');
    }

    public function productDetails($id)
    {
        $productDetails = Product::find($id);
        return view('front-end.product.product_details',[
            'productDetails' => $productDetails
        ]);
    }

}
