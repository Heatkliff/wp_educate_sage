<div class="teacher-post">
    <div class="teacher-image-post">
        <img src="{!! get_the_post_thumbnail_url($teacher['post']->ID, [150,150]) !!}" alt="">
    </div>
    <div class="teacher-content">
        <div class="teacher-title-post">
            {!! $teacher['post']->post_title !!}
        </div>
        <div class="teacher-position-post">
            {!! $teacher['position'] !!}
        </div>
    </div>
</div>