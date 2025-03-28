@extends('layouts.app')

@section('title', 'Submit Obituary')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Submit Obituary</h1>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <form method="POST" action="{{ route('obituaries.store') }}" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-gray-700 mb-2">Deceased Name</label>
            <input type="text" id="name" name="name" 
                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="date_of_birth" class="block text-gray-700 mb-2">Date of Birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth" 
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>
            
            <div>
                <label for="date_of_death" class="block text-gray-700 mb-2">Date of Death</label>
                <input type="date" id="date_of_death" name="date_of_death" 
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>
        </div>

        <div>
            <label for="content" class="block text-gray-700 mb-2">Biography</label>
            <textarea id="content" name="content" rows="6"
                      class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      required></textarea>
        </div>

        <div>
            <label for="author" class="block text-gray-700 mb-2">Author</label>
            <input type="text" id="author" name="author" 
                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <button type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
            Submit Obituary
        </button>
    </form>
</div>
@endsection