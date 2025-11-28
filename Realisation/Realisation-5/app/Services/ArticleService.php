<?php


namespace App\Services;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService
{

    protected function getDefaultAdmin(): User
    {
        $admin = User::where('role', 'admin')->first();

        if (!$admin) {
            throw new \Exception('No admin user found. Please create an admin user before creating articles.');
        }

        return $admin;
    }

    public function getArticles(Request $request): LengthAwarePaginator
    {
        $query = Article::with(['user', 'categories']);

        // Search on title (and optionally content)
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('content', 'LIKE', "%{$search}%"); // Optional: search content, but may be performance-heavy
            });
        }

        // Filter by category
        if ($categoryId = $request->input('category')) {
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('categories.id', $categoryId);
            });
        }

        // Filter by status (optional)
        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        return $query->orderBy('created_at', 'desc')->paginate(6);
    }

    // fetches a single article with its author and categories, or throws a 404 if the ID doesn’t exist
    public function getArticleById(int $id): Article
    {
        return Article::with(['user', 'categories'])->findOrFail($id); // If not found → throws a 404 exception automatically (ModelNotFoundException)
    }


    public function createArticle(Request $request): Article
    {
        // Validate input
        $validated = $request->validate([    // Request $request → this method receives the HTTP request object from the controller.
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'categories' => 'nullable|array',
            'categories.*' => 'integer|exists:categories,id',
        ]);

        $admin = $this->getDefaultAdmin();

        $article = Article::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => $validated['status'] ?? 'draft',
            'user_id' => $admin->id,
        ]);

        // Attach categories if provided
        if (!empty($validated['categories'])) {
            $article->categories()->attach($validated['categories']); // establish or add relationships in many-to-many scenarios
        }

        return $article;
    }


    public function updateArticle(Article $article, Request $request): Article
    {
        // Validate input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'categories' => 'nullable|array',
            'categories.*' => 'integer|exists:categories,id',
        ]);

        $article->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => $validated['status'],
        ]);

        // Sync categories if provided
        if (!empty($validated['categories'])) {
            $article->categories()->sync($validated['categories']); // Replaces all existing category links with the new ones / Adds missing IDs and removes old ones not in the array.
        } else {
            $article->categories()->detach(); // If no categories are provided, it removes all category links from the pivot table.
        }

        return $article;
    }


    public function deleteArticle(Article $article): void
    {
        $article->categories()->detach(); // Clean up pivot, it removes all entries in the pivot table for this article.
        $article->delete();
    }


    public function getCategories()
    {
        return Category::all();
    }
}
