<x-layout>
  <div class="container py-md-5 container--narrow">
    <form action="/product/{{$product->id}}" method="POST" enctype="multipart/form-data">
      <p><small><strong><a href="/product/{{$product->id}}">&laquo; Back to product</a></strong></small></p>
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="product-title" class="text-muted mb-1"><small>Title</small></label>
        <input value="{{old('title', $product->title)}}"  name="title" id="product-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
        @error('title')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
      </div>
     
      <div class="form-group">
        <label for="product-body" class="text-muted mb-1"><small>Description</small></label>
        <textarea value="{{old('body' , $product->body)}}"  name="body" id="product-body" class="body-content textarea form-control" type="text"></textarea>
      </div>
      @error('body')
        <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
      @enderror

      <div class="form-group">
        <label for="product-image" class="text-muted mb-1"><small>Image</small></label>
        <input name="image" id="product-image" class="form-control-file" type="file" accept="image/*" />
        @error('image')
          <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
      </div>
     
      <div class="form-group">
        <label for="product-price" class="text-muted mb-1"><small>Price</small></label>
        <input  value="{{old('price' , $product->price)}}"  name="price" id="product-price" class="form-control form-control " type="number" placeholder="" autocomplete="off" />
      </div>
      @error('price')
        <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
      @enderror

      <div class="form-group">
        <label for="product-phonenumber" class="text-muted mb-1"><small>Phone Number</small></label>
        <input  value="{{old('phonenumber', $product->phonenumber)}}" name="phonenumber" id="product-phonenumber" class="form-control" type="text" placeholder="" autocomplete="off" />
      </div>
      @error('phonenumber')
        <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
      @enderror

      <div class="form-group">
        <label for="product-status" class="text-muted mb-1"><small>Status</small></label>
        <select required name="status" class=" form-control" id="product-status" placeholder="Choose Product status">
          <option value="" hidden selected>Select Product Status</option>
          <option value="New">New</option>
          <option value="Used">Used</option>
        </select>
      </div> 

      <div class="form-group">
        <label for="locationId" class="text-muted mb-1"><small>Location</small></label>
        <select required name="locationId" class=" form-control" id="locationId" placeholder="Choose Parent Category">
          <option value="" hidden selected>Select Location</option>
          @foreach ($locations as $location)
          <option value="{{$location['id']}}">{{$location['name']}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="categoryId" class="text-muted mb-1"><small>Category</small></label>
        <select required name="categoryId" class=" form-control" id="categoryId" placeholder="Choose Parent Category">
          <option value="" hidden selected>Select Category</option>
          @foreach ($categories as $category)
          <option value="{{$category['id']}}">{{$category['categoryName']}}</option>
          @endforeach
        </select>
      </div>

      <button class="btn btn-primary">Save Changes on Product</button>
    </form>
  </div>
</x-layout>