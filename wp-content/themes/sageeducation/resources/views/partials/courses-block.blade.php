<div class="courses-block">
    <div class="courses-block-title">
        {!! get_field('courses_block_title','option') !!}
    </div>
    <div class="courses-pre-posts">
        @php $courses = get_field('dedicated_courses_posts','option') @endphp
        @foreach($courses as $course)
            @php $course_fields = get_field('fields_cources_post',$course->ID,'option') @endphp
            @include('partials/courses-pre-post')
        @endforeach

    </div>
    <div class="load_all">
        <button type="button" class="btn btn-light"><a class="load_more" href="#">View All</a></button>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>