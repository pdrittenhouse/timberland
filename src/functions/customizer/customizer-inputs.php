<?php

/**
 * REGISTER CUSTOMIZER GLOBAL OPTIONS
 **/

function theme_customize_register_inputs( $wp_customize ) {

  /**
   * Custom Text
   **/

  class Custom_Text_Control extends WP_Customize_Control {
    public $type = 'customtext';
    public $extra = '';
    public $divider = false;
    public function render_content() {
      ?>
      <?php if ($this->divider === true) : ?><br><hr><br><?php endif; ?>
      <label>
        <?php if (!empty($this->label)) : ?>
          <h1 class="customize-control-title"><?php echo esc_html( $this->label ); ?></h1>
        <?php endif; ?>
        <?php if (!empty($this->extra)) : ?>
          <span><?php echo esc_html( $this->extra ); ?></span>
        <?php endif; ?>
      </label>
      <?php
    }
  }

  /**
   * Range
   **/

  class WP_Customize_Range extends WP_Customize_Control {
    public $type = 'range';
    public $description = '';

    public function __construct( $manager, $id, $args = array() ) {
      parent::__construct( $manager, $id, $args );
      $defaults = array(
        'min' => 0,
        'max' => 100,
        'step' => 1
      );
      $args = wp_parse_args( $args, $defaults );

      $this->min = $args['min'];
      $this->max = $args['max'];
      $this->step = $args['step'];
    }

    public function render_content() {
      ?>
      <label>
        <?php if (!empty( $this->label )) : ?>
          <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <?php endif; ?>
        <?php if (!empty( $this->description )) : ?>
          <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
        <?php endif; ?>
        <input class='range-slider' min="<?php echo $this->min ?>" max="<?php echo $this->max ?>" step="<?php echo $this->step ?>" type='range' <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" oninput="jQuery(this).next('input').val( jQuery(this).val() )">
        <input onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() )" type='text' value='<?php echo esc_attr( $this->value() ); ?>'>

      </label>
      <?php
    }

  }

}

add_action( 'customize_register', 'theme_customize_register_inputs' );
