<x-layout>
  <div class="container py-md-5 container--narrow">
    <form class="my-3" action="/create-category" method="POST">
      @csrf
      <div class="form-group">
        <label for="category-categoryName" class="text-muted mb-1"><small>Name</small></label>
        <input value="{{old('categoryName')}}"name="categoryName" id="category-categoryName" class="form-control form-control-lg form-control-title" type="text" placeholder="Enter name of new Category" autocomplete="off"  required  />
        @error('categoryName')
          <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
         @enderror
      </div>

      <div class="form-group">
        <label for="parentId" class="text-muted mb-1"><small>Parent Category</small></label>
        <select name="parentId" class=" form-control" id="parentId" placeholder="Choose Parent Category">
          <option value="" hidden selected>Select Parent Category</option>
          <option value="" >No Parent</option>
          @foreach ($categories as $category)
          <option value="{{$category['id']}}">{{$category['categoryName']}}</option>
          @endforeach
        </select>
      </div>

      <div class="text-center">
        <button class="btn btn-primary">Create Category</button>
      </div>
    </form>
      
      
      
    <div class="list-group">
      @foreach ($categories as $category)
        <h4 class="list-group-item list-group-item-action d-flex justify-content-around">
          <span>ID:<strong> {{$category['id']}}</strong></span>
          <span>Name:<strong> <a href="categories/{{$category->id}}">{{$category['categoryName']}}</a></strong></span>
          <form class="delete-post-form d-inline" action="/categories/{{$category->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
          </form>
        </h4>          
      @endforeach
    </div>
  </div>
</x-layout>
