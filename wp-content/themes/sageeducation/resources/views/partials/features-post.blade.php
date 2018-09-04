<div class="features-post">
    <div class="features-image">
        <img src="{!! get_the_post_thumbnail_url($post["features_post"]->ID,array(150,150)) !!}">
    </div>
    <div class="features-post-title">
        {!! $post["features_post"]->post_title !!}
    </div>
    <div class="features-post-content">
        {!! $post["features_post"]->post_content !!}
    </div>
</div>