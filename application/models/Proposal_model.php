<?php
class Proposal_model extends CI_Model
{
    public function status()
    {
        $id = $_REQUEST['sid'];
        $saval = $_REQUEST['sval'];

        if ($saval == 1) {
            $status = 2;
        } elseif ($saval == 2) {
            $status = 3;
        } elseif ($saval == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $data = array('status' => $status);
        $this->db->where('id', $id);
        return $this->db->update('proposal', $data);
    }
}
