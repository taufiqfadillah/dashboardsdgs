<?php

class User_model extends CI_model
{
    public function getAllUsers($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function active()
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
        return $this->db->update('user', $data);
    }

    public function proposalaccess()
    {
        $id = $_REQUEST['sid'];
        $saval = $_REQUEST['sval'];

        if ($saval == 1) {
            $proposal_access = 0;
        } else {
            $proposal_access = 1;
        }
        $data = array('proposal_access' => $proposal_access);
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }
}
