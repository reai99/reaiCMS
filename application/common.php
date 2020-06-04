<?php

// 应用公共文件
define('INSTALL_APP_PATH', realpath('') . '/');
define('TENPLATE_NAME','default'); 
function delFile($path)
{
    $handle = opendir($path);
    if ($handle) {
        while (false !== ($item = readdir($handle))) {
            if ($item != "." && $item != "..") {
                if (is_dir("{$path}/{$item}")) {
                  delFile("{$path}/{$item}");
                } else {unlink("{$path}/{$item}");}
            }
        }
    closedir($handle);
   }
}
function random($length, $chars = '0123456789') {
	$hash = '';
	$max = strlen($chars) - 1;
	for($i = 0; $i < $length; $i++) {
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}

function create_randomstr($lenth = 6) {
	return random($lenth, '123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ');
}

function check_email($field){
	$field=filter_var($field, FILTER_SANITIZE_EMAIL);  //删除非法字符
	if(filter_var($field, FILTER_VALIDATE_EMAIL)) //过滤器作为电子邮箱过滤
	{ return TRUE;}else{    return FALSE;}
	}
	
/**
 * 获取基本信息
 */
function getbasic(){
	$data=db('basic')->where('basicid',1)->find();
   return $data;
}

/**
 * 数据统计
 */
function statistics(){
	$todayTime=todayTime();
	$data=array(
	 'all'=>array(
	   'artcount'=>db('article')->count(),
	   'lycount'=>db('liuyan')->count(),
	   'flowcount'=>db('article')->sum('traffic'),
	 ),
	 'today'=>array(
	  'artcount'=>db('article')->where("time>".$todayTime[0]." AND time<".$todayTime[1]."")->count(),
	  'lycount'=>db('liuyan')->where("time>".$todayTime[0]." AND time<".$todayTime[1]."")->count(),
	  'flowcount'=>db('article')->where("time>".$todayTime[0]." AND time<".$todayTime[1]."")->sum('traffic'),
	 ),
	);
	return $data;
}

/**
* 返回某日开始和结束的时间戳
* @param int $time 某日任意时间的时间戳
* @return array
*/
function certaindayTime($time){
        return [
            strtotime(date('Y-m-d', $time)),
            strtotime(date('Y-m-d', $time)) + 86399
        ];
    }
/**
* 返回今日开始和结束的时间戳
* @return array
*/
function todayTime(){
        return [
            mktime(0, 0, 0, date('m'), date('d'), date('Y')),
            mktime(23, 59, 59, date('m'), date('d'), date('Y'))
        ];
    }
/**
 * 返回昨日开始和结束的时间戳
 * @return array
*/
function yesterdayTime(){
        $yesterday = date('d') - 1;
        return [
            mktime(0, 0, 0, date('m'), $yesterday, date('Y')),
            mktime(23, 59, 59, date('m'), $yesterday, date('Y'))
        ];
    }
/**
 * 安全替换 防注入
 * @param {Object} $string
 */
function safe_replace($string)
{
    $string = str_replace('%20', '', $string);
    $string = str_replace('%27', '', $string);
    $string = str_replace('%2527', '', $string);
    $string = str_replace('*', '', $string);
    $string = str_replace('"', '&quot;', $string);
    $string = str_replace("'", '', $string);
    $string = str_replace('"', '', $string);
    $string = str_replace(';', '', $string);
    $string = str_replace('<', '&lt;', $string);
    $string = str_replace('>', '&gt;', $string);
    $string = str_replace("{", '', $string);
    $string = str_replace('}', '', $string);
    $string = str_replace('\\', '', $string);
    return $string;
}