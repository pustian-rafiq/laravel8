<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mt-3">
          <div class="row">
            <div class="col-md-6">
              <div class="container mt-3">
                <div class="card">
                  @if(session('success'))
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>{{ session('success') }}</strong>  
                  </div>
                  @endif
                  <div class="card-header">All Category</div>
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Sl No</th>
                          <th>Category Name</th>
                          <th>User Name</th>
                          <th>CreateAt</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      {{-- <?php $i=0 ?> --}}
                        @foreach($categories as $category)
                        <tr>
                          {{-- <td>{{  ++$i }}</td> --}}
                          <td>{{ $categories->firstItem() + $loop->index }}</td>
                          <td>{{  $category->category_name }}</td>
                          {{-- <td>{{ $category->name }}</td> --}}
                          <td>{{ $category->user->name }}</td>
                          {{-- diffForHumans only works for eloquent orm.'--}}
                            <td>{{ $category->created_at->diffForHumans() }}</td>  
                            <td>
                              <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-primary">Edit</a>
                              <a href="{{ url('softDelete/category/'.$category->id) }}" class="btn btn-danger">Delete</a>
                            </td>  
                          {{--  this format works for query builder.'--}}
                          {{-- <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td> --}}
        
                        </tr>
                        @endforeach
                      
                      </tbody>                 
                    </table>

                    {{-- This is used for default pagination --}}
                  {{ $categories->links() }}
                  </div> 
                  
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="container mt-3">
                <div class="card">
                  <div class="card-header">Add Category</div>
                  <div class="card-body">
                    <form action="{{ route('store.category')}}" method="post">
                      @csrf
                      <div class="mb-3 mt-3">
                        <label for="category" class="form-label">Category Name:</label>
                        <input type="text" class="form-control" id="category" placeholder="Enter category" name="category_name">

                        @error('category_name')
                          <span class="text-danger">{{ $message}}</span>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary bg-success">Add Category</button>
                    </form> 
                  </div> 
                  
                </div>
              </div>
            </div>
          </div>

          {{-- Trash list table start here --}}
          <div class="row mt-4">
            <div class="col-md-8">
              <div class="container mt-3">
                <div class="card">
                  <div class="card-header">Trash Category</div>
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Sl No</th>
                          <th>Category Name</th>
                          <th>User Name</th>
                          <th>CreateAt</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      {{-- <?php $i=0 ?> --}}
                        @foreach($trashCategory as $category)
                        <tr>
                          <td>{{ $categories->firstItem() + $loop->index }}</td>
                          <td>{{  $category->category_name }}</td>
                          <td>{{ $category->user->name }}</td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>  
                            <td>
                              <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-danger">Restore</a>
                              <a href="{{ url('category/permanent-delete/'.$category->id) }}" class="btn btn-danger">Delete</a>
                            </td>  
        
                        </tr>
                        @endforeach
                      
                      </tbody>                 
                    </table>

                    {{-- This is used for default pagination --}}
                  {{ $trashCategory->links() }}
                  </div> 
                  
                </div>
              </div>
            </div>
          </div>

          {{-- Trashed list table end here --}}
        </div>    
  </div>
</x-app-layout>
