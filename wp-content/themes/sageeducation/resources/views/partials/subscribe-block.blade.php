<div class="subscribe-block"
     style="background-image: url({!! get_field('image_background_for_subscribe_block','option')['url'] !!})">
    <div class="form">
        <div class="label">Subscribe to our Newsletter</div>
        <div class="email-subscribe">
            <input type="email" id="subscribe-send-email" class='subscribe-email' name='email'
                   placeholder="">
        </div>
        <button type="button" id="subscribe-send" class="btn btn-success"> Send</button>
    </div>
    <div class="alert alert-success none" role="alert">
        Success
    </div>
    <div class="alert alert-danger none" role="alert">
        Error
    </div>
</div>