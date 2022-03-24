<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProResource;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function index(){
        $products = Product::all();

        return $this->sendResponse(ProductResource::collection($products), 'All products Retrieved  Successfully');
    }

//GET ALL CATEGORIES
    public function categories(){
        $categories = Category::whereNull('parent_category_id')->get();
        return $this->sendResponse($categories, 'All categories Retrieved  Successfully');
    }
    //GET LATEST PRODUCT
    public function latest(){
        $products = Product::inRandomOrder()->take(3)->get();
        return $this->sendResponse(ProductResource::collection($products), 'Last 3 product Retrieved  Successfully');
    }
//GET SUB CATEGORY
public function subCategories($id){
    $subCategories = Category::where('parent_category_id','=',$id)->get();
    if($subCategories && !empty($subCategories)){
        return $this->sendResponse($subCategories, 'All Sub categories Retrieved  Successfully');

    }else{
        return $this->sendError('Error', 'No data found !!');

    }
}

//SEARCH
public function search(Request $request){
    if($request->get('search-name')) {
        $search = $request->get('search-name');

        $products=Product::where('name','LIKE',"%$search%")->orWhere('description','LIKE',"%$search%")
        ->orwhereHas('category', function ($query) use ($search){
            $query->where('name','LIKE',"%$search%")->orWhere('description','LIKE',"%$search%");
        })->get();
        return $this->sendResponse(ProductResource::collection($products), 'All Search result Retrieved  Successfully');
    }else{
        return $this->sendError('Error', 'Enter Search name !!');
    }
}


public function single_product($id){


    try
    {
        $product=Product::with('sizes','color','details','review','images')->where('id','=',$id)->first();
        $product->rate=$product->avgRating();

        if($product){

            return $this->sendResponse(ProductResource::make($product), 'Geting Product successfully.');
        }
        else
        {
            return $this->sendError('Invalid Product !');
        }
    } catch (\Exception $e) {
        return $this->sendError($e->getMessage(), 'Error happens!!');
    }
}


}
