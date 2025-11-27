@extends('layouts.app')

@section('title', 'Edit Category - Blog Manager')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            <i class="fas fa-edit text-blue-600 mr-2"></i> Edit Category
        </h1>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-tag mr-2"></i> Category Name <span class="text-red-600">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    value="{{ old('name', $category->name) }}"
                    placeholder="e.g., Technology, Web Development"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @else border-gray-300 @enderror"
                    required
                >
                @error('name')
                    <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-align-left mr-2"></i> Description
                </label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="5"
                    placeholder="Enter category description (optional)"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @else border-gray-300 @enderror"
                >{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</p>
                @enderror
            </div>

            <!-- Current Slug -->
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-6">
                <p class="text-sm text-gray-700">
                    <i class="fas fa-link mr-2"></i>
                    <strong>Current Slug:</strong> <code class="bg-white px-2 py-1 rounded border border-gray-300">{{ $category->slug }}</code>
                </p>
                <p class="text-xs text-gray-600 mt-2">The slug will be automatically updated based on the category name.</p>
            </div>

            <!-- Form Actions -->
            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                    <i class="fas fa-save mr-2"></i> Update Category
                </button>
                <a href="{{ route('categories.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500 transition">
                    <i class="fas fa-times mr-2"></i> Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
