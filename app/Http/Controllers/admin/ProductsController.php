<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
   public function index()
   {

      $products = product::orderBy('created_at', 'DESC')->get();
      $cats = category::all();
      return view('admin.products', [
         'products' => $products,
         'cats' => $cats
      ]);
   }
   public function productsbydb()
   {
      $products = product::all();
      $cats = category::all();
      return view('welcome', compact('products', 'cats'));
   }

   public function productdetails(Request $request)
   {
      $productSlug = $request->query('product');
      $product = product::where('slug', $productSlug)->firstOrFail();
      $allproducts = product::orderByDesc('created_at')->get();
      return view('product_details', compact('product', 'allproducts'));
   }
   public function Allproducts(){
      $products = product::all();
      return view('products', compact('products'));
  }

   public function store(Request $request)
   {
      $rules = [
         'name' => 'required | min:5',
         'price' => 'required | numeric',
         'description' => 'required | min:10',
      ];
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
         return redirect()->route('products.create')->withInput()->withErrors($validator);
      }
      $product = new product();
      $product->name = $request->input('name');
      $product->category_id = $request->input('category_id');
      $product->slug = \Illuminate\Support\Str::slug($request->input('name')) . '-' . uniqid();
      $product->price = $request->input('price');
      $product->description = $request->input('description');
      $product->available = $request->input('available');
      $product->save();
      if ($request->hasFile('image')) {
         $image = $request->file('image');
         $ext = $image->getClientOriginalExtension();
         $imageName = time() . '.' . $ext;
         $product->image = $imageName;
         $image->move(public_path('uploads/products'), $imageName);
         $product->save();
      }


      return redirect()->route('admin.products')->with('success', 'Product Added Successfully.');
   }
   public function update(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'name' => 'required|string|max:255',
         'price' => 'required|numeric',
         'description' => 'nullable|string',
      ]);

      if ($validator->fails()) {
         return response()->json(['msg' => 'lvl_error', 'response' => $validator->errors()->all()]);
      }

      $product = product::findOrFail($request->id);

      if ($product) {
         $product->name = $request->name;
         $product->slug = \Illuminate\Support\Str::slug($request->name) . '-' . uniqid();
         $product->price = $request->price;
         $product->description = $request->description;
         $product->available = $request->available;

         // Check if a new image is uploaded
         if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Deleting old image if it exists
            if ($product->image) {
               File::delete(public_path('uploads/products/' . $product->image));
            }

            // Saving the new image
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $product->image = $imageName;
         }

         // Save product
         if ($product->save()) {
            return response()->json(['msg' => 'success', 'response' => 'Product updated successfully!', 'product' => $product], 200);
         } else {
            return response()->json(['msg' => 'error', 'response' => 'Failed to update product!'], 400);
         }
      } else {
         return response()->json(['msg' => 'error', 'response' => 'Product not found.'], 404);
      }
   }

   public function show(Request $request)
   {
      $product = product::findOrFail($request->id);
      if (!empty($product)) {
         $htmlresult = view('admin/product_show_ajax', compact('product'))->render();
         $finalResult = response()->json(['msg' => 'success', 'response' => $htmlresult]);
         return $finalResult;
      } else {
         return response()->json(['msg' => 'error', 'response' => 'Product not found.']);
      }
   }








   public function destroy(Request $request)
   {
      $product = product::findOrFail($request->id);
      File::delete(public_path('uploads/products/' . $product->image));
      //delete product from database
      $product->delete();
      return response()->json(['msg' => 'success', 'response' => 'Product deleted successfully.']);
   }
}
