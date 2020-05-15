<?php

    function trunctString($string,$no)
    {
        $string = strip_tags($string);
        $string = str_replace('&nbsp;',' ',$string);

        return Illuminate\Support\Str::limit($string, $no, '...');
    }

    function dateFormat($date)
    {
        $date = explode(' ',$date)[0];
        $date = explode('-',$date);
        return $date[2].'/'.$date[1].'/'.$date[0];
    }