<x-layout>
  <div class="container py-md-5 container--narrow">
    <form action="/create-product" method="POST">
      @csrf
      <div class="form-group">
        <label for="product-title" class="text-muted mb-1"><small>Title</small></label>
        <input required name="title" id="product-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
      </div>
     
      <div class="form-group">
        <label for="product-body" class="text-muted mb-1"><small>Description</small></label>
        <textarea required name="body" id="product-body" class="body-content textarea form-control" type="text"></textarea>
      </div>

      <div class="form-group">
        <label for="product-price" class="text-muted mb-1"><small>Price</small></label>
        <input required name="price" id="product-price" class="form-control form-control " type="number" placeholder="" autocomplete="off" />
      </div>

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
        <input required name="phonenumber" id="product-phonenumber" class="form-control" type="text" placeholder="" autocomplete="off" />
      </div>

      <div class="form-group">
        <label for="product-location" class="text-muted mb-1"><small>Location</small></label>
        <input required name="location" id="product-location" class="form-control" type="text" placeholder="" autocomplete="off" />
      </div>

      <div class="form-group">
        <label for="product-location" class="text-muted mb-1"><small>Categories</small></label>
      </div>

      <button class="btn btn-primary">Save New Product</button>
    </form>
  </div>
</x-layout>