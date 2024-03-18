<?php 
    function formatCurrency($sign = '₹', $amount) {
        return $sign . number_format($amount, 2);
    }
    function formatdate($date, $format) {
        return date($format, strtotime($date));
    }

    function timecount($date) {
        $datetime_1 = $date; 
        $datetime_2 = date('Y-m-d H:i:s'); 
        
        $start_datetime = new DateTime($datetime_1); 
        $diff = $start_datetime->diff(new DateTime($datetime_2)); 
        if($diff->y != 0 && ($diff->m != 0 || $diff->d != 0)) {
            $time = date('M Y');
        } elseif($diff->y == 1) {
            $time = $diff->y.' Year ago';
        } elseif($diff->m == 1) {
            $time = $diff->m.' Month ago';
        } elseif($diff->m != 0) {
            $time = $diff->m.' Months ago';
        } elseif($diff->d == 1) {
            $time = $diff->d.' Day ago';
        } elseif($diff->d != 0) {
            $time = $diff->d.' Days ago';
        } elseif($diff->h == 1) {
            $time = $diff->h.' Hour ago';
        } elseif($diff->h != 0) {
            $time = $diff->h.' Hours ago';
        } elseif($diff->i == 1) {
            $time = $diff->i.' Minute ago';
        } elseif($diff->i != 0) {
            $time = $diff->i.' Minutes ago';
        } elseif($diff->s == 1) {
            $time = $diff->s.' Second ago';
        } else {
            $time = $diff->s.' Seconds ago';
        }
       
        return $time;
    }

    function getNotAvalibal($data){
        $block_list = [];
        foreach($data as $val){
            if(!$val->is_available){
                $block_list[] = date('w', strtotime($val->name));
            }
        }
        return $block_list;
    } 

    function number_format_short( $n, $precision = 1 ) {
        if ($n < 900) {
            // 0 - 900
            $n_format = number_format($n, $precision);
            $suffix = '';
        } else if ($n < 900000) {
            // 0.9k-850k
            $n_format = number_format($n / 1000, $precision);
            $suffix = 'K';
        } else if ($n < 900000000) {
            // 0.9m-850m
            $n_format = number_format($n / 1000000, $precision);
            $suffix = 'M';
        } else if ($n < 900000000000) {
            // 0.9b-850b
            $n_format = number_format($n / 1000000000, $precision);
            $suffix = 'B';
        } else {
            // 0.9t+
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix = 'T';
        }
        if ( $precision > 0 ) {
            $dotzero = '.' . str_repeat( '0', $precision );
            $n_format = str_replace( $dotzero, '', $n_format );
        }
        $data['n_format'] = $n_format;
        $data['suffix'] = $suffix;
        return $data;
    }

    function crateTimeList($start, $end, $duration, $date, $demo_call = []){
        $slot_list = []; 
        $i = 0;
        $to_time = strtotime($end);
        $from_time = strtotime($start);
        $slot = floor(round(abs($to_time - $from_time) / 60,2)/$duration);
        $sec = $duration*60;
        $demo = [];
        foreach($demo_call as $val){
            $demo[] = date('H:i', strtotime($val->time));
        }
        // dd($demo);
        do {
            $newslot = date("H:i", strtotime($start)+($sec * $i));
            if($date && $date == date('Y-m-d')){
                // dd(time(), strtotime($start)+(1800 * $i), time() < strtotime($start)+(1800 * $i), date("H:i", time()), date("H:i", strtotime($start)+(1800 * $i)));
                // if(time() < strtotime($start)+(1800 * $i)){
                    if(!in_array($newslot, $demo)){
                        $slot_list[] = $newslot;
                    }
                // }   
            } else {
                if(!in_array($newslot,$demo)){
                    $slot_list[] = $newslot;
                }
            }
            // echo time($end) < time($new);
            $i++;
        } while ($i <= $slot);

        
        return $slot_list;
    }
?>