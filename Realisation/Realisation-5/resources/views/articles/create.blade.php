@extends('layouts.app')

@section('title', 'Create Article - Blog Manager')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            <i class="fas fa-plus-circle text-green-600 mr-2"></i> Create New Article
        </h1>

        <form action="{{ route('articles.store') }}" method="POST">
            @csrf

            <!-- Title -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-heading mr-2"></i> Title <span class="text-red-600">*</span>
                </label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    value="{{ old('title') }}"
                    placeholder="Enter article title"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                    required
                >
                @error('title')
                    <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</p>
                @enderror
            </div>

            <!-- Content with Summernote -->
            <div class="mb-6">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-pen-fancy mr-2"></i> Content <span class="text-red-600">*</span>
                </label>
                <textarea 
                    name="content" 
                    id="content" 
                    class="summernote @error('content') border-red-500 @enderror"
                    required
                >{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-6">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-flag mr-2"></i> Status <span class="text-red-600">*</span>
                </label>
                <div class="flex gap-4">
                    <label class="flex items-center">
                        <input 
                            type="radio" 
                            name="status" 
                            value="draft" 
                            {{ old('status', 'draft') === 'draft' ? 'checked' : '' }}
                            class="mr-2"
                        >
                        <span class="text-gray-700"><i class="fas fa-pencil-alt mr-1"></i> Draft</span>
                    </label>
                    <label class="flex items-center">
                        <input 
                            type="radio" 
                            name="status" 
                            value="published" 
                            {{ old('status') === 'published' ? 'checked' : '' }}
                            class="mr-2"
                        >
                        <span class="text-gray-700"><i class="fas fa-check-circle mr-1"></i> Published</span>
                    </label>
                </div>
                @error('status')
                    <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</p>
                @enderror
            </div>

            <!-- Categories -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-tags mr-2"></i> Categories
                </label>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
                    @foreach ($categories as $category)
                        <label class="flex items-center cursor-pointer">
                            <input 
                                type="checkbox" 
                                name="categories[]" 
                                value="{{ $category->id }}"
                                {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}
                                class="mr-2 w-4 h-4"
                            >
                            <span class="text-gray-700">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
                @if ($categories->isEmpty())
                    <p class="text-gray-500 text-sm mt-2">
                        <i class="fas fa-info-circle mr-1"></i> No categories available. 
                        <a href="{{ route('categories.create') }}" class="text-blue-600 hover:text-blue-800 font-medium">Create one</a>
                    </p>
                @endif
                @error('categories')
                    <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</p>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex gap-4">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition font-semibold">
                    <i class="fas fa-save mr-2"></i> Create Article
                </button>
                <a href="{{ route('articles.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500 transition">
                    <i class="fas fa-times mr-2"></i> Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
