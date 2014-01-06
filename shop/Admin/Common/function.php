<?php
/**
 * 后台公共文件
 * 主要定义后台公共函数库
 */


/**
 * 检测验证码
 * @param  integer $id 验证码ID
 * @return boolean     检测结果
 */
function check_verify($code, $id = 1){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

//分页函数
function fenye($listRows,$parameter=array(),$where=array()){
    $user =M('user');
    empty($parameter) ? $_GET : $parameter;
    empty($where) ? 1 : $where; 
    	$count= $user->where($where)->count();// 查询满足要求的总记录数
    	$Page = new \Think\Page($count,$listRows,$parameter);// 实例化分页类 传入总记录数和每页显示的记录数
    	$list = $user->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
      $Page->setConfig('prev','上一页');
    	$Page->setConfig('next','下一页');
    	$Page->setConfig('first','第一页');
    	$Page->setConfig('last','最后一页');
      $Page->setConfig('theme','%HEADER% %NOW_PAGE%/%TOTAL_PAGE%页 %UP_PAGE% %DOWN_PAGE% %FIRST% %LINK_PAGE% %END%');  
    	$show = $Page->show();// 分页显示输出
    	$arr=array(
    	'list' => $list,
    	'show' => $show,
    	'count' => $count
    );
	 return $arr;
}

//高亮显示匹配字段
function highlight($str, $terms){
	if ( ! is_string($terms) )
    return $str;
    $terms = trim($terms);
    if ( $terms != '' ) {
        $TERMS = preg_split('/\s+/',$terms);
        foreach ($TERMS as $value) {
            $str =replace($str,$value);
        }
    }
    return $str;
	
}


function replace($mainstring,$substring) {
    if (! $mainstring || ! $substring)
        return $mainstring;
    $pos = true;
    $temp = '';
    while ($pos !== false) {
        $pos = stripos($mainstring, $substring, 0);                          
        if ($pos === false) {
            $temp = $temp.substr($mainstring,0,strlen($mainstring));
        }
        else {
            $tmp = substr($mainstring,$pos+strlen($substring),strlen($mainstring));
            if (stripos($tmp,">",0) === false || stripos($tmp,"<",0) < stripos($tmp,">",0)){
                $temp = $temp.substr($mainstring,0,$pos)."<font style='color:red'>".substr($mainstring,$pos,strlen($substring))."</font>";
            }
            else {
                $temp = $temp.substr($mainstring,0,$pos+strlen($substring));
            }
            $mainstring = substr($mainstring,$pos+strlen($substring),strlen($mainstring));
        }
    };
    return $temp;
}