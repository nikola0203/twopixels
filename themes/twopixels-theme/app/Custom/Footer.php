<?php

namespace Awpt\Custom;

use Awpt\Plugins\Acf;

/**
 * Use it to write your custom functions.
 */
class Footer
{
  /**
   * Display footer logo.
   */
  public static function logo()
  {
    $settings = get_field( 'footer_settings', 'option' );
    if ( !empty( $settings['footer_logo'] ) ) {
      ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ) ); ?>">
        <?php Acf::image( $settings['footer_logo'], 'medium_large', 'footer-logo' ); ?>
      </a>
      <?php
    }
  }
  
  public static function copy()
  {
    $settings = get_field( 'footer_settings', 'option' );
    if ( ! empty( $settings['copyright'] ) ) {
      ?>
      <div class="footer-copyright-text text-center text-lg-start text-small">
        <p><?php echo wp_kses_post( $settings['copyright'] ); ?></p>  
      </div>
      <?php
    }
  }

  public static function footer_contact(){
    $settings = get_field( 'footer_settings','option' );
    $contact  = ( ! empty( $settings['footer_contact'] ) ) ? $settings['footer_contact'] : '';
    $links    = ( ! empty( $contact['links'] ) ) ? $contact['links'] : '';
    ?>
    <ul class="mb-0 py-8 py-lg-0 ps-0 text-center text-lg-end footer-contact">
      <?php
      if ( ! empty( $links ) ) {
        foreach ( $links as $key ) {
          ?>
          <li class="mb-6"><a href="<?php echo esc_url($key['link']['url']); ?>"><?php esc_html_e($key['link']['title']); ?></a></li>
          <?php
        }
      }
      if ( ! empty($contact['facebook_link'])) {
        ?>
        <li class="d-inline"><a href="<?php echo esc_url($contact['facebook_link']); ?>"><?php echo icon_facebook(); ?></a></li>
        <?php
      }
        if ( ! empty($contact['instagram_link'])) {
        ?>
          <li class="d-inline px-6"><a href="<?php echo esc_url($contact['instagram_link']); ?>"><?php echo icon_instagram(); ?></a></li>
        <?php
      }
        if ( ! empty($contact['youtube_link'])) {
        ?>
          <li class="d-inline"><a href="<?php echo esc_url($contact['youtube_link']); ?>"><?php echo icon_twitter(); ?></a></li>
        <?php
      }
      ?>
    </ul>
    <?php 
  }

  public static function footer_links() {
    $settings    = get_field( 'footer_settings', 'option');
    $links       = $settings['links'];
    if ( ! empty( $links ) ) {
      $count_links = count( $links );
      ?>
      <ul class="ps-0 m-0 d-flex justify-content-center justify-content-lg-end lh-1">
        <?php
        foreach ( $links as $link_key => $link ) {
          ?>
          <li class="<?php echo ( $link_key == $count_links-1 ) ? 'border-start ps-5 ms-5' : 'ps-md-5'; ?>"><a href="<?php echo esc_url( $link['link']['url'] ); ?>" class="txt-white"><?php echo esc_html($link['link']['title']); ?></a></li>
          <?php
        }
        ?>
      </ul>
      <?php
    }
  }

  public static function socialIcons()
  {
    $settings     = get_field( 'footer_settings', 'option' );
    $social_links = ( ! empty( $settings['social_links_group'] ) ) ? $settings['social_links_group'] : '';

    $html = ( ! empty( $social_links['title'] ) ) ? '<h4 class="widget-title text-medium text-uppercase font-family-base fw-600 mb-4 mb-sm-9">'. esc_html( $social_links['title'] ) .'</h4>' : '';

    $html .= '<ul class="footer-social-icons d-lg-flex mb-0 ps-0">';
      $html .= ( ! empty( $social_links['twitter_url'] ) ) ? '<li class="d-inline-block mb-sm-0 mt-4 me-5 mb-0 mt-sm-0"><a href="' . esc_url( $social_links['twitter_url'] ) . '" class="">'. icon_twitter() .'</a></li>' : '';
      $html .= ( ! empty( $social_links['facebook_url'] ) ) ? '<li class="d-inline-block mb-sm-0 mt-4 me-5 mb-0 mt-sm-0"><a href="' . esc_url( $social_links['facebook_url'] ) . '" class="">'. icon_facebook() .'</a></li>' : '';
      $html .= ( ! empty( $social_links['yelp_url'] ) ) ? '<li class="d-inline-block mb-sm-0 mt-4 me-5 mb-0 mt-sm-0"><a href="' . esc_url( $social_links['yelp_url'] ) . '" class="">'. icon_yelp() .'</a></li>' : '';
      // $html .= ( ! empty( $social_links['instagram'] ) ) ? '<li class="d-inline-block mb-sm-0 mt-4 me-5 mb-0 mt-sm-0"><a href="' . esc_url( $social_links['instagram'] ) . '" class="">'. icon_instagram() .'</a></li>' : '';
      // $html .= ( ! empty( $social_links['youtube'] ) ) ? '<li class="d-inline-block mb-sm-0 mt-4 me-5 mb-0 mt-sm-0"><a href="' . esc_url( $social_links['youtube'] ) . '" class="">'. icon_youtube() .'</a></li>' : '';
      // $html .= ( ! empty( $social_links['pinterest'] ) ) ? '<li class="d-inline-block mb-sm-0 mt-4 me-5 mb-0 mt-sm-0"><a href="' . esc_url( $social_links['pinterest'] ) . '" class="">'. icon_pinterest() .'</a></li>' : '';
      // $html .= ( ! empty( $social_links['houzz'] ) ) ? '<li class="d-inline-block mb-sm-0 mt-4 me-5 mb-0 mt-sm-0"><a href="' . esc_url( $social_links['houzz'] ) . '" class="">'. icon_houzz() .'</a></li>' : '';
    $html .= '</ul>';

    echo $html;
  }

  public static function text()
  {
    $settings = get_field( 'footer_settings', 'option' );
    if ( ! empty( $settings['footer_text'] ) ) {
      ?>
      <div class="footer-text mb-4 mb-lg-5 text-medium">
        <?php echo wp_kses_post( $settings['footer_text'] ); ?>  
      </div>
      <?php
    }
  }

  public static function badges()
  {
    $settings = get_field( 'footer_settings', 'option' );
    if ( ! empty( $settings['footer_badges'] ) ) {
      ?>
      <ul class="d-lg-flex mb-4 mb-lg-5 ps-0 footer-badges">
        <?php
        foreach ( $settings['footer_badges'] as $badge ) {
          ?>
          <li class="pe-lg-8 mb-lg-0"><?php Acf::acfImage( $badge['image'], 'medium_large', 'footer-badge' ); ?></li>
          <?php
        }
        ?>
      </ul>
      <?php
    }
  }

  public static function menulinks()
  {
    $settings = get_field( 'footer_settings', 'option' );
    if ( ! empty( $settings['footer_menu_links']['title'] ) ) {
      ?>
      <h4 class="widget-title fw-bold mb-4 mb-lg-5 txt-transform-none"><?php esc_html_e( $settings['footer_menu_links']['title'] ); ?></h4>
      <?php
    }
    if ( ! empty( $settings['footer_menu_links']['links'] ) ) {
      ?>
      <ul class="footer-links ms-0 mb-0 ps-0">
        <?php
        foreach ( $settings['footer_menu_links']['links'] as $link ) {
          ?>
          <li class="mb-4 text-medium d-flex">
            <a href="<?php echo esc_url( $link['link']['url'] ) ?>" title="<?php esc_attr_e( $link['link']['title'] ); ?>" class="d-flex text-small text-uppercase txt-secondary">
              <span class="lh-1"><?php esc_html_e( $link['link']['title'] ); ?></span>&nbsp;<?php echo icon_plus( '12', '15', '#192E40' ); ?>
            </a>
          </li>
          <?php
        }
        ?>
      </ul>
      <?php
    }
  }

  public static function contactInfo()
  {
    $settings = get_field( 'footer_settings', 'option' );
    $allowedHtml = array(
      'br' => array(),
    );
    ?>
    <section class="footer-contact-info d-flex flex-column align-items-start">
      <?php
      if ( ! empty( $settings['contact_information']['title'] ) ) {
        ?>
        <h4 class="widget-title fw-bold mb-4 mb-lg-5 txt-transform-none"><?php esc_html_e( $settings['contact_information']['title'] ); ?></h4>
        <?php
      }
      if ( ! empty( $settings['contact_information']['address'] ) ) {
        ?>
        <a href="<?php echo esc_url( $settings['contact_information']['address_url'] ) ?>" class="relative d-inline-flex align-items-start text-medium mb-4 hover-text-primary" title="<?php esc_attr_e( $settings['contact_information']['address'] ); ?>" target="_blank">
          <i class="me-2 lh-1"><?php echo icon_pin( '16', '16', '#E82E2C' ); ?></i>
          <span><?php echo wp_kses_post( $settings['contact_information']['address'] ); ?></span>
        </a>
        <?php
      }
      if ( ! empty( $settings['contact_information']['phone'] ) ) {
        $link_phone = $settings['contact_information']['phone'];
        ?>
        <a href="<?php echo esc_url( $link_phone['url'] ); ?>" class="relative d-inline-flex align-items-start text-medium mb-4 hover-text-primary" title="<?php esc_attr_e( $link_phone['title'] ); ?>" target="<?php esc_attr_e( $link_phone['target'] ) ?>">
          <i class="me-2 lh-1"><?php echo icon_phone( '16', '16', '#E82E2C' ); ?></i>
          <span><?php esc_html_e( $link_phone['title'] ); ?></span>
        </a>
        <?php
      }
      if ( ! empty( $settings['contact_information']['email'] ) ) {
        $link_email = $settings['contact_information']['email'];
        ?>
        <a href="<?php echo esc_url( $link_email['url'] ) ?>" class="relative d-inline-flex align-items-start text-medium mb-4 hover-text-primary" title="<?php esc_attr_e( $link_email['title'] ); ?>" target="<?php esc_attr_e( $link_email['target'] ) ?>">
          <i class="me-2 lh-1"><?php echo icon_envelope( '16', '16', '#E82E2C' ); ?></i>
          <span><?php esc_html_e( $link_email['title'] ); ?></span>
        </a>
        <?php
      }
      ?>
    </section>
    <?php
  }

  public static function bottomMenulinks()
  {
    $settings = get_field( 'footer_settings', 'option' );
    if ( ! empty( $settings['bottom_menu_links'] ) ) {
      ?>
      <ul class="footer-bottom-menu-links mb-0 ps-0 pb-5 pb-lg-0 d-flex flex-column flex-md-row align-items-md-center">
        <?php
        $count_items = count( $settings['bottom_menu_links'] );
        foreach ( $settings['bottom_menu_links'] as $key => $link ) {
          ?>
          <li class="mb-0 text-medium <?php echo ( $count_items != ( $key + 1 ) ) ? 'ms-lg-2' : ''; ?>"><a href="<?php echo esc_url( $link['link']['url'] ) ?>" title="<?php esc_attr_e( $link['link']['title'] ); ?>" class="text-decoration-underline hover-text-primary"><?php esc_html_e( $link['link']['title'] ); ?></a></li>
          <?php
        }
        ?>
      </ul>
      <?php
    }
  }

  public static function googleEmbedMap()
  {
    $settings = get_field( 'footer_settings', 'option' );
    if ( ! empty( $settings['google_map_url'] ) ) {
      ?>
      <div class="footer-embed-google-map" data-google_map_url="<?php echo esc_url( $settings['google_map_url'] ); ?>"></div>
      <?php
    }
  }

  public static function googleMap()
  {
    $settings = get_field( 'footer_settings', 'option' );
    if ( ! empty( $settings['google_map_api_key'] ) ) {
			$latitude  = ( ! empty( $settings['latitude'] ) ) ? $settings['latitude']   : '';
			$longitude = ( ! empty( $settings['longitude'] ) ) ? $settings['longitude']: '';
      ?>
      <div class="footer-google-map image-border-bottom-left" data-latitude="<?php esc_attr_e( $latitude ); ?>" data-longitude="<?php esc_attr_e( $longitude ); ?>"></div>
      <?php
    }
  }
  public static function getPopularPosts($popular_posts, $recent_posts) 
  {
    if ( $popular_posts ):
      foreach ( $popular_posts as $post ) :
        $image = get_the_post_thumbnail_url($post);
        $date = get_the_date('M, Y',$post);
        $post_title = $post->post_title;
        $post_link = get_permalink($post);
        $categories = get_the_category($post->ID);
        ?>
        <div class="swiper-slide">
          <div class="post-wrapper mb-12 mb-lg-0 position-relative d-flex align-items-end h-100" style="background-image: url(<?php echo $image; ?>)">
            <?php
            foreach ( $categories as $category ):
              if ( $category->parent != 0 ):
                ?>
                <div class="category-wrapper position-absolute h-auto py-4 px-8 bg-white" >
                  <span><?php echo $category->name; ?></span>
                </div>
                <?php
              endif;
            endforeach;
            ?>
            <div class="post-info-wrapper ms-12 mb-12">
              <ul class="p-0 mb-4"><li class="text-white ms-6"><?php echo $date; ?></li></ul>
              <a href="<?php echo esc_url( $post_link ); ?>"><h3 class="text-white"><?php echo $post_title; ?></h3></a>
            </div>
          </div>
        </div>
        <?php 
      endforeach;
      else:
        foreach ( $recent_posts as $post ) :
        $image = get_the_post_thumbnail_url($post);
        $date = get_the_date('M, Y',$post);
        $post_title = $post->post_title;
        $post_link = get_permalink($post);
        $categories = get_the_category($post->ID);
        ?>
        <div class="swiper-slide">
          <div class="post-wrapper mb-12 mb-lg-0 position-relative d-flex align-items-end h-100" style="background-image: url(<?php echo $image; ?>)">
            <?php
            foreach ( $categories as $category ):
              if ( $category->parent != 0 ):
                ?>
                <div class="category-wrapper position-absolute h-auto py-4 px-8 bg-white" >
                  <span><?php echo $category->name; ?></span>
                </div>
                <?php
              endif;
            endforeach;
            ?>
            <div class="post-info-wrapper ms-12 mb-12">
              <ul class="p-0 mb-4"><li class="text-white ms-6"><?php echo $date; ?></li></ul>
              <a href="<?php echo esc_url( $post_link ); ?>"><h3 class="text-white"><?php echo $post_title; ?></h3></a>
            </div>
          </div>
        </div>
        <?php 
      endforeach;
    endif;
  }
}
