<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class untuk mempermudah dalam membuat pagination data
 */
class Pager
{

    /**
     * Method untuk mempermudah dalam mengelola pagination, method ini akan mengembalikan
     * informasi pagination yang diperlukan
     *
     * @param  string  $table         Nama tabel
     * @param  integer $no_of_records Jumlah record per halaman
     * @param  integer $page_no       Halaman
     * @param  array   $where
     * Contoh:
     * <code>
     * $where = [
     *     'nama'       => [$nama, 'like'],
     *     'prov_id !=' => [$prov_id, 'where']
     * ];
     * </code>
     * @param  array   $order_by
     * Contoh:
     * <code>
     * $order_by = [
     *     'id' => 'ASC'
     * ];
     * </code>
     * @return array
     * <code>
     * return [
     *     'results' => '' //array data
     *     'total_record' => '' //informasi total data
     *     'total_respon' => ''//informasi data yang direspon per halaman
     *     'current_page' => '' //halaman yang aktif
     *     'total_page' => '' //jumlah halaman
     *     'next_page' => '' //halaman berikutnya
     *     'prev_page' => '' //halaman sebelumnya
     * ];
     * </code>
     * @author Almazari <almazary@gmail.com>
     */
    public function set($table, $no_of_records, $page_no, $where = array(), $order_by = array(), $select_str = '', $group_by = array())
    {
        $CI =& get_instance();
        $no_of_records = (int)$no_of_records;
        $page_no       = (int)$page_no;

        if (empty($no_of_records)) {
            $no_of_records = 10;
        }

        if (empty($page_no) OR $page_no == 1 OR $page_no < 1) {
            $offset  = 0;
            $page_no = 1;
        } else {
            $offset = ($page_no - 1) * $no_of_records;
        }

        $origin_offset = $offset;

        $this->init_select($select_str);
        $this->init_where($where);
        $this->init_orderby($order_by);
        $this->init_groupby($group_by);
        $result = $CI->db->get($table, $no_of_records, $offset);

        $this->init_select($select_str);
        $this->init_where($where);
        $this->init_orderby($order_by);
        $this->init_groupby($group_by);
        $result_all = $CI->db->get($table);
        $count_all  = $result_all->num_rows();

        //cari page next
        $next_page    = null;
        $page_no_plus = $page_no + 1;
        $offset       = ($page_no_plus - 1) * $no_of_records;
        $this->init_select($select_str);
        $this->init_where($where);
        $this->init_orderby($order_by);
        $this->init_groupby($group_by);
        $result_next = $CI->db->get($table, $no_of_records, $offset);
        if ($result_next->num_rows() > 0) {
            $next_page = $page_no_plus;
        }

        //cari page prev
        $prev_page = null;
        if ($page_no > 1) {
            $page_no_min = $page_no - 1;
            $offset      = ($page_no_min - 1) * $no_of_records;
            $this->init_select($select_str);
            $this->init_where($where);
            $this->init_orderby($order_by);
            $this->init_groupby($group_by);
            $result_prev = $CI->db->get($table, $no_of_records, $offset);
            if ($result_prev->num_rows() > 0) {
                $prev_page = $page_no_min;
            }
        }

        //buat agar key menjadi nomor urutnya
        $mulai = $origin_offset + 1;
        $sampai = ($mulai + $result->num_rows()) - 1;
        $array_key = array();
        for ($i = $mulai; $i <= $sampai; $i++) {
            $array_key[] = $i;
        }

        //gabungkan
        $array_result = $result->result_array();
        if (!empty($array_key) && !empty($array_result)) {
            $combine = array_combine($array_key, $result->result_array());
        } else {
            $combine = array();
        }

        $return = array(
            'results'      => $combine,
            'total_record' => $count_all,
            'total_respon' => $result->num_rows(),
            'current_page' => $page_no,
            'total_page'   => ceil($count_all / $no_of_records),
            'next_page'    => $next_page,
            'prev_page'    => $prev_page
        );

        return $return;
    }

    /**
     * Method untuk menjalankan string select yang di berikan untuk mendukung fungsi get_pager
     *
     * @param  string $select_str contoh :
     * <code>
     * $select_str = 'nama, alamat, tgl_lahir';
     * </code>
     * @author Almazari <almazary@gmail.com>
     */
    public function init_select($select_str = '')
    {
        if (!empty($select_str)) {
            $CI =& get_instance();

            $CI->db->select($select_str);
        }
    }

    /**
     * Method yang bertugas menjalankan parameter where untuk mendukung fungsi get_pager
     *
     * @param  array  $where contoh :
     * <code>
     * $where = [
     *     'nama'       => [$nama, 'like'],
     *     'prov_id !=' => [$prov_id, 'where']
     * ];
     * </code>
     * @author Almazari <almazary@gmail.com>
     */
    public function init_where($where = array())
    {
        $CI =& get_instance();

        if (!is_array($where)) {
            throw new Exception("Where harus array");
        }

        foreach ($where as $field => $value) {
            $data = $value[0];
            $type = strtolower($value[1]);
            if (isset($value[2])) {
                $CI->db->$type($field, $data, $value[2]);
            } else {
                $CI->db->$type($field, $data);
            }
        }
    }

