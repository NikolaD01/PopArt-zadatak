<x-layout>
  <div class="container py-md-5 container--narrow">
    <div class="text-center">
      <a href="/categories" class="btn btn-primary text-white">Categories</a>
      <a href="/locations" class="btn btn-primary text-white">Locations</a>
    </div>
    @foreach ($users as $user)
      @if(!($user->username === auth()->user()->username))
        <div class="d-flex justify-content-between">
          <h2><a href="/profile/{{$user->username}}">{{$user->username}}</a></h2>
          <span class="pt-2">
            <a href="/edit-user/{{$user->id}}/edit" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
            <form class="delete-post-form d-inline" action="/delete/{{$user->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
            </form>
          </span>
        </div>
       @endif  
    @endforeach
  </div>
</x-layout>