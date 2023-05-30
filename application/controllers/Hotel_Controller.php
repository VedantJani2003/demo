<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel_Controller extends CI_Controller {

	public function index(){
		$this->load->model('Hotel_Model');
		$blocks= $this->Hotel_Model->getblock();
		$data=[];
		$data['blocks']=$blocks;
		// echo"<pre>";print_r($data);
		$this->load->view('Hotelview',$data);
	}
	public function getFloor(){
		$block_id = $this->input->post('block_id');
		$this->load->model('Hotel_Model');
		$floors = $this->Hotel_Model->getFloorfromHotelBlock($block_id);

		$data[] =[];
		$data['floors']=$floors;
		$floorString = $this->load->view('floorview',$data,true);
		$response['floors'] = $floorString;
		echo json_encode($response);

	}
	public function getRoom(){
		$floor_id = $this->input->post('floor_id');
		$this->load->model('Hotel_Model');
		$rooms = $this->Hotel_Model->getroomsfromHotelBlock($floor_id);

		$data[] =[];
		$data['rooms']=$rooms;
		$roomString = $this->load->view('roomview',$data,true);
		$response['rooms'] = $roomString;
		echo json_encode($response);

	}


	public function show_data() {
		// $this->load->model('Hotel_Model');
		$this->load->view('AllDataview');
		// s$this->Hotel_Model->getdata();
	}

	public function getdata() {
        $this->db->select('BlockName, FloorNumber, RoomNumber,Satus');
        $this->db->from('block');
        $this->db->join('floor', 'block.id = floor.Block_id');
        $this->db->join('room', 'floor.id = room.Floor_id');
        $query = $this->db->get();
		// print_r($query);die;

        $data = array();
        foreach ($query->result() as $row) {
            $data[] = array(
                'BlockName' => $row->BlockName,
                'FloorNumber' => $row->FloorNumber,
                'RoomNumber' => $row->RoomNumber,
				'Satus' => $row->Satus
            );
        }

        echo json_encode(array('data' => $data));
    }
	
}
