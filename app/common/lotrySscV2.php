<?php

//  php.exe app/common/lotrySsc.php 

//$a = [];
//$a[] = "a12345押700";
//$a[] = "b大900";

//
//$content = "a1234押100";
use function betstr\split_decode_splitx;

$content454 = "a大100";
$content454 = "a1234押100";
$content454 = "a12押9";
$content454 = "a123456押9";
$content454 = "a123押100";


require __DIR__ . "/../../lib/iniAutoload.php";
require_once __DIR__ . "/../../lib/str.php";
//$bet_str_arr_clr441 = \strspc\spltBySpace($content454);
//var_dump( $bet_str_arr_clr441);

// var_dump( spltSingleArr($bet_str_arr_clr441) );




//  a123456押100
function spltSingleArrFrmTemacyoZuheMod($betstr)
{
    $a = [];
    $cyoNam = str_split($betstr)[0];

    $ya_pos = strpos($betstr, '押');
    //  var_dump( $ya_pos );
    $strlen525 = mb_strlen($betstr);
    //  var_dump(mb_strlen($betstr));  //9 is ok...  a123呀100 len is 8 also ok

    //  var_dump("yapos is :$ya_pos strlen is:$strlen525 " );
    $sublen = mb_strlen($betstr) - $ya_pos;
    //   var_dump(" sublen:$sublen");
    $bet_nums = mb_substr($betstr, 1, $ya_pos - 1);
    //   var_dump($bet_nums );
    $betNumaArr = str_split($bet_nums);
    foreach ($betNumaArr as $betnum) {

        $a[] = $cyoNam . "/" . $betnum . "/" . getAmt_frmBetStr340($betstr);
    }
    return $a;
}

//var_dump(kaij_echo(15973));
//   6599269003:AAHW6kAh3Cy28vT4NuzQIkU4sISM3iFi-OA      ssc2024_bot  test ssc bot
//  C:\phpstudy_pro\Extensions\php\php8.0.2nts\php.exe app/lotrySsc.php
//   特码球玩法=\d\/\d\/\d+,特码球大小单双玩法=\d+[大|小|单|双]\d+,和值大小单双玩法=和[大|小|单|双]\d+,龙虎和玩法=[龙|虎|和]\d+,前后三玩法=[前|后][豹|顺|对|半|杂]\d+
//1/1/1
//var_dump(dwijyo("小100", "38244"));
//var_dump(dwijyo("虎100", "00844"));

//var_dump(join(" ",getKaijNumArr_hezDasyods("41278") ));
 
function var_dumpx120($o)
{
    //var_dump($o);
}

//var_dump(dwijyo("和100",   "01690"));

$blkHash1236 = " 0x60d94a8232c1bc35fd15467cda7ea578861242433611cf50099fa73943ae8c1a";
//var_dump(getKaijNumFromBlkhash($blkHash1236));
//var_dump(getKaijNumFly_longhuHaeWefa("01690"));






//echo preg_match("/\d\/\d\/\d+/", "1/1/33");
//die();


//echo preg_match("/\d[大|小|单|双].*/", "1单311");
//die();
//echo preg_match("/\d[大|小|单|双]\d+/", "1单33");
//die();
//echo getWefa("1单33");
//echo getWefa("和单33");

//print_rx(str_split("3单33"));
//$str = "3单33";

//print_r(str_splitX("3单33"));


function print_rx($s)
{
}
//var_dumpxx(dwijyo("1单33", "12745"));
$glb = [];





function getBetContxEcHo($bet_str)
{

    \think\facade\Log::debug(__METHOD__ . json_encode(func_get_args(), JSON_UNESCAPED_UNICODE));
    // \think\facade\Log::betnotice ("at file:". __FILE__ . ":" . __LINE__ );
    $wanfa = getWefa($bet_str);
    if ($wanfa == "特码球玩法" || $wanfa == "特码球大小单双玩法") {
        $rzt = getBetContxEcHo_temacyo($bet_str);
    } else 
        $rzt =  $bet_str;
    \think\facade\Log::debug($rzt);
    return   $rzt;
}

