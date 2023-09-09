<x-layout>
  <div class="container py-md-5 container--narrow">
    <h2>
      {{$username}}
      <a class="btn btn-sm btn-success mr-2" href="/create-product">Create Product</a>
    </h2>

    <div class="profile-nav nav nav-tabs pt-2 mb-4">
      <a href="#" class="profile-nav-link nav-item nav-link active">Products: {{$productCount}}</a>
    </div>

    <div class="list-group">
      @foreach($products as $product)
      <a href="/product/{{$product->id}}" class="list-group-item list-group-item-action">
        <strong>{{$product->title}}</strong> on {{$product->created_at->format('n/j/Y')}}
      </a>
      @endforeach
    </div>
  </div>
</x-layout>