<?php
    $pending_list = "enclist.txt";
    $pending_number = "pending_num.txt";
    $encbat_amatsukaze = "Amatsukazeで作ったバッチファイルの名前";
    $replace = '$FilePath$';
    $sender = "sender.bat";
    $num_file = fopen($pending_number,"r+");
    flock($num_file, LOCK_EX);
    $num = fgets($num_file);
    $enc_settings = fopen($encbat_amatsukaze,"r");
    $settings = fgets($enc_settings);
    $lsfiles = fopen($pending_list,"r+");
    flock($lsfiles,LOCK_EX);
    for ($i=0; $i < $num; $i++) {
        sleep(1);
        $filename = fgets($lsfiles);
        $filename = str_replace(array("\r\n","\r","\n"), '', $filename);
        $filename = mb_convert_encoding($filename,"SJIS-win","utf-8");
        $Tsettings = str_replace($replace,$filename,$settings);
        $Tsettings = mb_convert_encoding($Tsettings,"utf-8","SJIS-win");
        $sender_str = fopen($sender,"w");
        fputs($sender_str,$Tsettings);
        fclose($sender_str);
        system ($sender);　//execだとなぜか動かなかった。
        print_r($opt);
    }
    ftruncate($lsfiles,0);
    flock($lsfiles,LOCK_UN);
    fclose($lsfiles);
    fseek($num_file,0);
    fputs ($num_file,"0");
    flock($num_file,LOCK_UN);
    fclose($num_file);
    echo "\nok";
?>
