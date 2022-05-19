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
              <div class="card-header">All Category</div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Email</th>
                      <th>CreateAt</th>
                    </tr>
                  </thead>
                  <tbody>
    
                    {{-- @foreach($users as $user)
                    <tr>
                      <td>{{  $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      {{-- diffForHumans only works for eloquent orm.'--}}
                      {{-- <td>{{ $user->created_at->diffForHumans() }}</td> --}}
                      {{--  this format works for query builder.'--}}
                      {{-- <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td> 
    
                    </tr>
                    @endforeach --}}
                    
                  </tbody>
                </table>
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
                    <input type="text" class="form-control" id="category" placeholder="Enter category" name="category">

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
     </div>

       
    </div>
</x-app-layout>
