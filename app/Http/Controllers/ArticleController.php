<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller {
    public function index(){
        $articles = Article::all();
        return $articles;
    }
    public function create(Request $request){
        $article = new Article;
        $article->title   = $request->title;
        $article->content = $request->content;
        $article->save();
        return 'Article created successfully';
    }
    public function edit($id){
        $article = Article::find($id);
        return $article;
    }
    public function update(Request $request, $id){
        $article = Article::find($id);
        $article->title   = $request->title;
        $article->content = $request->content;
        $article->save();
        return 'Article updated successfully';
    }
    public function delete($id){
        $article = Article::find($id);
        $article->delete();
        return 'Article deleted successfully';
    }
}