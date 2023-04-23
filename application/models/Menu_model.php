<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu` .*, `user_menu`.`menu` 
        FROM `user_sub_menu` JOIN `user_menu`
        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getSubMenuById($id)
    {
        $query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
        FROM `user_sub_menu` JOIN `user_menu`
        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        WHERE `user_sub_menu`.`id` = $id
        ";
        return $this->db->query($query)->result_array();
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
        return $this->db->update('user_sub_menu', $data);
    }
}
