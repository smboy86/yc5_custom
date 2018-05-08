<?
include_once('../common.php');
//include_once(G5_THEME_PATH.'/head.php');

?>

<link type="text/css" rel="stylesheet" href="./css/lib_func.css" />
<div style='width:250px; float:left'> 
    <table class="__se_tbl">
        <tbody>
            <tr>
                <th class="th_tbl"><p id="p_tbl"><b>파일이름</b></p></td>
            </tr>

<?
// lib폴더의 파일들을 스캔
//var_dump(G5_PATH);
//var_dump(G5_ADMIN_PATH);

$scan = scandir(G5_PATH."/lib");
$scan_adm = scandir(G5_ADMIN_PATH);

foreach ($scan as $val) {
    if (!strstr($val, ".lib.php")) continue; //파일명이 .lib.php로 끝나지않으면 무시
	echo "<tr><td class='td_tbl'><p id='p_tbl'><b><a href='?file=$val'>".$val."</a></b></p></td></tr>";
}

echo "<tr><td class='td_tbl_section'><p id='p_tbl'><b>ADM</b></p></td></tr>";

foreach ($scan_adm as $val) {
    if (!strstr($val, ".lib.php")) continue;
	echo "<tr><td class='td_tbl'><p id='p_tbl'><b><a href='?file=$val&cat=adm'>".$val."</a></b></p></td></tr>";
}

?>
        </tbody>
    </table>
</div>
<div style='width:75%; float:left'> 
<? if ($_GET[file]) { ?>
    <table class="contant_table">
        <th class="th_tbl" width="10%" nowrap>라인</td>
        <th class="th_tbl" width="40%" align="left">함수명</th>
        <th class="th_tbl" width="40%">코멘트</td>
        <?
        // 180508 smPark adm 폴더 추가
        if(!empty($_GET[cat]) &&  $_GET[cat] == "adm"){
            $locateFile = G5_ADMIN_PATH."/$_GET[file]";            
        }else{
            $locateFile = G5_PATH."/lib/$_GET[file]";
        }

        $file = file_get_contents($locateFile);
        $scan = explode("\n", $file);
        for ($n = count($scan), $i = 0; $i < $n; $i++) {
            $line = $scan[$i];
            if (substr($line, 0, 8) != "function") continue;
            $name = trim(substr($line, 8));
            $comm = $scan[$i - 1];
            if (substr($comm, 0, 2) == "//")
                $comm = trim($comm);
            $name = trim(str_replace("{", "", $name));
        ?>

        <tr>
            <td width="10%" nowrap><?=$i + 1?></td>
            <th width="40%" align="left"><?=$name?></th>
            <td width="40%"><?=$comm?></td>
        </tr>
        <? } ?>
    </table>
<? } ?>
</div>

<?
 // 깨져서 막음
 // 페이지를 새로 만들던가 단일페이지로 쓰던가 해야겠음
 // include_once(G5_THEME_PATH.'/tail.php');
?>