<?php

class Kelompok_model extends CI_model
{
    public function getAllDatas($id)
    {
        return $this->db->get_where('data_kelompok', ['id' => $id])->row_array();
    }

    public function kelompokactive()
    {
        $id = $_REQUEST['sid'];
        $saval = $_REQUEST['sval'];

        if ($saval == 1) {
            $is_active = 0;
        } else {
            $is_active = 1;
        }
        $data = array('is_active' => $is_active);
        $this->db->where('id', $id);
        return $this->db->update('data_kelompok', $data);
    }
}
