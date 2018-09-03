<div class="item"
     style="background-image: url('{!! $slide['photo_background_slider']['url'] !!}')"></div>
<div class="night-slide" style="opacity: {!! get_field('dimming_slide','option') / 100 !!}"></div>
<div class="content-slider">
    <div class="block-content-slider">
        <h1>{!! $slide['content_slide']['title_slide']!!}</h1>

        <h3>{!! $slide['content_slide']['under_title_slide']!!}</h3>
        <div class="button">
            <button type="button" class="btn btn-success">
                <a href="{!! $slide['content_slide']['link_button_slide']['url'] !!}">
                    {!! $slide['content_slide']['text_in_button_slide'] !!}
                </a>
            </button>
        </div>
    </div>
</div>