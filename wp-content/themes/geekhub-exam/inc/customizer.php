<?php
/**
 * GH-exam Theme Customizer
 *
 * @package GH-exam
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gh_exam_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

//Registered home page panel
    $wp_customize->add_panel ('Home page panel',
        array(
            'title' => __('Home page panel'),
            'priority' => 10,
        )
    );
    //Intro
    $wp_customize->add_section ( 'intro',
        array(
            'title' => __('Intro section'),
            'priority' => 10,
            'panel' => 'Home page panel'
        )
    );

    $wp_customize->add_setting(
        'intro_image',
        array(
            'default'			=> ''
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'intro_image',
            array(
                'settings'		=> 'intro_image',
                'section'		=> 'intro',
                'label'			=> __( 'Upload intro image')
            )
        )
    );

    $wp_customize->add_setting(
        'intro_title',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'intro_title',
            array(
                'settings'		=> 'intro_title',
                'section'		=> 'intro',
                'type'			=> 'text',
                'label'	        => __( 'Intro title' )
            )
        )
    );
    $wp_customize->add_setting(
        'intro_subtitle',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'intro_subtitle',
            array(
                'settings'		=> 'intro_subtitle',
                'section'		=> 'intro',
                'type'			=> 'text',
                'label'	        => __( 'Intro subtitle' )
            )
        )
    );

    $wp_customize->add_setting(
        'intro_second_title',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'intro_second_title',
            array(
                'settings'		=> 'intro_second_title',
                'section'		=> 'intro',
                'type'			=> 'text',
                'label'	        => __( 'Intro second title' )
            )
        )
    );

    $wp_customize->add_setting(
        'intro_text',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'intro_text',
            array(
                'settings'		=> 'intro_text',
                'section'		=> 'intro',
                'type'			=> 'textarea',
                'label'	        => __( 'Intro text' )
            )
        )
    );
    //Intro end


    //Welcome section
    $wp_customize->add_section ( 'welcome',
        array(
            'title' => __('Welcome section'),
            'priority' => 10,
            'panel' => 'Home page panel'
        )
    );

    $wp_customize->add_setting(
        'welcome_image',
        array(
            'default'			=> ''
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'welcome_image',
            array(
                'settings'		=> 'welcome_image',
                'section'		=> 'welcome',
                'label'			=> __( 'Upload welcome image')
            )
        )
    );

    $wp_customize->add_setting(
        'welcome_title',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'welcome_title',
            array(
                'settings'		=> 'welcome_title',
                'section'		=> 'welcome',
                'type'			=> 'text',
                'label'	        => __( 'Welcome title' )
            )
        )
    );

    $wp_customize->add_setting(
        'welcome_description',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'welcome_description',
            array(
                'settings'		=> 'welcome_description',
                'section'		=> 'welcome',
                'type'			=> 'textarea',
                'label'	        => __( 'Welcome description' )
            )
        )
    );

    //Welcome section end
//    Services
    $wp_customize->add_section ( 'services',
        array(
            'title' => __('Services'),
            'priority' => 10,
            'panel' => 'Home page panel'
        )
    );
    $wp_customize->add_setting(
        'services_title',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'services_title',
            array(
                'settings'		=> 'services_title',
                'section'		=> 'services',
                'type'			=> 'text',
                'label'	        => __( 'Services title' )
            )
        )
    );

    $wp_customize->add_setting(
        'services_subtitle',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'services_subtitle',
            array(
                'settings'		=> 'services_subtitle',
                'section'		=> 'services',
                'type'			=> 'textarea',
                'label'	        => __( 'Services subtitle' )
            )
        )
    );
//    Services end
//    Portfolio
    $wp_customize->add_section ( 'portfolio',
        array(
            'title' => __('Portfolio'),
            'priority' => 10,
            'panel' => 'Home page panel'
        )
    );
    $wp_customize->add_setting(
        'portfolio_title',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'portfolio_title',
            array(
                'settings'		=> 'portfolio_title',
                'section'		=> 'portfolio',
                'type'			=> 'text',
                'label'	        => __( 'Portfolio title' )
            )
        )
    );

    $wp_customize->add_setting(
        'portfolio_subtitle',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'portfolio_subtitle',
            array(
                'settings'		=> 'portfolio_subtitle',
                'section'		=> 'portfolio',
                'type'			=> 'textarea',
                'label'	        => __( 'Portfolio subtitle' )
            )
        )
    );
//    Portfolio end
    //Footer section
    $wp_customize->add_section ( 'footer',
        array(
            'title' => __('Footer'),
            'priority' => 10,
            'panel' => 'Home page panel'
        )
    );
    $wp_customize->add_setting(
        'featured-slider-title',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'featured-slider-title',
            array(
                'settings'		=> 'featured-slider-title',
                'section'		=> 'footer',
                'type'			=> 'text',
                'label'	        => __( 'Featured slider title' )
            )
        )
    );

    $wp_customize->add_setting(
        'map_place',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'map_place',
            array(
                'settings'		=> 'map_place',
                'section'		=> 'footer',
                'type'			=> 'text',
                'label'	        => __( 'Map url (google maps)' )
            )
        )
    );


    $wp_customize->add_setting(
        'copyright',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'copyright',
            array(
                'settings'		=> 'copyright',
                'section'		=> 'footer',
                'type'			=> 'text',
                'label'	        => __( 'Copyright' )
            )
        )
    );

    $wp_customize->add_setting(
        'contact_text',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'contact_text',
            array(
                'settings'		=> 'contact_text',
                'section'		=> 'footer',
                'type'			=> 'text',
                'label'	        => __( 'Contact text' )
            )
        )
    );

    $wp_customize->add_setting(
        'contact_phone',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'contact_phone',
            array(
                'settings'		=> 'contact_phone',
                'section'		=> 'footer',
                'type'			=> 'text',
                'label'	        => __( 'Contact phone' )
            )
        )
    );

    $wp_customize->add_setting(
        'contact_address',
        array(
            'default'			=> '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'contact_address',
            array(
                'settings'		=> 'contact_address',
                'section'		=> 'footer',
                'type'			=> 'text',
                'label'	        => __( 'Contact address' )
            )
        )
    );

}
add_action( 'customize_register', 'gh_exam_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gh_exam_customize_preview_js() {
	wp_enqueue_script( 'gh_exam_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'gh_exam_customize_preview_js' );
