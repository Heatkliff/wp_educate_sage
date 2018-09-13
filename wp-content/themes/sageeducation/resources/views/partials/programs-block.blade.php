<div class="title-program-block">{!! get_field('title_block_programs', 'option') !!}</div>
<div class="programs-block">
    @foreach(get_terms("programs") as $program)
        <div class="program-element">
            @include('partials/programs-element-block')
        </div>
    @endforeach
</div>