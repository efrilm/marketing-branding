<?php
defined('BASEPATH') or exit('No direct script access allowed');

function mblang($data = '')
{
    $ci = &get_instance();

    $language = $ci->session->userdata('mblang');
    if (strlen($language) == 0) {
        $language = 'indonesian';
    }

    $ci->lang->load('app', $language);
    $return = $ci->lang->line($data);
    if (strlen($return) == 0) {
        $return = $data;
    }
    return $return;
}
