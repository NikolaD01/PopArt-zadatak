<x-layout>
  <div class="container py-md-5 container--narrow">
    <div class="d-flex justify-content-between">
      <h2>{{$product->title}}</h2>
      <span class="pt-2">
        <a href="#" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
        <form class="delete-post-form d-inline" action="#" method="POST">
          <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
        </form>
      </span>
    </div>

    <p class="text-muted small mb-4">
      Posted by <a href="#">{{$product->user->username}}</a> on {{$product->created_at->format('n/j/Y')}}
    </p>

    <div class="body-content">
      {{$product->body}}
    </div>
    <hr>
    <div class="body-content">
     Price: {{$product->price}}
    </div>
    <hr>
    <div class="body-content">
     Phone Number: {{$product->phonenumber}}
    </div>
    <hr>
    <div class="body-content">
     Location: {{$product->location}}
    </div>
  </div>
</x-layout>