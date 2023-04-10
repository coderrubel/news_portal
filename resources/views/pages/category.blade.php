<x-header/>
        
        <div class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Category: {{ $category->category_name??'' }}</h2>
                        <nav class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $category->category_name??'' }}</li>
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
                        
                        <div class="category-page">
                            <div class="row">
                               @php 
                                $categorysPost = DB::table('posts')->join('sub_catagories','sub_catagories.id','=','posts.sub_category_id')
                                            ->join('categories','categories.id','=','posts.category_id')
                                            ->whereNull('posts.deleted_at')
                                            ->where('posts.status','active')
                                            ->where('posts.category_id', $category->id)
                                            ->orderBy('posts.id','DESC')
                                            ->select('posts.id','posts.status','posts.post_title','posts.post_photo','posts.created_at','posts.updated_at','posts.deleted_at','posts.visitors','posts.user_name','sub_catagories.sub_category_name')
                                            ->paginate(4);
                               @endphp
                                @foreach($categorysPost as $post)
                                <div class="col-lg-6 col-md-12">
                                    <div class="category-page-post-item">
                                        <div class="photo">
                                            <img src="{{ asset($post->post_photo??'') }}" alt="">
                                        </div>
                                        <div class="category">
                                            <span class="badge bg-success">{{ $post->sub_category_name??'' }}</span>
                                        </div>
                                        <h3 class="pt-1"><a href="{{ url('/post_details/'.$post->id )}}"> {{ $post->post_title??'' }} </a></h3>
                                        <div class="date-user">
                                            <div class="user">
                                                {{ $post->user_name??'' }}
                                            </div>
                                            <div class="fas fa-eye" style="margin-right: 20px; margin-top: 3px; position: relative; padding-left: 12px;color: #898989; font-size: 12px;">
                                                {{ $post->visitors??'0' }}
                                            </div>
                                            <div class="date">
                                                {{ date('d-M-Y', strtotime($post->created_at)); }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
        
        
                                <div class="col-md-12">
                                {{ $categorysPost->links() }}
                                    <!-- <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </nav> -->
                               
                                </div>
        
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