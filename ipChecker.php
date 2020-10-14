<?php
// $ip = "192.174.12.14";
// $ip = "10.255.255.255";

function ipChecker(){
    // $ip = readline("Bitte IP-adresse eingeben: ");
    $ip="131.107.255.80";
    $ips = explode(".",$ip);

    if( sizeof($ips)!=4){
        echo "\e[0;31mIP-adresse ist nicht gültig\e[0m\n";
        // ipChecker();
        exit();
    }
    $bins = [];
    foreach($ips as $ip){
        if($ip>255) {
            echo "\e[0;31mNByte kann\e[0m\n"; 
            exit();
        }
        
        $bins[] = str_pad(decbin($ip), 8, 0, STR_PAD_LEFT);
    }
    $result = [
                "klasse"=>''
            ];

    if($bins[0][0]==0){
        $result['klasse'] = "Klasse A";
        if($ips[1]== 0 && $ips[2]== 0 && $ips[3]== 0 ){
            $result['typ'] = "Netz-ID";
        }
        if($ips[1]== 255 && $ips[2]== 255 && $ips[3]== 255 ){
            $result['typ'] = "Broadcast";
        }
    }
    elseif($bins[0][1]==0){
        $result['klasse'] = "Klasse B";
    }
    elseif($bins[0][2]==0){
        $result['klasse'] = "Klasse C";
    }
    elseif($bins[0][3]==0){
        $result['klasse'] = "Klasse D";
    }else{
        $result['klasse'] = "Klasse E";
    }
    
    echo "\n";
    echo "Das ist ".$result['klasse'];
    echo "\n";
    echo $result['typ'];
}

ipChecker();

