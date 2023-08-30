<?php
function loadHeader()
{
    $CI = &get_instance();
    $data['title'] = 'Master File';
    return $CI->load->view('Include/Header', $data, TRUE);
}

function loadFooter()
{
    $CI = &get_instance();
    $data['title'] = 'mm';
    return $CI->load->view('Include/Footer', $data, TRUE);
}

function loadMenu()
{
    $CI = &get_instance();
    $data['title'] = 'mm';
    return $CI->load->view('Include/Menu', $data, TRUE);
}

function loadContentFile()
{
    $CI = &get_instance();
    $data['title'] = 'mm';
    return $CI->load->view('Include/ContentFile', $data, TRUE);
}