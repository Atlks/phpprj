<?php
use think\facade\Cache;



//          rds	    zip	    files	jsonfile
//10wdbqry	300ms	1.5s	none	200ms
//100w	    3s	    15s		        2s shld

/////////

$startms = getMillisecond();


//db10w search 300ms..zp fl 1.5s  .rds fst than zp
//db100w srch 15s
//$rs= qry('db10w',function ($row){
//    if ($row['game_id'] == '99999')
//        return true;
//});

$redis = new redis();
$redis -> connect('127.0.0.1',6379);
$redis->auth("123456");
//$rs=$redis->hMGet("collx",array("100","101"));

//$rs=$redis->hGetAll("collx");

$rs= qry('collx',function ($row){
    if ($row['game_id'] >2 && $row['game_id']<5)
        return true;
});


echo getMillisecond() - $startms;
echo "ms\r\n";
print_r($rs);

die();




function  qt()

{



    require __DIR__ . '/../vendor/autoload.php';
// 应用初始化导入tp类库
    $app = new \think\App();
    ($app)->console;


    $startms = getMillisecond();
    // echo $startms;
    //select from xxx where xxx
    $CollStorepath = 'db10w.zip';
    $rows = Cache::remember('game_id=666', function () use ($CollStorepath) {

        $rows203 = qry($CollStorepath, function ($jsonobj) {

            if ($jsonobj['game_id'] == 666)
                return true;

        });
        return json_encode($rows203);
    });


    print_r($rows);
    echo getMillisecond() - $startms;
    echo "ms";
    die();


}

function  quyById()
{

}
function  qryOne($coll_store_postn, $whereFun)
{

    $arr = [];
    //scan also ok..but need flt dir first..
    //flob just flt auto
    //  $jsonrows=json_decode(file_get_contents($coll_store_postn),true);


    //


    $redis = new redis();
    $redis -> connect('127.0.0.1',6379);
    $redis->auth("123456");

    $arrss=  $redis->lrange($coll_store_postn, 0 ,-1);

    for ($i = 0; $i < count($arrss) ; $i++) {

        // var_dump($arrss[$i]);

        $txt=   $arrss[$i];
        $row = json_decode($txt, true);
        if ($whereFun($row))
        {
            $arr[] = $row;
             break;
        }
    }
    // $zip->get





    return $arr;
}
function qry($coll_store_postn, $whereFun)
{
    $arr = [];
    //scan also ok..but need flt dir first..
    //flob just flt auto
  //  $jsonrows=json_decode(file_get_contents($coll_store_postn),true);


    //


    $redis = new redis();
    $redis -> connect('127.0.0.1',6379);
    $redis->auth("123456");

   // $arrss=  $redis->lrange($coll_store_postn, 0 ,-1);
    $arrss=$redis->hGetAll($coll_store_postn);
    foreach($arrss as $k=>$v)
    {

       // var_dump($arrss[$i]);

        $txt=  $v;
        $row = json_decode($txt, true);
        if ($whereFun($row))
        {
            $arr[] = $row;
            // break;
        }
    }
   // $zip->get





    return $arr;
}


function getMillisecond()
{
    list($s1, $s2) = explode(' ', microtime());
    return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
}


//dep

$path_data_item = "d:/row3.json";
$map = array(
    "name" => "bar",
    "id" => 33,
);
file_put_contents($path_data_item, json_encode($map));


$filename = "db1.zip";
$zip = new ZipArchive();
$zip->open($filename, ZipArchive::CREATE);  //打开压缩包
//$zip -> addFile($path_data_item, basename($path_data_item));  //向压缩包中添加文件
$zip->addFromString('row3.txt', json_encode($map));


//--------add rcd2
$path_data_item = "d:/row2.json";
$map = array(
    "name" => "bar22",
    "id" => 22,
);
file_put_contents($path_data_item, json_encode($map));
$zip->addFile($path_data_item, basename($path_data_item));  //向压缩包中添加文件


$zip->close(); //关闭压缩包