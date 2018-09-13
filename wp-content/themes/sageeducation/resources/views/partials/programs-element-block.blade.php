<div class="image-program-element" style="background-image: url('{!! get_field('image_program_field', $program)['url'] !!}')"></div>
<div class="blackout-program-element"></div>
<div class="content-program-element">
    <div class="title-program-element">
        {!! $program->name !!}
    </div>
    <div class="description-program-element">
        {!! $program->description !!}
    </div>
</div>