<div class="teachers-block">
    <div class="teachers-block-title">
        {!! get_field('title_block_teachers','option') !!}
    </div>
    <div class="teachers-posts">
        @php $teachers = get_all_teachers() @endphp
        @foreach($teachers as $teacher)
            @include('partials/teacher-block-element')
        @endforeach
    </div>
    <div class="navigation-teacher">
        <div class="dot-teacher"></div>
        <div class="dot-teacher"></div>
        <div class="dot-teacher active-teacher"></div>
        <div class="dot-teacher"></div>
        <div class="dot-teacher"></div>
    </div>

</div>


