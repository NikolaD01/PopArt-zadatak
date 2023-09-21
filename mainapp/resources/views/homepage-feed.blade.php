<x-layout>
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
</x-layout>