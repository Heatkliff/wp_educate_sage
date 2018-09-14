<div class="contact-block">
    <div class="title-contact-block">Contact</div>
    <div class="contact-element-block">
        <div class="contact-form-block">
            {!! do_shortcode(get_field('shortcode_contact_form','option')) !!}
        </div>
        <div class="contact-maps-block">
            @php($maps_location = get_field('where_you_contact_form','option'))
            @php($contact_info = get_field('contact_information','option'))
            <iframe width="100%" height="300" frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?q={!! $maps_location['lat'] !!}%20{!! $maps_location['lng'] !!}&key={!! get_field('google_maps_api_key','option') !!}"
                    allowfullscreen></iframe>
            <div class="contact-info-block">
                <div class="address-contact-block">
                    <div class="img-contact"><img src="{!! $contact_info['address_image_contact_block'] !!}" alt="">
                    </div>
                    <p>{!! $maps_location['address'] !!}</p>
                </div>
                <div class="email-contact-block">
                    <div class="img-contact"><img src="{!! $contact_info['email_image_contact_block'] !!}" alt=""></div>
                    <p>{!! $contact_info['email_contact_block'] !!}</p>
                </div>
                <div class="phone-contact-block">
                    <div class="img-contact"><img src="{!! $contact_info['phone_image_contact_block'] !!}" alt=""></div>
                    <p>{!! $contact_info['phone_number_contact'] !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
