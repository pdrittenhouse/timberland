<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>

  <div class="wc-accordion-wrapper">
    <div id="accordion" class="woocommerce-tabs">
      <?php $count = 0 ?>
      <?php foreach ( $product_tabs as $key => $product_tab ) : ?>
        <?php $count = $count + 1 ?>
        <div class="accordion-panel">
          <div class="accordion-panel-header" id="heading-<?php echo esc_attr( $key ); ?>">
            <h5 class="accordion-panel-title" >
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-<?php echo esc_attr( $key ); ?>" aria-expanded="<?php if ($count == 1) : ?>true<?php else : ?>'false'<?php endif; ?>" aria-controls="collapse-<?php echo esc_attr( $key ); ?>">
                <?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
              </button>
            </h5>
          </div>

          <div id="collapse-<?php echo esc_attr( $key ); ?>" class="collapse <?php if ($count == 1) : ?>show<?php endif; ?>" aria-labelledby="heading-<?php echo esc_attr( $key ); ?>" data-parent="#accordion">
            <div class="accordion-panel-body">
              <?php
              if ( isset( $product_tab['callback'] ) ) {
                call_user_func( $product_tab['callback'], $key, $product_tab );
              }
              ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <?php do_action( 'woocommerce_product_after_tabs' ); ?>


<?php endif; ?>
