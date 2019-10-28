<?php

require_once( get_template_directory() . '/includes/torque-nav-menus-class.php' );

class The_Cannery_Nav_Menus {

  private static $nav_menu_loaded = false;

  protected static $navigation = '';

  public function __construct() {
    add_filter( Torque_Nav_Menus::$nav_menus_filter_handle, array( $this, 'modify_parent_nav_menus' ) );
    add_filter( Torque_Nav_Menus::$nav_menus_primary_location_filter_handle, array( $this, 'modify_parent_primary_slug' ) );
  }

  public function modify_parent_nav_menus( $nav_menus ) {
    // do something to nav menus
    return $nav_menus;
  }

  public function modify_parent_primary_slug( $slug ) {
    return $slug;
  }


  public static function show_nav_menu() {

    if ( ! self::$nav_menu_loaded ) {
      ob_start();
      get_template_part( 'parts/shared/header-parts/menu-items/menu-tree', 'inline');
      self::$navigation = ob_get_clean();
      self::$nav_menu_loaded = true;
    }

    echo self::$navigation;
  }

}

?>
