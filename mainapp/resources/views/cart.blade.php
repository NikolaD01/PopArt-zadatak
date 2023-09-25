<x-layout>
  <div class="container py-md-5 container--narrow ">
    <div class="d-flex justify-content-center">
        <h2>Hello <strong>{{ auth()->user()  ? auth()->user()->username : 'Guest' }}</strong>, Welcome to your Cart.</h2>
      </div>
      <div class="list-group">
        @php $totalPrice = 0 @endphp
        @foreach ($cartProducts as $product)
        <div  class="list-group-item list-group-item-action ">
          <a href="/product/{{$product->id}}" class="list-group-item-action"  >{{ $product->title }}</a>
          <div class="body-content ">
            Price: {{$product->price}} 
            @php
            $totalPrice += $product->price;
            @endphp
            <form class="delete-post-form d-inline" action="/cart/delete/{{$product->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
            </form>
            @if ($product->images)
            <br>

            @foreach ($product->images as $image)
              <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image">
            @endforeach    
            @endif 
           
           </div> 
        </div>

        @endforeach
        
      </div>
      {{ $cartProducts->links() }}
      <div class="d-flex justify-content-center">
        <form action="/checkout" method="POST" >
          @csrf
          <div class="form-group">
            <input type="hidden" name="total_price" id="total_price" value="{{ $totalPrice }}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button class="btn btn-primary">Checkout</button>
          </div>
        </form>
      </div>
  </div>
</x-layout>