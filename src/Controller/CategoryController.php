<?php

namespace App\Controller;


use App\Model\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class CategoryController
{
    public function index()
    {
        $pages = Category::paginate(3);
        echo view('pages/list-categories', compact('pages'));
    }
    public function create()
    {
        $category = new Category();
        echo view('/pages/create-category', compact('category'));
    }
    public function store()
    {
        $data = request()->all();

        $validator = validator()->make($data, [
            'title' => ['required', 'min:5', 'unique:categories,title'],
            'slug' => ['required'],
        ]);
        $errors = $validator->errors();
        if(count($errors) > 0){
            $_SESSION['data'] = $data;
            $_SESSION['errors'] = $errors->toArray();

            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $category = new Category();
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->save();

        $_SESSION['message'] = [
            'status' => 'success',
            'text' => "Category \" {$data['title']} \"successfully saved.",
        ];

        return new RedirectResponse('/list-categories');
    }
    public function edit($id)
    {
        var_dump($id);
        $category = Category::find($id);

        echo view('/pages/create-category', compact('category'));
    }
    public function update($id)
    {
        $category = Category::find($id);

        $data = request()->all();

        $validator = validator()->make($data, [
            'title' => ['required', 'min:5', 'unique:categories,title,' . $id],
            'slug' => ['required', 'unique:categories,slug,' . $id],
        ]);
        $errors = $validator->errors();

        if(count($errors) > 0){
            $_SESSION['data'] = $data;
            $_SESSION['errors'] = $errors->toArray();

            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->save();

        $_SESSION['message'] = [
            'status' => 'success',
            'text' => "Category \" {$data['title']} \"successfully saved.",
        ];

        return new RedirectResponse('/list-categories');
    }
    public function destroy($id){

        $category = Category::find($id);
        $title = $category->title;
        $category->delete();
        $_SESSION['message'] = [
            'status' => 'success',
            'text' => "Category \" {$title} \" successfully deleted",

        ];

        return new RedirectResponse('/list-categories');
    }
}