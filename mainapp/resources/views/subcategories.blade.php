@foreach ($subcategories as $subcategory)
    <li>
        <a href="categories/{{$sidebarCategory->id}}">{{ $subcategory->categoryName }}</a>
        @if ($subcategory->subcategories->count() > 0)
            <ul>
                @include('partials.subcategories', ['subcategories' => $subcategory->subcategories])
            </ul>
        @endif
    </li>
@endforeach