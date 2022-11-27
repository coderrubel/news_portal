
@extends('admin.admin_master')
@section('admin')

        <!-- latest news -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="d-flex justify-content-between card-header"><span>Latest News Setting</span> <span></span></div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Total Number of Latest News</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($setting as $row)
                            <tr>
                                <td>1</td>
                                <td>{{ $row->news_ticker_total }}</td>
                                <td>{{ $row->news_ticker_status }}</td>
                                <td><a href="{{ url('/setting/edit/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a></td>
                             </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card card-header">Latest News</div>
                    <div class="card card-body">
                        <form action="{{ route('store.news')}}" method="POST">
                            @csrf
                            <div class="my-2">
                                <label for="news_ticker_total" class="form-label">Total Number of Latest News</label>
                                @error('news_ticker_total')<p class="text-danger">{{ $message }}</p>@enderror
                                <input type="text" name="news_ticker_total" class="form-control rounded mb-2" id="news_ticker_total" placeholder="Total Number of Latest News">
                                <label class="form-label d-block">Status
                                <select name="news_ticker_status" class="form-control rounded mt-2">
                                    <option value="Show">Show</option>
                                    <option value="Hide">Hide</option>
                                </select>
                                </label>
                                <button type="submit" class="btn btn-primary mt-2">Created</button>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>

@endsection