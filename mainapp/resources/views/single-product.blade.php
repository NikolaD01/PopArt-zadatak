<x-layout>
  <div class="container py-md-5 container--narrow">
    <div class="d-flex justify-content-between">
      <h2>{{$product->title}}</h2>
      @can('update', $product)
      <span class="pt-2">
        <a href="/product/{{$product->id}}/edit" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
        <form class="delete-post-form d-inline" action="/product/{{$product->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
        </form>
      </span>
      @endcan
    </div>

    <p class="text-muted small mb-4">
      Posted by <a href="#">{{$product->user->username}}</a> on {{$product->created_at->format('n/j/Y')}}
    </p>

    <div class="body-content">
      {{$product->body}}
    </div>
    <hr>
    @foreach ($product->images as $image)
      <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image">
    @endforeach    
    <hr>
    <div class="body-content">
     Price: {{$product->price}}
     <br>
     Status: {{$product->status}}
    </div>
    <hr>
    <div class="body-content">
     Phone Number: {{$product->phonenumber}}
    </div>
    <hr>
    <div class="body-content">
      Category: {{ $product->category->categoryName }}
      <br>
      Location: {{ $product->Location->name}}
    </div>
    @if(auth()->user())
    <div class="body-content text-center">
      <form action="/cart/add/{{$product->id}}" method="POST">
        @csrf
        <button class="btn btn-primary">Add to Cart</button>
      </form>
    </div>
    @endif
      <div class="mt-5">
        <h3>Comments</h3>
            
        <ul class="list-group">
        @foreach ($product->comments as $comment)
          <li class="list-group-item">
              <strong>{{$comment->user->username}}:</strong> {{$comment->content}}
            </li>
        @endforeach
        </ul>
      
        @auth
        <form class="mt-3" action="/product/{{$product->id}}/comments" method="POST">
          @csrf
          <div class="form-group">
            <label for="comment">Add a Comment:</label>
            <textarea class="form-control" id="comment" name="content" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit Comment</button>
        </form>
        @else
          <p class="mt-3">Please <strong>login</strong> to leave a comment.</p>
        @endauth
      </div>
    </div>
</x-layout>