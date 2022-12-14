<?php
/**
 * VFM - veno file manager: admin-panel/view/admin-head-settings.php
 * main general settings setting process
 *
 * PHP version >= 5.3
 *
 * @category  PHP
 * @package   VenoFileManager
 * @author    Nicola Franchini <support@veno.it>
 * @copyright 2013 Nicola Franchini
 * @license   Exclusively sold on CodeCanyon: https://codecanyon.net/item/veno-file-manager-host-and-share-files/6114247
 * @link      http://filemanager.veno.it/
 */

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    /**
    * General Settings
    */
    $_CONFIG['license_key'] = filter_input(INPUT_POST, "license_key", FILTER_SANITIZE_URL);
    // Save settings.
    $con = '$_CONFIG = ';
    if (false === (file_put_contents('config.php', "<?php\n\n $con".var_export($_CONFIG, true).";\n"))) {
        Utils::setError('Error saving config file');
    } else {
        Utils::setSuccess($setUp->getString('settings_updated'));
        $updater->clearCache('config.php');
    }
    header('Location:'.$script_url.'vfm-admin/?section=updates');
    exit();
}