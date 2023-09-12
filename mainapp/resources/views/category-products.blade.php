<x-layout>
    <div class="container py-md-5 container--narrow ">
        <div class="d-flex justify-content-center">
            <h1>Products in {{ $mainCategory->categoryName }}</h1>
        </div>
        @if ($products->isEmpty())
            <div class="list-group">
                <p  class="list-group-item list-group-item-action text-center">No products available in this category.</p>
            </div>
         @else
            <div class="list-group">
                @foreach ($products as $product)
                    <a href="/product/{{$product->id}}"  class="list-group-item list-group-item-action ">{{ $product->title }}</a>
                @endforeach
            </div>
         @endif
    </div>
</x-layout>