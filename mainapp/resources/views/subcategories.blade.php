@foreach ($subcategories as $subcategory)
    <li>
        <a href="categories/{{$sidebarCategory->id}}">{{ $subcategory->categoryName }}</a>
        @if ($subcategory->subcategories->count() > 0)
            <ul>
                @if (view()->exists('partials.subcategories'))
                    @include('partials.subcategories', ['subcategories' => $subcategory->subcategories])
                @else
                    <li>View subcategories not found.</li>
                @endif
            </ul>
        @endif
    </li>
@endforeach
