<?php
session_start();
session_regenerate_id(true);

if (isset($_POST['shimei'])) {
$shimei = $_POST['shimei'];
} else {
$shimei = '';
}
if (isset($_POST['furi'])) {
$furi = $_POST['furi'];
} else {
$furi = '';
}
if (isset($_POST['mail'])) {
$mail = $_POST['mail'];
} else {
$mail = '';
}
if (isset($_POST['tel'])) {
$tel = $_POST['tel'];
} else {
$tel = '';
}
if (isset($_POST['content'])) {
$content = $_POST['content'];
} else {
$content = '';
}

setToken();

// ワンタイムトークン発行
function setToken()
{
$token = rtrim(base64_encode(openssl_random_pseudo_bytes(32)), '=');
$_SESSION['token'] = $token;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta name="robots" content="noindex">
<meta charset="UTF-8">
<title>お問い合わせ内容確認｜KYOTOLOGY</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="./lib/css/header.css">
<link rel="stylesheet" href="./lib/css/footer.css">
<link rel="stylesheet" href="./lib/css/under.css">
<link rel="stylesheet" href="./lib/css/reset.css">
<link rel="stylesheet" href="./lib/css/slick.css">
<link rel="stylesheet" href="./lib/css/slick-theme.css">
<link rel="stylesheet" href="./lib/css/common.min.css">
<link rel="stylesheet" href="./lib/css/drawer.min.css">
<link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Noto+Sans+JP:400,500&display=swap" rel="stylesheet">
</head>

<body class="drawer drawer--left">
<!-- ローディングのアニメーション -->
<div id="is-loading">
<div id="loading">
<img src="./lib/images/common/loading.gif" alt="loadingなう" />
</div>
</div>
<div id="loading__wrapper">
<!-- ヘッダー -->
<header id="header">
<div class="sp-only">
<h1 id="sp-logo"><a href="./top.html"><img src="./lib/images/common/logo_fff.svg" alt="kyotologyロゴ"></a></h1>
</div>
<button type="button" class="drawer-toggle drawer-hamburger">
<span class="sr-only">toggle navigation</span>
<span class="drawer-hamburger-icon"></span>
</button>
<div class="dropdown top-only pc-only">
<input id="tg-01" class="dropInput-01" type="checkbox">
<label for="tg-01" class="dropLabel"><img src="./lib/images/common/icon_earth.svg" alt="地球のアイコン">JP</label>
<ul class="menu animation">
<!-- <li><a class="item" href="#">JP</a></li> -->
<li><a class="item" href="#">en</a></li>
</ul>
</div>
<div class="fixed-top flex pc-only">
<div class="dropdown">
<input id="tg-02" class="dropInput-02" type="checkbox">
<label for="tg-02" class="dropLabel"><img src="./lib/images/common/icon_earth.svg" alt="地球のアイコン">JP</label>
<ul class="menu animation">
<!-- <li><a class="item" href="#">JP</a></li> -->
<li><a class="item" href="#">en</a></li>
</ul>
</div>
<h1><a href="./top.html"><img src="./lib/images/common/logo_fff.svg" alt="kyotologyロゴ"></a></h1>
</div>
<div class="fixed-left pc-only">
<ul class="sns-link">
<li class="mb-1"><a href="#"><img src="./lib/images/common/icon_fb.svg" alt="Facebookのアイコン"></a></li>
<li><a href="#"><img src="./lib/images/common/icon_inst.svg" alt="Instagramのアイコン"></a></li>
</ul>
</div>
<div class="fixed-bottom">
<div class="booking-btn bg-gold"><a href="#">ご予約はこちら</a></div>
</div>
<a href="#about" class="scroll top-only fff">Scroll</a>
<a href="#" class="pagetop fff">TOP</a>
<nav class="drawer-nav">
<ul class="drawer-menu">
<li><a class="drawer-menu-item" href="./top.html">ホーム<span class="gold">home</span></a></li>
<li><a class="drawer-menu-item" href="./room.html">客室案内<span class="gold">Room information</span></a></li>
<li><a class="drawer-menu-item" href="./floor.html">館内案内<span class="gold">floor guide</span></a></li>
<li><a class="drawer-menu-item" href="./kyoto.html">京都観光情報<span class="gold">Room information</span></a></li>
<li>
<ul>
<li><a class="drawer-menu-item" href="./contact.html">お問い合わせ</a></li>
<li><a class="drawer-menu-item" href="./top.html#access">アクセス</a></li>
</ul>
</li>
<li class="booking-btn"><a class="drawer-menu-item strong bg-gold" href="#">ご予約はこちら</a></li>
</ul>
<div class="dropdown">
<input id="tg-03" class="dropInput-03" type="checkbox">
<label for="tg-03" class="dropLabel"><img src="./lib/images/common/icon_earth.svg" alt="地球のアイコン">JP</label>
<ul class="menu animation">
<!-- <li><a class="item" href="#">JP</a></li> -->
<li><a class="item" href="#">en</a></li>
</ul>
</div>
</nav>
</header>
<!-- ヘッダー終了 -->

<!-- メインコンテンツ -->
<main>
<section id="sub-mv" class="txt-c room">
<h2>お問い合わせ</h2>
<p class="eng">contact</p>
</section>

<section id="contact" class="sec">
<div class="wrap">
<h2 class="txt-c">お問い合せ内容確認</h2>
<p class="txt-c">内容を確認し、「この内容で送信する」ボタンをクリックしてください。</p>
<form id="form" method="post" action="./contact-thanks.php">
<div class="flex">
<p class="item-name">お名前</p>
<div class="text-box">
<p><?php echo $shimei; ?></p>
</div>
</div>
<div class="flex">
<p class="item-name">フリガナ</p>
<div class="text-box">
<p><?php echo $furi; ?></p>
</div>
</div>
<div class="flex">
<p class="item-name">メールアドレス</p>
<div class="text-box">
<p><?php echo $mail; ?></p>
</div>
</div>
<div class="flex">
<p class="item-name">お電話番号</p>
<div class="text-box">
<p><?php echo $tel; ?></p>
</div>
</div>
<div class="flex">
<p class="item-name">お問い合わせ内容</p>
<div class="textarea-wrap">
<p><?php echo $content; ?></p>
</div>
</div>
<div class="submit-wrap">
<input type="submit" name="" value="この内容で送信する">
</div>
<input type="hidden" name="shimei" value="<?php echo $shimei; ?>">
<input type="hidden" name="furi" value="<?php echo $furi; ?>">
<input type="hidden" name="mail" value="<?php echo $mail; ?>">
<input type="hidden" name="tel" value="<?php echo $tel; ?>">
<input type="hidden" name="content" value="<?php echo $content; ?>">
<input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token']; ?>">
</form>
</div>
</section>

<!-- フッター -->
<footer id="footer">
<div class="wrap flex">
<div class="">
<div class="images-wrap">
<img class="mb-2" src="./lib/images/common/logo_footer.svg" alt="kyotologyのロゴ">
</div>
<p>京都市東山区本瓦町672-6</p>
<p><span class="gold">tel :</span><a href="tel:+81-50-3204-4328"> +81 50 3204 4328</a><br><span class="gold">mail:</span><a href="mailto:info@kyotology.com"> info@kyotology.com</a></p>
<ul class="pc-only mt-1">
<li><a href="./top.html">ホーム</a></li>
<li><a href="./room.html">客室案内</a></li>
<li><a href="./floor.html">館内案内</a></li>
</ul>
<ul class="pc-only">
<li><a href="./kyoto.html">京都観光情報</a></li>
<li><a href="./top.html#access">アクセス</a></li>
<li><a href="./contact.html">お問い合わせ</a></li>
</ul>
</div>
<ul class="sns-link sp-only mb-1 mt-2">
<li class="mb-1"><a href="#"><img src="./lib/images/common/icon_fb.svg" alt="Facebookのアイコン"></a></li>
<li><a href="#"><img src="./lib/images/common/icon_inst.svg" alt="Instagramのアイコン"></a></li>
</ul>
</div>
<div class="footer-small">
<div class="wrap flex">
<ul>
<li><a href="./privacy-policy.html">プライバシーポリシー</a></li>
<li><a href="./terms.html">特定商取引法に基づく表示</a></li>
<li><a href="./sitemap.html">サイトマップ</a></li>
<li><small>© 2019 kyotology</small></li>
</ul>
</div>
</div>
</footer>
<!-- フッター終了 -->
</main>
<!-- メインコンテンツ終了 -->

<script type="text/javascript" src="./lib/js/jquery.min.js"></script>
<script type="text/javascript" src="./lib/js/iscroll.js"></script>
<script type="text/javascript" src="./lib/js/drawer.min.js"></script>
<script type="text/javascript" src="./lib/js/slick.min.js"></script>
<script type="text/javascript" src="./lib/js/app.js"></script>
<script type="text/javascript" src="./lib/js/jquery.bgswitcher.js"></script>

</body>

</html>
