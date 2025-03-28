@extends('layouts.app')

@section('title', 'Obituary Listings')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">Recent Obituaries</h1>
    
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lifespan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submitted</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($obituaries as $obituary)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('obituaries.show', $obituary->slug) }}" 
                           class="text-blue-600 hover:text-blue-800 font-medium">
                            {{ $obituary->name }}
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                            $birthDate = $obituary->date_of_birth instanceof \Carbon\Carbon 
                                ? $obituary->date_of_birth->format('M j, Y') 
                                : 'Unknown';
                            
                            $deathDate = $obituary->date_of_death instanceof \Carbon\Carbon 
                                ? $obituary->date_of_death->format('M j, Y') 
                                : 'Unknown';
                        @endphp
                        {{ $birthDate }} - {{ $deathDate }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $obituary->author ?? 'Unknown' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $obituary->created_at->diffForHumans() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $obituaries->links() }}
    </div>
</div>
@endsection