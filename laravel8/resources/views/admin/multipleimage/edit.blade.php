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
              <div class="card-header">Update Brand</div>
              <div class="card-body">
                <form action="{{ url('brand/update/'.$brand->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3 mt-3">
                    <label for="brand_name" class="form-label">Brand Name:</label>
                    <input type="text" class="form-control" id="brand_name" value="{{ $brand->brand_name }}" name="brand_name">

                    @error('brand_name')
                      <span class="text-danger">{{ $message}}</span>
                    @enderror
                  </div>
                  <div class="mb-3 mt-3">
                    <label for="brand_image" class="form-label">Brand Image:</label>
                    <input type="hidden" class="form-control" id="old_image" value="{{ $brand->brand_image }}" name="old_image">
                    <input type="file" class="form-control" id="brand_image" name="brand_image">

                    @error('brand_image')
                      <span class="text-danger">{{ $message}}</span>
                    @enderror
                  </div>
                  <div class="form-group mb-5">
                    <img src="{{ asset($brand->brand_image) }}" style="width:300px; height:200px" alt="">

                  </div>

                  <button type="submit" class="btn btn-primary bg-success">Update Brand</button>
                </form> 
              </div> 
            </div>
          </div>
        </div>
      </div>
     </div>  
    </div>
</x-app-layout>
