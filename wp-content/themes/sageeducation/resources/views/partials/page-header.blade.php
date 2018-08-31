<div class="page-header">
    <div class="slider">
        <ul>
            <?php foreach (get_field("slides_in_slider", "option") as $slide){?>
            <li>
                <div class="item"
                     style="background-image: url('<?php echo $slide['photo_background_slider']['url'] ?>')"></div>
                <div class="night-slide"></div>
                <div class="content-clider">
                    <div class="block-content-slider">
                        <h1><?php echo $slide['content_slide']['title_slide']?></h1>

                        <h3><?php echo $slide['content_slide']['under_title_slide']?></h3>
                        <div class="button">
                            <button type="button" class="btn btn-success">
                                <a href="<?php echo $slide['content_slide']['link_button_slide']['url'] ?>">
                                    <?php echo $slide['content_slide']['text_in_button_slide'] ?>
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>

    <h1>{!! App::title() !!}</h1>
</div>