
@extends('admin.admin_master')
@section('admin')

        <!-- latest news -->
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                                <button type="submit" class="btn btn-primary mt-2">Update</button>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>

@endsection