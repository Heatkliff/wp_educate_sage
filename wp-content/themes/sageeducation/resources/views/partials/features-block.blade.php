<div class="features-block">
    <div class="features-posts">
        <div class="features-title">
            {!! get_field('features_block_title','option') !!}
        </div>
        @php
            $features = get_field('features_posts','option')
        @endphp
        <div class="features-blocks">
            @foreach($features['features_output_post'] as $post)
                @include('partials/features-post')
            @endforeach
        </div>
    </div>
</div>