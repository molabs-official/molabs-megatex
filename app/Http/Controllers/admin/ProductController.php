<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Traits\MegaTex;

class ProductController extends Controller
{
    use MegaTex;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = loginId();
        $fileName = '';
        $isEdit = false;
        $data = $request->all();
        $validations = [
            'name' => 'required',
            'image' => 'required',
            'price' => 'required',
        ];
        $validator = \Validator::make($data, $validations);
        if ($validator->fails()) {
            $this->message = formatErrors($validator->errors()->toArray());
            $obj = [];
            $this->success = false;
        } else {
            $id = $request->input('id');
            if (!empty($id)) {
                $obj = Product::find($id);
                $fileName = $obj->image;
                $isEdit = true;
            } else {
                $obj = new Product();
            }
            if (!empty($request->input('image')) && $request->input('image') != 1) {
                $url = public_path('ProductImages/Product');
                $this->uploadImage($request, $url, $obj);
            }
            $obj->name = $request->input('name');
            $obj->category_id = $request->input('category');
            $obj->product_code = $request->input('code');
            $obj->product_brand = $request->input('brand');
            $obj->description = $request->input('description');
            $obj->price = $request->input('price');
            $obj->ingredients = $request->input('ingredient');
            $obj->image = $fileName;
            $obj->user_id = $userId;
            $obj->save();
            $this->success = true;
        }

        return response()->json(['data' => $obj, 'success' => $this->success, 'message' => $this->message, 'edit' => $isEdit]);
    }

    /**
     * this is used to get product detail
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductDetail($id)
    {
        $url = asset('ProductImages/Product/');
        $data = Product::find($id);
        $editImage = $data['image'];
        $data->image = $url . '/' . $data['image'];

        return $this->success(compact('data', 'editImage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Product::find($id);
        if (!empty($obj->image)) {
            $Path = public_path('ProductImages/Product') . '/' . $obj->image;
            if (file_exists($Path)) {
                unlink($Path);
            }
        }
        $obj->delete();

        return response()->json([]);
    }

    /**
     * this function is used to get products list according to category id
     *
     * @param $id
     * @return ProductController
     */
    public function getProductsList($id)
    {
        $this->params['id'] = $id;
        $this->params['url'] = asset('ProductImages/Product/');
        $data = Product::getUserProductList($this->params);

        return $this->success(compact('data'));
    }

    /**
     * this is used to get product category dropdown list Category
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductCategoryList()
    {
        $category = Category::select('id', 'name')->get()->toArray();

        return $this->success(compact('category'));
    }

    /**
     * this is used to get all list of products
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductList()
    {
        $this->params['url'] = asset('ProductImages/Product/');
        $data = Product::getProducts($this->params);
        $data = $data->toArray();

        return response()->json($data);
    }
}
