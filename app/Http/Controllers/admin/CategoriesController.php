<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = category::orderBy('created_at', 'DESC')->get();
        return view('admin.categories', [
            'categories' => $categories
        ]);
    }
    public function categoriesbydb()
    {
        $categories = category::all();
        return view('welcome', compact('categories'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required | min:5',
            'description' => 'required | min:10',
        ];
        $validator = Validator::make($request->all(), $rules);
        // if ($validator->fails()) {
        //     return redirect()->route('products.create')->withInput()->withErrors($validator);
        // }
        $category = new category();
        $category->name = $request->input('name');
        $category->slug = \Illuminate\Support\Str::slug($request->input('name'));
        $category->description = $request->input('description');
        $category->save();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $category->image = $imageName;
            $image->move(public_path('uploads/products'), $imageName);
            $category->save();
        }


        return redirect()->route('admin.categories')->with('success', 'Category Added Successfully.');
    }
    public function show(Request $request)
    {
        $category = category::findOrFail($request->id);
        if (!empty($category)) {
            $htmlresult = view('admin/category_show_ajax', compact('category'))->render();
            $finalResult = response()->json(['msg' => 'success', 'response' => $htmlresult]);
            return $finalResult;
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Category not found.']);
        }
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'lvl_error', 'response' => $validator->errors()->all()]);
        }

        $category = category::findOrFail($request->id);

        if ($category) {
            $category->name = $request->name;
            $category->description = $request->description;
            // Check if a new image is uploaded
            if ($request->hasFile('image')) {
                $image = $request->file('image');

                // Deleting old image if it exists
                if ($category->image) {
                    File::delete(public_path('uploads/products/' . $category->image));
                }

                // Saving the new image
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products'), $imageName);
                $category->image = $imageName;
            }

            // Save product
            if ($category->save()) {
                return response()->json(['msg' => 'success', 'response' => 'Category updated successfully!', 'product' => $category], 200);
            } else {
                return response()->json(['msg' => 'error', 'response' => 'Failed to update Category!'], 400);
            }
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Category not found.'], 404);
        }
    }
    public function destroy(Request $request)
    {
        $category = category::findOrFail($request->id);
        File::delete(public_path('uploads/products/' . $category->image));
        //delete category from database
        $category->delete();
        return response()->json(['msg' => 'success', 'response' => 'Category deleted successfully.']);
    }
}
