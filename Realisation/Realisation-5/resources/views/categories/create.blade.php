@extends('layouts.app')

@section('title', 'Create Category - Blog Manager')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            <i class="fas fa-plus-circle text-green-600 mr-2"></i> Create New Category
        </h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <!-- Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-tag mr-2"></i> Category Name <span class="text-red-600">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    value="{{ old('name') }}"
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
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @endif"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</p>
                @enderror
            </div>

            <!-- Info -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <p class="text-sm text-blue-800">
                    <i class="fas fa-info-circle mr-2"></i>
                    <strong>Note:</strong> The slug will be automatically generated from the category name.
                </p>
            </div>

            <!-- Form Actions -->
            <div class="flex gap-4">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition font-semibold">
                    <i class="fas fa-save mr-2"></i> Create Category
                </button>
                <a href="{{ route('categories.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500 transition">
                    <i class="fas fa-times mr-2"></i> Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
