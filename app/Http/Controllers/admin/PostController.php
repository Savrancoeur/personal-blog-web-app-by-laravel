<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin-panel.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin-panel.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'title' => 'required',
            'content' => 'required',

        ]);
        $image = $request->image;
        $imageName = uniqid() . '_' . $image->getClientOriginalName();

        $image->storeAs('public/post-images', $imageName);

        Post::create([
            'category_id' => $request->category_id,
            'image' => $imageName,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('successMsg', 'You have successfully created a post!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comments = Comment::where('post_id', $id)->get();
        return view('admin-panel.post.comment', compact('comments'));
    }

    public function showHideComment($id)
    {
        $comment = Comment::findOrFail($id);

        $status = $comment->status == 'show' ? 'hide' : 'show';

        $comment->update([
            'status' => $status,
        ]);

        return back()->with('successMsg', 'You have successfully ' . $comment->status . ' the message!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        return view('admin-panel.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'title' => 'required',
            'content' => 'required',

        ]);

        $post = Post::find($id);

        if ($request->hasFile('image')) {
            $postImage = $post->image;
            File::delete('storage/post-images' . $postImage);

            $image = $request->image;
            $imageName = uniqid() . '_' . $image->getClientOriginalName();

            $image->storeAs('public/post-images', $imageName);

            $data['image'] = $imageName;
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('successMsg', 'You have successfully updated a post!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        $postImage = $post->image;
        File::delete('storage/post-images' . $postImage);

        $post->delete();
        return redirect()->route('posts.index')->with('successMsg', 'You have successfully deleted a post!');
    }
}
