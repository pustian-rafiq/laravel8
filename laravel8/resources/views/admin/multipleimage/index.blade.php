<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mt-3">
          <div class="row">
            <div class="col-md-7">
              <div class="container mt-3">
                <div class="card">
                  @if(session('success'))
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>{{ session('success') }}</strong>  
                  </div>
                  @endif
                  <div class="card-header">Multiple Image Upload</div>
                  <div class="card-body">
                    
                  </div> 
                  
                </div>
              </div>
            </div>

            {{-- Add Brand Section --}}

            <div class="col-md-5">
              <div class="container mt-3">
                <div class="card">
                  <div class="card-header">Add Multiple Image</div>
                  <div class="card-body">
                    <form action="{{ route('store.brand')}}" method="post" enctype="multipart/form-data">
                      @csrf
                     
                      <div class="mb-3 mt-3">
                        <label for="brand_image" class="form-label">Brand Image:</label>
                        <input type="file" class="form-control" id="brand_image"  name="image">

                        @error('image')
                          <span class="text-danger">{{ $message}}</span>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary bg-success">Add Image</button>
                    </form> 
                  </div> 
                  
                </div>
              </div>
            </div>
          </div>
        </div>    
  </div>
</x-app-layout>
