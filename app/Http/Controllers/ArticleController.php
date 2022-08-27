<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::all();

        return view('home', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', ['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'text' => 'required',
            'image' => 'nullable|image',
        ]);
        if($request->hasFile('image')){
            $folder = date('Y-m-d');
            $image = $request->file('image')->store("images/{$folder}", 'public');
        }

        $article = Article::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'text' => $request->text,
            'image' => $image ?? null,
        ]);

        $article->tags()->sync($request->tags);

        return redirect()->route("articles.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::with('tags')->find($id);
        $category = $article->category;
        $tags = $article->tags;
        return view('articles.show', ['article' => $article, 'category' => $category, 'tags' => $tags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        $selectedTagsID = [];

        foreach($article->tags as $tag){
            $selectedTagsID[] = $tag->id;
        }
        return view('articles.edit', ['article' => $article, 'categories' => $categories, 'tags' => $tags, 'selectedTagsID' => $selectedTagsID]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required|integer',
            'text' => 'required',
            'image' => 'nullable|image',
        ]);

        $article = Article::find($id);
        if($request->hasFile('image')){
            if($article->image){
                Storage::disk('public')->delete($article->image);
            }
            $folder = date('Y-m-d');
            $image = $request->file('image')->store("images/{$folder}", 'public');
        }
//                $article->tags()->sync([]);
        $article->tags()->sync($request->tags);
        $article = Article::where('id', $id)->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'text' => $request->text,
            'image' => $image ?? $article->image ?? null,
        ]);



        return redirect()->route("articles.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        if($article->image){
            Storage::disk('public')->delete($article->image);
        }
        $article->tags()->sync([]);
        $article->delete();
        return redirect()->route("articles.index");
    }
}
