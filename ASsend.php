<?php
    $pending_list = "enclist.txt";
    $pending_number = "pending_num.txt";
    $encbat_amatsukaze = "encode_Anime_amatsukaze.bat";
    $replace = '$FilePath$';
    $sender = "sender.bat";
    $sjis = "SJIS";
    $num_file = fopen($pending_number,"r+");
    $num = fgets($num_file);
    $enc_settings = fopen($encbat_amatsukaze,"r");
    $settings = fgets($enc_settings);
    $lsfiles = fopen($pending_list,"r");
    for ($i=0; $i < $num; $i++) {
        sleep(1);
        $filename = fgets($lsfiles);
        $filename = str_replace("\r\n", '', $filename);
        $Tsettings = str_replace($replace,$filename,$settings);
        $sender_str = fopen($sender,"w");
        //$Tsettings = mb_convert_encoding($Tsettings,$sjis); //現状動作不可
        fputs($sender_str,"chcp 65001\n".$Tsettings);
        fclose($sender_str);
        exec ($sender);
    }
    fclose($lsfiles);
    echo "\nok";
    /*
    3つ処理させようとしたときに
    The filename, directory name, or volume label syntax is incorrect.
    'r' is not recognized as an internal or external command,
    operable program or batch file.
    The filename, directory name, or volume label syntax is incorrect.
    と出る。わからん。
    */
?>
