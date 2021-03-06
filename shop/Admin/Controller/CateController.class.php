<?php 
namespace Admin\Controller;
Class CateController extends CommonController{
	public function index(){
		$cate=M('Cate');
		
		$count      = $cate->count();// 查询满足要求的总记录数

    $Page = new \Org\Mrc\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数

    $show       = $Page->show();// 分页显示输出

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

    $list = $cate->limit($Page->firstRow.','.$Page->listRows)->order('cat_id')->select();
    $this->assign('page',$show);// 赋值分页输出

      $this->assign('list',$list);
	    $this->display();
	 
	}

	public function set_category(){
		$cate=M('Cate');
		$result=$cate->where('is_show=1')->order('cat_id')->select();
		$htmls  = $this->_set_json($result, '');      
    
    echo $htmls;
	}
	
  private function _set_json($list, $file)
        {
            foreach ($list as $l)
            {
            	
            	$i++;
                $cate_id = $l['cat_id'];
               
                $name    = $l['category'];
                
               
                $level   = strlen($cate_id)/2;

// var_dump($name);               

                $cate = substr($cate_id, 0, ($level-1)*2);
                $name = preg_replace('/(.*?)\/([^\/]*)$/', '$2', $name);
                $name = trim($name);
                
//var_dump($name);

                $item = array(
                    'id'   => $cate_id,
                    'name' => $name
                );

                
                  
                  
                $categorys['items'.$cate][] = $item;

 
            } 
       
      
            $htmls  = json_encode($categorys);
            
            return $htmls;
        }
        
        
        public function add(){
        	
     $cate=M('Cate');
     
     
     $data['cat_id']=$_POST['cat_id'];
     
     $data['category']=$_POST['category'];
 
     $data['is_show']=$_POST['is_show'];
     
     $a=$cate->add($data);
     if($a)  	{
     	
     	$this->success();
     	
    }
    else{
    	
    	$this->error($cate->getLastsql());//获取上一条SQL语句
    }
	
	
}




  public function edit(){
  	$id=$_GET['id'];
  	$cate=M('Cate');
  	$list=$cate->where("id=$id")->find();
  	$this->assign('list',$list);
  	$this->display(); 	
  }
  
  public function modify(){
  	$id=$_POST['id'];
  	$cate=M('Cate');
  	$data['category']=$_POST['category'];
  	$data['cat_id']=$_POST['cat_id'];
  	$data['is_show']=$_POST['is_show'];
  	
  	if($cate->where("id=$id")->save($data)){
 
			$this->redirect('Cate/index',1);
			}
		else{
			echo $cate->getLastsql();
			$this->error();
			}
  	
  }

	public function search(){


		$terms=$_GET['terms'];
	  $cate=M('Cate');
		$count = $cate->where("category like"." "."'%".$terms."%'")->count();// 查询满足要求的总记录数
	  $Page = new \Org\Mrc\Page($count,1);// 实例化分页类 传入总记录数和每页显示的记录数
	  $show = $Page->show();// 分页显示输出	
    $list = $cate->limit($Page->firstRow.','.$Page->listRows)->where("category like"." "."'%".$terms."%'")->select();   
    
    foreach($list as $key=> $value){
    	$attr=$value['category'];
    	$value['category']=highlight($attr,$terms);
    	$list[$key]=$value;   		   	
    }
    
    $this->assign('page',$show);// 赋值分页输出
    $this->assign('list',$list);
	  $this->display(index);
	}
	
}
?>