<?php


    function setStatus($status = 0, $id = 0, $option = null) {
        $url = url("admin/$option/status/{$status}/{$id}");
        $xhtml = '';
        if($option == 'product') {
            if($status == 1) { 
                $xhtml .= '<a href="' . $url . '"class="btn btn-info btn-sm">Available</a> ';
            } else {
                $xhtml .= '<a href="' . $url . '"class="btn btn-warning btn-sm">Invailable</a> ';
            } 
        }
        if($option == 'category') {
            if($status == 1) { 
                $xhtml .= '<a href="' . $url . '"class="btn btn-info btn-sm">Active</a> ';
            } else {
                $xhtml .= '<a href="' . $url . '"class="btn btn-warning btn-sm">Inactive</a> ';
            } 
        }
        if($option == 'order') {
            if($status == 1) { 
                $xhtml .= '<a href="' . $url . '"class="btn btn-info btn-sm">Đã giao</a> ';
            } else {
                $xhtml .= '<a href="' . $url . '"class="btn btn-warning btn-sm">Đã nhận</a> ';
            } 
        }
        if($option == 'user') {
            if($status == 1) { 
                $xhtml .= '<a href="' . $url . '"class="btn btn-info btn-sm">Active</a> ';
            } else {
                $xhtml .= '<a href="' . $url . '"class="btn btn-warning btn-sm">Inactive</a> ';
            } 
        }

        return $xhtml;
    }

    function setLevel($level = 1, $id = 0, $option = null) {
        $url = url("admin/$option/levels/{$level}/{$id}");
        $xhtml = '';
        if($option == 'user') {
            if($level == 2) { 
                $xhtml .= '<a href="' . $url . '"class="btn btn-info btn-sm">Admin</a> ';
            } else {
                $xhtml .= '<a href="' . $url . '"class="btn btn-warning btn-sm">User</a> ';
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