@php
header("Content-Type: text/xml");
echo 'xml version="1.0" encoding="UTF-8"?>';
@endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('obituaries.create') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('obituaries.index') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    @foreach($obituaries as $obituary)
    <url>
        <loc>{{ route('obituaries.show', $obituary->slug) }}</loc>
        <lastmod>{{ $obituary->updated_at->toIso8601String() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
</urlset>