// php app/common/lotrySsc.php
// v/ar_dump(getBetContxEcHo_temacyo_abcFmt("a大100"));
//  a大100   a/1/100
function getBetContxEcHo_temacyo_abcFmt($bet_str)
{
    if (isset($GLOBALS['loggerFun'])) {
        $GLOBALS['loggerFun'](__METHOD__ . json_encode(func_get_args(), JSON_UNESCAPED_UNICODE));
    }

    var_dumpx120($bet_str);
    if (strstr($bet_str, '/'))
        $cyo_arr = explode("/", $bet_str);
    else
        $cyo_arr =  Str_splitX($bet_str);  //a 大 100
    // var_dump( $cyo_arr );
    $cyo_idex = $cyo_arr[0];
    $glb['$tozhu_arr'] = $cyo_arr;
    $glb['$cyo_idex'] = $cyo_idex;
    var_dumpx120($glb);

    $cyoName_arr = ['A', 'b', 'c', 'd', 'e'];
    var_dumpx120($cyo_idex);
    //  $cyoName = $cyoName_arr[$cyo_idex - 1];
    $cyo_num = $cyo_arr[1];

    $cyo_num_rply = "数字" . $cyo_num;
    if (!is_numeric($cyo_num))
        $cyo_num_rply = $cyo_num;   //大小单双


    $cyoName = $cyo_arr[0];
    $money = getAmt_frmBetStr340($bet_str);
    return     $cyoName . "球" . $cyo_num_rply . "  " .  $money  . ".00";
}

// php app/common/lotrySsc.php
//var_dump(getBetContxEcHo_temacyo("a/1/200"));
//var_dump(getBetContxEcHo_temacyo("a/大/200"));var_dump(getBetContxEcHo_temacyo("a小200"));
function getBetContxEcHo_temacyo($bet_str)
{
    if (isset($GLOBALS['loggerFun'])) {
        $GLOBALS['loggerFun'](__METHOD__ . json_encode(func_get_args(), JSON_UNESCAPED_UNICODE));
    }

    $bet_str = trim($bet_str);

    if (!preg_match("/^\d.*/iu", $bet_str))
        return getBetContxEcHo_temacyo_abcFmt($bet_str);

    var_dumpx120($bet_str);
    $cyo_arr = explode("/", $bet_str);
    var_dump($cyo_arr);
    $cyo_idex = $cyo_arr[0];
    $glb['$tozhu_arr'] = $cyo_arr;
    $glb['$cyo_idex'] = $cyo_idex;
    var_dumpx120($glb);

    $cyoName_arr = ['A', 'b', 'c', 'd', 'e'];
    var_dumpx120($cyo_idex);
    $cyoName = $cyoName_arr[$cyo_idex - 1];
    $cyo_num = $cyo_arr[1];

    $cyo_num_rply = "数字" . $cyo_num;
    if (!is_numeric($cyo_num))
        $cyo_num_rply = $cyo_num;   //大小单双

    return     $cyoName . "球" . $cyo_num_rply . "  " . $cyo_arr[2] . ".00";
}

function getAmt_frmBetStr340($str)
{
    $str = trim($str);
    //   $str = $msg['text'];
    if (preg_match('/(\d+)$/', $str, $match)) {
        $number = $match[0];
    }
    return  $number;
}

$arr = get_defined_functions();

//print_r($arr);







//require_once __DIR__."/../../config/cfg.php";
//
//$wefa428=getWefa("abc大100");
//$z429=$wefa428;

//function getWefa($bet_nums)
//{
//
//   return \betstr\getWefa($bet_nums);
//}
//msgHdlrOther("a大100");


//msgHdlrOther("龙100");
//var_dump(getWefa("a大100"));
//var_dump(getWefa("a大小100"));
//var_dump(getWefa("1/1/100"));
 //var_dump(getWefa("前豹100"));
//var_dump(dwijyo("a/1/100","12345"));
//C:\phpstudy_pro\Extensions\php\php8.0.2nts\php.exe app/common/lotrySscV2.php

// no stand mode bet,,but msut single item..just for easy test
function dwijyo_NonStandMode($betNum,   $bonusNum)
{
  $betstr=  \betstr\convert_toStandmode($betNum);
if(is_array($betstr))
    $betstr= $betstr[0];
  return dwijyo($betstr,$bonusNum);
}


