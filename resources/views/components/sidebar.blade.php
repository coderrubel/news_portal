<div class="sidebar">
    @php 
    $sidebar = DB::table('sidebar_ads')->first();
    @endphp
    @if(!empty($sidebar->ads_image))
    <div class="widget">
        <div class="ad-sidebar">
            <a href="{{ $sidebar->ads_url ??''}}" target="_blank"><img src="{{ asset($sidebar->ads_image ?? '') }}" alt="{{ $sidebar->ads_name ?? '' }}"></a>
        </div>
    </div>
    @endif


    <div class="widget">
        <div class="news">
            <div class="news-heading">
                <h2>Recent/Popular Post</h2>
            </div>           

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Recent post</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Popular post</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @php 
                    $recentPost = DB::table('posts')->join('sub_catagories','sub_catagories.id','=','posts.sub_category_id')
                                                    ->where('status','active')->orderBy('posts.id','DESC')
                                                    ->select('posts.id','posts.status','posts.post_title','posts.post_photo','posts.created_at','posts.updated_at','posts.visitors','posts.user_name','sub_catagories.sub_category_name')
                                                    ->get();
                    $i=0 @endphp
                    @foreach($recentPost as $post)
                    @php $i++ @endphp
                    @if($i==0) @continue @endif
                    @if($i>5)
                    @break
                    @endif
                    <div class="news-item">
                        <a href="{{ url('/post_details/'.$post->id )}}">
                            <div class="left">
                                <img src="{{asset ($post->post_photo??'')}}" alt="">
                            </div>
                            <div class="right">
                                <div class="category">
                                    <span class="badge bg-success">{{ $post->sub_category_name??'' }}</span>
                                </div>
                                <h2 class="pt-1"><a href="{{ url('/post_details/'.$post->id )}}">{{ $post->post_title??'' }}</a></h2>
                                <div class="date-user">
                                    <div class="user">
                                        <a>{{ $post->user_name??'' }}</a>
                                    </div>
                                    <div class="fas fa-eye" style="margin-right: 20px; margin-top: 3px; position: relative; padding-left: 12px;color: #898989; font-size: 12px;">
                                        {{ $post->visitors??'0' }}
                                    </div>
                                    <div class="date">
                                        <a>{{ date('d-M-Y', strtotime($post->created_at)); }}</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @php 
                    $popularPost = DB::table('posts')->join('sub_catagories','sub_catagories.id','=','posts.sub_category_id')
                                                     ->where('status','active')
                                                     ->orderBy('posts.visitors','DESC')
                                                     ->select('posts.id','posts.status','posts.post_title','posts.post_photo','posts.created_at','posts.updated_at','posts.visitors','posts.user_name','sub_catagories.sub_category_name')
                                                     ->get();
                    $i=0
                     @endphp
                    @foreach($popularPost as $post)
                    @php $i++ @endphp
                    @if($i==0) @continue @endif
                    @if($i>5)
                    @break
                    @endif
                    <div class="news-item">
                        <a href="{{ url('/post_details/'.$post->id )}}">
                        <div class="left">
                            <img src="{{asset ($post->post_photo??'')}}" alt="{{ $post->post_title??'' }}">
                        </div>
                        <div class="right">
                            <div class="category">
                                <span class="badge bg-success">{{ $post->sub_category_name??'' }}</span>
                            </div>
                            <h2 class="pt-1"><a href="{{ url('/post_details/'.$post->id )}}">{{ $post->post_title??'' }}</a></h2>
                            <div class="date-user">
                                <div class="user">
                                    <a>{{ $post->user_name??'' }}</a>
                                </div>
                                <div class="fas fa-eye" style="margin-right: 20px; margin-top: 3px; position: relative; padding-left: 12px;color: #898989; font-size: 12px;">
                                    {{ $post->visitors??'0' }}
                                </div>
                                <div class="date">
                                    <a>{{ date('d-M-Y', strtotime($post->created_at)); }}</a>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @php 
    $sidebar1 = DB::table('sidebar_ads1s')->first();
    @endphp
    @if(!empty($sidebar1->ads_image))
    <div class="widget">
        <div class="ad-sidebar">
            <a href="{{ $sidebar1->ads_url ??''}}" target="_blank"><img src="{{ asset($sidebar1->ads_image ?? '') }}" alt="{{ $sidebar1->ads_name ?? '' }}"></a>
        </div>
    </div>
    @endif
  
    <!-- 
    <div class="widget">
        <div class="tag-heading">
            <h2>Tags</h2>
        </div>
        <div class="tag">
            <div class="tag-item">
                <a><span class="badge bg-secondary">business</span></a>
            </div>
            <div class="tag-item">
                <a><span class="badge bg-secondary">river</span></a>
            </div>
            <div class="tag-item">
                <a><span class="badge bg-secondary">politics</span></a>
            </div>
            <div class="tag-item">
                <a><span class="badge bg-secondary">google</span></a>
            </div>
            <div class="tag-item">
                <a><span class="badge bg-secondary">tree</span></a>
            </div>
            <div class="tag-item">
                <a><span class="badge bg-secondary">airplane</span></a>
            </div>
            <div class="tag-item">
                <a><span class="badge bg-secondary">tiles</span></a>
            </div>
            <div class="tag-item">
                <a><span class="badge bg-secondary">recent</span></a>
            </div>
            <div class="tag-item">
                <a><span class="badge bg-secondary">brand</span></a>
            </div>
            <div class="tag-item">
                <a><span class="badge bg-secondary">election</span></a>
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
    -->                 
</div>