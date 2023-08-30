<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
        $data['dataResult'] = $this->db->get('tbl_file', 0, 10)->result_array();

        $this->db->order_by('count', 'DESC');
        $data['dataResultCount'] = $this->db->get('tbl_file')->result_array();
		$this->load->view('Home/Index', $data);
	}
	public function hoangadmin()
	{
		$this->load->view('Home/Admin');
	}
	public function saveData()
    {
        $data = $this->input->post();

        if($data['keySecurity'] == 'hoangdeptrai') {
            $dataInsert = [
            	'date_create' => date('Y-m-d'),
                'game' => $data['game'],
                'name' => $data['name'],
                'image' => $data['image'],
                'count' => $data['count'],
                'link_ads' => $data['link_ads'],
                'link_noads' => $data['link_noads']
            ];
            $res = $this->db->insert('tbl_file', $dataInsert);
            
            if($res) {
                $rep = [
                    "message" => "success"
                ];
            } else {
                $rep = [
                    "message" => "fail"
                ];
            }
	        
	        return json_encode($rep);
	    }
    }
    public function getView()
    {
    	$data = $this->input->post();

    	$this->db->where('ID', $data['id']);
    	$getData = $this->db->get('tbl_file')->result_array();
    	$dataResult = [
	                    'date_create' => $getData[0]['date_create'],
		                'game' => $getData[0]['game'],
		                'name' => $getData[0]['name'],
		                'image' => $getData[0]['image'],
		                'count' => $getData[0]['count'],
		                'link_ads' => $getData[0]['link_ads'],
		                'link_noads' => $getData[0]['link_noads']
	                ];

	    $dataUpdate = [
            'count' => $getData[0]['count'] + 1
        ];
        $this->db->where('ID', $data['id']);
        $res = $this->db->update('tbl_file', $dataUpdate);

    	echo json_encode($dataResult);
    }

    public function getSearch()
    {
        $data = $this->input->post();
        $this->db->like('name', $data['key']);
        $this->db->or_like('game', $data['key']);
        $getData = $this->db->get('tbl_file')->result_array();
        if(count($getData) > 0) {
            foreach ($getData as $key => $value) {
                $dataResult[$key]['dataResult'] = [
                            'id' => $value['ID'],
                            'date_create' => $value['date_create'],
                            'game' => $value['game'],
                            'name' => $value['name'],
                            'image' => $value['image'],
                            'count' => $value['count'],
                            'link_ads' => $value['link_ads'],
                            'link_noads' => $value['link_noads']
                        ];
            }
        } else {
            $dataResult = [];
        }
        echo json_encode($dataResult);
    }
}