//for tor to  dwijyo    ，，$betNum is stand mode,总和大，总和小，龙胡和，前后三xxx
function dwijyoV2($betNum,   $bonusNum)
{


  // todo 这里要表map optmz
  //和值兑奖法
  if (startsWith($betNum,"总和")  ) {
    //
    // substr()  =$betNum=总和大100   总和小100
    //大单100   拆分为  总和大100  总和单100
    $betnum_true = mb_substr($betNum, 2, 1);//总和大100

    $kaij_num = getKaijNumArr_hezDasyods($bonusNum);
    print_rx(" kaij num::");
    //  var_dump($kaij_num);


    return in_array($betnum_true, $kaij_num);
  }

  else if (startWithArrchar($betNum, "龙虎和")) {
    return dwijyo_lhhwf($betNum,   $bonusNum);

  } else if (startWithArrchar($betNum, "前后")) {
    return dwijyo_qhswf($betNum,   $bonusNum);

  }

  require_once __DIR__."/../../lib/str.php";
  include_once  __DIR__."/../../lib/str.php";
  $wefa="特码球大小单双玩法";
  $fun=  'dwijyo_'.\strspc\pinyin1($wefa);
  return $fun( $betNum,$bonusNum);


}

//对讲结果
function dwijyo($betNum,   $bonusNum)
{
    //  $betNum= \betstr\convert_StandFmt($betNum);
//    require_once __DIR__."/../../lib/logx.php";
    \libspc\log_info_php("unitest", "", func_get_args(), "untest", __DIR__ . "/../../runtime/");
    // var_dump(__METHOD__ . json_encode(func_get_args(),JSON_UNESCAPED_UNICODE));
    //   echo PHP_EOL;
    $wefa = \betstr\getWefa($betNum);
    if ($wefa == null)
        throw new \think\exception\ValidateException($betNum);
    //  var_dump($wefa );
    //  die();
    //global $glb;
    $glb['betNum'] = $betNum;
    $glb['wefa'] = $wefa;
    //   print_rx($glb);
    //var_dump($glb);
    //  var_dump($wefa);

    // todo 这里要表map optmz
    if ($wefa == "和值大小单双玩法") {
         //
     // substr()  =$betNum=总和大100   总和小100
      //大单100   拆分为  总和大100  总和单100
        $betnum_true = mb_substr($betNum, 2, 1);//总和大100
        //str_splitX($betNum)[0];
        //  var_dump($betnum);
        $kaij_num = getKaijNumArr_hezDasyods($bonusNum);
        print_rx(" kaij num::");
        //  var_dump($kaij_num);


        return in_array($betnum_true, $kaij_num);
    }

    else if (startsWith($wefa, "龙虎和玩法")) {
        return dwijyo_lhhwf($betNum,   $bonusNum);

    } else if (startsWith($wefa, "前后三玩法")) {
        return dwijyo_qhswf($betNum,   $bonusNum);

    }

    require_once __DIR__."/../../lib/str.php";
    include_once  __DIR__."/../../lib/str.php";
     $fun=  'dwijyo_'.\strspc\pinyin1($wefa);
    return $fun( $betNum,$bonusNum);


}

    function dwijyo_tmqdxdswf($betNum,$bonusNum)
    {
        //  a\/单\/100
        $cyoIdex = str_split($betNum)[0];

        $cyoIdex=strpos("abcde",$cyoIdex);
        //  var_dump( "cyoIdex:".$cyoIdex);
        $kaij_num_curPos = str_split($bonusNum)[$cyoIdex ];
        //   var_dump("kaij_num_curPos:".$kaij_num_curPos);


        if(\strcls::contain($betNum,"/"))
            $betNum_Dasyodeshwo =  explode("/", $betNum)[1];
        else
            $betNum_Dasyodeshwo = str_splitX( $betNum)[1];
        // str_splitX($betNum)[2];
        //  var_dump($betNum_Dasyodeshwo);
        $kaij_num_fnly = getKaijNumArr_Dasyaodeshwo($kaij_num_curPos);
        //    var_dump( $kaij_num_fnly);


        return  in_array($betNum_Dasyodeshwo, $kaij_num_fnly);


    }


