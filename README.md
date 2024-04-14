# sendToLines
複数の宛先指定可能なLINE Notifyツール

# 使い方
1. LINE Notify([https://notify-bot.line.me/my/](https://notify-bot.line.me/my/))にてトークンを発行する。
2. [line-tokens.csv](line-tokens.csv)に記載されている「`TokenIsHere`」を削除し、トークンを挿入する。
3. [sendToLine.php](sendToLine.php)の13行目付近の`$messsage`変数にて送信する内容を指定する。
	- 下記のように、改行コードを入力せず、要素として入力してください。
		```php
		$message = [
			'1行目',
			'2行目'
		];
  
		/*
		[トークン名]1行目
		2行目

		と送信されます。
		*/
		```
4. [sendToLine.php](sendToLine.php)を実行すると送信されます。
