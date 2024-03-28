<?php 
// require '../PHPMailer/src/Exception.php';
// require '../PHPMailer/src/PHPMailer.php';
// require '../PHPMailer/src/SMTP.php';
// require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Models\header;
use App\Models\sitelogo;
use App\Models\social_media;
use App\Models\footer;

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

    function header_logo($key){
        $sitelogo = sitelogo::first();
        return $sitelogo[$key];
    }
    function crateheader(){
        $header = header::with(['submenu'])->where('is_sub_menu', 'false')->where('is_show', 'true')->select('id', 'main_id', 'menu_titel', 'route_name')->get();
        $html = '';
        $base = url('/');
        foreach($header as $val){
            if(sizeof($val->submenu) == 0){
                $page_name = '#';
                if($val->route_name){
                    $page_name = $base.$val->route_name;
                }
                $html .= "<li><a href=".$page_name.">".$val->menu_titel."</a> </li>";
            } else {
                $page_name = '#';
                if($val->route_name){
                    $page_name = $base.$val->route_name;
                }
                $html .= "<li class='has-dropdown has-mega-menu'>
                <a href=".$page_name.">".$val->menu_titel."</a>
                <ul class='mega-menu'>";
                foreach($val->submenu as $subval){
                    $page_name = '#';
                    if($subval->route_name){
                        $page_name = $base.$subval->route_name;
                    }
                    $html .= "<li style='display: block;margin: 0;'><a style='padding: 5px 0;' href=".$page_name.">".$subval->menu_titel."</a></li>";
                }
                $html .= "</ul>
                </li>";
            }
        }
        return $html;
    }
    function cratefooter($key){
        $footer = footer::first();
        if($key == 'email'){
            return "<a href='mailto:".$footer[$key]."'>".$footer[$key]."</a>";
        } else {
            return $footer[$key];
        }
    }
    function social_media($key){
        $social_media = social_media::where('is_show', 'true')->get();
        $html = '';
        if($key == 'footer'){
            foreach($social_media as $val){
                $html .= '<a href="'.$val->url.'" >'.$val->icon.'</a>';
            }
        } elseif($key == 'header'){
            foreach($social_media as $val){
                $html .= '<li><a href="'.$val->url.'">'.$val->icon.'</a></li>';
            }
        }
        return $html;
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

    function sendMail($email, $subject, $body){
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();   
            $mail->Host = "localhost";
            $mail->SMTPAuth = false;
            $mail->Port = 25;
            $mail->Username = "support@fishermangroup.com";
            $mail->Password = 'FM@forex2024';

            $mail->IsSendmail();
            $mail->From = "support@fishermangroup.com";
            $mail->FromName = "Fisherman Group";
            $mail->addAddress($email);
            
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = '';
            $ms = $mail->Send();

            if(!$ms) {
                // echo "Error while sending Email.";
                $output = array('success' => false, 'data' => [], 'msg' => 'Error while sending Email');
            } else {
                // echo " Email sent successfully";
                $output = array('success' => true, 'data' => [], 'msg' => 'Email sent successfully');
            }
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            $output = array('success' => false, 'data' => "File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage(), 'msg' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
        return $output;
    }

    function forgote_passwordhtml($data){
        $html ="<h1>Dear ".$data['name'].",</h1>

        <p>We hope this message finds you well. </p>
        
        <p>As part of our ongoing efforts to enhance account security, we have received a request to reset the password for your Fisherman account. In response to this request, we are providing you with a temporary password to facilitate the process.</p>
        
        <p>Your Temporary Password: <h4>". $data['pass'] ."</h4></p>
        
        <h5>Please follow these steps to complete the password reset:</h5>
        
        <p>1. Visit the Fisherman login page: <a href='". $data['login'] ."'>login</a><br>
          2. Enter your email address associated with your Fisherman account.<br>
          3. Use the provided temporary password when prompted.<br>
          4. Upon successful login, create a new, secure password of your choice.</p>
        
        <h5>Important Notes:</h5>
        <p>- This temporary password is valid for 24 hours for security reasons. Please reset your password promptly.<br>
          - Fisherman will never ask for your password via email or any other communication channel. If you receive any such requests, please disregard them and report the incident to us immediately.</p>
        
        <p>If you did not request a password reset, or if you have any concerns about your account security, please contact our support team at ". $data['support'] .". We're here to assist you.</p>
        
        <p>Thank you for choosing Fisherman. We appreciate your cooperation in maintaining the security of your account.</p>
        
        <p>Best regards,</p>
        
        <p>
        ". $data['name'] ."<br>
        Customer Support Team<br>
        Fisherman
        </p>";
        return $html;
    }

    function welcomehtml($data){
        $html = "<h1>Dear ".$data['name']." ,</h1>

        <p>Welcome aboard to Fisherman! We are thrilled to have you join our community of traders who are leveraging cutting-edge technology to maximize their trading potential.</p>
        
        <p>At Fisherman, we understand the dynamic nature of the trading world, and we are committed to providing you with a seamless and efficient trading experience. Whether you're a seasoned trader or just starting out, our platform is designed to cater to your needs and help you achieve your financial goals.</p>
        
        <p>Please complete the payment and upload the screenshot. Our team will contact your for further information in next 24-48 hours.</p>
        
        <p>
            Best regards,<br>
        Fisherman Group
        </p>";

        return $html;
    }

    function demo_callhtml($data){
        $html = "<h1>Dear ".$data['name'].",</h1>

        <p>I hope this message finds you well. We are excited to invite you to our upcoming Zoom meeting titled ".$data['topic']." Your participation is highly valued as we discuss ".$data['agenda'].".</p>
        
        <p>Here are the details for the meeting:</p>
        
        <p>
            Date: ".$data['Date']."<br>
            Time: ".$data['Time']."<br>
            Duration: ".$data['Duration']."<br>
            Meeting Link: ".$data['meeting_link']."<br>
            Meeting ID: ".$data['meeting_id']."<br>
            Passcode: ".$data['password']."
        </p>
        
        <p>Please ensure that you have the Zoom application installed on your device prior to the meeting. If you haven't used Zoom before, you can download it for free at https://zoom.us/download.</p>
        
        <p>Should you have any questions or concerns, feel free to reach out to me. We look forward to your active participation and valuable contributions during the meeting.</p>
        
        <p>
            Best regards,<br>
        ".$data['productname']."
        </p>";

        return $html;
    }
?>