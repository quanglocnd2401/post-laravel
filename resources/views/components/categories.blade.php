{{-- vòng lặp for categories --}}
@props(['level'])

@foreach ($categories as $category)
    <x-category :category="$category" :level="$level" />

    @if ($category->children->isNotEmpty())
        <x-categories :categories="$category->children" :level="$level+1" />
    @endif

@endforeach
