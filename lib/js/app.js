// グローバルメニュー
$(document).ready(function() {
  $('.drawer').drawer();
  $('.drawer-menu li').on('click', function() {
    $('.drawer').drawer('close');
  });
});

//フェードイン
$(window).on('load scroll', function (){

  var box = $('.fadeIn');
  var animated = 'animated';

  box.each(function(){

    var boxOffset = $(this).offset().top;
    var scrollPos = $(window).scrollTop();
    var wh = $(window).height();

    if(scrollPos > boxOffset - wh + 100 ){
      $(this).addClass(animated);
    }
  });

});

// トップページスライドショー
jQuery(function($) {
    $('.bg-slider').bgSwitcher({
        images: ['./lib/images/top/mv_01.png','./lib/images/top/mv_02.png','./lib/images/top/mv_03.png'], // 切り替える背景画像を指定
        interval: 5000, // 背景画像を切り替える間隔を指定 3000=3秒
        loop: true, // 切り替えを繰り返すか指定 true=繰り返す　false=繰り返さない
        shuffle: true, // 背景画像の順番をシャッフルするか指定 true=する　false=しない
        effect: "fade", // エフェクトの種類をfade,blind,clip,slide,drop,hideから指定
        duration: 500, // エフェクトの時間を指定します。
        easing: "swing" // エフェクトのイージング
    });
});

// トップページ客室案内スライドショー
$('.slider').slick({
    centerMode: true,
    autoplay:true,
    autoplaySpeed:5000,
    dots:true,
    slidesToShow:1,
    slidesToScroll:1
});

// 館内案内ページスライドショー
$('.slider-02').slick({
    centerMode: true,
    autoplay:true,
    autoplaySpeed:3000,
    dots:false,
    slidesToShow:3,
    slidesToScroll:1
});

// pagetop表示
$(window).on('load scroll', function(){
  if ($(window).scrollTop() > 400) {
    $('.pagetop').fadeIn(400);
   } else {
    $('.pagetop').fadeOut(400);
   }
});

// メインビジュアルのみ表示
$(window).on('load scroll', function(){
  if ($(window).scrollTop() < 100) {
    $('.top-only').fadeIn(400);
   } else {
    $('.top-only').fadeOut(400);
   }
   if ($(window).scrollTop() > 200) {
     $('.fixed-top').fadeIn(400);
    } else {
     $('.fixed-top').fadeOut(400);
    }
});

//スムーススクロール
$(function(){
  $('a[href^="#"]').click(function(){
    var speed = 500;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });

//ローディング画面
 $(function() {
 var h = $(window).height();
  $('#loading__wrapper').css('display','none');
  $('#is-loading ,#loading').height(h).css('display','block');
 });

 $(window).load(function () {
  $('#is-loading').delay(900).fadeOut(800);
  $('#loading').delay(600).fadeOut(300);
  $('#loading__wrapper').css('display', 'block');
 });


 $(function(){
  setTimeout('stopload()',10000);
  });

  function stopload(){
   $('#loading__wrapper').css('display','block');
   $('#is-loading').delay(900).fadeOut(800);
   $('#loading').delay(600).fadeOut(300);
 }
//グローバルメニュークラス変更

//ウインドウがリサイズされたら発動
$(window).resize(function() {
  //ウインドウの高さを変数に格納
  var w = $(window).width();
  if (w < '480px') {
    $('body').removeClass('drawer--left');
    $('body').addClass('drawer--right');
  }
});
