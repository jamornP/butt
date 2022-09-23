<?php
 function datethai($date){
    $da=explode("-",$date);

    $d=$da[2];
    $m=$da[1];
    $y=$da[0];
    $month=month($date); 
    $year=year($date);   
    $data =intval($d)." ".$month." ".$year;
    return  $data;

}
 function month($date){
    $da=explode("-",$date);
    $d=$da[2];
    $m=$da[1];
    $y=$da[0];
    switch ($m){
        case "01":
            $month="ม.ค.";
            break;
        case "02":
            $month="ก.พ.";
            break;
        case "03":
            $month="มี.ค.";
            break;
        case "04":
            $month="เม.ย.";
            break;
        case "05":
            $month="พ.ค.";
            break;
        case "06":
            $month="มิ.ย.";
            break;
        case "07":
            $month="ก.ค.";
            break;
        case "08":
            $month="ส.ค.";
            break;
        case "09":
            $month="ก.ย.";
            break;
        case "10":
            $month="ต.ค.";
            break;
        case "11":
            $month="พ.ย.";
            break;
        case "12":
            $month="ธ.ค.";
            break;
        
    }
    return $month;
}
 function monthfull($date){
    $da=explode("-",$date);
    $d=$da[2];
    $m=$da[1];
    $y=$da[0];
    switch ($m){
        case "01":
            $month="มกราคม";
            break;
        case "02":
            $month="กุมภาพันธ์";
            break;
        case "03":
            $month="มีนาคม";
            break;
        case "04":
            $month="เมษายน";
            break;
        case "05":
            $month="พฤษภาคม";
            break;
        case "06":
            $month="มิถุนายน";
            break;
        case "07":
            $month="กรกฎาคม";
            break;
        case "08":
            $month="สิงหาคม";
            break;
        case "09":
            $month="กันยายน";
            break;
        case "10":
            $month="ตุลาคม";
            break;
        case "11":
            $month="พฤศจิกายน";
            break;
        case "12":
            $month="ธันวาคม";
            break;
        
    }
    return $month;
}
 function day($date){
    $da=explode("-",$date);
    $d=$da[2];
    $m=$da[1];
    $y=$da[0];    
    return  intval($d);

}
 function year($date){
    $da=explode("-",$date);
    $d=$da[2];
    $m=$da[1];
    $y=$da[0];    
    return  $y+543;

}
function bookId_recive($data){
    return sprintf("%06d",$data);
}
function bookId_reciveRe($data){
    return sprintf("%03d",$data);
}
function yearterm($date){
    $da=explode("-",$date);
    $d=$da[2];
    $m=$da[1];
    $y=$da[0]; 
    $dateck = date($y."-10-01");
    if($date >= $dateck){
        $y=$da[0]+1;
        $da="ตรงปี+1 วันที่กรอก :".$date." วันที่เช็ค :".$dateck."<br>ปีงบประมาณ :";
    }else{
        $y=$da[0];
        $da="ตรงปี วันที่กรอก :".$date." วันที่เช็ค :".$dateck."<br>ปีงบประมาณ :";
    }
    // return  $da;
     return  $y+543;

}
?>