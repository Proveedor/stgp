<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cards_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }

    function get_cards_for($id_usuario){
        $this->db->select('mc.multiverseid, mc.name as namecard, ms.name, mcu.quantity');
        $this->db->from('mtg_card_user as mcu');
        $this->db->where('mcu.usuario_id',$id_usuario);
        $this->db->join('mtg_cards as mc','mc.multiverseid = mcu.multiverseid');
        $this->db->join('mtg_sets as ms','mc.expancion = ms.code');
        
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }else{
            return array();
        }
    }
}