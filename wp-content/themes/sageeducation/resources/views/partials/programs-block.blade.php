<div class="title-program-block">{!! get_field('title_block_programs', 'option') !!}</div>
<div class="programs-block">
    @foreach(get_terms("programs") as $program)
        <div class="program-element">
            <a href="{!! get_term_link($program) !!}">
            @include('partials/programs-element-block')
            </a>
        </div>
    @endforeach
</div>