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
                  <div class="card-header">All Brand</div>
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Sl No</th>
                          <th>Brand Name</th>
                          <th>Brand Image</th>
                          <th>CreateAt</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      {{-- <?php $i=0 ?> --}}
                        @foreach($brands as $brand)
                        <tr>
                          {{-- <td>{{  ++$i }}</td> --}}
                          <td>{{ $brands->firstItem() + $loop->index }}</td>
                          <td>{{  $brand->brand_name }}</td>
                          <td>
                            <img src="{{ asset($brand->brand_image)}}" style="width:50px;height:50px">
                          </td>
                            <td>{{ $brand->created_at->diffForHumans() }}</td>  
                            <td>
                              <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-primary">Edit</a>
                              <a href="{{ url('delete/brand/'.$brand->id) }}" class="btn btn-danger">Delete</a>
                            </td>  
                          {{--  this format works for query builder.'--}}
                          {{-- <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td> --}}
        
                        </tr>
                        @endforeach
                      
                      </tbody>                 
                    </table>

                    {{-- This is used for default pagination --}}
                  {{ $brands->links() }}
                  </div> 
                  
                </div>
              </div>
            </div>

            {{-- Add Brand Section --}}

            <div class="col-md-5">
              <div class="container mt-3">
                <div class="card">
                  <div class="card-header">Add Brand</div>
                  <div class="card-body">
                    <form action="{{ route('store.brand')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3 mt-3">
                        <label for="brand_name" class="form-label">Brand Name:</label>
                        <input type="text" class="form-control" id="brand_name" placeholder="Enter brand name" name="brand_name">

                        @error('brand_name')
                          <span class="text-danger">{{ $message}}</span>
                        @enderror
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="brand_image" class="form-label">Brand Image:</label>
                        <input type="file" class="form-control" id="brand_image"  name="brand_image">

                        @error('brand_image')
                          <span class="text-danger">{{ $message}}</span>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary bg-success">Add Brand</button>
                    </form> 
                  </div> 
                  
                </div>
              </div>
            </div>
          </div>
        </div>    
  </div>
</x-app-layout>