function dwijyo_lhhwf($betNum,$bonusNum)
{
    $betnum = str_splitX($betNum)[0];   //"和"
    //  var_dump($betnum);
    //开奖号码
    //  $kaij_num=
    //  var_dump(str_split($bonusNum)[0]);
    //  var_dump(str_split($bonusNum)[4]);
    if (str_split($bonusNum)[0] > str_split($bonusNum)[4])
        $kaij_num_fnly = "龙";
    else if (str_split($bonusNum)[0] < str_split($bonusNum)[4])
        $kaij_num_fnly = "虎";
    else if (str_split($bonusNum)[0] == str_split($bonusNum)[4])
        $kaij_num_fnly = "和";

    //  var_dump($betnum . " kjnumFnly:" . $kaij_num_fnly . " oriKjnum:" . $bonusNum);
    $rzt = (strcmp($betNum, $kaij_num_fnly));
    //  var_dump($rzt);
    //   return $rzt;
    if ($rzt > 1)
        return true;
    else
        return false;

}
function dwijyo_qhswf($betNum,$bonusNum)
{
    $betnum = str_delNum($betNum);
    //   $betnum = cyehose_bet_fullname($betnum);


    print_rx(" betnum num fullname::" . $betnum);
    //  die();
    //开奖号码
    //  $kaij_num=

    $kaij_num = getKaijNumArr_cyehose($bonusNum);
    print_rx(" kaij num::");
    print_rx($kaij_num);


    return in_array($betnum, $kaij_num);

}






        function dwijyo_tmqwf($betNum,$bonusNum)
    {



            \libspc\log_info_php(__METHOD__.":".__line__,"betNum",$betNum,"kaijdbg",__DIR__."/../../runtime/");
            $cyoIdex = str_split($betNum)[0];
            $cyoIdex=strpos("abcde",$cyoIdex);
            \libspc\log_info_php(__METHOD__.":".__line__,"cyoIdex frm abcd to 123:",$cyoIdex,"kaijdbg",__DIR__."/../../runtime/");
            //开奖号码
            \libspc\log_info_php(__METHOD__.":".__line__,"kaij_num all:",$bonusNum,"kaijdbg",__DIR__."/../../runtime/");
            $kaij_num = str_split($bonusNum)[$cyoIdex ];
            \libspc\log_info_php(__METHOD__.":".__line__,"kaij_num:",$kaij_num,"kaijdbg",__DIR__."/../../runtime/");

            $betNum = explode("/", $betNum)[1];
            return  $betNum ==    $kaij_num;


}
function cyehose_bet_fullname($betnum)
{
  //  if( class_exists('\think\facade\Log'))
 //   \think\facade\Log::debug(__METHOD__ . json_encode(func_get_args(), JSON_UNESCAPED_UNICODE));
    $betnum = str_replace("前", "前三", $betnum);
    $betnum = str_replace("后", "后三", $betnum);
    $betnum = str_replace("中", "中三", $betnum);
    $betnum = str_replace("豹", "豹子", $betnum);
    $betnum = str_replace("对", "对子", $betnum);
    $betnum = str_replace("顺", "顺子", $betnum);
    $betnum = str_replace("半", "半顺子", $betnum);
    $betnum = str_replace("杂", "杂六", $betnum);
    return $betnum;
}

function fromAbcdeTo12345($cyoIdex )
{
    
  return  strpos("abcde",$cyoIdex);
}

//function getKaijNumArr_hezDasyods($bonusNum)

function getKaijNumFly_longhuHaeWefa($bonusNum)
{
    // var_dump(str_split($bonusNum));
    if (str_split($bonusNum)[0] > str_split($bonusNum)[4])
        return  "龙";
    else if (str_split($bonusNum)[0] < str_split($bonusNum)[4])
        return "虎";
    else
        return  "和";
}

//获取开奖序列  --和值大小单双
function getKaijNumArr_hezDasyods($bonusNum)
{
    $a2 = str_split($bonusNum);


    $val = array_sum($a2);

    $a = [];
    if ($val > 23)
        $a[] = "大";
    else
        $a[] = "小";


    if ($val % 2 == 0)
        $a[] = "双";
    else
        $a[] = "单";


    return $a;
}
//获取开奖序列  --大小单双
function getKaijNumArr_Dasyaodeshwo($bonusNum)
{

    $glb = [];
    //   if($bonusNum)
    //  $a[];
    $glb['bonusNum'] = $bonusNum;

    $a = [];
    if ($bonusNum >= 5)
        $a[] = "大";
    else
        $a[] = "小";
    print_rx($glb);


    $a_de = [1, 3, 5, 7, 9];
    // print_rx($a);
    if (in_array($bonusNum, $a_de))
        $a[] = "单";
    else
        $a[] = "双";
    $glb['curKaijunm_arr'] = $a;
    //  $a_shwo = [0, 2, 4, 6, 8];
    //  if (in_array($bonusNum, $a_shwo)) 
    print_rx($glb);


    return $a;
}

