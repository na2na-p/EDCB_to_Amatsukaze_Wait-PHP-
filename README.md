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
