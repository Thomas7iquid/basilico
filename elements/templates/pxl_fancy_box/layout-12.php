<?php
use Elementor\Utils;
extract($settings);

if(!empty($settings['link']['url'])){
    $widget->add_render_attribute( 'link', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'link', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
    }
    if ( ! empty( $settings['link']['custom_attributes'] ) ) {
        // Custom URL attributes should come as a string of comma-delimited key|value pairs
        $custom_attributes = Utils::parse_custom_attributes( $settings['link']['custom_attributes'] );
        $widget->add_render_attribute( 'link', $custom_attributes);
    }
}
$link_attributes = $widget->get_render_attribute_string( 'link' );
?>
 
<div class="pxl-fancy-box layout-12">
    <div class="box-inner">
        <div class="box-title-icon">
            <?php if(!empty($widget->get_setting('title'))): ?>
                <h3 class="box-title">
                    <?php pxl_print_html(nl2br($widget->get_setting('title'))); ?>
                </h3>
            <?php endif; ?>
            <?php if(! empty( $settings['selected_icon']['value'] )): ?>
                <div class="box-icon">
                    <span class="pxl-icon">
                        <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-fancy-icon pxl-icon' ], 'i' );?>
                    </span>
                </div>
            <?php endif; ?>
        </div>
        <?php if(!empty($widget->get_setting('description'))): ?>
            <div class="box-description">
                <?php pxl_print_html($widget->get_setting('description')); ?>
            </div>
        <?php endif; ?>
        <?php if(!empty($widget->get_setting('button_text'))): ?>
            <div class="box-readmore">
                <?php if ( $link_attributes ) echo '<a '. implode( ' ', [ $link_attributes ] ).'>'; ?>
                <?php pxl_print_html($widget->get_setting('button_text')); ?>
                <i class="pxli zmdi zmdi-arrow-right"></i>
                <?php if ( $link_attributes ) echo '</a>'; ?> 
            </div>
        <?php endif; ?>
    </div>  
</div>