<?php
class NM404_Admin {
    public static function init(){
        add_action( 'admin_menu' , array('NM404_Admin', 'registerAdminMenuEntrys'));
    }
    public static function registerAdminMenuEntrys(){

        add_menu_page(
            __('NM404'),
            __('NM404'),
            'manage_options',
            'NM404_menu',
            array('NM404_Admin', 'Settings')
        );
    }

    public static function settings(){
        require_once ("settings.php");
    }

}