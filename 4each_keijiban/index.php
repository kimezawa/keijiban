<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>4eachblog 掲示板</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php
mb_internal_encoding("utf8");
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
$stmt = $pdo -> query("select * from 4each_keijiban");
?>

    <header>
        <div class="logo">
            <img src="4eachblog_logo.jpg">
        </div>
        <ul class="menu">
            <li>トップ</li>
            <li>プロフィール</li>
            <li>4eachについて</li>
            <li>登録フォーム</li>
            <li>問い合わせ</li>
            <li>その他</li>
        </ul>
    </header>
    <main>
        <div class="container">
            <div class="left">

                <h1>プログラミングに役立つ掲示板</h1>

                <form method="post" action="insert.php">
                    <h3>入力フォーム</h3>
                    <div>
                        <label for="handlename">ハンドルネーム</label>
                        <input type="text" name="handlename" id="handlename" class="handlename" size="35">
                    </div>
                    <div>
                        <label for="title">タイトル</label>
                        <input type="text" name="title" id="title" class="title" size="35">
                    </div>
                    <div>
                        <label for="comments">コメント</label>
                        <textarea name="comments" id="comments" class="comments" cols="50" rows="7"></textarea>
                    </div>
                    <div class="submit">
                        <input type="submit" value="投稿する">
                    </div>
                </form>

                <?php
                while($row = $stmt -> fetch()){
                    echo '<div class="post">';
                    echo '<h4>'.$row["title"].'</h4>';
                    echo '<div class="post_comments">';
                    echo $row["comments"];
                    echo '<div class="post_handlename">posted by'.$row["handlename"].'</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>

            </div>
            <div class="right">
                <div class="sidebar_box">
                    <h2>人気の記事</h2>
                    <ul class="sidebar_list">
                        <li>PHPオススメ本</li>
                        <li>PHP MyAdminの使い方</li>
                        <li>今人気のエディタ Top5</li>
                        <li>HTMLの基礎</li>
                    </ul>
                </div>
                <div class="sidebar_box">
                    <h2>オススメリンク</h2>
                    <ul class="sidebar_list">
                        <li>インターノウス株式会社</li>
                        <li>XAMPPのダウンロード</li>
                        <li>Eclipseのダウンロード</li>
                        <li>Bracketsのダウンロード</li>
                    </ul>
                </div>
                <div class="sidebar_box">
                    <h2>カテゴリ</h2>
                    <ul class="sidebar_list">
                        <li>HTML</li>
                        <li>PHP</li>
                        <li>MySQL</li>
                        <li>JavaScript</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <footer>
        copyright &copy; internous | 4each blog the which provides A to Z about programming.
    </footer>
</body>

</html>
