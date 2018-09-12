@php
    $posts = get_posts( array(
	'numberposts' => -1,
	'include'     => array(),
	'exclude'     => array(),
	'meta_key'    => '',
	'meta_value'  =>'',
	'post_type'   => 'post',
) );
@endphp

{{--<pre>@php(var_dump($posts))</pre>--}}
<div class="image-program-element" style="background-image: url('{!! get_the_post_thumbnail_url($posts[0], 'medium') !!}')">
</div>
<div class="blackout-program-element"></div>
<div class="content-program-element">
    <div class="title-program-element">
        {!! $posts[0]->post_title !!}
    </div>
    <div class="description-program-element">
        {!! $posts[0]->post_content !!}
    </div>
</div>