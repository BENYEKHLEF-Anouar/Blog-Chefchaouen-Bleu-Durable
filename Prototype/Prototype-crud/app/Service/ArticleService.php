<?php 

namespace App\Service;
use App\Models\Article;
use App\Models\Category;


class ArticleService
{
    public function getArticle($filters){
        $query = Article::with('categories');
        
        if (isset($filters['category']) && !empty($filters['category'])) {
            $query->whereHas('categories', function ($q) use ($filters) {
                $q->where('slug', $filters['category']);
            });
        }
        return $query->orderBy('created_at','desc')->paginate(10);
    }

    public function getAllCategories(){
        return Category::all();
    }


    public function deleteArticle($id){
        $article = Article::findOrFail($id);
        return $article->delete();
    }

    
}