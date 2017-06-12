<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 05.06.2017
 * Time: 13:10
 */

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    public function viewAll(Request $request)
    {
        $user = $request->user();
        $articles = Article::where('creator_id', $user->id)->get();

        return view('articles.articles', [
            'articles' => $articles,
        ]);
    }

    public function create()
    {
        return view('articles.articlescreate');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required|string',
        ]);
        $request->user()->group()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('/articles');
    }

    public function delete(Request $request, Group $group)
    {

    }
}