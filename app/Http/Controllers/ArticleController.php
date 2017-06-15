<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 05.06.2017
 * Time: 13:10
 */

namespace App\Http\Controllers;

use App\Article;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    public function viewAll(Request $request, Group $group)
    {
        if ($request->user()->id == $group->creator_id) $owner = true;
        $articles = $group->article()->get();

        return view('articles.articles', [
            'articles' => $articles,
	    'group' => $group,
            'owner' => isset($owner) ? $owner : false,
        ]);
    }

    public function create(Request $request, Group $group)
    {
        return view('articles.create', ['group' => $group]);
    }

    public function save(Request $request, Group $group)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required|string',
        ]);
        $group->article()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $request->session()->flash(
            'message_success',
            'Статья <strong>' . $request->title . '</strong> успешно добавлено!'
        );

        return redirect('/group/' . $group->id . '/articles');
    }
    
    public function edit(Request $request, Group $group, Article $article)
    {
        return view('articles.edit', [
            'article' => $article,
            'group' => $group,
        ]);
    }
    
    public function update(Request $request, Group $group, Article $article)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect($request->path())
                ->withInput()
                ->withErrors($validator);
        }

        $article->title = $request->title;
        $article->description = $request->description;
        $article->save();

        $request->session()->flash(
            'message_success',
            'Статья <strong>' . $article->title . '</strong> успешно обновлена!'
        );

        return redirect($request->path());
    }
    
    public function view(Request $request, Group $group, Article $article)
    {
        $owner = $request->user()->id == $group->creator_id ? true : false;
        return view('articles.view', [
            'article' => $article,
	    'group' => $group,
            'owner' => $owner,
        ]);
    }
    
    public function delete(Request $request, Group $group, Article $article)
    {
	$article->delete();
	$request->session()->flash(
            'message_success',
            'Статья <strong>' . $article->title . '</strong> удалено!'
        );
	return redirect('/group/' . $group->id . '/hometasks');
    }
}