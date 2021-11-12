# 使用は非推奨です。Node.js版を利用してみてください
# EDCB_to_Amatsukaze_Wait
EDCBの録画終了後バッチからAmatsukazeServerへ渡すためのものです。  
録画鯖とエンコード鯖が分かれていて、エンコード鯖を常時起動させたくない場合に使います。  
イメージとしてはタスクスケジューラも利用して、夜間の録画を朝に一度にエンコード鯖に流し込むものです。  
このプログラムは録画サーバー上で使用します。
何かを作るのは初めてなので無駄が多いかもしれません...

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
### PHP実行環境の準備
PHPの実行環境が必要です。用意がなければ以下のURLからダウンロードしてください。  
https://windows.php.net/download/    
本ツールを置いてあるディレクトリに配置してください。  

PHP.iniの編集が必要です。以下を参考に設定させていただきました。  
https://www.javadrive.jp/php/install/index8.html  
以下のように設定してください。(1629行目以降の設定に自信はないです...  
extension_dir = "ext" //761行目付近 ここを設定しないと他でPHPを使う際にトラブルのもととなります(なりました...)。  
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
　　
### 本体の用意
"録画サーバー側で"Releaseかソースコードのダウンロードをしてください。多分ソースコードのほうが頻繁にアップデートします。  
ダウンロード後、適当なディレクトリで解凍します。  
初回起動時.batをダブルクリックしてください。  
(PHPをpath通ししていない場合)PHPのあるディレクトリと同じ場所にphpというフォルダの名前にリネームした上でPHP.exeの含まれるフォルダをコピーします。PHP.iniを編集後、C:\直下にも同じものをコピーしてください。  
ASsend.phpがあるディレクトリを以降「本体のあるディレクトリ」と呼称します  
本体のあるディレクトリにAmatsukazeServerで作ったバッチファイルを設置します。名前は任意です。この段階でphpフォルダを設置している場合は全部で本体のあるディレクトリの中身は11個になるはずです。  
ASsend.phpを編集します。4行目にAmatsukazeServerで作ったバッチファイルの名前を入力してください。  
### 設定
タスクスケジューラを起動します  
タスクの作成から、任意の名前を設定します。  
トリガー→新規から、希望する頻度(毎日)と開始時刻を設定してください。  
操作→新規からプログラムの開始、参照から、"scheduled_execution.bat"を設定してください。  
必要に応じてほかの設定をいじって終了です。

### EDCB側でやること
録画後バッチへencode_main.batを設定します。

### 注意点
今の私にはエンコードプリセットは一つしか設定できません.........



##### 参考にさせていただいた記事
https://www.javadrive.jp/php/install/index8.html  
https://qiita.com/ryo4004/items/70a22c3ca5b2bfc4df1c  
