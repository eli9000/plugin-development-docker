<?php

  defined( 'ABSPATH' ) || die();

  if ( !class_exists( 'Ilektronx_Video_Markup_Plugin' ) )
  {
    class Ilektronx_Video_Markup_Plugin
    {
      public static function init()
      {
        // Add the styles that we need, YES this is needed =)
        function ilektronx_video_markup_admin_styles() {
          wp_enqueue_style( 'video-markup-admin-style', plugin_dir_url( __FILE__ ) . '/css/video-markup-admin.css', array( 'wp-components' ) );
        }
        add_action( 'admin_enqueue_scripts', 'ilektronx_video_markup_admin_styles' );
        
        // Code for Gutenberg
        // Add the meta box for the editor
        function ilektronx_register_primary_video_meta() {
          register_post_meta( 'post', 'wpvm_primary_video', array(
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
            'auth_callback' => function() {
              return current_user_can( 'edit_posts' );
            }
          ) );
        }
        add_action( 'init', 'ilektronx_register_primary_video_meta' );

        function ilektronx_register_secondary_video_meta() {
          register_post_meta( 'post', 'wpvm_secondary_video', array(
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
            'auth_callback' => function() {
              return current_user_can( 'edit_posts' );
            }
          ) );
        }
        add_action( 'init', 'ilektronx_register_secondary_video_meta' );

        function ilektronx_video_markup_enqueue() {
          wp_enqueue_script(
            'ilektronx-video-markup-script',
            plugins_url( '../build/video-markup.js', __FILE__ ),
            array( 'wp-blocks', 'wp-block-editor', 'wp-element', 'wp-components', 'wp-editor', 'wp-data', 'wp-core-data' )
          );
        }
        add_action( 'enqueue_block_editor_assets', 'ilektronx_video_markup_enqueue' );

        // Create a settings page
        function ilektronx_video_markup_add_settings_page() {
          add_options_page( 'Video Markup Settings', 'Video Markup', 'manage_options', 'ilektronx-video-markup-plugin', 'ilektronx_video_markup_render_plugin_settings_page' );
        }
        add_action( 'admin_menu', 'ilektronx_video_markup_add_settings_page' );

        function ilektronx_video_markup_register_settings() {
          register_setting( 'ilektronx_video_markup_plugin_options', 'ilektronx_video_markup_plugin_options', 'ilektronx_video_markup_plugin_options_validate' );
          add_settings_section( 'api_settings', 'API Settings', 'ilektronx_video_markup_plugin_section_text', 'ilektronx_video_markup_plugin' );

          add_settings_field( 'ilektronx_video_markup_plugin_setting_google_api_key', 'Google Services API Key', 'ilektronx_video_markup_plugin_setting_google_api_key', 'ilektronx_video_markup_plugin', 'api_settings' );
        }
        add_action( 'admin_init', 'ilektronx_video_markup_register_settings' );

        // There's got to be a more gutenberg way to do this
        function ilektronx_video_markup_render_plugin_settings_page() {
        ?>
          <h2>Video Markup Settings</h2>
          <form action="options.php" method="post">
        <?php
          settings_fields( 'ilektronx_video_markup_plugin_options' );
          do_settings_sections( 'ilektronx_video_markup_plugin' );
        ?>
            <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e( 'Save' ); ?>" />
          </form>
        <?php
        }
        function ilektronx_video_markup_plugin_options_validate( $input ) {
          // This is where we'd validate settings if we need to
          //$newinput['api_key'] = trim( $input['api_key'] );
          //if ( ! preg_match( '/^[a-z0-9]{32}$/i', $newinput['api_key'] ) ) {
              //$newinput['api_key'] = '';
          //}

          return $input;
        }

        function ilektronx_video_markup_plugin_section_text() {
          echo '<p>Add API keys here to automatically pull data from different services, like YouTube</p>';
        }

        function ilektronx_video_markup_plugin_setting_google_api_key() {
          $options = get_option( 'ilektronx_video_markup_plugin_options' );
          echo "<input class='ilektronx_video_markup_setting' id='ilektronx_video_markup_plugin_setting_google_api_key' name='ilektronx_video_markup_plugin_options[api_key]' type='text' size='50' value='" . esc_attr( $options['api_key'] ) . "' />";
        }
      }
    }
    Ilektronx_Video_Markup_Plugin::init();
  }
