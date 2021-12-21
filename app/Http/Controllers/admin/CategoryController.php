<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use App\Traits\MegaTex;

class CategoryController extends Controller
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
        ];
        $validator = \Validator::make($data, $validations);
        if ($validator->fails()) {
            $this->message = formatErrors($validator->errors()->toArray());
            $this->success = false;
        } else {
            $isEdit = $request->input('is_edit');
            $id = $request->input('id');
            if ($isEdit == 'Update') {
                $category = Category::find($id);
                $fileName = $category->image;
                $isEdit = true;
            } else {
                $obj = new Category();
            }
            if (!empty($request->input('image'))) {
                $url = public_path('ProductImages/Category');
                $this->uploadImage($request, $url, $obj);
            }
            $obj->name = $request->input('name');
            $obj->image = $fileName;
            $obj->user_id = $userId;
            $obj->save();
            $this->success = true;
        }

        return response()->json(['success' => $this->success, 'message' => $this->message, 'edit' => $isEdit]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!empty($category->image)) {
            $Path = public_path('ProductImages/Category') . '/' . $category->image;
            if (file_exists($Path)) {
                unlink($Path);
            }
        }
        $category->delete();

        return response()->json([]);
    }

    /**
     * this is used to get all list of categories
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategoryList()
    {
        $this->params['url'] = asset('ProductImages/Category/');
        $data = category::getCategories($this->params);
        $data = $data->toArray();

        return response()->json($data);
    }
}
