<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    const VIEWS_ARTICLE = 'admin.article.';
    const PATH_UPLOAD = 'articles';

    public function index(Request $request)
    {

        $articles = Article::with(['user', 'category'])->get();
        // dd($articles);
        return view(self::VIEWS_ARTICLE . __FUNCTION__ , compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {


        return view(self::VIEWS_ARTICLE . __FUNCTION__ , compact('article') );
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        try {

            $article->is_active = 1;
            $article->save();
            return back()->with('success', 'Duyệt thành công');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }







}
