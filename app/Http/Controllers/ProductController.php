<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Brand;
use Illuminate\Http\Request;
use DB;
use Image;

class ProductController extends Controller
{
	public function index()
    {
		$categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();
        return view('admin.product.add-product',[
                       'categories' =>   $categories  ,
                       'brands' => $brands
        ]);

	}
	protected function productInfoValidate($request)
    {
        $this->validate($request,[
            'product_name' => 'required',
            'product_price'=> 'required',
		    'product_quantity' =>'required',
		    'short_description' => 'required',
		    'long_description' => 'required',
            'product_image'     => 'required',
            'publication_status' => 'required'

        ]);
    }

    protected function productImageUpload($request)
    {
        $productImage   = $request->file('product_image');
        //$imageName   = $productImage->getClientOriginalName();   //getting original image name
        $filetype = $productImage->getClientOriginalExtension();
        $imageName = $request->product_name.'.'.$filetype;       //customized image name 
        $directory      = 'product-image/';        //image will be saved in this directory
        $ImageUrl       = $directory.$imageName;
        //  $productImage  ->move($directory,$ImageUrl);
        Image::make($productImage)->resize(200,200)->save($ImageUrl);  //image upload
        return $ImageUrl;         
       
	}
	protected function saveproductinfo($request,$ImageUrl)
    {
		$product = new Product();
		$product-> category_id = $request->category_id;
        $product-> brand_id = $request->brand_id;
        $product-> product_name = $request -> product_name;
		$product-> product_price = $request -> product_price;
		$product-> product_quantity = $request -> product_quantity;
		$product-> short_description = $request -> short_description;
		$product-> long_description = $request -> long_description;
        $product-> product_image = $ImageUrl;
        $product-> publication_status = $request -> publication_status;
        $product->save();
    }
	public function saveProduct(Request $request){
		$this->productInfoValidate($request);
		$ImageUrl = $this->productImageUpload($request);
		$this->saveproductinfo($request, $ImageUrl);
		
		return redirect('/product/add')->with('message', 'Product  info saved successfully');
	 }
 
	 public function manageProductInfo(){
		
		$products = DB::table('products')
					->join('categories' , 'products.category_id' , '=' , 'categories.id' )
					->join('brands' , 'products.brand_id' , '=' , 'brands.id' )
					->SELECT( 'products.*' , 'categories.category_name' , 'brands.brand_name')
                    ->get();
        
      // return $products;    
              
       return view('admin.product.manage-product', ['products'=> $products]);
     }
     
     public function unpublishedProduct($id){
        $product = Product::find($id);
        $product->publication_status = 0;
        $product->save();

        return redirect('/product/manage')->with('message', 'product info unpublished');
    }

      public function publishedProduct($id){
        $product = Product::find($id);
        $product->publication_status = 1;
        $product->save();

        return redirect('/product/manage')->with('message', 'product info published');
    }
    
    public function editProduct($id){

        $product = Product::find($id);
        $categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();            
        return view('admin.product.edit-product', [
            'categories' =>   $categories  ,
            'brands' => $brands,
            'product'=>$product
        ]);
    }

    protected function updateProductInfo($request, $ImageUrl){

        $product = Product ::find($request->product_id);
		$product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product-> product_name = $request -> product_name;
		$product-> product_price = $request -> product_price;
		$product-> product_quantity = $request -> product_quantity;
		$product-> short_description = $request -> short_description;
		$product-> long_description = $request -> long_description;
        $product-> product_image = $ImageUrl;
        $product-> publication_status = $request -> publication_status;
        $product->save();
    }

    public function updateProduct(Request $request){

        $this->productInfoValidate($request);
		$ImageUrl = $this->productImageUpload($request);
        $this->updateProductInfo($request, $ImageUrl);

        return redirect('/product/manage')->with('message', 'Product  info updated successfully');
      // return $products;        
      // return view('admin.product.manage-product', ['products'=> $products]);

    }


    public function deleteProduct($id){

        $product = Product::find($id);
        $product-> delete();

        return redirect('/product/manage')->with('message', 'product info deleted');
    }










}
