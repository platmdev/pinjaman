<?php

/*********************global functions to be accessed in all pages**/
function set_msg($msg, $type = null)
{
    $_SESSION['msg'] = $msg;
    $_SESSION['type'] = $type; //success,warning,danger
} //end set_msg()

function get_msg()
{
    if (isset($_SESSION['msg'])) {
        $type = isset($_SESSION['type']) ? $_SESSION['type'] : 'success';
        echo '<script>';
        echo '$(function() {';
        echo 'toastr.' . $type . '("' . $_SESSION['msg'] . '");';
        echo '})';
        echo '</script>';
        //now remove msg & type from session
        unset($_SESSION['msg']);
        unset($_SESSION['type']);
    } //endif isset session[msg]
}//end get_msg()