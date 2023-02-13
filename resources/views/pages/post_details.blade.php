<x-header/>

        <div class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{!! $post_details->post_title !!}</h2>
                        <nav class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/');}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{url('/');}}">{{ $post_details->rCaregory->sub_category_name??'' }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{!! $post_details->post_title??'' !!}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="featured-photo">
                            <img src="{{ asset($post_details->post_photo) }}" alt="">
                        </div>
                        <div class="sub">
                            <div class="item">
                                <b><i class="fas fa-user"></i></b>
                                <a href="">{{ $post_details->user_name??'' }}</a>
                            </div>
                            <div class="item">
                                <b><i class="fas fa-edit"></i></b>
                                <a href="">{{ $post_details->rCaregory->sub_category_name }}</a>
                            </div>
                            <div class="item">
                                <b><i class="fas fa-clock"></i></b> 
                                {{ $post_details->created_at->format('d M Y')??''}}
                            </div>
                            <div class="item">
                                <b><i class="fas fa-eye"></i></b>
                                {{ $post_details->visitors??'0' }}
                            </div>
                        </div>
                        <div class="main-text">
                            <p>{!! $post_details->post_detail??'' !!}</p>
                        </div>
                        <!--  
                        <div class="tag-section">
                            <h2>Tags</h2>
                            <div class="tag-section-content">
                                <a href=""><span class="badge bg-success">business</span></a>
                                <a href=""><span class="badge bg-success">politics</span></a>
                                <a href=""><span class="badge bg-success">nice</span></a>
                                <a href=""><span class="badge bg-success">good</span></a>
                                <a href=""><span class="badge bg-success">finest</span></a>
                            </div>
                        </div>
                        <div class="share-content">
                            <h2>Share</h2>
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>
                        <div class="comment-fb">
                            <h2>Comment</h2>
                            <div id="disqus_thread"></div>
                            <script>
                                (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://arefindev-com.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                                })();
                            </script>
                        </div>
                        -->
                        <div class="related-news">
                            <div class="related-news-heading">
                                <h2>Related Posts</h2>
                            </div>
                            <div class="related-post-carousel owl-carousel owl-theme">
                                @foreach($popular_post as $post)
                                @if($post->rCaregory->category_id == $post_details->category_id)
                                <div class="item">
                                    <div class="photo">
                                        <img src="{{ asset($post->post_photo) }}" alt="">
                                    </div>
                                    <div class="category">
                                        <span class="badge bg-success">{{ $post->rCaregory->sub_category_name??'' }}</span>
                                    </div>
                                    <h3><a href="">{!! $post->post_title??'' !!}</a></h3>
                                    <div class="date-user">
                                        <div class="user">
                                            <a href="">{!! $post->user_name??'' !!}</a>
                                        </div>
                                        <div class="date">
                                            <a href="">{{ $post->created_at->format('d M Y')??''}}</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 sidebar-col">
                        <div class="sidebar">

                            <div class="widget">
                                <div class="news">
                                    <div class="news-heading">
                                        <h2>Recent/Popular Post</h2>
                                    </div>           
                        
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Recent Post</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Popular Post</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                            @php $i=0 @endphp
                                            @foreach($recent_post as $post)
                                            @php $i++ @endphp
                                            @if($i==0) @continue @endif
                                            @if($i>5)
                                            @break
                                            @endif
                                            <div class="news-item">
                                                <div class="left">
                                                    <img src="{{asset ($post->post_photo??'')}}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">{{ $post->rCaregory->sub_category_name??'' }}</span>
                                                    </div>
                                                    <h2><a href="{{ url('/post_details/'.$post->id )}}">{{ $post->post_title??'' }}</a></h2>
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
                                            @endforeach
                                        </div>
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            @php $i=0 @endphp
                                            @foreach($popular_post as $post)
                                            @php $i++ @endphp
                                            @if($i==0) @continue @endif
                                            @if($i>5)
                                            @break
                                            @endif
                                            <div class="news-item">
                                                <div class="left">
                                                    <img src="{{asset ($post->post_photo??'')}}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">{{ $post->rCaregory->sub_category_name??'' }}</span>
                                                    </div>
                                                    <h2><a href="{{ url('/post_details/'.$post->id )}}">{{ $post->post_title??'' }}</a></h2>
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
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  
                            <div class="widget">
                                <div class="ad-sidebar">
                                    <a href=""><img src="uploads/ad-3.png" alt=""></a>
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
                                <div class="ad-sidebar">
                                    <a href=""><img src="uploads/ad-3.png" alt=""></a>
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
                    </div>
                </div>
            </div>
        </div>
        
<x-footer/>
