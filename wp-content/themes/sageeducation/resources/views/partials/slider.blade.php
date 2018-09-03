<div class="slider">
    <ul>
        @foreach (get_field("slides_in_slider", "option") as $slide)
        <li>
            @include('partials.slide')
        </li>
        @endforeach
    </ul>
</div>