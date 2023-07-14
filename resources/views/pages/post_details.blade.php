<x-header/>

        <div class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{!! $post_details->post_title !!}</h2>
                        <nav class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/');}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{url('/allpost/'.$post_details->category_id)}}">{{ $post_details->rCaregory->sub_category_name??'' }}</a></li>
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
                        
                        <div class="share-content">
                            <h2>Share</h2>
                            <div class="addthis_inline_share_toolbox">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=https://healthcarebd24.com/post_details/daybetis-reagee-kean-kean-fl-parben-khete"><svg xmlns="http://www.w3.org/2000/svg" height="28" width="28" viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve"><path fill="#1877F2" d="M16,0L16,0c8.837,0,16,7.163,16,16l0,0c0,8.837-7.163,16-16,16l0,0C7.163,32,0,24.837,0,16l0,0 C0,7.163,7.163,0,16,0z"></path><path fill="#FFFFFF" d="M18,17.5h2.5l1-4H18v-2c0-1.03,0-2,2-2h1.5V6.14C21.174,6.097,19.943,6,18.643,6C15.928,6,14,7.657,14,10.7 v2.8h-3v4h3V26h4V17.5z"></path></svg></a>
                                <a href="https://twitter.com/intent/tweethttps://healthcarebd24.com/post_details/daybetis-reagee-kean-kean-fl-parben-khete"><svg xmlns="http://www.w3.org/2000/svg" height="28" width="28" viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve"><path fill="#1DA1F2" d="M16,0L16,0c8.837,0,16,7.163,16,16l0,0c0,8.837-7.163,16-16,16l0,0C7.163,32,0,24.837,0,16l0,0 C0,7.163,7.163,0,16,0z"></path><path fill="#FFFFFF" d="M26.162,9.656c-0.764,0.338-1.573,0.56-2.402,0.658C24.634,9.791,25.288,8.969,25.6,8 c-0.82,0.488-1.719,0.83-2.656,1.015c-0.629-0.673-1.464-1.12-2.373-1.27c-0.909-0.15-1.843,0.004-2.656,0.439 c-0.813,0.435-1.459,1.126-1.838,1.966c-0.379,0.84-0.47,1.782-0.259,2.679c-1.663-0.083-3.29-0.516-4.775-1.268 c-1.485-0.753-2.795-1.81-3.845-3.102c-0.372,0.638-0.567,1.364-0.566,2.103c0,1.45,0.738,2.731,1.86,3.481 c-0.664-0.021-1.313-0.2-1.894-0.523v0.052c0,0.966,0.334,1.902,0.946,2.649c0.611,0.747,1.463,1.26,2.409,1.452 c-0.616,0.167-1.263,0.192-1.89,0.072c0.267,0.831,0.787,1.558,1.488,2.079c0.701,0.521,1.547,0.81,2.419,0.826 c-0.868,0.681-1.861,1.185-2.923,1.482c-1.062,0.297-2.173,0.382-3.268,0.25c1.912,1.229,4.137,1.882,6.41,1.88 c7.693,0,11.9-6.373,11.9-11.9c0-0.18-0.005-0.362-0.013-0.54c0.819-0.592,1.526-1.325,2.087-2.165L26.162,9.656z"></path></svg></a>
                                <a href="https://wa.me/?text=https://healthcarebd24.com/post_details/daybetis-reagee-kean-kean-fl-parben-khete"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 28 28" width="28" height="28"><circle id="Ellipse_3" fill="#4AC959" cx="14" cy="14" r="13.5"></circle><path id="Path_525" fill="#ffffff" d="M19.6,8.3c-3.1-3.1-8.1-3.1-11.2,0c-2.5,2.5-3,6.5-1.3,9.6L6,22l4.2-1.1c1.2,0.6,2.5,1,3.8,1l0,0 c4.4,0.1,7.9-3.4,8-7.8C22,11.9,21.2,9.8,19.6,8.3L19.6,8.3z M14,20.5c-1.2,0-2.3-0.3-3.4-0.9l-0.2-0.1l-2.5,0.7l0.7-2.4l-0.2-0.2 c-1.9-3.1-0.9-7.2,2.2-9.1c3.1-1.9,7.2-0.9,9.1,2.2c0.6,1,0.9,2.2,1,3.3C20.6,17.6,17.7,20.5,14,20.5z M17.6,15.6 c-0.2-0.1-1.2-0.6-1.4-0.6s-0.3-0.1-0.4,0.1s-0.5,0.6-0.6,0.8S15,16,14.8,15.9c-1.1-0.5-2.1-1.3-2.7-2.4c-0.2-0.4,0.2-0.3,0.6-1.1 c0.1-0.1,0-0.2,0-0.3C12.6,12,12.2,11,12,10.6s-0.3-0.3-0.4-0.3s-0.2,0-0.4,0c-0.2,0-0.4,0.1-0.5,0.2c-0.5,0.4-0.7,1-0.7,1.7 c0.1,0.7,0.3,1.5,0.8,2.1c0.9,1.3,2,2.3,3.4,3c0.7,0.4,1.6,0.6,2.4,0.5c0.6-0.1,1-0.5,1.3-0.9c0.1-0.3,0.2-0.6,0.1-0.9 C17.9,15.7,17.8,15.7,17.6,15.6L17.6,15.6z"></path></svg></a>
                                <a href="https://www.linkedin.com/sharing/share-offsitehttps://healthcarebd24.com/post_details/daybetis-reagee-kean-kean-fl-parben-khete"><svg height="28" width="28" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve"><path fill="#0072B1" d="M16,0L16,0c8.837,0,16,7.163,16,16l0,0c0,8.837-7.163,16-16,16l0,0C7.163,32,0,24.837,0,16l0,0 C0,7.163,7.163,0,16,0z"></path><path fill="#FFFFFF" d="M11.333,9.667c0,0.442-0.176,0.866-0.489,1.178c-0.313,0.312-0.737,0.488-1.179,0.488 c-0.442,0-0.866-0.176-1.178-0.489C8.175,10.532,8,10.108,8,9.666C8,9.224,8.176,8.8,8.489,8.488C8.801,8.175,9.225,8,9.667,8 c0.442,0,0.866,0.176,1.178,0.489S11.333,9.225,11.333,9.667L11.333,9.667z M11.383,12.567H8.05V23h3.333V12.567z M16.649,12.567 h-3.316V23h3.283v-5.475c0-3.05,3.975-3.333,3.975,0V23h3.291v-6.608c0-5.141-5.883-4.95-7.266-2.425L16.649,12.567L16.649,12.567z"></path></svg></a>
                            </div>
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
                                @foreach($relatedPost as $post)
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
