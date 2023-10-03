<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminh extends CI_Controller {
	public function index()
	{
        if(!$this->input->post('keySecurity')) {
            $this->load->view('Admin/Check');
        } else if($this->input->post('keySecurity') == 'hoang-deptrai') {
            $this->db->order_by('ID', 'DESC');
            $data['dataResult'] = $this->db->get('tbl_file')->result_array();
            $data['dataSetting_key'] = $this->getValueSetting('key');
            $data['dataSetting_date'] = $this->getValueSetting('date');
            $data['dataSetting_spin'] = $this->getValueSetting('spin');
            $this->load->view('Admin/Index', $data);
        } else {
            $this->load->view('Admin/Check');
        }
	}

    public function getValueSetting($key = '')
    {
        $this->db->where('key_val', $key);
        $val = $this->db->get('tbl_setting')->result_array();
        return $val[0]['val'];
    }

    public function showModalEdit()
    {
        $data = $this->input->post();

        $this->db->where('ID', $data['id']);
        $getData = $this->db->get('tbl_file')->result_array();
        $dataResult = [
                        'id' => $getData[0]['ID'],
                        'game' => $getData[0]['game'],
                        'name' => $getData[0]['name'],
                        'image' => $getData[0]['image'],
                        'link_ads' => $getData[0]['link_ads'],
                        'link_noads' => $getData[0]['link_noads'],
                        'pin' => $getData[0]['pin']
                    ];
        echo json_encode($dataResult);
    }

    public function editData()
    {
        $data = $this->input->post();

        if($data['keySecurity'] == 'hoangdeptrai') {
            $dataInsert = [
                'game' => $data['game'],
                'name' => $data['name'],
                'image' => $data['image'],
                'link_ads' => $data['link_ads'],
                'link_noads' => $data['link_noads'],
                'pin' => $data['pin']
            ];
            $this->db->where('ID', $data['id']);
            $res = $this->db->update('tbl_file', $dataInsert);
            
            if($res) {
                $rep = [
                    "message" => "success"
                ];
            } else {
                $rep = [
                    "message" => "fail"
                ];
            }
            
            echo json_encode($rep);
        }
    }

    public function deleteRow()
    {
        $data = $this->input->post();
        if(1==2) {
            $this->db->where('ID', $data['id']);
            $this->db->delete('tbl_file');
        }
    }

    public function getDataSql()
    {
        $this->load->dbutil();
        $prefs = array(
                'tables'      => array('tbl_file'), // Array of tables to backup.
                'ignore'      => array(),           // List of tables to omit from the backup
                'format'      => 'txt',             // gzip, zip, txt
                'filename'    => 'mybackup.sql',    // File name - NEEDED ONLY WITH ZIP FILES
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );

        $backup =& $this->dbutil->backup($prefs);
        $this->load->helper('file');
        //write_file('/var/www/html/masterfile/assets/EventBackup/mybackup.sql', $backup);
        write_file('assets/EventBackup/mybackup.sql', $backup);
    }

    public function changeInput()
    {
        $data = $this->input->post();

        $dataInsert = [
            'val' => $data['val']
        ];
        $this->db->where('key_val', $data['key_val']);
        $this->db->update('tbl_setting', $dataInsert);
    }
}
