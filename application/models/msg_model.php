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

    /**
     * Method untuk menghapus record message
     *
     * @param  integer $id
     * @return boolean
     */
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return true;
    }

    /**
     * Metthod untuk update opened menjadi 1
     *
     * @param  integer $id
     * @return boolean
     */
    public function update_read($id)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, array('opened' => 1));
        return true;
    }

    /**
     * Method untuk mendapatkan jumlah data
     *
     * @param  integer $type_id     1=inbox,2=outbox
     * @param  integer $owner_id
     * @param  string  $type_get
     * @return integer
     */
    public function count($type_id, $owner_id, $type_get)
    {
        switch ($type_get) {
            case 'unread':
                $this->db->where('type_id', $type_id);
                $this->db->where('owner_id', $owner_id);
                $results = $this->db->get($this->table);
                return $results->num_rows();
            break;
        }
    }

    /**
     * Method untuk mengirimkan pesan
     *
     * @param  integer $sender_id
     * @param  integer $receiver_id
     * @param  string  $content
     * @return boolean
     */
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

        $outbox_id = $this->db->insert_id();

        # create inbox
        $this->db->insert($this->table, array(
            'type_id'            => 1,
            'content'            => $content,
            'owner_id'           => $receiver_id,
            '`date`'             => date('Y-m-d H:i:s'),
            'sender_receiver_id' => $sender_id,
            'opened'             => 0
        ));

        return $outbox_id;
    }

    /**
     * Method untuk mendapatkan satu data message berdasarkan owner dan id
     *
     * @param  integer $owner_id
     * @param  integer $id
     * @param  boolean $old_related_msg
     * @param  boolean $new_related_msg
     * @return array
     */
    public function retrieve($owner_id, $id, $old_related_msg = true, $new_related_msg = true)
    {
        $this->db->where('owner_id', $owner_id);
        $this->db->where('id', $id);
        $result   = $this->db->get($this->table);
        $retrieve = $result->row_array();

        $return['retrieve']        = $retrieve;
        $return['old_related_msg'] = array();
        $return['new_related_msg'] = array();

        # cari pesan terkait sebelumnya
        if (!empty($retrieve) && $old_related_msg) {
            $this->db->where('owner_id', $owner_id);
            $this->db->where_in('sender_receiver_id', array($retrieve['sender_receiver_id'], $owner_id));
            $this->db->where('id <', $id);
            $this->db->order_by('id');
            $results = $this->db->get($this->table);
            $return['old_related_msg'] = $results->result_array();
        }

        # cari pesan terkait setelahnya
        if (!empty($retrieve) && $new_related_msg) {
            $this->db->where('owner_id', $owner_id);
            $this->db->where_in('sender_receiver_id', array($retrieve['sender_receiver_id'], $owner_id));
            $this->db->where('id >', $id);
            $this->db->order_by('id');
            $results = $this->db->get($this->table);
            $return['new_related_msg'] = $results->result_array();
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
    public function retrieve_all($no_of_records = 10, $page_no = 1, $owner_id, $search = array())
    {
        $where             = array();
        $group_by          = array();
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

        if (empty($search)) {
            $new_data = array();
            foreach ($data['results'] as $key => &$val) {
                # cek ada yang lebih baru tidak
                $this->db->where('owner_id', $val['owner_id']);
                $this->db->where('sender_receiver_id', $val['sender_receiver_id']);
                $this->db->where('id >', $val['id']);
                $this->db->order_by('id', 'DESC');
                $retrieve_newer = $this->db->get($this->table, 1);
                $retrieve_newer = $retrieve_newer->row_array();
                if (!empty($retrieve_newer)) {
                    $new_data[strtotime($retrieve_newer['date'])] = $retrieve_newer;
                } else {
                    $new_data[strtotime($val['date'])] = $val;
                }
            }

            krsort($new_data);
            $data['results'] = $new_data;
        }

        return $data;
    }
}
