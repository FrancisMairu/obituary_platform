@extends('layouts.app')

@section('title', 'Welcome to Obituary Platform')

@section('content')
<div class="max-w-4xl mx-auto text-center">
    <h1 class="text-4xl font-bold text-gray-800 mb-6">Welcome to Our Memorial Platform</h1>
    <p class="text-xl text-gray-600 mb-8">
        A place to remember and honor your loved ones.
    </p>
    <div class="flex justify-center space-x-4">
        <a href="{{ route('obituaries.index') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg text-lg font-medium transition">
            Browse Obituaries
        </a>
        <a href="{{ route('obituaries.create') }}" 
           class="bg-white hover:bg-gray-100 text-blue-800 border border-blue-800 px-6 py-3 rounded-lg text-lg font-medium transition">
            Submit an Obituary
        </a>
    </div>
</div>
@endsection