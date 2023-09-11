<x-layout>
  <div class="container py-md-5 container--narrow">
    <form class="my-3" action="/create-location" method="POST">
      @csrf
      <div class="form-group">
        <label for="locationt-name" class="text-muted mb-1"><small>Name</small></label>
        <input value="{{old('name')}}"name="name" id="location-name" class="form-control form-control-lg form-control-title" type="text" placeholder="Enter name of new Location" autocomplete="off"  required  />
        @error('name')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
      </div>
      <div class="text-center">
        <button class="btn btn-primary">Create Location</button>
      </div>
    </form>
    
    
    
    <div class="list-group">
      @foreach ($locations as $location)
        <h4 class="list-group-item list-group-item-action d-flex justify-content-around">
          <span>ID:<strong> {{$location['id']}}</strong></span>
          <span>Name:<strong> {{$location['name']}}</strong></span>
          <form class="delete-post-form d-inline" action="/locations/{{$location->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
          </form>
        </h4>          
      @endforeach
    </div>
  </div>
</x-layout>