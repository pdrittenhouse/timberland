<?php

/**
 * Include customizer settings from /src/functions/customizer/
 */
$dream_customizer_includes = array(
  "customizer-inputs.php",
  "customizer-colors.php",
  "customizer-buttons.php",
  "customizer-global.php",
  "customizer-forms.php",
  "customizer-alerts.php",
  "customizer-cards.php",
  "customizer-modals.php",
  "customizer-social-nav.php",
  "customizer-header-layout.php",
  "customizer-header.php",
  "customizer-header-branding.php",
  "customizer-navbar.php",
  "customizer-primary-nav.php",
  "customizer-secondary-nav.php",
  "customizer-header-cta.php",
  "customizer-header-cta-mobile.php",
  "customizer-header-search.php",
  "customizer-header-social-nav.php",
  "customizer-footer-layout.php",
  "customizer-footer.php",
  "customizer-footer-branding.php",
  "customizer-footer-cta.php",
  "customizer-footer-nav.php",
  "customizer-utility-nav.php",
  "customizer-footer-social-nav.php",
  "customizer-footer-search.php",
  "customizer-footer-contact-info.php",
  "customizer-footer-disclaimer.php",
  "customizer-footer-attribution.php",
  "customizer-footer-copyright.php"
);

foreach($dream_customizer_includes as $inc){
  include_once(get_template_directory() . "/src/functions/customizer/$inc");
}
