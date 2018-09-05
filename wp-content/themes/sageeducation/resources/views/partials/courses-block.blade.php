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
        <pre>@php
                $all_courses = new WP_Query(
                array(
                    'post_type' => 'courses',
                ));
                //var_dump($all_courses)
            @endphp</pre>


        @if (  $wp_query->max_num_pages > 1 )
            <script>
                var ajaxurl = '{!! site_url()  !!}/wp-admin/admin-ajax.php';
                var true_posts = '{!! serialize($wp_query->query_vars) !!}';
                var max_pages = '{!! $wp_query->max_num_pages  !!}';
                console.log("ajaxurl - " + ajaxurl + " | true_posts - " + true_posts + " | max_pages" + max_pages)
            </script>
        @endif
        <button type="button" id="true_loadmore" class="btn btn-light">View All</button>
        <br>
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