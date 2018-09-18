@if(substr(get_page_link(), 0, -1) == get_site_url())
    @include('partials.footers.main-footer')
@else
    @if(get_field("used_footer_pages", "option")=="sidebars")
        @include('partials.footers.black-footer')
    @else
        @include('partials.footers.main-footer')
    @endif
@endif
