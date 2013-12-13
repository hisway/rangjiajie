/*
<select id="r1" name="r1" size='5' style="width:150px"></select>
<select id="r2" name="r2" size='5' style="width:150px"></select>
<input type="hidden" id="regional" name="regional" value="<{$regional}>"><br>
当前地区：<span id="regional_show" class="error"></span>

<script language='JavaScript'>  
  var url = '/js/regionals.j';
  $.ajax({
    type : "GET",
    url  : url,
    dataType : "json",
    success: function(items) {
      var txt = [];
      txt.push({'id' : 'regional', 'key' : 'id', 'type' : 'value'});
      txt.push({'id' : 'regional_show', 'key' : 'name'});
      var cate_id = $('#regional').val();

      var opts = {
        'items' : items,
        'boxs'  : ['r1', 'r2'],
        'curv'  : cate_id,
        'txt'   : txt
      };
      new DropDownListBox(opts);
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      //alert('DropDownListBox Initialization Failed!');
      //alert(XMLHttpRequest +':'+ textStatus +':'+ errorThrown);
    }
  });
</script>

//items       级联数据(JSON)
//boxs        级联标签 默认 box1, box2, box3 3级
//txt         保存分类信息的标签数组 (id: 标签ID, key: JSON中KEY, type: 元素填充方式 默认html)
//curv        11 1111 (当前选中值 2、4、6... 位数字)
//option      select标签的text和value 默认JSON中name, id
//addoption   select的第一个选项
//Additional  根据选项变动的自定义函数
//
//items = {
//  "items":{
//    "item11":{"id":"11","name":"五金工具"}
//  },
//  "items11":{
//    "item1111":{"id":"1111","name":"丝锥、板牙"},
//    "item1112":{"id":"1112","name":"其他钳工工具"}
//  },
//  "items1111":{
//    "item111111":{"id":"111111","name":"丝锥扳手"},
//    "item111112":{"id":"111112","name":"丝锥板牙套装"}
//  }
//};
*/


var DropDownListBox = function(opts) {
  this._items = opts.items;
  this._boxs  = opts.boxs || ['box1', 'box2', 'box3','box4'];
  this._txt   = opts.txt || [];
  this._curv  = opts.curv || '';
  this._option     = opts.option || ['name', 'id'];
  this._addoption  = opts.addoption;
  this._Additional = opts.Additional;

  if (typeof(this._items) == 'object') {
    this._init()
  }
  else {
    alert('DropDownListBox Initialization Failed!')
  }

  return this
};

DropDownListBox.prototype = {
  _init: function() {
    var self = this;
    this._Curv = {};
    this._curv = this._curv.length % 2 ? '': this._curv.toString();

    for (var i in this._boxs) {
      var $box = $('#' + this._boxs[i]);

      $box.bind('change', function() {
        self._curv = $(this).val();
        //if (self._curv != '')
          self._setValue();
      });
    }

    this._setValue();
  },

  getCurv: function() {
    return this._getCurv(this._curv);
  },

  _getCurv: function(curv) {
    if (this._Curv.id == curv)
        return this._Curv;

    if (! curv)
        return {};

    var items = this._getCurItems(curv);
    if (typeof(items) != 'object')
        return this._Curv;

    for (var k in items) {
      var item = items[k];
      if (typeof(item) != 'object')
          continue;

      if (item['id'] == curv) {
        this._Curv = item;
        break
      }
    }

    return this._Curv
  },

  _setValue: function() {
    this._setText(this._curv);

    for (var i in this._boxs) {
      var len = 2 * (parseInt(i) + 1);
      var $box = $('#' + this._boxs[i]);

      if ($box.length > 0) {
        var curv = '';
        if (this._curv)
          curv = this._curv.substring(0, len);
        len -= curv.length;

        while (len--) {
          curv += '*'
        }

        this._setSelect($box[0], curv)
      }
    }

    if (typeof(this._Additional) == 'function') {
      var Curv = this._getCurv(curv);
      this._Additional(Curv);
    }
  },

  _getCurItems: function(curv) {
    var key = 'items' + curv.substring(0, (curv.length - 2));
    var items = this._items[key];
    return typeof(items) == 'object' ? items: 0
  },

  _setSelect: function(box, curv) {
    if (this._option.length <= 0 || box.value == curv)
      return;

    var items = this._getCurItems(curv);
    box.options.length = 0;

    var index = 0;
    if (this._addoption) {
      box.options.add(new Option(this._addoption[0], this._addoption[1]));
      index++;
    }

    for (var key in items) {
      var txt = items[key][this._option[0]];
      var val = items[key][this._option[1]];
      txt = txt.replace(/(.*)\/([^\/]*)$/, '$2');
      box.options.add(new Option(txt, val));

      if (val == curv)
        box[index].selected = true;
      index++;
    }
  },

  _setText: function(curv) {
    if (! this._txt instanceof Array)
      return;

    var Curv = this._getCurv(curv);

    for (var key in this._txt) {
      if (typeof(this._txt[key]) != 'object')
        continue;

      var txt = this._txt[key];
      var val = Curv[txt['key']] || '';

      //$('#' + txt['id']).html(val).val(val);
      if (txt['type'] == 'value')
        $('#' + txt['id']).val(val);
      else
        $('#' + txt['id']).html(val)
    }
  }
};