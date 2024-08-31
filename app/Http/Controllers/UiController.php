<?php

namespace App\Http\Controllers;

use App\Models\ClientCount;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Category;
use App\Models\Post;
use App\Models\LikesDislike;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class UiController extends Controller
{
    public function index()
    {
        $skills = Skill::paginate(10);
        $projects = Project::all();
        $clientcounts = ClientCount::find(1);
        $posts = Post::latest()->take(6)->get();
        return view('ui-panel.index', compact('skills', 'projects', 'clientcounts', 'posts'));
    }

    public function postIndex()
    {
        $categories = Category::all();
        $posts = Post::latest()->paginate(10);
        return view('ui-panel.posts', compact('categories', 'posts'));
    }

    public function postDetailsIndex($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        };

        $post = Post::find($id);

        $likes = LikesDislike::where('post_id', $id)->where('type', 'like')->get();
        $dislikes = LikesDislike::where('post_id', $id)->where('type', 'dislike')->get();
        $likeStatus = LikesDislike::where('post_id', $id)->where('user_id', Auth::user()->id)->first();

        $comments = Comment::where('post_id', $id)->where('status', 'show')->get();

        return view('ui-panel.post-detail', compact('post', 'likes', 'dislikes', 'likeStatus', 'comments'));
    }

    public function search(request $request)
    {
        $categories = Category::all();
        $searchData = $request->search_data;

        $posts = Post::where('title', 'like', '%' . $searchData . '%')
            ->orWhere('content', 'like', '%' . $searchData . '%')
            ->orWhereHas('category', function ($category) use ($searchData) {
                $category->where('name', 'like', "%" . $searchData . "%");
            })
            ->paginate(10);
        return view('ui-panel.posts', compact('categories', 'posts'));
    }

    public function searchByCategory($catId)
    {
        $categories = Category::all();
        $posts = Post::where('category_id', $catId)->paginate(10);
        return view('ui-panel.posts', compact('categories', 'posts'));
    }
}
