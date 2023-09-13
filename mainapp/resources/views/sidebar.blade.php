
<nav id="sidebar">
    <h1 class="text-center text-white">Categories</h1>
    <hr>
    <ul class="list-unstyled px-5">
        @foreach ($sidebarCategories as $sidebarCategory)
            <li>
             
                <form class="category-form" action="{{ route('category.show', $sidebarCategory->id) }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-link">{{ $sidebarCategory->categoryName }}</button>
                </form>                
                @if ($sidebarCategory->subcategories->count() > 0)
                    <ul class="list-unstyled">
                        @include('subcategories', ['subcategories' => $sidebarCategory->subcategories])
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
    <hr>
</nav>
