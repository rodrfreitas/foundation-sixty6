<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;


class BlogController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getAll() {
        //  $blogs = Blog::all();

        $blogs = Blog::join('authors', 'blogs.author_id', '=', 'authors.id')
        ->select('blogs.id', 'blogs.title', 'blogs.thumbnail', 'blogs.published_date', 'authors.name as author_name', 'content')
        ->orderBy('blogs.published_date')
        ->get();

        return response()->json($blogs);
     }

     public function getOne($id) {
        $blog = Blog::join('authors', 'blogs.author_id', '=', 'authors.id')
                    ->select('blogs.id', 'blogs.title', 'blogs.thumbnail', 'blogs.published_date', 'authors.name as author_name', 'blogs.content')
                    ->where('blogs.id', '=', $id)
                    ->first();
    
        return response()->json($blog);
    }
    

     public function save(Request $request) {
        $this->validate($request, [
            'author_id' => 'required',
            'title' => 'required',
            'published_date' => 'required|date',
            'content' => 'required',
            'thumbnail' => 'required'
        ]);
        $blog = Blog::create($request->all());
        return response()->json($blog, 201);
    }
    

    public function update(Request $request, $id) {
        $this->validate($request, [
            'author_id' => 'required',
            'title' => 'required',
            'published_date' => 'required|date',
            'content' => 'required',
            'thumbnail' => 'required'
        ]);

        $blog = Blog::findOrFail($id);
        $blog->update($request->all());
        return response()->json($blog, 200);
    }
    

    public function delete($id) {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return response()->json(null, 204);
   }
    
}
