<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mt-3">
      <div class="row">
        
        <div class="col-md-6 offset-md-2">
          <div class="container mt-3">
            <div class="card">
              <div class="card-header">Update Category</div>
              <div class="card-body">
                <form action="{{ url('category/update/'.$category->id)}}" method="post">
                  @csrf
                  <div class="mb-3 mt-3">
                    <label for="category" class="form-label">Category Name:</label>
                    <input type="text" class="form-control" id="category" value="{{ $category->category_name }}" placeholder="Enter category" name="category_name">

                    @error('category_name')
                      <span class="text-danger">{{ $message}}</span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary bg-success">Update Category</button>
                </form> 
              </div> 
              
            </div>
          </div>
        </div>
      </div>
     </div>  
    </div>
</x-app-layout>
