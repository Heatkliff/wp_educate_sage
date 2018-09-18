@php($blog_posts = get_posts(array(
    'numberposts' => 10,
	'orderby'     => 'date',
	'order'       => 'DESC',
	'post_type'   => 'post',
	'suppress_filters' => true,)))
<div class="blog-slider-block">
    <div class="title-slider-block">{!! get_field('blog_slider_title','option') !!}</div>
    <div class="blog-posts-block">
        @foreach($blog_posts as $blog_post)
            <div class="blog-post-in-block">
                <div class="image-post-block"
                     style="background-image: url('{!! get_the_post_thumbnail_url($blog_post->ID, 'medium') !!}')"></div>

                <div class="title-post-block">
                    {!! $blog_post->post_title !!}
                </div>
                <div class="content-post-block">
                    {!! wp_trim_words($blog_post->post_content,15, '') !!}
                </div>
            </div>
        @endforeach
    </div>

    <button type="button" class="btn btn-success">
        <a href="http://second.wp/index.php/blog-page/">
            Read more
        </a>
    </button>
</div>