@php $pre_post = get_field("post_for_block_pre-post", "option") @endphp
<div class="block-pre-post-dark" style="background-image: url('{{get_the_post_thumbnail_url($pre_post->ID)}}')">

    {{--<pre>@php var_dump($pre_post) @endphp</pre>--}}

    <div class="darkness"></div>
    <div class="pre-post">
        <div class="title-pre-post">
            {{$pre_post->post_title}}
        </div>
        <div class="pre-content-block">
            {{wp_trim_words($pre_post->post_content, 55, "")}}
        </div>
        <a href="{{$pre_post->guid}}" class="read-more-pre-post">
            Read more
        </a>
    </div>
</div>