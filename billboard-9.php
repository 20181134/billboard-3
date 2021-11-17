<html>
    <head>
        <title>掲示板</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <h1>Test</h1>
        <form action="" method="post">
            名前<input type="text" name="name" value="<?php session_start(); echo $_SESSION['username']; ?>"><br>
            本文<textarea name="contents"></textarea>
            <input type="submit" value="投稿">
        </form>
    <?php
        $file='board.txt';
        if (file_exists($file)) {
            $board=json_decode(file_get_contents($file));
        }
        // 名前の記憶
        session_start();
        $_SESSION['username']=$_REQUEST['name'];
        // 空ファイルの送信防止
        if (!strlen($_REQUEST['name']) or !strlen($_REQUEST['contents'])) {
        //array_reverseで関数のデータを逆順で読み込む
        foreach (array_reverse($board) as $printer) {
            echo '<p>', $printer, '</p><br>';
        }
    }
        else {
        // ユーザー名とパスワードを結合
        $board[]=$_REQUEST['name']."の発言: ".$_REQUEST['contents'];
        file_put_contents($file, json_encode($board));
        foreach (array_reverse($board) as $printer) {
            echo '<p>', $printer, '</p><br>';
        }
    }
        // データの多重送信を防止
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // URLはファイルの位置に変更
            header("Location:http://localhost/GitHub/billboard-3/billboard-9.php");
            exit;
        }
    ?>
    </body>
</html>
