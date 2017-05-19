<?php

$redux_opt_name = "cl_redata";


/*--------------------------------------CODELESS SLIDER-----------------------------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/

if ( !function_exists( "cl_add_codeless_slider_metaboxes" ) ):
    function cl_add_codeless_slider_metaboxes($metaboxes) {

        $slide_background = array(
            'title'         => __('Background', 'codeless-admin'),
            'icon_class'    => 'icon-large',
            'icon'          => 'el-icon-home',
            'fields'        => array(
                array(
                    'id' => 'slide_background_type',
                    'title' => __( 'Background Type', 'codeless-admin' ),
                    'desc' => 'Select the type of the background',
                    'type' => 'select',
                    'options' => array('image' => 'Image / Color', 'video' => 'Video'),
                    'default' => 'image'
                ),

                array(
                    'id' => 'slide_background_image',
                    'type' => 'background',
                    'title' => __('Background Image / Color', 'codeless-admin'),
                    'subtitle' => __('Page Header background with image', 'codeless-admin'),
                    'default' => '',
                    'required' => array('slide_background_type','=','image')
                ),

                array(
                    'id' => 'slide_mp4_video',
                    'type' => 'text',
                    'title' => __('MP4 video Url', 'codeless-admin'),
                    'default' => '',
                    'required' => array('slide_background_type','=','video'),
                ), 

                array(
                    'id' => 'slide_webm_video',
                    'type' => 'text',
                    'title' => __('Webm video Url', 'codeless-admin'),
                    'default' => '',
                    'required' => array('slide_background_type','=','video'),
                ), 

                array(
                    'id' => 'slide_ogg_video',
                    'type' => 'text',
                    'title' => __('OGG video Url', 'codeless-admin'),
                    'default' => '',
                    'required' => array('slide_background_type','=','video'),
                ), 

                array(
                    'id' => 'slide_mobile_video',
                    'type' => 'media',
                    'title' => __('Image to replace video on mobile', 'codeless-admin'),
                    'default' => '',
                    'required' => array('slide_background_type','=','video'),
                ), 

                array(
                    'id'=>'slide_bg_overlay',
                    'type' => 'color_rgba', 
                    'title' => __('Background Color Overlay', 'codeless-admin'),
                    'subtitle'=> __('Use a bg overlay', 'codeless-admin'),
                    'default'  => array(
                        'color' => '', 
                        'alpha' => '1.0'
                    )
                )

            ),
        );


        $slide_content = array(
            'title'         => __('Content', 'codeless-admin'),
            'icon_class'    => 'icon-large',
            'icon'          => 'el-icon-home',
            'fields'        => array(
                
                array(
                    'id' => 'slide_title',
                    'type' => 'textarea',
                    'title' => __('Title', 'codeless-admin')
                ),

                array(
                    'id'          => 'slide_title_style',
                    'type'        => 'typography', 
                    'title'       => __('Title Style', 'codeless-admin'),
                    'google'      => true, 
                    'font-backup' => false,
                    'font-style'  => false,
                    'text-transform' => true,
                    'letter-spacing' => true,
                    'text-align' => true, 
                    'units'       =>'px',
                    'default'     => array(
                        'color'       => '#222', 
                        'font-style'  => '700', 
                        'text-align'  => 'center', 
                        'font-family' => 'Open Sans', 
                        'google'      => true,
                        'font-size'   => '33px', 
                        'line-height' => '40',
                        'letter-spacing' => '1.8px'
                    )
                ),

                array(
                        'id' => 'slide_title_bg',
                        'type' => 'color_rgba',
                        'title' => __('Title Background', 'codeless-admin'),
                        'mode' => 'background-color', 
                        'default'  => array(
                            'color' => '#000000', 
                            'alpha' => '0'
                        ),
                        'validate' => 'colorrgba',
                ),

                array(
                    'id' => 'slide_title_padding',
                    'type' => 'spacing',
                    'mode' => 'padding', // absolute, padding, margin, defaults to padding
                    'units' => 'px', // You can specify a unit value. Possible: px, em, %
                    'title' => __('Title Padding', 'codeless-admin'),
                    'subtitle' => __(' ', 'codeless-admin'),
                    'desc' => __('Unit: px', 'codeless-admin'),
                    'default' => array('padding-left' => '0px', 'padding-right' => "0px", 'padding-top' => "0px", 'padding-bottom' => "0px")
                ),

                array(
                    'id' => 'slide_title_animation',
                    'title' => __( 'Title animation', 'codeless-admin' ),
                    'desc' => 'Select type of animation',
                    'type' => 'select',
                    'options' => codeless_animations(),
                    'default' => 'fadeInDown'
                ),

                array(
                    'id' => 'slide_description',
                    'type' => 'textarea',
                    'title' => __('Description', 'codeless-admin')
                ),

                array(
                    'id'          => 'slide_description_style',
                    'type'        => 'typography', 
                    'title'       => __('Description Style', 'codeless-admin'),
                    'google'      => true, 
                    'font-backup' => false,
                    'font-style'  => false,
                    'text-transform' => true,
                    'text-align' => true,
                    'units'       =>'px',
                    'default'     => array(
                        'color'       => '#666', 
                        'font-style'  => '400',
                        'text-align'  => 'center', 
                        'font-family' => 'Open Sans', 
                        'google'      => true,
                        'font-size'   => '20px', 
                        'line-height' => '32'
                    )
                ),

                array(
                    'id' => 'slide_description_animation',
                    'title' => __( 'Description animation', 'codeless-admin' ),
                    'desc' => 'Select type of animation',
                    'type' => 'select',
                    'options' => array('fadeInDown' => 'fadeInDown', 'fadeInUp' => 'fadeInUp'),
                    'default' => 'fadeInDown'
                ),

                array(
                    'id' => 'slide_image_switch',
                    'type' => 'switch',
                    'title' => __('Image On Top', 'codeless-admin'),
                    'subtitle' => __('Add an image on top of texts', 'codeless-admin'),
                    "default" => 0
                ),

                array(
                    'id'       => 'slide_image_top',
                    'type'     => 'media', 
                    'url'      => true,
                    'title'    => __('Image Media w/ URL', 'redux-framework-demo'),
                    'default'  => array(
                        'url'=>''
                    ),
                    'required' => array('slide_image_switch', 'equals', 1)
                ),

                array(
                    'id' => 'slide_image_alignment',
                    'title' => __( 'Image Alignment', 'codeless-admin' ),
                    'desc' => 'Select the position of the image',
                    'type' => 'select',
                    'options' => array('center' => 'Center', 'left' => 'Left', 'right' => 'Right'),
                    'default' => 'center',
                    'required' => array('slide_image_switch', 'equals', 1),
                 ),

                array(
                    'id'       => 'slide_image_dimension',
                    'type'     => 'dimensions',
                    'units'    => array('px'),
                    'title'    => __('Image Dimensions (Width/Height)', 'redux-framework-demo'),
                    'default'  => array(
                        'Width'   => '200', 
                        'Height'  => '100'
                    ),
                    'required' => array('slide_image_switch', 'equals', 1),
                ),

                array(
                    'id' => 'slide_button1',
                    'type' => 'text',
                    'title' => __('Button Label', 'codeless-admin'),
                    'subtitle' => __('First Button Label & Link', 'codeless')
                ),

                array(
                    'id' => 'slide_button1_link',
                    'type' => 'text',
                    'title' => __('Button Link', 'codeless-admin')
                ),

                array(
                    'id' => 'slide_button1_style',
                    'title' => __( 'Button Style', 'codeless-admin' ),
                    'desc' => 'Select type of button',
                    'type' => 'select',
                    'options' => array('bordered' => 'Only border', 'colored' => 'Button with bg color'),
                    'default' => 'bordered'
                 ),

                array(
                    'id' => 'slide_button2',
                    'type' => 'text',
                    'title' => __('Button Label', 'codeless-admin'),
                    'subtitle' => __('Second Button Label & Link (Leave Blank if you want to use only one button)', 'codeless')
                ),

                array(
                    'id' => 'slide_button2_link',
                    'type' => 'text',
                    'title' => __('Button Link', 'codeless-admin')
                ),

                array(
                    'id' => 'slide_button2_style',
                    'title' => __( 'Button Style', 'codeless-admin' ),
                    'desc' => 'Select type of button',
                    'type' => 'select',
                    'options' => array('bordered' => 'Only border', 'colored' => 'Button with bg color'),
                    'default' => 'bordered'
                 ),

                array(
                    'id' => 'slide_buttons_colors',
                    'title' => __( 'Overall Buttons Colors', 'codeless-admin' ),
                    'desc' => 'Select type of colors',
                    'type' => 'select',
                    'options' => array('light' => 'Light, for dark backgrounds', 'dark' => 'Dark, for light backgrounds'),
                    'default' => 'light'
                 ),

            ),
        );

        $slide_layout = array(
            'title'         => __('Layout', 'codeless-admin'),
            'icon_class'    => 'icon-large',
            'icon'          => 'el-icon-home',
            'fields'        => array(
                 array(
                    'id' => 'slide_content_position',
                    'title' => __( 'Content Position', 'codeless-admin' ),
                    'desc' => 'Select the position for the content part',
                    'type' => 'select',
                    'options' => array('vertical_centered' => 'Vertical Centered', 'horizontal_centered' => 'Horizontal Centered', 'in_middle' => 'In Middle of slide (Horizontal and Vertical)', 'none' => 'Use only absolute position'),
                    'default' => 'in_middle'
                 ),

                 array(
                    'id'             => 'slide_content_position_absolute',
                    'type'           => 'spacing',
                    'mode'           => 'absolute',
                    'units'          => array('px'),
                    'units_extended' => 'false',
                    'title'          => __('Content custom absolute position', 'codeless-admin'),
                    'subtitle'       => __('Add absolute positioning', 'codeless-admin'),
                    'desc'           => __('In case you select vertical centered, top and bottom positions are fixed. The same for horizontal centered, left and right are fixed. Them are not considerated. If you want to use only absolute positions (Left, Right, Top, Bottom) select "Use only absolute position" '),
                    'default'            => array(
                        'top'    => '',
                        'bottom' => '',
                        'left'   => '',
                        'right'  => ''  
                    )
                ),
                
                array(
                    'id' => 'slide_content_width',
                    'type' => 'text',
                    'title' => __('Content Width', 'codeless-admin'),
                    'subtitle' => __('Examples: auto, 100px, 50%', 'codeless'),
                    'default' => '700px'
                ),

                array(
                    'id' => 'remove_container',
                    'type' => 'switch',
                    'title' => __('Remove Site Container from slider', 'codeless-admin'),
                    'subtitle' => __('By switching this you can remove the slider container and the content should be shown from the left to the right of the screen.', 'codeless-admin'),
                    "default" => 0,
                ),

                array(
                    'id' => 'slider_menu_nav_colors',
                    'type' => 'select', 
                    'title' => __('Menu & Slider Navigation Color', 'codeless-admin'),
                    'subtitle' => __('Select Light for light colors in header, white logo and light slider nav', 'codeless-admin'),
                    'options' => array('dark' => 'Light logo, menu, slider navigations', 'light' => 'Dark logo, menu, slider navigations'), //Must provide key => value pairs for select options
                    'default' =>  'dark'
                ),
            )
        );

        

        $codeless_slider = array();
        $codeless_slider[] = $slide_background;
        $codeless_slider[] = $slide_content;
        $codeless_slider[] = $slide_layout;
        $metaboxes[] = array(
            'id'            => 'codeless-slider',
            'title'         => __( 'Codeless Slide Options', 'codeless-admin' ),
            'post_types'    => array( 'slide'),
            'position'      => 'normal', // normal, advanced, side
            'priority'      => 'high', // high, core, default, low
            'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
            'sections'      => $codeless_slider,
        );
        return $metaboxes;
    }
    add_action('redux/metaboxes/'.$redux_opt_name.'/boxes', 'cl_add_codeless_slider_metaboxes');
endif;

/*--------------------------------------END CODELESS SLIDER-------------------------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/



?>