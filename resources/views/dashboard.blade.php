<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
           <b class="bg-success p-1 rounded text-white"> Welcome, {{Auth::user()->name}}</b>
           <b class="bg-success p-1 rounded text-white">Total Users <span class="badge bg-danger">{{ count($users)}}</span></b>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="continar">
            <div class="row justify-content-center">
                <div class="col-md-6">
                <table class="table table-primary table-striped">
                    <thead>
                      <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Created ID </th>
                      </tr>
                    </thead>
                    <tbody>
                      @php( $i = 1)
                      @foreach($users as $user)
                      <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
