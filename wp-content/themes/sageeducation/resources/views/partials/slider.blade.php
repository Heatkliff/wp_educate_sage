<div class="slider">
    <div class="slider-header">
        @foreach (get_field("slides_in_slider", "option") as $slide)
        <div>
            @include('partials.slide')
        </div>
        @endforeach
    </div>
</div>