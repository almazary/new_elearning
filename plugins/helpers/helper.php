<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Method untuk mendapatkan base url plugins
 *
 * @param  string $add_link
 * @return string
 */
function base_url_plugins($add_link = '') {
    return base_url('plugins/' . $add_link);
}

/**
 * Method untuk membaca data pada file excel
 *
 * @param  string  $path_file           path file excel
 * @param  integer $baris_mulai_data
 * @return array
 */
function data_excel($path_file, $baris_mulai_data = 2)
{
    include_once 'excel_reader2.php';

    $file_excel = new Spreadsheet_Excel_Reader($path_file);

    # membaca jumlah baris dari data excel
    $baris = $file_excel->rowcount($sheet_index=0);
    $kolom = $file_excel->colcount($sheet_index=0);

    $data_return = array();
    for ($i = $baris_mulai_data; $i <= $baris; $i++) {
        $row_data = array();
        for ($k = 1; $k <= $kolom; $k++) {
            $row_data[] = $file_excel->val($i, $k);
        }
        $data_return[] = $row_data;
    }

    return $data_return;
}

/**
 * Method untuk memanggil helper plugin tertentu
 *
 * @param  string $plugin
 * @param  string $func
 * @param  array  $params
 */
function plugin_helper($plugin_name, $func, $params = array())
{
    $plugin_dir = './plugins/';

    # cek plugin folder
    if (!is_dir($plugin_dir . 'src/' . $plugin_name)) {
        throw new Exception("Plugin tidak ditemukan.");
    }

    # cek file ada tidak
    if (!is_file($plugin_dir . 'src/' . $plugin_name . '/helper.php')) {
        throw new Exception("Plugin helper tidak ditemukan.");
    }

    # include_once
    include_once $plugin_dir . 'src/' . $plugin_name . '/helper.php';

    return call_user_func_array($func, $params);
}

/**
 * Method untuk ngecek plugin terinstall atau tidak
 *
 * @param  string $plugin_name
 * @return boolan
 */
function plugin_installed($plugin_name)
{
    $plugin_dir = './plugins/';

    # cek plugin folder
    if (is_dir($plugin_dir . 'src/' . $plugin_name)) {
        return true;
    }

    return false;
}

/**
 * Method untuk mendapatkan daftar plugin yang ada
 * @return array
 * @since  1.8
 */
function plugin_list()
{
    $plugin_dir = './plugins/src';

    if (!is_dir($plugin_dir)) {
        return array();
    }

    $objects = scandir($plugin_dir);
    $results = array();
    foreach ($objects as $object) {
        if ($object != "." && $object != "..") {
            if (is_dir($plugin_dir . "/" . $object)) {
                $results[] = $object;
            }
        }
    }

    return $results;
}
