<x-header/>
        @if($setting->news_ticker_status == 'Show')
        <div class="news-ticker-item">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="acme-news-ticker">
                            <div class="acme-news-ticker-label">Latest News</div>
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
        <div class="mt-3"></div>
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
                                        <h2><a href="{{url('/post_details/'.$item->id)}}">{{ $item->post_title }}</a></h2>
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
                                        <h2><a href="{{url('/post_details/'.$item->id)}}">{{ $item->post_title }}</a></h2>
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
        
        <div class="ad-section-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href=""><img src="uploads/ad-1.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        
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
        
        <div class="home-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6 left-col">
                        <div class="left">
                            <!-- News Of Category  -->
                            @if($categories)
                            @foreach($categories as $category)
                            <div class="news-total-item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <h2>{{ $category->category_name ?? '' }}</h2>
                                    </div>
                                    <div class="col-lg-6 col-md-12 see-all">
                                        <a href="" class="btn btn-primary btn-sm">See All News</a>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                                @php
                                $subcat = DB::table('sub_catagories')->where('category_id',$category->id)->orderBy('id','DESC')->first();
                                $subcats = DB::table('sub_catagories')->where('category_id',$category->id)->orderBy('id','DESC')->skip(1)->take(3)->get();
                                $subpost = DB::table('posts')->where('sub_category_id',$subcat->id)->first();
                                @endphp
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="left-side">
                                            <div class="photo">
                                                <img src="{{asset($subpost->post_photo??'')}}" alt="">
                                            </div>
                                            <div class="category">
                                                <span class="badge bg-success">{{$subcat->sub_category_name }}</span>
                                            </div>
                                            <h3><a href="">{{ $subpost->post_title ?? ''}}</a></h3>
                                            <div class="date-user">
                                                <div class="user">
                                                    <a href="">Paul David</a>
                                                </div>
                                                <div class="date">
                                                    <a href="">10 Jan, 2022</a>
                                                </div>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, omnis signiferumque in mei, mei ex enim concludaturque. Senserit salutandi euripidis no per, modus maiestatis scribentur est an. Cum ei doctus oporteat contentiones, vix ...
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="right-side">
                                            @foreach($subcats as $ss)
                                            @php
                                            $subposts = DB::table('posts')->where('sub_category_id',$ss->id)->get();
                                            @endphp
                                            @foreach($subposts  as $sss)
                                            <div class="right-side-item">
                                                <div class="left">
                                                    <img src="{{ asset($sss->post_photo??'') }}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">{{ $ss->sub_category_name??'' }}</span>
                                                    </div>
                                                    <h2><a href="">{{ $sss->post_title??'' }}</a></h2>
                                                    <div class="date-user">
                                                        <div class="user">
                                                            <a href="">Paul David</a>
                                                        </div>
                                                        <div class="date">
                                                            <a href="">10 Jan, 2022</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <!-- backup 
                                <div class="news-total-item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <h2>Sports</h2>
                                    </div>
                                    <div class="col-lg-6 col-md-12 see-all">
                                        <a href="" class="btn btn-primary btn-sm">See All News</a>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="left-side">
                                            <div class="photo">
                                                <img src="{{asset ('fontend/uploads/n6.jpg')}}" alt="">
                                            </div>
                                            <div class="category">
                                                <span class="badge bg-success">International</span>
                                            </div>
                                            <h3><a href="">Haaland scores before going off injured in Dortmund win and it is very real</a></h3>
                                            <div class="date-user">
                                                <div class="user">
                                                    <a href="">Paul David</a>
                                                </div>
                                                <div class="date">
                                                    <a href="">10 Jan, 2022</a>
                                                </div>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, omnis signiferumque in mei, mei ex enim concludaturque. Senserit salutandi euripidis no per, modus maiestatis scribentur est an. Cum ei doctus oporteat contentiones, vix ...
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="right-side">
                                            <div class="right-side-item">
                                                <div class="left">
                                                    <img src="{{asset ('fontend/uploads/n5.jpg')}}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">International</span>
                                                    </div>
                                                    <h2><a href="">Remote island nation in Pacific under lockdown for first time</a></h2>
                                                    <div class="date-user">
                                                        <div class="user">
                                                            <a href="">Paul David</a>
                                                        </div>
                                                        <div class="date">
                                                            <a href="">10 Jan, 2022</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right-side-item">
                                                <div class="left">
                                                    <img src="{{asset ('fontend/uploads/n5.jpg')}}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">International</span>
                                                    </div>
                                                    <h2><a href="">Remote island nation in Pacific under lockdown for first time</a></h2>
                                                    <div class="date-user">
                                                        <div class="user">
                                                            <a href="">Paul David</a>
                                                        </div>
                                                        <div class="date">
                                                            <a href="">10 Jan, 2022</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right-side-item">
                                                <div class="left">
                                                    <img src="{{asset ('fontend/uploads/n5.jpg')}}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">International</span>
                                                    </div>
                                                    <h2><a href="">Remote island nation in Pacific under lockdown for first time</a></h2>
                                                    <div class="date-user">
                                                        <div class="user">
                                                            <a href="">Paul David</a>
                                                        </div>
                                                        <div class="date">
                                                            <a href="">10 Jan, 2022</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right-side-item">
                                                <div class="left">
                                                    <img src="{{asset ('fontend/uploads/n5.jpg')}}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">International</span>
                                                    </div>
                                                    <h2><a href="{{ url('/post_details'); }}">Rubel Remote island nation in Pacific under lockdown for first time</a></h2>
                                                    <div class="date-user">
                                                        <div class="user">
                                                            <a href="">Paul David</a>
                                                        </div>
                                                        <div class="date">
                                                            <a href="">10 Jan, 2022</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->
                            <!-- End News Of Category  -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 sidebar-col">
                        <div class="sidebar">

                            <div class="widget">
                                <div class="ad-sidebar">
                                    <a href=""><img src="{{asset ('fontend/uploads/ad-3.png')}}" alt=""></a>
                                </div>
                            </div>
                        
                            <div class="widget">
                                <div class="tag-heading">
                                    <h2>Tags</h2>
                                </div>
                                <div class="tag">
                                    <div class="tag-item">
                                        <a href=""><span class="badge bg-secondary">business</span></a>
                                    </div>
                                    <div class="tag-item">
                                        <a href=""><span class="badge bg-secondary">river</span></a>
                                    </div>
                                    <div class="tag-item">
                                        <a href=""><span class="badge bg-secondary">politics</span></a>
                                    </div>
                                    <div class="tag-item">
                                        <a href=""><span class="badge bg-secondary">google</span></a>
                                    </div>
                                    <div class="tag-item">
                                        <a href=""><span class="badge bg-secondary">tree</span></a>
                                    </div>
                                    <div class="tag-item">
                                        <a href=""><span class="badge bg-secondary">airplane</span></a>
                                    </div>
                                    <div class="tag-item">
                                        <a href=""><span class="badge bg-secondary">tiles</span></a>
                                    </div>
                                    <div class="tag-item">
                                        <a href=""><span class="badge bg-secondary">recent</span></a>
                                    </div>
                                    <div class="tag-item">
                                        <a href=""><span class="badge bg-secondary">brand</span></a>
                                    </div>
                                    <div class="tag-item">
                                        <a href=""><span class="badge bg-secondary">election</span></a>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="widget">
                                <div class="archive-heading">
                                    <h2>Archive</h2>
                                </div>
                                <div class="archive">
                                    <select name="" class="form-select">
                                        <option value="">Select Month</option>
                                        <option value="">February 2022</option>
                                        <option value="">January 2022</option>
                                        <option value="">December 2021</option>
                                        <option value="">November 2021</option>
                                        <option value="">October 2021</option>
                                        <option value="">September 2021</option>
                                        <option value="">August 2021</option>
                                        <option value="">July 2021</option>
                                    </select>
                                </div>
                            </div>
                        
                            <div class="widget">
                                <div class="live-channel">
                                    <div class="live-channel-heading">
                                        <h2>Live Channel - RT News</h2>
                                    </div>
                                    <div class="live-channel-item">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/V0I5eglJMRI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="widget">
                                <div class="news">
                                    <div class="news-heading">
                                        <h2>Popular News</h2>
                                    </div>           
                        
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Recent News</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Popular News</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                            <div class="news-item">
                                                <div class="left">
                                                    <img src="{{asset ('fontend/uploads/n5.jpg')}}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">International</span>
                                                    </div>
                                                    <h2><a href="">Remote island nation in Pacific under lockdown for first time</a></h2>
                                                    <div class="date-user">
                                                        <div class="user">
                                                            <a href="">Paul David</a>
                                                        </div>
                                                        <div class="date">
                                                            <a href="">10 Jan, 2022</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="news-item">
                                                <div class="left">
                                                    <img src="{{asset ('fontend/uploads/n6.jpg')}}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">Business</span>
                                                    </div>
                                                    <h2><a href="">Serbia revokes Rio Tinto lithium mine permits following protests</a></h2>
                                                    <div class="date-user">
                                                        <div class="user">
                                                            <a href="">Paul David</a>
                                                        </div>
                                                        <div class="date">
                                                            <a href="">10 Jan, 2022</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="news-item">
                                                <div class="left">
                                                    <img src="{{asset ('fontend/uploads/n7.jpg')}}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">Business</span>
                                                    </div>
                                                    <h2><a href="">Toyota Land Cruiser customers in Japan face four-year wait</a></h2>
                                                    <div class="date-user">
                                                        <div class="user">
                                                            <a href="">Paul David</a>
                                                        </div>
                                                        <div class="date">
                                                            <a href="">10 Jan, 2022</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="news-item">
                                                <div class="left">
                                                    <img src="{{asset ('fontend/uploads/n8.jpg')}}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">Sports</span>
                                                    </div>
                                                    <h2><a href="">Haaland scores before going off injured in Dortmund win and it is very real</a></h2>
                                                    <div class="date-user">
                                                        <div class="user">
                                                            <a href="">Paul David</a>
                                                        </div>
                                                        <div class="date">
                                                            <a href="">10 Jan, 2022</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="news-item">
                                                <div class="left">
                                                    <img src="{{asset ('fontend/uploads/n5.jpg')}}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">International</span>
                                                    </div>
                                                    <h2><a href="">Remote island nation in Pacific under lockdown for first time</a></h2>
                                                    <div class="date-user">
                                                        <div class="user">
                                                            <a href="">Paul David</a>
                                                        </div>
                                                        <div class="date">
                                                            <a href="">10 Jan, 2022</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="news-item">
                                                <div class="left">
                                                    <img src="{{asset ('fontend/uploads/n6.jpg')}}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">Business</span>
                                                    </div>
                                                    <h2><a href="">Serbia revokes Rio Tinto lithium mine permits following protests</a></h2>
                                                    <div class="date-user">
                                                        <div class="user">
                                                            <a href="">Paul David</a>
                                                        </div>
                                                        <div class="date">
                                                            <a href="">10 Jan, 2022</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="news-item">
                                                <div class="left">
                                                    <img src="{{asset ('fontend/uploads/n7.jpg')}}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">Business</span>
                                                    </div>
                                                    <h2><a href="">Toyota Land Cruiser customers in Japan face four-year wait</a></h2>
                                                    <div class="date-user">
                                                        <div class="user">
                                                            <a href="">Paul David</a>
                                                        </div>
                                                        <div class="date">
                                                            <a href="">10 Jan, 2022</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="news-item">
                                                <div class="left">
                                                    <img src="{{asset ('fontend/uploads/n8.jpg')}}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">Sports</span>
                                                    </div>
                                                    <h2><a href="">Haaland scores before going off injured in Dortmund win and it is very real</a></h2>
                                                    <div class="date-user">
                                                        <div class="user">
                                                            <a href="">Paul David</a>
                                                        </div>
                                                        <div class="date">
                                                            <a href="">10 Jan, 2022</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="widget">
                                <div class="ad-sidebar">
                                    <a href=""><img src="{{asset ('fontend/uploads/ad-3.png')}}" alt=""></a>
                                </div>
                            </div>
                        
                            <div class="widget">
                                <div class="poll-heading">
                                    <h2>Online Poll</h2>
                                </div>
                                <div class="poll">
                                    <div class="question">
                                        Do you think that Apple products will be able to survive in the next 20 years?
                                    </div>
                                    <div class="answer-option">
                                        <form action="" method="post">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="poll" id="poll_id_1">
                                                <label class="form-check-label" for="poll_id_1">Yes</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="poll" id="poll_id_2">
                                                <label class="form-check-label" for="poll_id_2">No</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="poll" id="poll_id_3">
                                                <label class="form-check-label" for="poll_id_3">No Comment</label>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <a href="poll-result.html" class="btn btn-primary old">Old Result</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
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
        
        
        
        <div class="ad-section-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href=""><img src="{{ asset($brands->brand_image ?? 'fontend/uploads/ad-1.png') }}" alt="{{ $brands->brand_name ?? '' }}"></a>
                    </div>
                </div>
            </div>
        </div>

<x-footer/>