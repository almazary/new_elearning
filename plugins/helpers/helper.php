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
    include 'excel_reader2.php';

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