<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    const PATH_UPLOAD = 'articles';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showHome()
    {

        $categories = Category::all();
        $articles = Article::query()
            ->where('is_active', '1')
            ->get();
        $user =  auth()->user();
        return view('home', compact('articles','categories','user'));
    }

    public function show(Request $request, Article $article)
    {
        $comments = Comment::with('article','user')->where('article_id', $article->id)->get();

        // dd($comments);

        return view(__FUNCTION__, compact('article', 'comments'));
    }

    public function create()
    {
        $categories = Category::query()->get();

        return view(__FUNCTION__, compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->except('img');

            if ($request->hasFile('img')) {
                $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
            }
            // dd($data);
            Article::query()->create($data);

            return back()->with('success', 'Thêm thành công');
        } catch (\Exception $exception) {

            return $exception->getMessage();
        }
    }

    public function manage(User $user){
        $categories = Category::all();
        $articles = Article::query()->where('user_id', $user->id)->get();

        // dd($articles);
        return view(__FUNCTION__, compact('articles','categories'));
    }

    public function edit(Article $article)
    {
        $article->load([
            'user',
            'category'
        ]);

        // dd($article->toArray());
        $categories = Category::query()->get();

        return view('edit', compact('categories', 'article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required',
            'content'=> 'required',
            'category_id'=> 'required',
            'img' => 'image|mimes:png,jpg,jpeg,svg|max:2028'
        ]);

        $data = $request->except('img');

        if($request->hasFile('img')){
            if($article->img && Storage::exists($article->img)){
                Storage::delete($article->img);
            }
            $newImg = Storage::put(self::PATH_UPLOAD , $request->img);

            $data['img'] = $newImg;
        }
        $article->update($data);

        return back()->with('success' , 'chỉnh sửa thành công');
    }

    public function destroy(Article $article){

        $article->delete();
        return back()->with('success' , 'Xóa thành công');
    }

    public function postcate(Category $category){

        $articles = Article::where('category_id',$category->id)->get();
        $categories = Category::all();
        return view('postcate', compact('articles','categories'));

    }


    public function search(Request $request)
    {
        $query = $request->input('s'); // Lấy giá trị của query string 's'

        // Tìm kiếm trong bảng posts, bạn có thể thay đổi thành bảng và cột bạn cần
        $articles = Article::where('title', 'LIKE', "%{$query}%")->get();
        $categories = Category::all();
        return view('search_results', compact('articles','categories'));
    }

}
