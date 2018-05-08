<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>

    </div>
</div>

<!-- } 콘텐츠 끝 -->

<!-- 하단 시작 { -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <button><a href="#hd" id="ft_totop"><img src="<?php echo G5_THEME_IMG_URL ?>/top_btn.png" alt="상단으로" /></a></button>
                <?php if ($admin['mb_1']) { ?><h4><strong><?php echo $admin['mb_1']; ?> 포트폴리오</strong></h4><?php } ?>
                <?php if ($admin['mb_5']) { ?><Address><?php echo $admin['mb_5']; ?></Address><?php } ?>
                <ul class="list-unstyled footer-cnt">
                    <?php if ($admin['mb_4']) { ?><li><i class="fa fa-lg fa-mobile" aria-hidden="true"></i> <?php echo $admin['mb_4']; ?></li><?php } ?>
                    <?php if ($admin['mb_3']) { ?><li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:<?php echo $admin['mb_3']; ?>"><?php echo $admin['mb_3']; ?></a></li><?php } ?>
                </ul>
                <br>
                <ul class="list-inline footer-sns">
                    <?php if ($admin['mb_8']) { ?><li class="s_facebook"><a href="<?php echo $admin['mb_8']; ?>" target="_blank"><i class="fa fa-lg fa-facebook" aria-hidden="true"></i><span class="sound_only"">페이스북</span></a></li><?php } ?>
                    <?php if ($admin['mb_9']) { ?><li class="s_twitter"><a href="<?php echo $admin['mb_9']; ?>" target="_blank"><i class="fa fa-lg fa-twitter" aria-hidden="true"></i><span class="sound_only"">트위터</span></a></li><?php } ?>
                    <?php if ($admin['mb_10']) { ?><li class="s_google"><a href="<?php echo $admin['mb_10']; ?>" target="_blank"><i class="fa fa-lg fa-google" aria-hidden="true"></i><span class="sound_only"">구글</span></a></li><?php } ?>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script>
$(function() {
    $("#ft_totop").on("click", function() {
        $("html, body").animate({scrollTop:0}, '500');
        return false;
    });
});
</script>

<?php
if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>
<!-- } 하단 끝 -->

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>