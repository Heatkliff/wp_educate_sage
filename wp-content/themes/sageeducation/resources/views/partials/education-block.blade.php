<div class="education-block">
    @php $content_ed_block = get_field('educate_block','option') @endphp
    <div class="image-block" style='background-image: url("{!! $content_ed_block["image_poster"]["url"] !!}")'></div>
    <div class="educate-content">
        <div class="title-educate-block">
            {!! $content_ed_block["content_education_block"]["block_header"] !!}
        </div>
        <div class="content-educate-block">
            {!! $content_ed_block["content_education_block"]["text_in_block"] !!}
        </div>
        @php $list = $content_ed_block["content_education_block"]["list_elements_in_block"] @endphp
        <div class="educate-list">
            @foreach($list as $item)
                <div class="elem-list">
                    <img src="{!! $item["image_in_list_block"]["url"] !!}" alt="">
                    <div class="title-list">{!! $item["text_in_list_block"] !!}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>