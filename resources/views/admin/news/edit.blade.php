@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card card-header">Edit Setting</div>
                        <div class="card card-body">
                            <form action="{{ url('setting/update/'.$setting->id) }}" method="POST">
                                @csrf
                                <div class="my-2">
                                <label for="news_ticker_total" class="form-label">Total Number of Latest News</label>
                                @error('news_ticker_total')<p class="text-danger">{{ $message }}</p>@enderror
                                <input type="text" value="{{ $setting->news_ticker_total }}" name="news_ticker_total" class="form-control rounded mb-2" id="news_ticker_total" placeholder="Total Number of Latest News">
                                <label class="form-label d-block">Status
                                <select name="news_ticker_status" class="form-control rounded mt-2">
                                    <option value="Show" @if($setting->news_ticker_status == 'Show') Selected @endif >Show</option>
                                    <option value="Hide" @if($setting->news_ticker_status == 'Hide') Selected @endif >Hide</option>
                                </select>
                                </label>
                                <button type="submit" class="btn btn-primary mt-2">Update</button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection    
