<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use DB;

class BrandController extends Controller
{
    //
    public function index()
    {
        
        return view('admin.brand.add-brand');
    }
    
    public function saveBrandInfo(Request $request){
        $this-> validate($request,[
              'brand_name' => 'required|regex:/^[\pL\s-]+$/u|max:15|min:5',
              'brand_description' => 'required',
              'publication_status' =>'required'
        ]);

       $brand = new Brand();
       $brand->brand_name         = $request->brand_name ;
       $brand->brand_description  = $request->brand_description;
       $brand->publication_status = $request->publication_status;
       $brand->save();

       return redirect('/brand/add')->with('message', 'brand info saved successfully');
        
     }
    public function manageBrandInfo(){
        $brands = Brand::all();
    	return view('admin.brand.manage-brand',['brands'=>$brands]);
    }
    public function unpublishedBrandInfo($id){
        $brand = Brand::find($id);
        $brand->publication_status = 0;
        $brand->save();

        return redirect('/brand/manage')->with('message', 'brand info unpublished');
    }

      public function publishedbrandInfo($id){
        $brand = Brand::find($id);
        
        $brand->publication_status = 1;
        $brand->save();

        return redirect('/brand/manage')->with('message', 'brand info published');
    }
    
    public function editbrandInfo($id){
         $brand = Brand::find($id);

        return view('admin.brand.edit-brand', ['brand'=>$brand]);
    }

    public function updatebrandInfo(Request $request){
        $brand = Brand::find($request->brand_id);

        $brand->brand_name =  $request->brand_name ;
        $brand->brand_description =  $request->brand_description;
        $brand->publication_status   =  $request->publication_status;
        $brand->save();

        return redirect('/brand/manage')->with('message', 'brand info updated');
    }

    public function deletebrandInfo($id){

        $brand = Brand::find($id);
        $brand-> delete();

        return redirect('/brand/manage')->with('message', 'brand info deleted');
    }
}
