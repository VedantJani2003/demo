<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel_Model extends CI_Model {
	                                                     
    public function getblock(){
        $block = $this->db->get("block")->result_array();
        return $block;
    }
    public function getFloorfromHotelBlock($block_id){
        $this->db->where('Block_id',$block_id);
        $floor = $this->db->get("floor")->result_array();
        return $floor;
    }
    public function getroomsfromHotelBlock($floor_id){
        $this->db->where('Floor_id',$floor_id);
        $room = $this->db->get("room")->result_array();
        return $room;
    }
//using for data fetch using join
    public function getdata() {
        $this->db->select('*');
        $this->db->from('block');
        $this->db->join('floor', 'block.id = floor.Block_id');
        $this->db->join('room', 'floor.id = room.Floor_id');
        $query = $this->db->get();
//    echo "<pre>"; print_r($query);
    
        if ($query !== false && is_array($query->result()) && count($query->result()) > 0) {
            foreach ($query->result() as $row) {
                echo $row->BlockName . ' - ' . $row->FloorNumber . ' - ' . $row->RoomNumber . '<br>';
            }
        } else {
            echo 'No data found.';
        }
    }
   

}
