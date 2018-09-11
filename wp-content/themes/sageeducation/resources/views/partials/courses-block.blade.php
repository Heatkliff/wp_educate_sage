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
    <div class="navigation"></div>

    <div class="load_all">
        <button type="button" id="true_loadmore" class="btn btn-light">View All</button>
        <br>
    </div>
</div>