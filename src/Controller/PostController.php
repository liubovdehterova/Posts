<?php

namespace App\Controller;

use App\Model\Category;
use App\Model\Post;
use App\Model\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class PostController
{
    public function index()
    {
        $posts = Post::all();
        echo view('pages/list-post', compact('posts'));
    }
    public function create()
    {
        $posts = new Post();

        $categories = Category::all();
        $tags = Tag::all();

        echo view('/pages/create-post', compact('posts', 'categories', 'tags'));
    }
    public function store()
    {
        $data = request()->all();

        $validator = validator()->make($data, [
            'title' => ['required', 'min:5', 'unique:posts,title'],
            'slug' => ['required', 'unique:posts,slug'],
            'body' => ['required'],
            'category' => ['required', 'exists:categories,id'],
            'tags' => ['required', 'exists:tags,id'],
        ]);
        $errors = $validator->errors();
        if(count($errors) > 0){
            $_SESSION['data'] = $data;
            $_SESSION['errors'] = $errors->toArray();

            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $posts = new Post();
        $posts->title = $data['title'];
        $posts->slug = $data['slug'];
        $posts->body = $data['body'];
        $posts->category_id = $data['category'];
        $posts->save();

        $posts->tags()->attach($data['tags']);

        $_SESSION['message'] = [
            'status' => 'success',
            'text' => "Category \" {$data['title']} \"successfully saved.",
        ];

        return new RedirectResponse('/');
    }
    public function edit($id)
    {
        var_dump($id);
        $posts = Post::find($id);

        echo view('/pages/create-post', compact('posts'));
    }
    public function update($id)
    {
        $posts = Post::find($id);

        $data = request()->all();

        $validator = validator()->make($data, [
            'title' => ['required', 'min:5', 'unique:posts,title,' . $id],
            'slug' => ['required', 'unique:posts,slug,' . $id],
        ]);
        $errors = $validator->errors();

        if(count($errors) > 0){
            $_SESSION['data'] = $data;
            $_SESSION['errors'] = $errors->toArray();

            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $posts->title = $data['title'];
        $posts->slug = $data['slug'];
        $posts->save();

        $_SESSION['message'] = [
            'status' => 'success',
            'text' => "Category \" {$data['title']} \"successfully saved.",
        ];

        return new RedirectResponse('/');
    }
    public function destroy($id)
    {
        $posts =  Post::find($id);
        $posts->delete();

        return new RedirectResponse('/');
    }
}