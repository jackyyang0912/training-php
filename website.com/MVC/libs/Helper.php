<?php

class Helper {

    public function formatNumber($number = 0, $option = null) {
        if($option == null) {
            return number_format($number, 0, '',".") . ' VND';
        } 

    }



    public static function setStatus($status = 0, $url = null, $option = null) {
        $xhtml = '';
        if($option == null) {
            if($status == 1) { 
                $xhtml .= '<a href="' . $url . '"class="btn btn-info btn-sm">Available</a> ';
            } else {
                $xhtml .= '<a href="' . $url . '"class="btn btn-warning btn-sm">Invailable</a> ';
            } 
        }

        if($option == 'order') {
            if($status == 1) { 
                $xhtml .= '<a href="' . $url . '"class="btn btn-secondary btn-sm">Đã nhận</a> ';
            }else{
                $xhtml .= '<a href="' . $url . '"class="btn btn-success btn-sm">Đã giao</a> ';
            }
        }
        if($option == 'user') {
            if($status == 1) { 
                $xhtml .= '<a href="' . $url . '"class="btn btn-info btn-sm">Actived</a> ';
            } else {
                $xhtml .= '<a href="' . $url . '"class="btn btn-warning btn-sm">Inactived</a> ';
            } 
        }
        return $xhtml;
    }

}