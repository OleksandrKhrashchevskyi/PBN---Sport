<?php
if ( ! function_exists( 'minimal_blocks_is_preloader_enabled' ) ) :

    /**
     * Check if Preloader is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function minimal_blocks_is_preloader_enabled( $control ) {

        if ( $control->manager->get_setting( 'theme_options[enable_preloader]' )->value() === true ) {
            return true;
        } else {
            return false;
        }

    }

endif;


if ( ! function_exists( 'minimal_blocks_is_full_blocks_enabled' ) ) :

    /**
     * Check if Full Width Blocks categories is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function minimal_blocks_is_full_blocks_enabled( $control ) {

        if ( $control->manager->get_setting( 'theme_options[enable_footer_recommend_cat]' )->value() === true ) {
            return true;
        } else {
            return false;
        }

    }

endif;


if ( ! function_exists( 'minimal_blocks_is_contact_info_enabled' ) ) :

    /**
     * Check if Contact Info is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function minimal_blocks_is_contact_info_enabled( $control ) {

        if ( $control->manager->get_setting( 'theme_options[enable_contact_info]' )->value() === true ) {
            return true;
        } else {
            return false;
        }

    }

endif;


if ( ! function_exists( 'minimal_blocks_is_related_posts_enabled' ) ) :

    /**
     * Check if related posts is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function minimal_blocks_is_related_posts_enabled( $control ) {

        if ( $control->manager->get_setting( 'theme_options[show_related_posts]' )->value() === true ) {
            return true;
        } else {
            return false;
        }

    }

endif;


if ( ! function_exists( 'minimal_blocks_is_mailchimp_enabled' ) ) :

    /**
     * Check if mailchimp is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function minimal_blocks_is_mailchimp_enabled( $control ) {

        if ( $control->manager->get_setting( 'theme_options[enable_mailchimp]' )->value() === true ) {
            return true;
        } else {
            return false;
        }

    }

endif;