<div class="courses-pre-post">
    <div class="image-pre-post">
        <img src="{!! get_the_post_thumbnail_url($course->ID, 'medium') !!}" alt="">
    </div>
    <div class="title-pre-post">
        {!! $course->post_title !!}
    </div>
    <div class="short-text-pre-post">
        {!! $course_fields['short_text_cources'] !!}
    </div>
    <hr>
    <div class="time-pre-post">
        Time : {!! $course_fields['time_field_cource'] !!}
        <hr>
    </div>
    <div class="teacher-pre-post">
        Teacher : {!! get_the_title($course_fields['teacher_field_cource']) !!}
        <hr>
    </div>
    <div class="join-courses">
        <button type="button" class="btn btn-success">
            <a href="{!! get_page_link($course->ID) !!}">
                Join Now
            </a>
        </button>
    </div>
</div>