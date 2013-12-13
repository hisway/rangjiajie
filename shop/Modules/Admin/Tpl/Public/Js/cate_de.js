function set_category(rate, add, Additional)
{
  var url  = 'http://localhost/rangjiajie/index.php/Admin/Cate/set_category';
  var boxs = ['c1', 'c2','c3','c4'];

  

  $.ajax({
    type : "GET",
    url  : url,
    dataType : "json",
    success: function(items) {
      var txt = [];
      txt.push({'id' : 'category', 'key' : 'id', 'type' : 'value'});      
      var cate_id = $('#category').val();

      var opts = {
        'items' : items,
        'boxs'  : boxs,
        'curv'  : cate_id,
        'txt'   : txt,
        'Additional' : Additional
      };
      if (add)
        opts.addoption = ['请选择类别', ''];

      new DropDownListBox(opts);
    }
  });
}


