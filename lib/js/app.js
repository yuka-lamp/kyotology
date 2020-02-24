// グローバルメニュー
$(document).ready(function() {
  $('.drawer').drawer();
  $('.drawer-menu li').on('click', function() {
    $('.drawer').drawer('close');
  });
});

//フェードイン
$(window).on('load scroll', function() {

  var box = $('.fadeIn');
  var animated = 'animated';

  box.each(function() {

    var boxOffset = $(this).offset().top;
    var scrollPos = $(window).scrollTop();
    var wh = $(window).height();

    if (scrollPos > boxOffset - wh + 100) {
      $(this).addClass(animated);
    }
  });

});

// トップページスライドショー
$(function($) {
  $('.bg-slider').vegas({
    slides: [{
        src: './lib/images/top/mv_01.png'
      },
      {
        src: './lib/images/top/mv_02.png'
      },
      {
        src: './lib/images/top/mv_03.png'
      }
    ],
    animation: 'kenburns',
    transition: 'fade',
    delay: 10000,
    animationDuration: 10000,
  });
});

// トップページ客室案内スライドショー
$('.slider').slick({
  centerMode: true,
  autoplay: true,
  autoplaySpeed: 5000,
  dots: true,
  slidesToShow: 1,
  slidesToScroll: 1
});

// 館内案内ページスライドショー
$('.slider-02').slick({
  centerMode: true,
  autoplay: true,
  autoplaySpeed: 3000,
  dots: false,
  slidesToShow: 3,
  slidesToScroll: 1,
  centerMode: true,
  responsive: [{
    breakpoint: 768, //767px以下のサイズに適用
    settings: {
      slidesToShow: 1
    },
    customPaging: function(slider, i) {
      return $('<button type="button" />').text(i + 1);
    },
    prevArrow: '<img src="<?php echo $wp_url ?>/lib/images/common/arrow_l.png" class="slide-arrow prev-arrow">',
    nextArrow: '<img src="<?php echo $wp_url ?>/lib/images/common/arrow_r.png" class="slide-arrow next-arrow">',
  }]
});

// 客室案内ページスライドショー
$('.slider-03').slick({
  centerMode: true,
  autoplaySpeed: 3000,
  dots: false,
  arrows: false,
  slidesToShow: 1,
  slidesToScroll: 1.,
});

$(window).on('load scroll', function() {
  // pagetop表示
  if ($(window).scrollTop() > 400) {
    $('.pagetop').fadeIn(400);
  } else {
    $('.pagetop').fadeOut(400);
  }

  // メインビジュアルのみ表示
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
$(function() {
  $('a[href^="#"]').click(function() {
    var speed = 500;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({
      scrollTop: position
    }, speed, "swing");
    return false;
  });

  //ローディング画面
  var h = $(window).height();
  $('#loading__wrapper').css('display', 'none');
  $('#is-loading ,#loading').height(h).css('display', 'block');

  $('#is-loading').delay(900).fadeOut(800);
  $('#loading').delay(600).fadeOut(300);
  $('#loading__wrapper').css('display', 'block');
  setTimeout('stopload()', 10000);

  function stopload() {
    $('#loading__wrapper').css('display', 'block');
    $('#is-loading').delay(900).fadeOut(800);
    $('#loading').delay(600).fadeOut(300);
  }
});

//グローバルメニュークラス変更
//ウインドウがリサイズされたら発動
$(window).on('load resize', function() {
  //ウインドウの高さを変数に格納
  var w = $(window).width();
  if (w < 480) {
    if ($('body').hasClass('drawer--left')) {
      $('body').removeClass('drawer--left');
      $('body').addClass('drawer--right');
    } else {

    }
  }
});

//スクロールされたらロゴに背景をつける
$(window).scroll(function() {
  var distanceTop = 100;
  //.sp-only内のh1を格納
  if ($(window).scrollTop() > distanceTop) {
    $('#sp-logo').css('background', '#0d0d0d');
  } else {
    $('#sp-logo').css('background', 'none');
  }
});
