# EDCB_to_Amatsukaze_Wait
EDCBの録画終了後バッチからAmatsukazeServerへ渡すためのものです。
録画鯖とエンコード鯖が分かれていて、エンコード鯖を常時起動させたくない場合に使います。
何かを作るのは初めてなので無駄が多いかもしれません...
作成中です

## ファイル一覧
* enclist.txt(初回起動時バッチで作ります)
* encode_main(EDCBの録画終了後バッチに入れる)
* filename.txt(初回起動時バッチで作ります)
* scheduled_execution.bat(導入時に編集してください。)
* fileadd.php (本体その1)
* ASsend.php (本体本体その2。導入時にいじる箇所あります。)
* pending_num.txt (何もないときは0の一文字)
* sender.bat (scheduled_execution.batがうまくいっていれば自動生成します。)
* 初回起動時.bat (導入時にのみ使います。)

# 使い方
## 導入時
PHPの実行環境が必要です。用意がなければ以下のURLからダウンロードしてください。
https://windows.php.net/download/
PATHを通していただくと、バッチファイルのようなphp\php.exeと書かずともphpと書くだけで利用できるようになります。
やらない場合は、C直下に一つ(mbstring周りのため)とphpなど本体があるディレクトリに1つ配置してください。

PHP.iniの編集が必要です。以下を参考に設定させていただきました。
https://www.javadrive.jp/php/install/index8.html
以下のように設定してください。(1629行目以降の設定に自信はないです...
extension=mbstring //924行目付近
mbstring.language = Japanese /1622行目付近
mbstring.internal_encoding = SJIS //1629行目付近
mbstring.http_input = pass //1637行目付近
mbstring.http_output = pass //1647行目付近
mbstring.encoding_translation = Off //1655行目付近
mbstring.detect_order = UTF-8,SJIS-win,EUC-JP,JIS,ASCII //1660行目付近
mbstring.substitute_character = none //1665行目付近
mbstring.func_overload = 0 //1676行目付近
mbstring.strict_detection = Off //1680行目付近
