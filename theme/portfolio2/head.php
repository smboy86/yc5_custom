<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
?>

<!-- 상단 시작 { -->
<div id="skip_to_container"><a href="#container">본문 바로가기</a></div>


<!-- 사이드 메뉴 -->
<button id="menu-toggle" class="btn btn-dark btn-lg toggle" ></button>
<nav id ="sidebar-wrapper">
    <div class="home">
        <?php if ($is_admin == 'super' || $is_auth) { ?>
        <a href="<?php echo G5_ADMIN_URL ?>"><i class="fa fa-lg fa-cog" aria-hidden="true"></i><span class="sound_only">관리자</span></a>
        <?php } ?>
        <?php if ($is_member) {  ?>
        <a href="<?php echo G5_BBS_URL ?>/logout.php"><i class="fa fa-lg fa-sign-in" aria-hidden="true"></i><span class="sound_only">로그아웃</span></a></li>
        <?php } else {  ?>
        <a href="<?php echo G5_BBS_URL ?>/login.php"><i class="fa fa-lg fa-power-off" aria-hidden="true"></i><span class="sound_only">로그인</span></a>
        <?php } ?>
        <a href="<?php echo G5_URL ?>"><i class="fa fa-lg fa-home" aria-hidden="true"></i><span class="sound_only">메인페이지</span></a>
    </div>
    <div class="profile_ct">
        <p class="pf_img"></p>
        <ul class="h_info">
            <?php if ($admin['mb_1']) { ?><li><?php echo $admin['mb_1']; ?></li><?php } ?>
            <?php if ($admin['mb_2']) { ?><li><?php echo $admin['mb_2']; ?></li><?php } ?>
            <?php if ($admin['mb_3']) { ?><li><?php echo $admin['mb_3']; ?></li><?php } ?>
            <?php if ($admin['mb_4']) { ?><li><?php echo $admin['mb_4']; ?></li><?php } ?>
        </ul>
        <ul class="sns">
            <?php if ($admin['mb_8']) { ?><li class="s_facebook"><a href="<?php echo $admin['mb_8']; ?>" target="_blank"><i class="fa fa-lg fa-facebook" aria-hidden="true"></i><span class="sound_only"">페이스북</span></a></li><?php } ?>
            <?php if ($admin['mb_9']) { ?><li class="s_twitter"><a href="<?php echo $admin['mb_9']; ?>" target="_blank"><i class="fa fa-lg fa-twitter" aria-hidden="true"></i><span class="sound_only"">트위터</span></a></li><?php } ?>
            <?php if ($admin['mb_10']) { ?><li class="s_google"><a href="<?php echo $admin['mb_10']; ?>" target="_blank"><i class="fa fa-lg fa-google" aria-hidden="true"></i><span class="sound_only"">구글</span></a></li><?php } ?>
        </ul>
    </div>
    <ul class="sidebar-nav">
        <li>
            <a href="<?php echo G5_URL ?>/#about"  onclick = $("#menu-close").click(); >About</a>
        </li>
        <li>
            <a href="<?php echo G5_URL ?>/#skills" onclick = $("#menu-close").click(); >Skills</a>
        </li>
        <li>
            <a href="<?php echo G5_URL ?>/#work" onclick = $("#menu-close").click(); >Works</a>
        </li>
        <li>
            <a href="<?php echo G5_URL ?>/#resume" onclick = $("#menu-close").click(); >Resume</a>
        </li>
        <li>
            <a href="<?php echo G5_URL ?>/#contact" onclick = $("#menu-close").click(); >Contact</a>
        </li>
    </ul>
    <button id="menu-close" class="btn btn-light btn-lg pull-right"></button>
</nav>


<header id="top" class="header">
    <div class="text-vertical-center">
        <h1><a href="<?php echo G5_URL ?>"> PortFolio</a></h1>
        <h3>Gnuboard5 &amp; bootstrap</h3>
    </div>
</header>

<!-- } 상단 끝 -->


<script>
// Closes the sidebar menu
$("#menu-close").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
});

// Opens the sidebar menu
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
});

// Scrolls to the selected menu item on the page
$(function() {
    var is_moving = false;
 
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
            
            is_moving = true;
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top+2
                }, 1000, function(){
                    setTimeout(function(){
                        is_moving = false;
                    }, 200);
                });
                return false;
            }
        }
    });
 
    $(document).on("scroll", onScroll);
 
    function onScroll(event){
 
        if( is_moving ) return;
 
        var scrollPos = $(document).scrollTop();
        $('a[href*=#]:not([href=#])').each(function () {
            var currLink = $(this),
                target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                if (target.position().top <= scrollPos && target.position().top + target.height() > scrollPos) {
                    $('#page_nat li a').removeClass("on");
                    currLink.addClass("on");
                }
                else{
                    currLink.removeClass("on");
                }
            }
        });
    }
});

// 사이드 페이지네이션
    
$(function(){                 
    $("#page_nat li a").click(function(){
        $("#page_nat li a").removeClass("on");
        $(this).addClass("on");
    });
});
</script>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container">
        
        <?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>