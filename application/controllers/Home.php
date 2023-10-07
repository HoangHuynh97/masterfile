<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
        $data['search'] = '';
        if($this->input->get('search') != '') {
            $data['search'] = $this->input->get('search');
        }
        $this->db->order_by('ID', 'DESC');
        $data['dataResult'] = $this->db->get('tbl_file', 10, 0)->result_array();

        $this->db->order_by('pin', 'DESC');
        $this->db->order_by('count', 'DESC');
        $data['dataResultCount'] = $this->db->get('tbl_file')->result_array();

        $data['limit_key'] = $this->getValueSetting('key');
        $data['limit_date'] = $this->getValueSetting('date');
		$this->load->view('Home/Index', $data);
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
                'link_noads' => $data['link_noads'],
                'pin' => $data['pin']
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
    public function saveDataIamge()
    {
        $data = $this->input->post();

        if($data['keySecurity'] == 'hoangdeptrai') {
            $link = explode(",", $data['link']);
            for ($i = 0; $i < count($link); $i++) { 
                $dataInsert = [
                    'link' => $link[$i],
                    'date' => $data['date']
                ];
                $res = $this->db->insert('tbl_image', $dataInsert);
            }

            $rep = [
                "message" => "success"
            ];
            
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
		                'link_noads' => $getData[0]['link_noads'],
                        'pin' => $getData[0]['pin']
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
                            'link_noads' => $value['link_noads'],
                            'pin' => $value['pin']
                        ];
            }
        } else {
            $dataResult = [];
        }
        echo json_encode($dataResult);
    }

    public function resetSpin()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timestamp = time();
        $current_date = date("Y-m-d", $timestamp);
        $this->db->where('ID', 1);
        $dataResultCount = $this->db->get('tbl_spin')->result_array();
        if($dataResultCount[0]['date'] != $current_date) {
            $dataUpdate = [
                'date' => $current_date,
                'spin' => 10
            ];
            $this->db->update('tbl_spin', $dataUpdate);
        }
    }

    public function getValueSetting($key = '')
    {
        $this->db->where('key_val', $key);
        $val = $this->db->get('tbl_setting')->result_array();
        return $val[0]['val'];
    }

    public function spin()
    {
        $data['search'] = '';

        $ip_client = $this->get_client_ip();
        $this->db->where('IP', $ip_client);
        $dataResultCount = $this->db->get('tbl_spin')->result_array();
        if(count($dataResultCount) > 0) {
            $data['dataResultCount'] = $dataResultCount[0]['spin'];
        } else {
            $data['dataResultCount'] = 10;
        }
        //change this
        $data['limit_key'] = $this->getValueSetting('key');
        $data['limit_date'] = $this->getValueSetting('date');
        $data['dataResultSuccess'] = $this->db->get('tbl_success')->result_array();

        $this->db->order_by('ID', 'DESC');
        $data['dataResultImage'] = $this->db->get('tbl_image')->result_array();
        
        $list = ['https://web1s.io/Bh4VSWnvKW','https://web1s.io/QzBQgffkwp','https://web1s.io/gEBz4Fn2Hz','https://web1s.io/3HA09zFxqk','https://web1s.io/EthGRSicYi','https://web1s.io/ctO42dG5gt','https://web1s.io/wmOo5W6gYg','https://web1s.io/eQQgbzOd2i'];
        $listCheckLock = ['HKL7OI2','OTB25TG','IIDF56G','ELKM56T','NMEDA92','RKLM3T0','QSM01R6','ZG21LIJ'];
        $randomKey = rand(0,7);
        $data['dataResultList'] = $list[$randomKey];
        $data['dataResultListCheckLock'] = $listCheckLock[$randomKey];
        
        $this->load->view('Spin/Index', $data);
    }

    public function create_code($check_lock = '')
    {
        $ip_client = $this->get_client_ip();

        $this->db->where('IP', $ip_client);
        $dataResultCount = $this->db->get('tbl_code')->result_array();
        if(count($dataResultCount) > 0) {
            $this->db->where('IP', $ip_client);
            $this->db->where('is_use', 0);
            $this->db->delete('tbl_code');
        }

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timestamp = time();
        $current_date = date("Y-m-d", $timestamp);
        $randomString = $this->generateRandomString();
        $dataInsert = [
            'check_lock' => $check_lock,
            'IP' => $ip_client,
            'date' => $current_date,
            'key_security' => $randomString
        ];
        $this->db->insert('tbl_code', $dataInsert);

        $list = ['https://web1s.io/Bh4VSWnvKW','https://web1s.io/QzBQgffkwp','https://web1s.io/gEBz4Fn2Hz','https://web1s.io/3HA09zFxqk','https://web1s.io/EthGRSicYi','https://web1s.io/ctO42dG5gt','https://web1s.io/wmOo5W6gYg','https://web1s.io/eQQgbzOd2i'];
        $listCheckLock = ['HKL7OI2','OTB25TG','IIDF56G','ELKM56T','NMEDA92','RKLM3T0','QSM01R6','ZG21LIJ'];
        $randomKey = rand(0,7);
        $dataResultList = $list[$randomKey];
        $dataResultListCheckLock = $listCheckLock[$randomKey];
        $rep = [
                "dataResultList" => $dataResultList,
                "dataResultListCheckLock" => $dataResultListCheckLock,
            ];
        echo json_encode($rep);
    }

    public function get_code($check_lock = '')
    {
        if($check_lock == '') {
            $data['randomString'] = '';
        } else {
            $data['randomString'] = '';
            $ip_client = $this->get_client_ip();
            $this->db->where('IP', $ip_client);
            $this->db->where('check_lock', $check_lock);
            $this->db->where('is_use', 0);
            $dataR = $this->db->get('tbl_code')->result_array();
            if(count($dataR) > 0) {
                $data['randomString'] = $dataR[0]['key_security'];
            }
        }
        
        $this->load->view('Spin/Get_code', $data);
    }

    public function submit_code()
    {
        $data = $this->input->post();
        $input_code = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $data['input_code']);
        $ip_client = $this->get_client_ip();
        $this->db->where('IP', $ip_client);
        $this->db->where('key_security', $input_code);
        $this->db->where('is_use', 0);
        $getData = $this->db->get('tbl_code')->result_array();
        if(count($getData) > 0) {
            $this->db->where('IP', $ip_client);
            $getDataSpin = $this->db->get('tbl_spin')->result_array();
            if(count($getDataSpin) == 0) {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $timestamp = time();
                $current_date = date("Y-m-d", $timestamp);
                $dataInsert = [
                    'IP' => $ip_client,
                    'date' => $current_date,
                    'spin' => 20
                ];
                $this->db->insert('tbl_spin', $dataInsert);

                $this->db->where('IP', $ip_client);
                $this->db->where('key_security', $data['input_code']);
                $this->db->update('tbl_code', ['is_use' => 1]);
                $success = true;
                $message = 'Đã cộng thêm 10 lượt quay!';
            } else {
                $countSpin = $getDataSpin[0]['spin'] + 10;
                $dataUpdate = [
                    'spin' => $countSpin
                ];

                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $timestamp = time();
                $current_date = date("Y-m-d", $timestamp);

                $this->db->where('IP', $ip_client);
                $this->db->where('date', $current_date);
                $getDataCode = $this->db->get('tbl_code')->result_array();
                if(count($getDataCode) <= 3) {
                    $this->db->where('IP', $ip_client);
                    $this->db->update('tbl_spin', $dataUpdate);

                    $this->db->where('IP', $ip_client);
                    $this->db->where('key_security', $data['input_code']);
                    $this->db->update('tbl_code', ['is_use' => 1]);
                    $success = true;
                    $message = 'Đã cộng thêm 10 lượt quay!';
                } else {
                    $success = false;
                    $message = 'Bạn đã đến giới hạn nhận thêm lượt quay!';
                }
            }
        } else {
            $success = false;
            $message = 'Mã code không hợp lệ!';
        }

        $rep = [
                "success" => $success,
                "message" => $message,
            ];
        echo json_encode($rep);
    }

    public function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getDataSpin()
    {
        $ip_client = $this->get_client_ip();
        if($ip_client != '' && $ip_client != 'UNKNOWN') {
            $this->db->where('IP', $ip_client);
            $getDataSpin = $this->db->get('tbl_spin')->result_array();
            if(count($getDataSpin) == 0) {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $timestamp = time();
                $current_date = date("Y-m-d", $timestamp);
                $dataInsert = [
                    'IP' => $ip_client,
                    'date' => $current_date,
                    'spin' => 10
                ];
                $this->db->insert('tbl_spin', $dataInsert);
            }

            $this->db->where('IP', $ip_client);
            $checkDataSpin = $this->db->get('tbl_spin')->result_array();
            $countSpin = $checkDataSpin[0]['spin'] - 1;
            if($countSpin >= 0) {
                $dataUpdate = [
                    'spin' => $countSpin
                ];
                $this->db->where('IP', $ip_client);
                $this->db->update('tbl_spin', $dataUpdate);
            }
            $random1 = rand(1,100);
            $random2 = rand(1,100);
            $localtion = 0;
            $success = false;
            $key = '';
            $message = '';
            //change this
            $dataSetting_spin = $this->getValueSetting('spin');

            $countDataSuccess = $this->db->get('tbl_success')->result_array();
            if($countSpin < 0) {
                $localtion = 0;
                $success = false;
                $key = '0';
                $spin = $countSpin < 0 ? 0 : $countSpin;
                $message = 'Không đủ lượt quay, nhận thêm bằng cách xem quảng cáo!';
            } else if($random1 == $random2 && count($countDataSuccess) < $dataSetting_spin) {
                $localtion = rand(30,300);
                $success = true;
                $key = $this->generateRandomString();
                $spin = $countSpin < 0 ? 0 : $countSpin;
                $message = 'Mã bảo vệ của bạn là: ' . $key . ', gửi mã này cho mình qua Telegram: t.me/mastergames97 để nhận key!';
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $timestamp2 = time();
                $current_date2 = date("Y-m-d", $timestamp2);
                $dataInsertKey = [
                    'IP' => $ip_client,
                    'date' => $current_date2,
                    'key_security' => $key
                ];
                $this->db->insert('tbl_success', $dataInsertKey);
            } else {
                $localtion = rand(1,10);
                $success = false;
                $key = '';
                $spin = $countSpin < 0 ? 0 : $countSpin;
                $message = 'Tạch Tạch Tạch Tạch Tạch Tạch!';
            }
        } else {
            $localtion = rand(1,10);
            $success = false;
            $key = '';
            $spin = 0;
            $message = 'Có gì đó không đúng, hãy thử tải lại trình duyệt!';
        }
        $rep = [
                "localtion" => $localtion,
                "success" => $success,
                "key" => $key,
                "spin" => $spin,
                "message" => $message,
            ];
        echo json_encode($rep);
    }

    public function getData30Spin()
    {
        $ip_client = $this->get_client_ip();
        if($ip_client != '' && $ip_client != 'UNKNOWN') {
            $this->db->where('IP', $ip_client);
            $getDataSpin = $this->db->get('tbl_spin')->result_array();
            if(count($getDataSpin) == 0) {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $timestamp = time();
                $current_date = date("Y-m-d", $timestamp);
                $dataInsert = [
                    'IP' => $ip_client,
                    'date' => $current_date,
                    'spin' => 10
                ];
                $this->db->insert('tbl_spin', $dataInsert);
            }

            $this->db->where('IP', $ip_client);
            $checkDataSpin = $this->db->get('tbl_spin')->result_array();
            $countSpin = $checkDataSpin[0]['spin'] - 30;
            if($countSpin >= 0) {
                $dataUpdate = [
                    'spin' => $countSpin
                ];
                $this->db->where('IP', $ip_client);
                $this->db->update('tbl_spin', $dataUpdate);
            }
            $random1 = rand(1,70);
            $random2 = rand(1,70);
            $localtion = 0;
            $success = false;
            $key = '';
            $message = '';
            //change this
            $dataSetting_spin = $this->getValueSetting('spin');

            $countDataSuccess = $this->db->get('tbl_success')->result_array();
            if($countSpin < 0) {
                $localtion = 0;
                $success = false;
                $key = '0';
                $spin = $countSpin < 0 ? 0 : $countSpin;
                $message = 'Không đủ lượt quay, nhận thêm bằng cách xem quảng cáo!';
            } else if($random1 == $random2 && count($countDataSuccess) < $dataSetting_spin) {
                $localtion = rand(30,300);
                $success = true;
                $key = $this->generateRandomString();
                $spin = $countSpin < 0 ? 0 : $countSpin;
                $message = 'Mã bảo vệ của bạn là: ' . $key . ', gửi mã này cho mình qua Telegram: t.me/mastergames97 để nhận key!';
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $timestamp2 = time();
                $current_date2 = date("Y-m-d", $timestamp2);
                $dataInsertKey = [
                    'IP' => $ip_client,
                    'date' => $current_date2,
                    'key_security' => $key
                ];
                $this->db->insert('tbl_success', $dataInsertKey);
            } else {
                $localtion = rand(1,10);
                $success = false;
                $key = '';
                $spin = $countSpin < 0 ? 0 : $countSpin;
                $message = 'Tạch Tạch Tạch Tạch Tạch Tạch!';
            }
        } else {
            $localtion = rand(1,10);
            $success = false;
            $key = '';
            $spin = 0;
            $message = 'Có gì đó không đúng, hãy thử tải lại trình duyệt!';
        }
        $rep = [
                "localtion" => $localtion,
                "success" => $success,
                "key" => $key,
                "spin" => $spin,
                "message" => $message,
            ];
        echo json_encode($rep);
    }
}
