@extends('layouts.app')

@section('title', 'Welcome - Blog Manager')

@section('content')
<!-- Main Container with subtle background -->
<div class="min-h-screen bg-gray-50/50">
    
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-700 to-indigo-800 text-white rounded-b-3xl shadow-xl overflow-hidden mb-16">
        <!-- Decorative background elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
            <i class="fas fa-pen-nib absolute -bottom-10 -left-10 text-9xl transform rotate-12"></i>
            <i class="fas fa-quote-right absolute top-10 right-10 text-8xl transform -rotate-12"></i>
        </div>

        <div class="relative z-10 px-6 py-20 text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight mb-6">
                Welcome to <span class="text-blue-200">Blog Manager</span>
            </h1>
            <p class="text-lg md:text-xl text-blue-100 mb-10 max-w-2xl mx-auto leading-relaxed">
                A powerful, minimalistic article management system. 
                Draft your ideas, categorize your thoughts, and share your stories with the world.
            </p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('articles.create') }}" class="bg-white text-blue-700 px-8 py-3 rounded-full font-bold shadow-lg hover:bg-blue-50 hover:scale-105 transition transform duration-300">
                    <i class="fas fa-pen-fancy mr-2"></i> Start Writing
                </a>
                <a href="#recent-articles" class="bg-blue-600/50 backdrop-blur-sm border border-blue-400 text-white px-8 py-3 rounded-full font-bold hover:bg-blue-600 hover:border-blue-300 transition duration-300">
                    Explore Articles
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Quick Action Cards -->
        <div class="mb-20 -mt-10 relative z-20">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Manage Articles -->
                <div class="bg-white rounded-xl shadow-lg border-b-4 border-blue-500 p-6 hover:-translate-y-1 transition duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-blue-100 p-3 rounded-lg group-hover:bg-blue-600 transition duration-300">
                            <i class="fas fa-layer-group text-blue-600 text-xl group-hover:text-white transition duration-300"></i>
                        </div>
                        <i class="fas fa-arrow-right text-gray-300 group-hover:text-blue-500 transition"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Manage Articles</h3>
                    <p class="text-gray-500 text-sm mb-4">View, edit, and organize your complete library.</p>
                    <a href="{{ route('articles.index') }}" class="text-blue-600 font-semibold text-sm hover:underline">Go to Library &rarr;</a>
                </div>

                <!-- Categories -->
                <div class="bg-white rounded-xl shadow-lg border-b-4 border-teal-500 p-6 hover:-translate-y-1 transition duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-teal-100 p-3 rounded-lg group-hover:bg-teal-600 transition duration-300">
                            <i class="fas fa-tags text-teal-600 text-xl group-hover:text-white transition duration-300"></i>
                        </div>
                        <i class="fas fa-arrow-right text-gray-300 group-hover:text-teal-500 transition"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Categories</h3>
                    <p class="text-gray-500 text-sm mb-4">Structure your content for better discovery.</p>
                    <a href="{{ route('categories.index') }}" class="text-teal-600 font-semibold text-sm hover:underline">Manage Categories &rarr;</a>
                </div>

                <!-- Create New -->
                <div class="bg-white rounded-xl shadow-lg border-b-4 border-purple-500 p-6 hover:-translate-y-1 transition duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-purple-100 p-3 rounded-lg group-hover:bg-purple-600 transition duration-300">
                            <i class="fas fa-magic text-purple-600 text-xl group-hover:text-white transition duration-300"></i>
                        </div>
                        <i class="fas fa-arrow-right text-gray-300 group-hover:text-purple-500 transition"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Create Article</h3>
                    <p class="text-gray-500 text-sm mb-4">Draft a new story with our rich editor.</p>
                    <a href="{{ route('articles.create') }}" class="text-purple-600 font-semibold text-sm hover:underline">Write Now &rarr;</a>
                </div>
            </div>
        </div>

        <!-- Recent Articles Section -->
        <div id="recent-articles" class="mb-16">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-800">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                        <i class="fas fa-newspaper"></i>  Recent Articles
                    </span>
                </h2>
                <a href="{{ route('articles.index') }}" class="hidden md:inline-flex items-center text-gray-500 hover:text-blue-600 font-medium transition">
                    View All <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            @if($articles->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach($articles as $article)
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col h-full group">
                    
                    <!-- Card Body -->
                    <div class="p-6 flex flex-col h-full">
                        <!-- Meta Header -->
                        <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-gray-200 to-gray-300 flex items-center justify-center text-gray-600 font-bold">
                                    {{ substr($article->user->name ?? 'U', 0, 1) }}
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-semibold text-gray-700">{{ $article->user->name ?? 'Unknown' }}</span>
                                    <span>{{ $article->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                            @if($article->status === 'published')
                                <span class="bg-green-50 text-green-700 px-2 py-1 rounded-md text-xs font-medium border border-green-100">
                                    Published
                                </span>
                            @endif
                        </div>

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">
                            <a href="{{ route('articles.show', $article->id) }}">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <!-- Excerpt -->
                        <p class="text-gray-600 text-sm leading-relaxed mb-6 line-clamp-3 grow">
                            {{ Str::limit(strip_tags($article->content), 120) }}
                        </p>

                        <!-- Footer / Categories -->
                        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                            <div class="flex flex-wrap gap-2">
                                @foreach($article->categories->take(2) as $category)
                                <span class="inline-flex items-center text-xs font-medium text-blue-600 bg-blue-50 px-2.5 py-0.5 rounded-full">
                                    #{{ $category->name }}
                                </span>
                                @endforeach
                                @if($article->categories->count() > 2)
                                    <span class="text-xs text-gray-400">+{{ $article->categories->count() - 2 }}</span>
                                @endif
                            </div>
                            
                            <a href="{{ route('articles.show', $article->id) }}" class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition duration-300">
                                <i class="fas fa-chevron-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Mobile View All Button -->
            <div class="md:hidden text-center">
                <a href="{{ route('articles.index') }}" class="inline-block w-full bg-white border border-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-50 transition font-semibold shadow-sm">
                    View All Articles
                </a>
            </div>
            
            @else
            <!-- Empty State -->
            <div class="bg-white rounded-2xl shadow-sm border border-dashed border-gray-300 p-12 text-center">
                <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-feather-alt text-blue-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">No stories yet</h3>
                <p class="text-gray-500 mb-8 max-w-md mx-auto">It looks like you haven't published any articles yet. Be the first to share something amazing.</p>
                <a href="{{ route('articles.create') }}" class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition shadow-lg shadow-blue-600/30 font-medium">
                    <i class="fas fa-plus mr-2"></i> Create First Article
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection