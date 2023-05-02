<?php

namespace App\Controller;

use App\Model\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class TagController
{
    public function index()
    {
        $tags = Tag::all();
        echo view('pages/list-tags', compact('tags'));
    }
    public function create()
    {
        $tags = new Tag();
        echo view('/pages/create-tags', compact('tags'));
    }
    public function store()
    {
        $data = request()->all();

        $validator = validator()->make($data, [
            'title' => ['required', 'min:5', 'unique:tags,title'],
            'slug' => ['required'],
        ]);
        $errors = $validator->errors();
        if(count($errors) > 0){
            $_SESSION['data'] = $data;
            $_SESSION['errors'] = $errors->toArray();

            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $tags = new Tag;
        $tags->title = htmlspecialchars($data['title']);
        $tags->slug = htmlspecialchars($data['slug']);
        $tags->save();

        $_SESSION['message'] = [
            'status' => 'success',
            'text' => "Category \" {$data['title']} \"successfully saved.",
        ];

        return new RedirectResponse('/list-tags');
    }
    public function edit($id)
    {
        $tags = Tag::find($id);
        echo view('/pages/create-tags', compact('tags'));
    }
    public function update($id)
    {
        $tags = Tag::find($id);

        $data = request()->all();

        $validator = validator()->make($data, [
            'title' => ['required', 'min:5', 'unique:tags,title,' . $id],
            'slug' => ['required', 'unique:tags,slug,' . $id],
        ]);
        $errors = $validator->errors();
        if(count($errors) > 0){
            $_SESSION['data'] = $data;
            $_SESSION['errors'] = $errors->toArray();

            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $tags->title = $data['title'];
        $tags->slug = $data['slug'];
        $tags->save();

        $_SESSION['message'] = [
            'status' => 'success',
            'text' => "Category \" {$data['title']} \"successfully saved.",
        ];

        return new RedirectResponse('/list-tags');
    }
    public function destroy($id)
    {
        $tags = Tag::find($id);
        $tags->delete();

        return new RedirectResponse('/list-tags');
    }
}