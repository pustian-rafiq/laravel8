<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mt-3">
            <h2>Users Table</h2>
                     
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
</x-app-layout>
