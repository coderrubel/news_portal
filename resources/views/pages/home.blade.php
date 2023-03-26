<x-header/>
    @if($setting)
        @if($setting->news_ticker_status == 'Show')
        <div class="news-ticker-item">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="acme-news-ticker">
                            <div class="acme-news-ticker-label">Latest Post</div>
                            <div class="acme-news-ticker-box">
                                <ul class="my-news-ticker">
                                    @php $i=0; @endphp
                                    @foreach($post as $item)
                                        @php $i++; @endphp
                                        @if($i>$setting->news_ticker_total)
                                        @break
                                        @endif
                                        <li><a href="{{url('/post_details/'.$item->id)}}">{{ $item->post_title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="mb-3"></div>
        @endif
    @else
    <div class="mb-3"></div>
    @endif
        <div class="home-main">
            <div class="container">
                <div class="row g-2">
                    <div class="col-lg-8 col-md-12 left">
                        @php $i=0; @endphp 
                        @foreach($new_post_details as $item)
                        @php $i++; @endphp
                        @if($i == 1)
                        <div class="inner">
                            <div class="photo">
                                <div class="bg"></div>
                                <img src="{{asset ($item->post_photo)}}" alt="">
                                <div class="text">
                                    <div class="text-inner">
                                        <div class="category">
                                            <span class="badge bg-success badge-sm">{{ $item->rCaregory->sub_category_name }}</span>
                                        </div>
                                        <h2 class="pt-1"><a href="{{url('/post_details/'.$item->id)}}">{{ $item->post_title }}</a></h2>
                                        <div class="date-user">
                                            <div class="user">
                                                <a href="{{url('/post_details/'.$item->id)}}">{{ $item->user_name }}</a>
                                            </div>
                                            <div class="date">
                                                <a href="{{url('/post_details/'.$item->id)}}">{{ $item->created_at->format('d M Y')}}</a>
                                            </div>
                                            <div style="margin-left:12px;"> <i class="fas fa-eye"></i> {{ $item->visitors }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="col-lg-4 col-md-12">
                        @php $i=0 @endphp
                        @foreach($new_post_details as $item)
                        @php $i++ @endphp
                        @if($i==1) @continue @endif
                        @if($i>3)
                         @break
                        @endif
                        <div class="inner inner-right">
                            <div class="photo">
                                <div class="bg"></div>
                                <img src="{{asset ($item->post_photo)}}" alt="">
                                <div class="text">
                                    <div class="text-inner">
                                        <div class="category">
                                            <span class="badge bg-success badge-sm">{{ $item->rCaregory->sub_category_name }}</span>
                                        </div>
                                        <h2 class="pt-1"><a href="{{url('/post_details/'.$item->id)}}">{{ $item->post_title }}</a></h2>
                                        <div class="date-user">
                                            <div class="user">
                                                <a href="{{url('/post_details/'.$item->id)}}">{{ $item->user_name }}</a>
                                            </div>
                                            <div class="date">
                                                <a href="{{url('/post_details/'.$item->id)}}">{{ $item->created_at->format('d M Y')}}</a>
                                            </div>
                                            <div style="margin-left:12px;"> <i class="fas fa-eye"></i> {{ $item->visitors }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @if(!empty($header1->ads_image))
        <div class="ad-section-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ $header1->ads_url ??''}}" target="_blank"><img src="{{ asset($header1->ads_image ?? '') }}" alt="{{ $header1->ads_name ?? '' }}"></a>
                    </div>
                </div>
            </div>
        </div>
    @endif
        <!--  Search section
        <div class="search-section">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="" class="form-control" placeholder="Title or Description">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="" class="form-select">
                                    <option value="">Select Category</option>
                                    <option value="">Sports</option>
                                    <option value="">National</option>
                                    <option value="">Lifestyle</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="" class="form-select">
                                    <option value="">Select SubCategory</option>
                                    <option value="">Football</option>
                                    <option value="">Cricket</option>
                                    <option value="">Baseball</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <div class="home-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6 left-col">
                        <div class="left">
                            <!-- News  Category  -->
                            @if($categories)
                            @foreach($categories as $category)
                            <div class="news-total-item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <h2>{{ $category->category_name ?? '' }}</h2>
                                    </div>
                                    <div class="col-lg-6 col-md-12 see-all">
                                        <a href="{{url('/allpost/'.$category->id)}}" class="btn btn-primary btn-sm">See All Post</a>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                                @php
                                $subcat = DB::table('sub_catagories')->where('category_id',$category->id)->orderBy('id','DESC')->first();
                                $subcats = DB::table('sub_catagories')->where('category_id',$category->id)->orderBy('id','DESC')->get();
                                $subpost = DB::table('posts')->join('sub_catagories','sub_catagories.id','=','posts.sub_category_id')
                                            ->join('categories','categories.id','=','posts.category_id')
                                            ->where('posts.status','active')
                                            ->where('posts.category_id', $category->id)->orderBy('posts.id','DESC')
                                            ->select('posts.id','posts.status','posts.post_title','posts.post_photo','posts.created_at','posts.updated_at','posts.visitors','posts.user_name','sub_catagories.sub_category_name')
                                            ->get();
                                @endphp
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        @php $i=0; @endphp 
                                        @foreach($subpost  as $post)
                                        @php $i++; @endphp
                                        @if($i == 1)
                                        <div class="left-side">
                                            <div class="photo">
                                                <img src="{{asset($post->post_photo??'')}}" alt="">
                                            </div>
                                            <div class="category">
                                                <span class="badge bg-success">{{ $post->sub_category_name??'' }}</span>
                                            </div>
                                            <h3 class="pt-1"><a href="{{url('/post_details/'.$post->id)}}">{{ $post->post_title??''}}</a></h3>
                                            <div class="date-user">
                                                <div class="user">
                                                    <a href="">{{ $post->user_name??'' }}</a>
                                                </div>
                                                <div class="fas fa-eye" style="margin-right: 20px; margin-top: 3px; position: relative; padding-left: 12px;color: #898989; font-size: 12px;">
                                                     {{ $post->visitors??'0' }}
                                                </div>
                                                
                                                <div class="date">
                                                    <a href="">{{ date('d-M-Y', strtotime($post->created_at)); }}</a>
                                                </div>
                                            </div>
                                            <p>{!! $post->post_detail??'' !!}</p>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="right-side">
                                            @php
                                            $subposts = DB::table('posts')->join('sub_catagories','sub_catagories.id','=','posts.sub_category_id')
                                                        ->join('categories','categories.id','=','posts.category_id')
                                                        ->where('posts.category_id', $category->id)->orderBy('posts.id','DESC')
                                                        ->select('posts.id','posts.status','posts.post_title','posts.post_photo','posts.created_at','posts.updated_at','posts.visitors','posts.user_name','sub_catagories.sub_category_name')
                                                        ->skip(1)->take(4)->get();
                                            @endphp
                                            @foreach($subposts  as $post)
                                            @if($post->status == 'active')
                                            <div class="right-side-item">
                                                <div class="left">
                                                    <img src="{{ asset($post->post_photo??'') }}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">{{ $post->sub_category_name??'' }}</span>
                                                    </div>
                                                    <h2 class="pt-1"><a href="{{url('/post_details/'.$post->id)}}"> {{ $post->post_title??'' }} </a></h2>
                                                    <div class="date-user">
                                                        <div class="user">
                                                            <a href="">{{ $post->user_name??'' }}</a>
                                                        </div>
                                                        <div class="fas fa-eye" style="margin-right: 20px; margin-top: 3px; position: relative; padding-left: 12px;color: #898989; font-size: 12px;">
                                                            {{ $post->visitors??'0' }}
                                                        </div>
                                                        <div class="date">
                                                            <a href="">{{ date('d-M-Y', strtotime($post->created_at)); }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <!-- End News Category  -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 sidebar-col">
                        <x-sidebar/>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Start Video section 
        <div class="video-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="video-heading">
                            <h2>Videos</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="video-carousel owl-carousel">
                            <div class="item">
                                <div class="video-thumb">
                                    <img src="http://img.youtube.com/vi/tvsyp08Uylw/0.jpg" alt="">
                                    <div class="bg"></div>
                                    <div class="icon">
                                        <a href="http://www.youtube.com/watch?v=tvsyp08Uylw" class="video-button"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="video-caption">
                                    <a href="">Haaland scores before going off injured in Dortmund win and it is very real</a>
                                </div>
                                <div class="video-date">
                                    <i class="fas fa-calendar-alt"></i> Feb 28, 2022
                                </div>
                            </div>
                            <div class="item">
                                <div class="video-thumb">
                                    <img src="http://img.youtube.com/vi/PKATJiyz0iI/0.jpg" alt="">
                                    <div class="bg"></div>
                                    <div class="icon">
                                        <a href="http://www.youtube.com/watch?v=PKATJiyz0iI" class="video-button"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="video-caption">
                                    <a href="">Haaland scores before going off injured in Dortmund win and it is very real</a>
                                </div>
                                <div class="video-date">
                                    <i class="fas fa-calendar-alt"></i> Feb 28, 2022
                                </div>
                            </div>
                            <div class="item">
                                <div class="video-thumb">
                                    <img src="http://img.youtube.com/vi/ekgUjyWe1Yc/0.jpg" alt="">
                                    <div class="bg"></div>
                                    <div class="icon">
                                        <a href="http://www.youtube.com/watch?v=ekgUjyWe1Yc" class="video-button"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="video-caption">
                                    <a href="">Haaland scores before going off injured in Dortmund win and it is very real</a>
                                </div>
                                <div class="video-date">
                                    <i class="fas fa-calendar-alt"></i> Feb 28, 2022
                                </div>
                            </div>
                            <div class="item">
                                <div class="video-thumb">
                                    <img src="http://img.youtube.com/vi/LEcpS6pX9kY/0.jpg" alt="">
                                    <div class="bg"></div>
                                    <div class="icon">
                                        <a href="http://www.youtube.com/watch?v=LEcpS6pX9kY" class="video-button"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="video-caption">
                                    <a href="">Haaland scores before going off injured in Dortmund win and it is very real</a>
                                </div>
                                <div class="video-date">
                                    <i class="fas fa-calendar-alt"></i> Feb 28, 2022
                                </div>
                            </div>
                            <div class="item">
                                <div class="video-thumb">
                                    <img src="http://img.youtube.com/vi/N88TwF4D2PI/0.jpg" alt="">
                                    <div class="bg"></div>
                                    <div class="icon">
                                        <a href="http://www.youtube.com/watch?v=N88TwF4D2PI" class="video-button"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="video-caption">
                                    <a href="">Haaland scores before going off injured in Dortmund win and it is very real</a>
                                </div>
                                <div class="video-date">
                                    <i class="fas fa-calendar-alt"></i> Feb 28, 2022
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>
        </div>
        -->
        
    @if(!empty($brands->brand_image))
        <div class="ad-section-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ $brands->brand_name ??''}}" target="_blank"><img src="{{ asset($brands->brand_image ?? '') }}" alt="{{ $brands->brand_name ?? '' }}"></a>
                    </div>
                </div>
            </div>
        </div>
    @endif                                        
<x-footer/>
