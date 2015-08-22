<?php

/**
 * Class Model untuk resource message
 *
 * @package Elearning Dokumenary
 * @link    http://www.dokumenary.net
 * @author  Almazari <almazary@gmail.com>
 */
class Msg_model extends CI_Model
{
    private $table = 'messages';

    public function send($sender_id, $receiver_id, $content)
    {
        # create oubox
        $this->db->insert($this->table, array(
            'type_id'            => 2,
            'content'            => $content,
            'owner_id'           => $sender_id,
            '`date`'             => date('Y-m-d H:i:s'),
            'sender_receiver_id' => $receiver_id,
            'opened'             => 1
        ));

        # create inbox
        $this->db->insert($this->table, array(
            'type_id'            => 1,
            'content'            => $content,
            'owner_id'           => $receiver_id,
            '`date`'             => date('Y-m-d H:i:s'),
            'sender_receiver_id' => $sender_id,
            'opened'             => 0
        ));

        return true;
    }

    /**
     * Method untuk mendapatkan satu data message berdasarkan owner dan id
     *
     * @param  integer $owner_id
     * @param  integer $id
     * @return array
     */
    public function retrieve($owner_id, $id)
    {
        $this->db->where('owner_id', $owner_id);
        $this->db->where('id', $id);
        $result   = $this->db->get($this->table);
        $retrieve = $result->row_array();

        $return['retrieve']    = $retrieve;
        $return['related_msg'] = array();

        # cari pesan terkait sebelumnya
        if (!empty($retrieve)) {
            $this->db->where('owner_id', $owner_id);
            $this->db->where('type_id', $retrieve['type_id']);
            $this->db->where('id <', $id);
            $this->db->order_by('id');
            $results = $this->db->get($this->table);
            $return['related_msg'] = $results->result_array();
        }

        return $return;
    }

    /**
     * Method untuk mendapatkan semua data inbox/outbox berdasarkan ownernya
     *
     * @param  integer $no_of_records
     * @param  integer $page_no
     * @param  integer $type_id         1=inbox, 2=outbox
     * @param  integer $owner_id
     * @param  array   $search
     * @return array
     */
    public function retrieve_all($no_of_records = 10, $page_no = 1, $type_id, $owner_id, $search = array())
    {
        $where             = array();
        $group_by          = array();
        $where['type_id']  = array($type_id, 'where');
        $where['owner_id'] = array($owner_id, 'where');

        if (empty($search)) {
            $group_by[] = 'sender_receiver_id';
        } else {
            foreach ($search as $key => $val) {
                if (in_array($key, array('type_id', 'owner_id'))) {
                    continue;
                }

                if ($key == 'content') {
                    $where[$key] = array($val, 'like');
                } else {
                    $where[$key] = array($val, 'where');
                }
            }
        }

        $orderby = array('id' => 'DESC');
        $data    = $this->pager->set($this->table, $no_of_records, $page_no, $where, $orderby, $this->table.'.*', $group_by);

        return $data;
    }
}