function getKaijNumFromBlkhash_cye5vi($blkHash)
{
    $blkHash = trim($blkHash);
    $blkHash = substr($blkHash, 2);
  //  var_dump($blkHash);
    $str = preg_replace('/[a-z]/i', '', $blkHash);
  //  var_dump(($str));
    $str = substr($str, 0, 5);
    return $str;
}


function getKaijNumFromBlkhash($blkHash)
{
  log_enterMethV2(__METHOD__,func_get_args(),$GLOBALS['mainlg']);
    \think\facade\Log::notice(__METHOD__ . json_encode(func_get_args()));
    $blkHash = trim($blkHash);
    $blkHash = substr($blkHash, 2);
    var_dump($blkHash);
    $str = preg_replace('/[a-z]/i', '', $blkHash);
    var_dump(($str));
    $str = substr($str, strlen($str) - 5);
    log_vardumpRetval(__METHOD__,$str,$GLOBALS['mainlg']);
    return $str;
}

//获取开奖序列--前后三玩法
function getKaijNumArr_cyehose($bonusNum)
{
    $cye3 = substr($bonusNum, 0, 3);
    var_dumpx120($cye3);
    $jon3 = substr($bonusNum, 1, 3);
    $ho3 = substr($bonusNum, 2, 3);
    if (isBaozi($cye3))
        $a[] = "前三豹子";
    else if (isDwizi($cye3))
        $a[] = "前三对子";
    else   if (isShunzi($cye3))
        $a[] = "前三顺子";
    else  if (isBanShunzi($cye3))
        $a[] = "前三半顺子";
    else  if (isZalyo($cye3))
        $a[] = "前三杂六";



    if (isBaozi($jon3))
        $a[] = "中三豹子";
    else if (isDwizi($jon3))
        $a[] = "中三对子";
    else   if (isShunzi($jon3))
        $a[] = "中三顺子";
    else  if (isBanShunzi($jon3))
        $a[] = "中三半顺子";
    else  if (isZalyo($jon3))
        $a[] = "中三杂六";


    if (isBaozi($ho3))
        $a[] = "后三豹子";
    else if (isDwizi($ho3))
        $a[] = "后三对子";
    else   if (isShunzi($ho3))
        $a[] = "后三顺子";
    else  if (isBanShunzi($ho3))
        $a[] = "后三半顺子";
    else  if (isZalyo($ho3))
        $a[] = "后三杂六";
    return $a;
}

function isBaozi($num)
{
    return (str_split($num)[0] === str_split($num)[1] &&   str_split($num)[0] === str_split($num)[2]);
}
function isDwizi($num)
{
    if (isBaozi($num))
        return false;
    else  if (str_split($num)[0] === str_split($num)[1] &&   str_split($num)[0] !== str_split($num)[2])
        return true;
    else if (str_split($num)[0] === str_split($num)[2] &&   str_split($num)[0] !== str_split($num)[1])
        return true;
    else if (str_split($num)[1] === str_split($num)[2] &&   str_split($num)[1] !== str_split($num)[0])
        return true;
    else
        return false;
}

function isShunzi($num)
{
    $num = order_str($num); // 019
    $a = ['123', '234', '345', '456', '567', '678', '789', '890', '901', '012', '089', '019'];
    return in_array($num, $a);
}


function isBanShunzi($num)
{

    $num = order_str($num);
    if (isShunzi($num))
        return false;

    $cye2 = substr($num, 0, 2);
    $ho2 = substr($num, 1, 2);
    $jo2 = substr($num, 0, 1) . substr($num, 2, 1);
    var_dumpx120($jo2);
    //   789  290>029  801>018
    $a = ['12', '23', '34', '45', '56', '67', '78', '89', '90', '01', '12', '09'];
    if (in_array($cye2, $a) || in_array($ho2, $a) || in_array($jo2, $a))
        return true;
    else
        return false;
}

function isZalyo($num)
{
    if (isBaozi($num))
        return false;
    else if (isDwizi($num))
        return false;
    else   if (isShunzi($num))
        return false;
    else  if (isBanShunzi($num))
        return false;
    else  return true;
}



//var_dumpx(dwijyo("4/4/33", "12745"));
//var_dumpx(dwijyo("后顺33", "32765"));
//


//var_dump(dwijyo("和100", "15031"));
//var_dumpx(dwijyo("前顺33", "90175"));


//var_dumpx(isShunzi("029"));
//var_dumpx(isBanShunzi("029"));
//  C:\phpstudy_pro\Extensions\php\php8.0.2nts\php.exe app/lotrySsc.php