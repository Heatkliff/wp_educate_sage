@php($comments = get_field('coment_block_client', 'option'))
<div class="what-client-comment-block">
    <div class="title-client-comment-block">
        {!! get_field('title_client_comment_block', 'option') !!}
    </div>

    <div class="what-client-sliders">
        <div class="photos-comment-slider">
            @foreach($comments as $comment)
                <div class="photo-client">
                    <img src="{!! $comment['photo_what_client']['sizes']['thumbnail'] !!}" alt="">
                    <div class="photo-client-darkness"></div>
                </div>
            @endforeach
        </div>

        <div class="what-client-slider-content">
            @foreach($comments as $comment)
                <div class="content-client-comment">
                    <div class="comment-client">
                        {!! $comment['content_block_client']['coment_what_client'] !!}
                    </div>
                    <div class="name-client-comment">
                        {!! $comment['content_block_client']['name_what_client'] !!}
                    </div>
                    <dib class="position-client-comment">
                        {!! $comment['content_block_client']['position_what_client'] !!}
                    </dib>
                </div>
            @endforeach
        </div>
    </div>

    <div class="what-client-mobile">
        @foreach($comments as $comment)
            <div class="comment-client-mobile">
                <div class="photo-client-mobile">
                    <img src="{!! $comment['photo_what_client']['sizes']['thumbnail'] !!}" alt="">
                </div>
                <div class="comment-client-mobile">
                    {!! $comment['content_block_client']['coment_what_client'] !!}
                </div>
            </div>
        @endforeach
    </div>
</div>