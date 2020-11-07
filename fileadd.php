<?php
    $fn = "filename.txt";
    $fpn = "pending_num.txt";
    $fls = "enclist.txt";
    $filepath = fopen($fn,"r"); //録画したファイルのファイルパスの取り込み
    $filename = fgets($filepath); //ファイルパスを変数に入れる
    fclose ($filepath);
    $filename = str_replace("\r\n", '', $filename); //意図しない改行コードを防ぐためにいったん消す。
    $num = fopen($fpn,"r+"); //エンコード待機数を持つファイルの読み込み
    flock($num, LOCK_EX);
    $pending_num = fgets($num);

    if ($pending_num == 0) {
        $enclist = fopen($fls,"w");
        fputs ($enclist,$filename);
    }
    else {
        $enclist = fopen($fls,"a");
        fputs ($enclist,"\n".$filename);
    }
    fclose ($enclist);
    //$num = fopen($fpn,"w");
    $pending_num++;
    fseek($num,0);
    fputs ($num,$pending_num);
    flock($num,LOCK_UN);
    fclose ($num);
?>