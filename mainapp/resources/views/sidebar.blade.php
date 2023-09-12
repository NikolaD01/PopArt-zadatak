{{-- <ul class="">
  @foreach ($categories as $category)
      <li class=""">
          <a href="categories/{{$category->id}}">{{ $category->categoryName }}</a>
          @if ($category->subcategories->count() > 0)
              <ul>
                  @include('subcategories', ['subcategories' => $category->subcategories])
              </ul>
          @endif
      </li>
  @endforeach
</ul> --}}
    <!-- Sidebar -->
    <nav id="sidebar">
        <h1 class="text-center text-white">Categories</h1>
        <!-- Sidebar content here -->
        <hr>
        <ul class="list-unstyled px-5">
            @foreach ($sidebarCategories as $sidebarCategory)
                <li>
                    <a href="categories/{{$sidebarCategory->id}}">{{ $sidebarCategory->categoryName }}</a>
                    @if ($sidebarCategory->subcategories->count() > 0)
                        <ul class="list-unstyled  ">
                            @include('subcategories', ['subcategories' => $sidebarCategory->subcategories])
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
        <hr>
    </nav>

  