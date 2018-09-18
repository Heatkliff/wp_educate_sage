@if(substr(get_page_link(), 0, -1) == get_site_url())
    @include('partials.headers.main-header')
@else
    @if(get_field("used_header_pages", "option")=="black")
        @include('partials.headers.dark-header')
    @else
        @include('partials.headers.main-header')
    @endif
@endif