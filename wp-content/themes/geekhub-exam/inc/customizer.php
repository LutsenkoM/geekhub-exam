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

    //Footer section
    $wp_customize->add_section ( 'footer',
        array(
            'title' => __('Footer'),
            'priority' => 10,
            'panel' => 'Home page panel'
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
    //Footer social links
    $wp_customize->add_setting(
        'social_links_facebook',
        array(
            'default'			=> '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        'social_links_facebook',
        array(
            'settings'		=> 'social_links_facebook',
            'section'		=> 'footer',
            'type'			=> 'url',
            'label'	        => __( 'Facebook Url' )
        )
    );

    $wp_customize->add_setting (
        'social_links_twitter',
        array(
            'default'			=> '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control (
        'social_links_twittwer',
        array(
            'settings'		=> 'social_links_twitter',
            'section'		=> 'footer',
            'type'			=> 'url',
            'label'	        => __( 'Twitter Url' )
        )
    );


    $wp_customize->add_setting (
        'social_links_google',
        array(
            'default'			=> '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control (
        'social_links_google',
        array(
            'settings'		=> 'social_links_google',
            'section'		=> 'footer',
            'type'			=> 'url',
            'label'	        => __( 'Google+ Url' )
        )
    );

    $wp_customize->add_setting (
        'social_links_linkedin',
        array(
            'default'			=> '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control (
        'social_links_linkedin',
        array(
            'settings'		=> 'social_links_linkedin',
            'section'		=> 'footer',
            'type'			=> 'url',
            'label'	        => __( 'Linkedin Url' )
        )
    );

    //Footer social links end

}
add_action( 'customize_register', 'gh_exam_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gh_exam_customize_preview_js() {
	wp_enqueue_script( 'gh_exam_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'gh_exam_customize_preview_js' );
