<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');
include_once(G5_THEME_PATH.'/head.php');
?>

<ul id="page_nat">
    <li><a href="#about" class="on"> </a></li>
    <li><a href="#skills"> </a></li>
    <li><a href="#work"> </a></li>
    <li><a href="#resume"> </a></li>
    <li><a href="#contact"> </a></li>
</ul>       
<section id="about" class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <span class="title_line"></span>
                <h2>ABOUT</h2><!-- 목록 타이틀입니다. -->
                <hr class="small"><!-- 타이틀과 본문 단락 구분선입니다. -->
                <div class="row">
                    <?php
                    // 포트폴리오 게시판 테이블에서 제목 ABOUT 을 가져옴
                    $sql = " select * from ".G5_WRITE_PORTFOLIO_TABLE." where wr_subject = 'ABOUT' ";
                    $row = sql_fetch($sql);
                    $arr = explode("\n", $row['wr_content']);
                    $i=0;
                    foreach($arr as $str) {
                        // 공백이 있는 라인으로 구분함
                        if (trim($str) == '') {
                            $i++;
                        }
                        $about[$i] .= $str.'<br>'; 
                    }
                    ?>
                
                    <div class="col-md-4 pofile_img">
                        <p class="my_profile_img"><span><img src="<?php echo G5_THEME_IMG_URL ?>/face.png" alt="나의 프로필 사진" /></span></p>
                        <p class="lead"><?php echo $about[0]; ?></p><!-- 1단 -->
                    </div>
                    <div class="col-md-4">
                        <p class="lead"><?php echo $about[1]; ?></p><!-- 2단 -->
                    </div>
                    <div class="col-md-4"
                        <p class="lead"><?php echo $about[2]; ?></p><!-- 3단 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="bg1" class="bg1">
        <div class="container">
        </div>
    </section>
</section>
<section id="skills" class="skills">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <span class="title_line"></span>
                <h2>SKILLS</h2>
                <hr class="small">
                <div class="row">
                    <?php
                    $sql = " select * from ".G5_WRITE_PORTFOLIO_TABLE." where wr_subject = 'SKILLS' ";
                    $row = sql_fetch($sql);
                    $arr = explode("\n", $row['wr_content']);
                    foreach($arr as $str){
                        list($title, $percent) = explode(':', $str);
                        echo "<div class=\"col-md-2 col-sm-6 circle\">
                            <div class=\"percent\">
                                <p>{$percent}%</p>
                            </div>
                            <canvas></canvas>
                            <h4>{$title}</h4> 
                        </div>\n";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="work" class="work">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <span class="title_line"></span>
                <h2><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=works">WORKS</a></h2>
                <hr class="small">
                <div class="row">
                    <?php
                    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                    $options = array(
                            'thumb_width'    => 400, // 썸네일 width
                            'thumb_height'   => 350,  // 썸네일 height
                            'content_length' => 20   // 간단내용 길이
                    );
                    echo latest('theme/gallery', 'works', 15, 40, 2, $options);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="resume" class="resume">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <span class="title_line"></span>
                <h2>RESUME</h2>
                <hr class="small">
                <div class="row">
                <?php
                // 포트폴리오 게시판 테이블에서 제목 RESUME 을 가져옴
                $sql = " select * from ".G5_WRITE_PORTFOLIO_TABLE." where wr_subject = 'RESUME' ";
                $row = sql_fetch($sql);
                $arr = explode("\n", $row['wr_content']);
                $i=0;
                foreach($arr as $str) {
                    // 공백이 있는 라인으로 구분함
                    if (trim($str) == '') {
                        $i++;
                    }
                    $resume[$i] .= $str."\n"; 
                }
                $education  = explode("\n", $resume[0]);
                $license    = explode("\n", $resume[1]);
                $experience = explode("\n", $resume[2]);
                ?>
                    <dl class="col-md-4 re_edu">
                        <dt>Education</dt>
                        <?php
                        foreach($education as $str){
                            echo '<dd>'.$str.'</dd>';
                        }
                        ?>
                    </dl>
                    <dl class="col-md-4 re_lic">
                        <dt>License</dt>
                        <?php
                        foreach($license as $str){
                            echo '<dd>'.$str.'</dd>';
                        }
                        ?>
                    </dl>
                    <dl class="col-md-4 re_exp">
                        <dt>Experience</dt>
                        <?php
                        foreach($experience as $str){
                            echo '<dd>'.$str.'</dd>';
                        }
                        ?>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <section id="bg2" class="bg2">
        <div class="container">
        </div>
    </section>
</section>
<section id="contact" class="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <span class="title_line"></span>
                <h2>CONTACT</h2>
                <hr class="small">
                <div class="row">
                    <div id="contact_from" class="col-lg-10 col-lg-offset-1">
                        <form name="fcontact" action="<?php echo G5_THEME_URL; ?>/contact_send.php" method="post" onsubmit="return fcontact_submit(this);">
                            <fieldset id="contact_fs">
                                <legend>Contact</legend>
                                <label for="con_name">이름</label>
                                <input type="text" name="con_name" id="con_name" required class="frm_input required" minlength="2" maxlength="100" placeholder=" 보내실 분의 이름을 입력해 주세요.">
                                <label for="con_name">이메일</label>
                                <input type="text" name="con_email" id="con_email" required class="frm_input required email" maxlength="100" placeholder=" 보내실 분의 이메일을 입력해 주세요.">
                                <label for="con_tel">연락처</label>
                                <input type="text" name="con_tel" id="con_tel" required class="frm_input required telnum" maxlength="20" placeholder=" 예) 010-1234-5678">
                                <label for="">메시지</label>
                                <textarea name="con_message" rows="15" cols="100%" id="con_message"  title="내용쓰기" required class="required" placeholder=" 내용을 입력해주세요."></textarea>
                                <label for="">자동등록방지</label>
                                <div class="captcha"><?php echo captcha_html(); ?></div>
                                <input type="submit" value="보내기" id="btn_submit" class="btn_submit">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>  
    //skill
    $(function () {
        $('.percent').percentageLoader({
            valElement: 'p',
            strokeWidth: 20,
            bgColor: '#d9d9d9',
            ringColor: '#ff8400',
            textColor: '#2C3E50',
            fontSize: '16px',
            fontWeight: 'normal'
        });
    
    });

    $(function() {
        //var container_top = $("#container").position().top;
        //console.log( container_top );
        //$("html, body").animate({scrollTop:0}, '500');
       
        $(".sub_sbtn").on("click", function() {
            $("html, body").animate({scrollTop:0}, '500');
            return false;
        });
    });

    function fcontact_submit(f)
    {
        <?php echo chk_captcha_js();  ?>

        document.getElementById('btn_submit').disabled = true;

        return true;
    }
</script>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>