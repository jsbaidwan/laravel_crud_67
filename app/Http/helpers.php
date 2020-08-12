<?php
    function get_reminder_date($date) {
        $reminder_date = strtotime(date('m/d/', strtotime($date)).date('Y'));
        $today_date = strtotime(date('m/d/Y'));
        if($today_date > $reminder_date) {
            $reminder_date = date('m/d/Y', strtotime('+1 year', $reminder_date));
        }
        else {
            $reminder_date = date('m/d/Y', strtotime(date('m/d/', strtotime($date)).date('Y')));
        }
        return $reminder_date;
    }
?>