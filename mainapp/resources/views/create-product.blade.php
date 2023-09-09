<x-layout>
  <div class="container py-md-5 container--narrow">
    <form action="/create-product" method="POST">
      @csrf
      <div class="form-group">
        <label for="product-title" class="text-muted mb-1"><small>Title</small></label>
        <input value="{{old('title')}}"  name="title" id="product-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
        @error('title')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
      </div>
     
      <div class="form-group">
        <label for="product-body" class="text-muted mb-1"><small>Description</small></label>
        <textarea value="{{old('body')}}"  name="body" id="product-body" class="body-content textarea form-control" type="text"></textarea>
      </div>
      @error('body')
        <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
      @enderror

      <div class="form-group">
        <label for="product-price" class="text-muted mb-1"><small>Price</small></label>
        <input  value="{{old('price')}}"  name="price" id="product-price" class="form-control form-control " type="number" placeholder="" autocomplete="off" />
      </div>
      @error('price')
        <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
      @enderror

   {{--    <div class="form-group">
        <label for="product-status" class="text-muted mb-1"><small>Status</small></label>
        <select name="status" class=" form-control" id="product-status" placeholder="Choose Product status">
          <option value="" hidden selected>Select Product Status</option>
          <option value="0">New</option>
          <option value="1">Used</option>
        </select>
      </div> --}}

   {{--    <div class="form-group">
        <label for="product-image" class="text-muted mb-1"><small>Image</small></label>
        <input required name="image" id="product-image" class="form-controll" type="file" placeholder="" autocomplete="off" />
      </div> --}}

      <div class="form-group">
        <label for="product-phonenumber" class="text-muted mb-1"><small>Phone Number</small></label>
        <input  value="{{old('phonenumber')}}" name="phonenumber" id="product-phonenumber" class="form-control" type="text" placeholder="" autocomplete="off" />
      </div>
      @error('phonenumber')
        <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
      @enderror

      <div class="form-group">
        <label for="product-location" class="text-muted mb-1"><small>Location</small></label>
        <input  value="{{old('location_id')}}" name="location_id" id="product-location" class="form-control" type="text" placeholder="" autocomplete="off" />
      </div>
      @error('location')
        <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
      @enderror

      <div class="form-group">
        <label for="product-location" class="text-muted mb-1"><small>Categories</small></label>
      </div>


      <button class="btn btn-primary">Save New Product</button>
    </form>
  </div>
</x-layout>