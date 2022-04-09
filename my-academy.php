<?php
/**
 * Plugin Name: My Acodemy
 * Description: Tshi is academy plugin
 * Plugin URI: https://nazmunsakib.com
 * Author: Nazmun sakib
 * Author URI:  https://nazmunsakib.com
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: academy
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 *  This is main class for this pkugin
 */
final class My_Academy
{

    /**
     * plugin version
     *
     * @var string
     */
    const version = '1.0';

    /**
     * class constractor
     */
    private function __construct()
    {
        $this->define_constants();

        register_activation_hook(__FILE__, [$this, 'plugin_active']);

        add_action('plugin_loaded', [$this, 'init_plugin']);

    }

    /**
     * Inisialize function instence
     *
     * @return \My_Academy
     */
    public static function init()
    {
        static $instence = false;

        if (!$instence) {
            $instence = new self();
        }

        return $instence;
    }

    /**
     * defin plugin constence
     *
     * @void
     */
    public function define_constants()
    {
        define('ACADEMY_VERSION', self::version);
        define('ACADEMY_FILE', __FILE__);
        define('ACADEMY_PATH', __DIR__);
        define('ACADEMY_URL', plugins_url('', ACADEMY_FILE));
        define('ACADEMY_ASSETS', ACADEMY_URL . '/assets');
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function plugin_active()
    {
        $installed = get_option('my_acadamy_isntalled');

        if (!$installed) {
            update_option('my_acadamy_isntalled', time());
        }

        update_option('my_acadamy_version', ACADEMY_VERSION);
    }

    /**
     * Plugin init
     *
     * @return void
     */
    public function init_plugin()
    {

    }

}

/**
 * Inisialize the main plugin
 *
 * @return \My_Academy
 */
function my_academy()
{
    return My_Academy::init();
}

my_academy();

echo ACADEMY_VERSION;
