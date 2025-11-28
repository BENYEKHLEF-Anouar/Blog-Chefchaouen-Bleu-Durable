@extends('layouts.admin')

@section('title', 'Categories - Blog Manager')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            <i class="fas fa-tags text-blue-600 mr-2"></i> Categories
        </h1>
        <a href="{{ route('categories.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
            <i class="fas fa-plus mr-2"></i> New Category
        </a>
    </div>

    @if ($categories->count())
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <!-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Articles</th> -->
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($categories as $category)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">
                        {{ $category->name }}
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-500">
                        <i class="fas fa-link mr-1"></i> <code class="bg-gray-100 px-2 py-1 rounded">{{ $category->slug }}</code>
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-600">
                        @if ($category->description)
                        <i class="fas fa-newspaper mr-1"></i> {!! $category->description !!}
                        @else
                        <p class="text-gray-400">No description</p>
                        @endif
                    </td>

                    <!-- <td class="px-6 py-4 text-sm text-gray-500">
                        <i class="fas fa-newspaper mr-1"></i> 
                        <strong>{{ $category->articles_count ?? 0 }}</strong> {{ Str::plural('article', $category->articles_count ?? 0) }}
                    </td> -->

                    <!-- <td class="px-6 py-4 text-sm">
                        <div class="flex gap-2">
                            <a href="{{ route('categories.edit', $category->id) }}" class="flex-1 bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-700 transition text-center">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure? This will not delete associated articles.');" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-600 text-white px-3 py-2 rounded-lg hover:bg-red-700 transition">
                                    <i class="fas fa-trash mr-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td> -->

                    <td class="px-4 py-3 text-center">
                        <div class="flex gap-2 justify-center">
                            <a href="{{ route('categories.edit', $category->id) }}" class="text-yellow-600 hover:text-yellow-800 transition mr-2" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this category? This will not delete associated articles.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 transition" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $categories->links('pagination::tailwind') }}
    </div>
    @else
    <div class="text-center py-12">
        <i class="fas fa-inbox text-gray-300 text-6xl mb-4"></i>
        <p class="text-gray-500 text-lg">No categories found. <a href="{{ route('categories.create') }}" class="text-blue-600 hover:text-blue-800 font-medium">Create one now</a></p>
    </div>
    @endif
</div>
@endsection