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
                        <x-sidebar/>
                    </div>
                </div>
            </div>
        </div>
        
<x-footer/>