    /**
     * Method yang bertugas menjalankan groupby untuk mendukung fungsi get_pager
     *
     * @param  array  $group_by
     * <code>
     * $group_by = [
     *     'title', 'id'
     * ];
     * </code>
     * @author Almazari <almazary@gmail.com>
     */
    public function init_groupby($group_by = array())
    {
        if (!empty($group_by)) {
            $CI =& get_instance();
            $CI->db->group_by($group_by);
        }
    }

    /**
     * Method yang bertugas menjalankan orderby where untuk mendukung fungsi get_pager
     *
     * @param  array  $order_by contoh :
     * <code>
     * $order_by = [
     *     'id' => 'ASC'
     * ];
     * </code>
     * @author Almazari <almazary@gmail.com>
     */
    private function init_orderby($order_by = array())
    {
        $CI =& get_instance();

        if (!is_array($order_by)) {
            throw new Exception("Order by harus array");
        }

        foreach ($order_by as $field => $value) {
            if ($value == 'protect_identifiers_false') {
                $CI->db->_protect_identifiers = FALSE;
                $CI->db->order_by($field);
                $CI->db->_protect_identifiers = TRUE;
            } else {
                $CI->db->order_by($field, $value);
            }
        }
    }

    /**
     * Method untuk menampilkan pagination bootstrap 2 css
     *
     * @param  array  $array_data
     * @param  string $url
     * @param  array  $add_value_segment berguna untuk menambah value parameter pada slah berikutnya (link pagination)
     * @param  bool   $show_info         untuk menampilkan/menyembunyikan informasi total data
     * <code>
     * $add_value_segment = array('search value');
     * </code>
     * @return string
     * @author Almazari <almazary@gmail.com>
     */
    public function view($array_data, $url, $add_value_segment = array(), $show_info = true)
    {
        $add_segment = '';
        foreach ((array)$add_value_segment as $value) {
            $add_segment .= '/'.$value;
        }

        $return = '<div class="row-fluid">';
            if ($show_info) {
                $return .= '<div class="span5">
                    '.$array_data['total_respon'].' dari '.$array_data['total_record'].' total data
                </div>
                <div class="span7">';
            } else {
                $return .= '<div class="span12">';
            }

            $return .= '<div class="pagination pull-right" style="margin-top:0px;">
                <ul>';

                if ($array_data['total_page'] > 1) {

                    //first
                    if (empty($array_data['prev_page'])) {
                        $return .= '<li class="disabled"><a href="#">First</a></li>';
                    } else {
                        $return .= '<li><a href="'.site_url($url.'1'.$add_segment).'">First</a></li>';
                    }

                    //jika total halaman <= 5
                    if ($array_data['total_page'] <= 5) {
                        for ($i = 1; $i <= $array_data['total_page']; $i++) {
                            ($i == $array_data['current_page']) ? $class = 'active' : $class = '';
                            $return .= '<li class="'.$class.'"><a href="'.site_url($url.$i.$add_segment).'">'.$i.'</a></li>';
                        }
                    } else {

                        if ($array_data['current_page'] > 1) {
                            $return .= '<li><a href="'.site_url($url.($array_data['current_page'] - 1).$add_segment).'">Prev</a></li>';
                        } else {
                            $return .= '<li class="disabled"><a href="#">Prev</a></li>';
                        }

                        $numberOfPages = 5;
                        $halfPages     = floor($numberOfPages / 2);
                        $range         = array('start' => 1, 'end' => $array_data['total_page']);
                        $isEven        = ($numberOfPages % 2 == 0);
                        $atRangeEnd    = $array_data['total_page'] - $halfPages;

                        if($isEven) $atRangeEnd++;
                        if($array_data['total_page'] > $numberOfPages)
                        {
                            if($array_data['current_page'] <= $halfPages) {
                                $range['end'] = $numberOfPages;
                            } elseif ($array_data['current_page'] >= $atRangeEnd) {
                                $range['start'] = $array_data['total_page'] - $numberOfPages + 1;
                            } else {
                                $range['start'] = $array_data['current_page'] - $halfPages;
                                $range['end'] = $array_data['current_page'] + $halfPages;
                                if($isEven) $range['end']--;
                            }
                        }

                        for ($i = $range['start']; $i <= $range['end']; $i++) {
                            ($i == $array_data['current_page']) ? $class = 'active' : $class = '';
                            $return .= '<li class="'.$class.'"><a href="'.site_url($url.$i.$add_segment).'">'.$i.'</a></li>';
                        }

                        if ($array_data['current_page'] < $array_data['total_page']) {
                            $return .= '<li><a href="'.site_url($url.($array_data['current_page'] + 1).$add_segment).'">Next</a></li>';
                        } else {
                            $return .= '<li class="disabled"><a href="#">Next</a></li>';
                        }
                    }

                    //last
                    if (empty($array_data['next_page'])) {
                        $return .= '<li class="disabled"><a href="#">Last</a></li>';
                    } else {
                        $return .= '<li><a href="'.site_url($url.$array_data['total_page'].$add_segment).'">Last</a></li>';
                    }

                }

                $return .= '</ul>
                </div>
            </div>
        </div>';

        return $return;
    }
}
