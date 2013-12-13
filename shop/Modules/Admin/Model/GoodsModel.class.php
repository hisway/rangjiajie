<?php
class GoodsModel extends Model{
	
	
protected  $fields=array(
'id','cat_id','goods_sn','goods_name','click_count','brand_id','market_price',
'promote_price','promote_start_date','promote_end_data','keywords','goods_desc','goods_img','is_on_sale','is_best','create_time','last_update','_pk' => 'id', '_autoinc' => true
);


}

?>