@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg mb-6">
            <div class="px-6 py-4 bg-blue-600 text-white font-bold rounded-t-lg">
                Articles List
            </div>
            <div class="p-6">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('articles.index') }}" method="GET" class="mb-6">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label for="category" class="block text-gray-700 text-sm font-bold mb-2"><i class="fa-solid fa-filter"></i> Filter by Category:</label>
                            <div class="relative">
                                <select name="category" id="category" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" onchange="this.form.submit()">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">ID</th>
                            <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">Title</th>
                            <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">Categories</th>
                            <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">Status</th>
                            <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">Date</th>
                            <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $article->id }}</td>
                                <td class="py-2 px-4 border-b">{{ $article->title }}</td>
                                <td class="py-2 px-4 border-b">
                                    @foreach ($article->categories as $category)
                                        <span class="inline-block bg-blue-500 text-white text-xs px-2 py-1 rounded-full mr-1">{{ $category->name }}</span>
                                    @endforeach
                                </td>
                                <td class="py-2 px-4 border-b">{{ $article->statut }}</td>
                                <td class="py-2 px-4 border-b">{{ $article->created_at->format('d/m/Y') }}</td>
                                <td class="py-2 px-4 border-b">
                                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $articles->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
@endsection