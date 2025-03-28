@extends('layouts.app')

@section('title', "Obituary for {$obituary->name}")

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <article class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="p-6 md:p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $obituary->name }}</h1>
            
            <div class="text-gray-600 mb-6">
                @if($obituary->date_of_birth && $obituary->date_of_death)
                    <span>{{ optional($obituary->date_of_birth)->format('F j, Y') }}</span> - 
                    <span>{{ optional($obituary->date_of_death)->format('F j, Y') }}</span>
                @else
                    <span class="text-gray-400">Dates not available</span>
                @endif
            </div>
            
            <div class="prose max-w-none text-gray-700 mb-8">
                {!! nl2br(e($obituary->content)) !!}
            </div>
            
            <div class="border-t pt-4 text-sm text-gray-500">
                <p>Submitted by: {{ $obituary->author }}</p>
                <p>Published: {{ $obituary->created_at->format('F j, Y \a\t g:i a') }}</p>
            </div>
        </div>
    </article>
</div>
@endsection