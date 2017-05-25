<?php
if (function_exists('wp_enqueue_media')) {
    wp_enqueue_media();
} else {
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
}
?>
<div id="T-Panel">
    <div class="T-Side">
        <div class="sidenav">
            <div class="logo"><a href="#"><span>T</span>Panel</a></div>
            <ul>
                <?php
                echo panelUI(array(
                    'type' => 'tab-menu',
                    'label' => esc_html__('General Settings', 'kud'),
                    'icon' => 'fa-cogs',
                    'ID' => 'General-Section'
                ));
                echo panelUI(array(
                    'type' => 'tab-menu',
                    'label' => esc_html__('Cities List', 'kud'),
                    'icon' => 'fa-flag',
                    'ID' => 'Cities-Section'
                ));
                echo panelUI(array(
                    'type' => 'tab-menu',
                    'label' => esc_html__('Media Library', 'kud'),
                    'icon' => 'fa-file-video-o',
                    'ID' => 'Media-Section'
                ));
                echo panelUI(array(
                    'type' => 'tab-menu',
                    'label' => esc_html__('Contact US', 'kud'),
                    'icon' => 'fa-envelope',
                    'ID' => 'Contact-Section'
                ));
                echo panelUI(array(
                    'type' => 'tab-menu',
                    'label' => esc_html__('Partners Scroll', 'kud'),
                    'icon' => 'fa-users',
                    'ID' => 'Partners-Section'
                ));
                ?>
            </ul>
        </div>
    </div>
    <div class="T-Content">
        <form action="" method="post" class="formOptions">
            <input type="hidden" name="tpanel_save" value="save">
            <div class="contentNav">
                <button type="submit" class="btn-save"><?php esc_html_e('Save Options', 'kud'); ?></button>
                <button type="button" data-href="<?php echo admin_url('themes.php?page=T-Panel', ''); ?>" class="btn-reset"><?php esc_html_e('Restore', 'kud'); ?></button>
                <div class="form-loading"></div>
                <div class="form-success"></div>
            </div>
            <div class="panel-tab" id="General-Section">
                <div class="panel-block">
                    <div class="block-head"><h2><?php esc_html_e('Header', 'kud'); ?></h2> <i class="fa fa-sort-down"></i></div>
                    <div class="block-body">
                        <table>
                            <tbody>
                                <?php
                                echo panelUI(array(
                                    'type' => 'select-pages',
                                    'label' => esc_html__('Login Page', 'kud'),
                                    'name' => 'login_url',
                                    'value' => $this->panelOption('login_url')
                                ));
                                echo panelUI(array(
                                    'type' => 'select-pages',
                                    'label' => esc_html__('Register Page', 'kud'),
                                    'name' => 'register_url',
                                    'value' => $this->panelOption('register_url')
                                ));
                                echo panelUI(array(
                                    'type' => 'select-pages',
                                    'label' => esc_html__('Join Trainer Page', 'kud'),
                                    'name' => 'join_trainer_url',
                                    'value' => $this->panelOption('join_trainer_url')
                                ));
                                echo panelUI(array(
                                    'type' => 'textbox',
                                    'label' => esc_html__('Phone Number', 'kud'),
                                    'name' => 'header_phone',
                                    'value' => $this->panelOption('header_phone')
                                ));
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-block">
                    <div class="block-head"><h2><?php esc_html_e('Home Sections', 'kud'); ?></h2> <i class="fa fa-sort-down"></i></div>
                    <div class="block-body">
                        <table>
                            <tbody>
                                <?php
                                echo panelUI(array(
                                    'type' => 'select-taxonomy',
                                    'taxonomy' => 'specialties',
                                    'label' => esc_html__('Courses Scroll', 'kud') . ' [1]',
                                    'name' => 'courses_scroll_cat_1',
                                    'value' => $this->panelOption('courses_scroll_cat_1')
                                ));
                                echo panelUI(array(
                                    'type' => 'select-taxonomy',
                                    'taxonomy' => 'specialties',
                                    'label' => esc_html__('Courses Scroll', 'kud') . ' [2]',
                                    'name' => 'courses_scroll_cat_2',
                                    'value' => $this->panelOption('courses_scroll_cat_2')
                                ));
                                echo panelUI(array(
                                    'type' => 'radiobox-list',
                                    'label' => esc_html__('Management Type', 'bro-baz'),
                                    'name' => 'management_type',
                                    'list' => array(
                                        'calendar' => 'Calendar',
                                        'normal' => 'Normal',
                                    ),
                                    'default' => $this->panelOption('management_type')
                                ));
                                echo panelUI(array(
                                    'type' => 'radiobox-list',
                                    'label' => esc_html__('Technical Type', 'bro-baz'),
                                    'name' => 'technical_type',
                                    'list' => array(
                                        'calendar' => 'Calendar',
                                        'normal' => 'Normal',
                                    ),
                                    'default' => $this->panelOption('technical_type')
                                ));
                                echo panelUI(array(
                                    'type' => 'select-pages',
                                    'label' => esc_html__('Search Page URL', 'kud'),
                                    'name' => 'search_page_url',
                                    'value' => $this->panelOption('search_page_url')
                                ));
                                echo panelUI(array(
                                    'type' => 'select-pages',
                                    'label' => esc_html__('Profile Page URL', 'kud'),
                                    'name' => 'profile_page_url',
                                    'value' => $this->panelOption('profile_page_url')
                                ));
                                echo panelUI(array(
                                    'type' => 'select-pages',
                                    'label' => esc_html__('Course Register URL', 'kud'),
                                    'name' => 'course_register_url',
                                    'value' => $this->panelOption('course_register_url')
                                ));
                                echo panelUI(array(
                                    'type' => 'select-pages',
                                    'label' => esc_html__('Add Course URL', 'kud'),
                                    'name' => 'add_course_page_url',
                                    'value' => $this->panelOption('add_course_page_url')
                                ));
                                echo panelUI(array(
                                    'type' => 'textbox',
                                    'label' => esc_html__('Main Catalog URL', 'kud'),
                                    'name' => 'main_catalog_url',
                                    'value' => $this->panelOption('main_catalog_url')
                                ));
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-block">
                    <div class="block-head"><h2><?php esc_html_e('WELCOME TEXT', 'kud'); ?></h2> <i class="fa fa-sort-down"></i></div>
                    <div class="block-body">
                        <table>
                            <tbody>
                                <?php
                                echo panelUI(array(
                                    'type' => 'textbox',
                                    'label' => esc_html__('Title', 'kud') . ' [en]',
                                    'name' => 'welcome_title_en',
                                    'value' => $this->panelOption('welcome_title_en')
                                )) . panelUI(array(
                                    'type' => 'textarea',
                                    'label' => esc_html__('Content', 'kud') . ' [en]',
                                    'name' => 'welcome_content_en',
                                    'value' => $this->panelOption('welcome_content_en')
                                )) . panelUI(array(
                                    'type' => 'break'
                                )) . panelUI(array(
                                    'type' => 'textbox',
                                    'label' => esc_html__('Title', 'kud') . ' [ar]',
                                    'name' => 'welcome_title_ar',
                                    'value' => $this->panelOption('welcome_title_ar')
                                )) . panelUI(array(
                                    'type' => 'textarea',
                                    'label' => esc_html__('Content', 'kud') . ' [ar]',
                                    'name' => 'welcome_content_ar',
                                    'value' => $this->panelOption('welcome_content_ar')
                                ));
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-block">
                    <div class="block-head"><h2><?php esc_html_e('Social Icons', 'kud'); ?></h2> <i class="fa fa-sort-down"></i></div>
                    <div class="block-body">
                        <table>
                            <tbody>
                                <?php
                                echo panelUI(array(
                                    'type' => 'checkbox-toggle',
                                    'label' => esc_html__('Links On New Tab', 'kud'),
                                    'name' => 'footer_social_target',
                                    'default' => $this->panelOption('footer_social_target'),
                                    'value' => get_checkbox($this->panelOption('footer_social_target'))
                                )) . panelUI(array(
                                    'type' => 'textbox',
                                    'label' => esc_html__('Facebook URL', 'kud'),
                                    'name' => 'facebook_url',
                                    'value' => $this->panelOption('facebook_url')
                                )) . panelUI(array(
                                    'type' => 'textbox',
                                    'label' => 'Twitter URL',
                                    'name' => 'twitter_url',
                                    'value' => $this->panelOption('twitter_url')
                                )) . panelUI(array(
                                    'type' => 'textbox',
                                    'label' => esc_html__('Google URL', 'kud'),
                                    'name' => 'google_url',
                                    'value' => $this->panelOption('google_url')
                                )) . panelUI(array(
                                    'type' => 'textbox',
                                    'label' => esc_html__('Youtube URL', 'kud'),
                                    'name' => 'youtube_url',
                                    'value' => $this->panelOption('youtube_url')
                                ));
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-block">
                    <div class="block-head"><h2><?php esc_html_e('Slide Show', 'kud'); ?></h2> <i class="fa fa-sort-down"></i></div>
                    <div class="block-body">
                        <table>
                            <tbody>
                                <?php
                                for ($x = 1; $x <= 7; $x++) {
                                    echo panelUI(array(
                                        'type' => 'upload-single',
                                        'label' => esc_html__('Banner Photo', 'kud') . " [$x]",
                                        'name' => 'slide_show_img_' . $x,
                                        'value' => $this->panelOption('slide_show_img_' . $x)
                                    )) .
                                    panelUI(array(
                                        'type' => 'textbox',
                                        'label' => esc_html__('Banner Link', 'kud') . " [$x]",
                                        'name' => 'slide_show_link_' . $x,
                                        'value' => $this->panelOption('slide_show_link_' . $x)
                                    )) . panelUI(array(
                                        'type' => 'break'
                                    ));
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel-tab" id="Cities-Section">
                <?php
                $cities_count = [];
                for ($x = 1; $x <= 18; $x++) {
                    $cities_count[$x] = $x;
                }
                ?>
                <div class="panel-block">
                    <div class="block-head"><h2><?php esc_html_e('List Cities', 'kud'); ?></h2> <i class="fa fa-sort-down"></i></div>
                    <div class="block-body">
                        <table>
                            <tbody>
                                <?php
                                echo panelUI(array(
                                    'type' => 'select',
                                    'label' => esc_html__('Cities Blocks Count', 'kud'),
                                    'name' => 'cities_blocks_num',
                                    'value' => $this->panelOption('cities_blocks_num'),
                                    'options' => $cities_count
                                ));
                                ?>
                            </tbody>
                        </table>
                        <?php
                        for ($x = 1; $x <= count($cities_count); $x++) {
                            ?>
                            <table class="tbale_blocks cities">
                                <tbody>
                                    <?php
                                    echo panelUI(array(
                                        'type' => 'upload-single',
                                        'label' => esc_html__('City Photo', 'kud') . " [{$x}]",
                                        'name' => 'cities_blocks_photo_' . $x,
                                        'value' => $this->panelOption('cities_blocks_photo_' . $x)
                                    ));
                                    echo panelUI(array(
                                        'ID' => "cities_block_{$x}",
                                        'type' => 'select-taxonomy',
                                        'taxonomy' => 'cities',
                                        'return' => 'slug',
                                        'label' => esc_html__('City Category', 'kud') . " [{$x}]",
                                        'name' => 'cities_blocks_cat_' . $x,
                                        'value' => $this->panelOption('cities_blocks_cat_' . $x)
                                    ));
                                    ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="panel-tab" id="Venues-Section">
                <?php
                $venues = array(
                    'usa' => esc_html__('USA'),
                    'asia' => esc_html__('ASIA'),
                    'europe' => esc_html__('EUROPE'),
                    'middle-east' => esc_html__('MIDDLE EAST'),
                    'africa' => esc_html__('AFRICA'),
                    'north-america' => esc_html__('NORTH AMERICA')
                );
                foreach ($venues as $key => $value) {
                    ?>
                    <div class="panel-block">
                        <div class="block-head"><h2><?php echo $value . ' - ' . esc_html__('List Categories', 'kud'); ?></h2> <i class="fa fa-sort-down"></i></div>
                        <div class="block-body">
                            <table>
                                <tbody>
                                    <?php
                                    echo panelUI(array(
                                        'type' => 'select-pages',
                                        'label' => $value . ' - ' . esc_html__('Page URL', 'kud'),
                                        'name' => 'venues_' . $key . '_page_url',
                                        'value' => $this->panelOption('venues_' . $key . '_page_url')
                                    ));
                                    echo panelUI(array(
                                        'type' => 'upload-single',
                                        'label' => $value . ' - ' . esc_html__('Image', 'kud'),
                                        'name' => 'venues_' . $key . '_img',
                                        'value' => $this->panelOption('venues_' . $key . '_img')
                                    ));
                                    echo panelUI(array(
                                        'type' => 'taxonomy-checkbox-list',
                                        'taxonomy' => 'specialties',
                                        'label' => $value . ' - ' . esc_html__('Categories', 'kud'),
                                        'name' => 'venues_' . $key . '_cats',
                                        'value' => $this->panelOption('venues_' . $key . '_cats')
                                    ));
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="panel-tab" id="Media-Section">
                <div class="panel-block">
                    <div class="block-head"><h2><?php esc_html_e('Home Sections', 'kud'); ?></h2> <i class="fa fa-sort-down"></i></div>
                    <div class="block-body">
                        <table>
                            <tbody>
                                <?php
                                echo panelUI(array(
                                    'type' => 'select-pages',
                                    'label' => esc_html__('All Media Page', 'kud'),
                                    'name' => 'media_all_page',
                                    'value' => $this->panelOption('media_all_page')
                                ));
                                echo panelUI(array(
                                    'type' => 'select-taxonomy',
                                    'taxonomy' => 'media-category',
                                    'return' => 'slug',
                                    'label' => esc_html__('Catalog Category', 'kud'),
                                    'name' => 'media_catalog_cat',
                                    'value' => $this->panelOption('media_catalog_cat')
                                ));
                                echo panelUI(array(
                                    'type' => 'select-taxonomy',
                                    'taxonomy' => 'media-category',
                                    'return' => 'slug',
                                    'label' => esc_html__('Videos Category', 'kud'),
                                    'name' => 'media_videos_cat',
                                    'value' => $this->panelOption('media_videos_cat')
                                ));
                                echo panelUI(array(
                                    'type' => 'select-taxonomy',
                                    'taxonomy' => 'media-category',
                                    'return' => 'slug',
                                    'label' => esc_html__('Photos Category', 'kud'),
                                    'name' => 'media_photos_cat',
                                    'value' => $this->panelOption('media_photos_cat')
                                ));
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel-tab" id="Contact-Section">
                <div class="panel-block">
                    <div class="block-head"><h2><?php esc_html_e('Contact US', 'kud'); ?></h2> <i class="fa fa-sort-down"></i></div>
                    <div class="block-body">
                        <table>
                            <tbody>
                                <?php
                                echo panelUI(array(
                                    'type' => 'textbox',
                                    'label' => esc_html__('Phone', 'kud') . ' [1]',
                                    'name' => 'contact_phone_1',
                                    'value' => $this->panelOption('contact_phone_1')
                                ));
                                echo panelUI(array(
                                    'type' => 'textbox',
                                    'label' => esc_html__('Phone', 'kud') . ' [2]',
                                    'name' => 'contact_phone_2',
                                    'value' => $this->panelOption('contact_phone_2')
                                ));
                                echo panelUI(array(
                                    'type' => 'textbox',
                                    'label' => esc_html__('Fax', 'kud') . ' [2]',
                                    'name' => 'contact_fax',
                                    'value' => $this->panelOption('contact_fax')
                                ));
                                echo panelUI(array(
                                    'type' => 'textbox',
                                    'label' => esc_html__('Email', 'kud') . ' [1]',
                                    'name' => 'contact_email_1',
                                    'value' => $this->panelOption('contact_email_1')
                                ));
                                echo panelUI(array(
                                    'type' => 'textbox',
                                    'label' => esc_html__('Email', 'kud') . ' [2]',
                                    'name' => 'contact_email_2',
                                    'value' => $this->panelOption('contact_email_2')
                                ));
                                echo panelUI(array(
                                    'type' => 'textarea',
                                    'label' => esc_html__('Address', 'kud') . '',
                                    'name' => 'contact_address',
                                    'value' => $this->panelOption('contact_address')
                                ));
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-block">
                    <div class="block-head"><h2><?php esc_html_e('Map Location', 'kud'); ?></h2> <i class="fa fa-sort-down"></i></div>
                    <div class="block-body">
                        <table>
                            <tbody>
                                <?php
                                echo panelUI(array(
                                    'type' => 'textbox',
                                    'label' => esc_html__('Map Latitude ', 'kud'),
                                    'name' => 'gmap_latitude',
                                    'value' => $this->panelOption('gmap_latitude')
                                ));
                                echo panelUI(array(
                                    'type' => 'textbox',
                                    'label' => esc_html__('Map Longitude', 'kud'),
                                    'name' => 'gmap_longitude',
                                    'value' => $this->panelOption('gmap_longitude')
                                ));
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel-tab" id="Partners-Section">
                <div class="panel-block">
                    <div class="block-head"><h2><?php esc_html_e('Partners Scroll', 'kud'); ?></h2> <i class="fa fa-sort-down"></i></div>
                    <div class="block-body">
                        <table>
                            <tbody>
                                <?php
                                $partners_count = [];
                                for ($x = 1; $x <= 25; $x++) {
                                    $partners_count[$x] = $x;
                                }
                                echo panelUI(array(
                                    'type' => 'select',
                                    'label' => esc_html__('Partner Scroll Count', 'kud'),
                                    'name' => 'partner_num',
                                    'value' => $this->panelOption('partner_num'),
                                    'options' => $partners_count
                                ));
                                echo panelUI(array(
                                    'type' => 'checkbox-toggle',
                                    'label' => esc_html__('Scroll Hidden', 'kud'),
                                    'name' => 'partner_hidden',
                                    'default' => $this->panelOption('partner_hidden'),
                                    'value' => get_checkbox($this->panelOption('partner_hidden'))
                                ));
                                ?>
                            </tbody>
                        </table>
                        <?php
                        for ($x = 1; $x <= count($partners_count); $x++) {
                            ?>
                            <table class="tbale_blocks partners">
                                <tbody>
                                    <?php
                                    echo panelUI(array(
                                        'type' => 'upload-single',
                                        'label' => esc_html__('Partner Logo', 'kud') . " [$x]",
                                        'name' => 'partner_img_' . $x,
                                        'value' => $this->panelOption('partner_img_' . $x)
                                    )) .
                                    panelUI(array(
                                        'type' => 'textbox',
                                        'label' => esc_html__('Partner Link', 'kud') . " [$x]",
                                        'name' => 'partner_link_' . $x,
                                        'placeholder' => 'http://',
                                        'value' => $this->panelOption('partner_link_' . $x)
                                    ));
                                    ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="loading_window"></div>