<x-layout>
  <div class="d-flex justify-content-center flex-row my-3 my-md-0">
    <form action="/search" method="GET" class="form-inline">
        <div class="form-group">
            <input type="text" class="form-control form-control-sm" name="term" placeholder="Search" />
        </div>
        <button type="submit" class="btn btn-primary btn-sm ml-2">Search</button>
    </form>
  </div>

  
  <div class="container py-md-5 container--narrow ">
    <div class="d-flex justify-content-center">
        <h2>Hello <strong>{{ auth()->user()  ? auth()->user()->username : 'Guest' }}</strong>, Welcome to PopArt Store.</h2>
        
      </div>
      <div class="list-group">
        @foreach ($products as $product)
      
            <a href="/product/{{$product->id}}"  class="list-group-item list-group-item-action ">{{ $product->title }}</a>
      
        @endforeach
        
      </div>
      {{ $products->links() }}

      
  </div>
  
  @if(auth()->user())
  <div class="d-flex justify-content-center flex-row my-3 py-3 my-md-0">
   <a href="/cart" class="btn btn-primary">Cart</a>
  </div>
  @endif
</x-layout>