<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        if (isset($_GET['category'])) {
            $postsByCategory = Category::where('category', '=', $_GET['category'])->get()->toArray();
            $posts = Post::with('author', 'type')
                ->where('category_id', '=', $postsByCategory[0]['id'])
                ->orderBy('posts.created_at', 'DESC')->get();
        } else {
            $posts = Post::with('author', 'type')
                ->orderBy('posts.created_at', 'DESC')->get();
        }
        return view('mylayouts.main', compact('posts', 'categories'));
    }


    public function definitePost($postN)
    {
        $posts = Post::with('author', 'type')
            ->where('posts.title', '=', urldecode($postN))
            ->orderBy('posts.created_at', 'DESC')->get()->toArray();
        return view('mylayouts.definite_post', compact('posts'));
    }


    public function userCabinetIndex()
    {
        $categories = Category::all();

        if (isset($_GET['category'])) {
            $postsByCategory = Category::where('category', '=', $_GET['category'])->get()->toArray();
            $postsByUser = User::where('users.id', '=', Auth::user()->id)->get()->toArray();
            $posts = Post::with('author', 'type')
                ->where('user_id', '=', $postsByUser[0]['id'])
                ->where('category_id', '=', $postsByCategory[0]['id'])
                ->orderBy('posts.created_at', 'DESC')->get()->toArray();
        } else {
            $postsByUser = User::where('users.id', '=', Auth::user()->id)->get()->toArray();
            $posts = Post::with('author', 'type')
                ->where('user_id', '=', $postsByUser[0]['id'])
                ->orderBy('posts.created_at', 'DESC')->get()->toArray();
        }
        return view('mylayouts.user_cabinet', compact('posts', 'categories'));
    }


    public function addPostIndex()
    {
        $categories = Category::all();
        return view('mylayouts.add_post', compact('categories'));
    }


    public function addPost()
    {
//        $this->validate(request(), [
//            'title' => 'required',
//            'price' => 'required',
//            'text' => 'required',
//            'category_id' => 'required'
//        ]);
        Post::create([
            'title' => request('title'),
            'price' => request('price'),
            'main' => request('text'),
            'category_id' => request('category'),
            'user_id' => Auth::user()->id
        ]);
        session()->flash('message', 'Post "' . request('title') . '" was added!');
        return redirect('/');
    }

    function editPostIndex()
    {
        $categories = Category::all();
        $edit_post = Post::where('posts.id', '=', $_GET['edit'])->get()->toArray();
        $edit_post = $edit_post[0];
        return view('mylayouts.edit_post', compact('edit_post', 'categories'));
    }

    function saveEditPost($edit_id)
    {
        $post = Post::find($edit_id);
        $post->update([
            'title' => request('title'),
            'price' => request('price'),
            'main' => request('text'),
            'category_id' => request('category')
        ]);
        session()->flash('message', 'Post "' . request('title') . '" was edited!');
        return redirect('/my_cabinet');
    }

    function deletePost($delete_id)
    {
        $post = Post::find($delete_id);
        $post->delete();
        session()->flash('message', 'Post "' . $post->title . '" was deleted!');
        return redirect('/my_cabinet');
    }
}