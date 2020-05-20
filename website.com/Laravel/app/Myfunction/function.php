<?php


    function setStatus($status = 1, $id = 0, $option = null) {
        $url = url("admin/$option/status/{$status}/{$id}");
        $xhtml = '';
        if($option == 'product') {
            if($status == 2) { 
                $xhtml .= '<a href="' . $url . '"class="btn btn-info btn-sm">Available</a> ';
            } else {
                $xhtml .= '<a href="' . $url . '"class="btn btn-warning btn-sm">Invailable</a> ';
            } 
        }
        if($option == 'category') {
            if($status == 2) { 
                $xhtml .= '<a href="' . $url . '"class="btn btn-info btn-sm">Active</a> ';
            } else {
                $xhtml .= '<a href="' . $url . '"class="btn btn-warning btn-sm">Inactive</a> ';
            } 
        }

 
        return $xhtml;
    }

    function formatNumber($number = 0, $option = null) {
        if($option == null) {
            return number_format($number, 0, '',".") . 'VND';
        } 

    }

    function nameStatus($status = 0, $option = null) {
        $xhtml = '';
        if($option == null) {
            if($status == 2) { 
                $xhtml .= 'Available';
            } else {
                $xhtml .= 'Invailable';
            } 
        } 
        return $xhtml;
    }
?>