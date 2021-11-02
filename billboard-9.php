<html>
    <head>
        <title>掲示板</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Test</h1>
        <form action="" method="post">
            名前<input type="text" name="name"><br>
            本文<input type="text" name="contents">
            <input type="submit" value="投稿">
        </form>
    <?php
        $file='board.txt';
        if (file_exists($file)) {
            $board=json_decode(file_get_contents($file));
        }
        // 空ファイルの送信防止
        if (!strlen($_REQUEST['name']) or !strlen($_REQUEST['contents'])) {
        foreach ($board as $printer) {
            echo '<p>', $printer, '</p><br>';
        }
    }
        else {
        // ユーザー名とパスワードを結合
        $board[]=$_REQUEST['name']."の発言: ".$_REQUEST['contents'];
        file_put_contents($file, json_encode($board));
        foreach ($board as $printer) {
            echo '<p>', $printer, '</p><br>';
        }
    }
    ?>
    </body>
</html>
