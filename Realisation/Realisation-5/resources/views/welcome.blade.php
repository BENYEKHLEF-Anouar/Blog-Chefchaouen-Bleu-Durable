@extends('layouts.app')

@section('title', 'Welcome - Blog Manager')

@section('content')
    <div class="text-center py-12">
        <h1 class="text-5xl font-bold text-gray-800 mb-4">
            <i class="fas fa-blog text-blue-600 mr-2"></i> Welcome to Blog Manager
        </h1>
        
        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
            A powerful, simple article management system with support for rich text editing, 
            categories, search, and filtering. No authentication requiredjust simple CRUD operations.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Articles Card -->
            <div class="bg-linear-to-br from-blue-50 to-blue-100 rounded-lg shadow-md p-6 border-l-4 border-blue-600">
                <i class="fas fa-newspaper text-blue-600 text-4xl mb-3"></i>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Manage Articles</h3>
                <p class="text-gray-700 text-sm mb-4">Create, edit, and organize your blog articles with ease.</p>
                <a href="{{ route('articles.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-arrow-right mr-2"></i> View Articles
                </a>
            </div>

            <!-- Categories Card -->
            <div class="bg-linear-to-br from-green-50 to-green-100 rounded-lg shadow-md p-6 border-l-4 border-green-600">
                <i class="fas fa-tags text-green-600 text-4xl mb-3"></i>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Organize with Categories</h3>
                <p class="text-gray-700 text-sm mb-4">Create and manage article categories for better organization.</p>
                <a href="{{ route('categories.index') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                    <i class="fas fa-arrow-right mr-2"></i> View Categories
                </a>
            </div>

            <!-- Create Article Card -->
            <div class="bg-linear-to-br from-purple-50 to-purple-100 rounded-lg shadow-md p-6 border-l-4 border-purple-600">
                <i class="fas fa-plus-circle text-purple-600 text-4xl mb-3"></i>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Create New Article</h3>
                <p class="text-gray-700 text-sm mb-4">Start writing your first article with rich text editing.</p>
                <a href="{{ route('articles.create') }}" class="inline-block bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">
                    <i class="fas fa-arrow-right mr-2"></i> Create Now
                </a>
            </div>
        </div>

        <!-- Features Section -->
        <div class="bg-gray-50 rounded-lg shadow-md p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6"> Key Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                <div class="flex items-start">
                    <i class="fas fa-check-circle text-green-600 mr-3 mt-1 shrink-0"></i>
                    <div>
                        <h4 class="font-bold text-gray-800">Layered Architecture</h4>
                        <p class="text-gray-600 text-sm">Clean separation: Controller  Service  Model</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-check-circle text-green-600 mr-3 mt-1 shrink-0"></i>
                    <div>
                        <h4 class="font-bold text-gray-800">Rich Text Editor</h4>
                        <p class="text-gray-600 text-sm">Summernote WYSIWYG editor for article content</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-check-circle text-green-600 mr-3 mt-1 shrink-0"></i>
                    <div>
                        <h4 class="font-bold text-gray-800">Search & Filter</h4>
                        <p class="text-gray-600 text-sm">Search by title/content, filter by category or status</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-check-circle text-green-600 mr-3 mt-1 shrink-0"></i>
                    <div>
                        <h4 class="font-bold text-gray-800">Pagination</h4>
                        <p class="text-gray-600 text-sm">10 articles per page with navigation</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-check-circle text-green-600 mr-3 mt-1 shrink-0"></i>
                    <div>
                        <h4 class="font-bold text-gray-800">Auto-Admin Assignment</h4>
                        <p class="text-gray-600 text-sm">All articles automatically assigned to Admin user</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-check-circle text-green-600 mr-3 mt-1 shrink-0"></i>
                    <div>
                        <h4 class="font-bold text-gray-800">No Authentication</h4>
                        <p class="text-gray-600 text-sm">Simple back-office for admin use only</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
            <p class="text-gray-700">
                Ready to get started? 
                <a href="{{ route('articles.create') }}" class="text-blue-600 hover:text-blue-800 font-bold">Create your first article</a>
                or
                <a href="{{ route('articles.index') }}" class="text-blue-600 hover:text-blue-800 font-bold">view all articles</a>.
            </p>
        </div>
    </div>
@endsection
