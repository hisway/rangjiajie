function setSelect(id, val)
{
  if (val)
    $('#' + id).val(val);
}
//setSelect('type_id', '<{$type_id}>');


function setRadio(name, val, chked)
{
  var $this;
  var checked = false;

  $('[name^=' + name + ']').each( function () {
    $this = $(this);
    if (val != '' && $this.val() == val) {
      $this.attr('checked', true);
      checked = true;
      return;
    }
  });

//  var _setRadio = function () {
//    $this = $(this);
//    if (val != '' && $this.val() == val) {
//      $this.attr('checked', true);
//      checked = true;
//      return;
//    }
//  };
//  $('[name^=' + name + ']').each( _setRadio );

  if (! checked && chked)
    $this.attr('checked', true);
}
//setRadio('type_id', '<{$type_id}>', true);


function setCheckbox(name, vals)
{
  $('[name^=' + name + ']').each( function () {
    var $this = $(this);
    for(i in vals) {
      var val = vals[i];
      if (val != '' && $this.val() == val) {
        $this.attr('checked', true);
        break;
      }
    }
  });
}
//var vals = ['<{$type_id}>'];
//setCheckbox('type_id', vals);


function checkDelete(id)
{
  $('[id^=' + id + ']').each( function () {
    $(this).click( function () {
//    $(this).bind('click', function () {
      return confirm('确定删除？');
    });
  });
}
//checkDelete('btn_delete');


function checkAll(btn, id)
{
	
  $('#' + btn).click( function() {
    var chked = $('#'+btn).prop("checked"); 
    $('[id^='+ id +']').each( function() {   
      $(this).prop("checked", chked);
    });
  });
}
//checkAll('btn_all_able', 'ids');

function selectPic(index,px)
{
  document.domain = 'toocle.com';
  px = px || '120x120';
  $('#select_pic'+index).click(function(ev) {
  	window.open('http://my.album.toocle.com/?_d=member&_a=album&f=select&pic=pic_name'+index+'&photo=photo'+index+'&px=' +px,
  	'选择图片','width=600,height=400,scrollbars=yes,menubar=no,location=no');
  	ev.preventDefault();
  	return false;
	});
}

function cancelPic(index)
{
  $("#pic_name"+index).attr("value","");
  $("#photo"+index).attr("src","http://img.album.toocle.com/120-120-1/");
}

//selectPic(1)

function setValidateDefaults(lang)
{
  lang = lang || 'cn';

  var message_cn = {
    required: "champs obligatoires",
    remote: "请修正该字段。",
    email: "请输入正确格式的邮箱。（xxx@xxx.xxx）",
    url: "请输入有效的网址。（http://www.xxx.com）",
    date: "请输入有效的日期。",
    dateISO: "请输入有效的日期 (ISO)。",
    number: "请输入有效的数字。",
    digits: "只能输入整数。",
    creditcard: "请输入有效的信用卡号。",
    equalTo: "Veillez entrer le même mot",
    accept: "请输入拥有有效后缀名的字符串。",
    maxlength: jQuery.validator.format("请输入一个长度最多是 {0} 的字符串。"),
    minlength: jQuery.validator.format("请输入一个长度最少是 {0} 的字符串。"),
    rangelength: jQuery.validator.format("请输入一个长度介于 {0} 和 {1} 之间的字符串。"),
    range: jQuery.validator.format("请输入一个介于 {0} 和 {1} 之间的值。"),
    max: jQuery.validator.format("请输入一个最大为 {0} 的值。"),
    min: jQuery.validator.format("请输入一个最小为 {0} 的值。")
  };

  if (lang == 'cn')
    $.extend($.validator.messages, message_cn);

  $.validator.setDefaults({
    errorClass: 'validate_error',
    validClass: 'validate_valid'
  });
}

function validate(frm, rules, lang)
{
  setValidateDefaults(lang);

  $('#'+frm).validate({'rules': rules});
}
//validate('frm_detail', {cpasswd: {equalTo: "#npasswd"}}, 'cn');

function dateinput(date, format, lang)
{
  lang = lang || 'cn';
  format = format || 'yyyy-mm-dd';

  var localize_cn = {
    months:        '一月,二月,三月,四月,五月,六月,七月,八月,九月,十月,十一月,十二月',
    shortMonths:   '一月,二月,三月,四月,五月,六月,七月,八月,九月,十月,十一月,十二月',
    days:          '周日,周一,周二,周三,周四,周五,周六',
    shortDays:     '日,一,二,三,四,五,六'
  };

  if (lang == 'cn')
    $.tools.dateinput.localize(lang, localize_cn);

  $('#'+date).dateinput({
    format: format,
    lang: lang,
    css: {
      input: 'date_self'
    },
    selectors: true
  });
}
//dateinput('date');


//able
var Able = function(field) 
{
  this._msg = '确定提交？';
  this._active = '<span style="color:red">Active</span>';
  this._inactive = 'Inactive';

//  if (field == 'status') {
//    this._msg = '确定改变？';
//    this._active = '<span style="color:red">激活</span>';
//    this._inactive = '未激活';
//  }
//  else if (field == 'del') {
//    this._msg = '确定提交？';
//    this._active = '已删除';
//    this._inactive = '<span style="color:red">未删除</span>';
//  }
  
if (field == 'ecp') {
this._msg = '确定改变？';
this._active = '<span style="color:red">已处理</span>';
this._inactive = '未处理';
}
};

Able.prototype = {
  able : function(btn, wrap, url) {
    var self = this;
    $('[id^=' + btn + ']').each( function () {
      var id    = $(this).attr('rel');
      var $wrap = $('#' + wrap + id);
      $wrap.html( $wrap.html() == 1 ? self._active : self._inactive );

      $(this).click( function() {
        if (confirm(self._msg)) {
          if (id > 0) {
            var uri = url + '&id=' + id;
            self._able($wrap, uri);
          }
        }
      });
    });
  },

  ables : function(btn, wrap, ids, url) {
    var self = this;
    $('#' + btn).click( function() {
      if (confirm(self._msg)) {
        $('[id^=' + ids + ']').each( function() {
          var id  = $(this).val();
          var ckd = $(this).attr('checked');
          var $wrap = $('#' + wrap + id);

          if (ckd == true) {
            if (id > 0) {
              var uri = url + '&id=' + id;
              self._able($wrap, uri);
              $(this).attr('checked', false);
            }
          }
        });
      }
    });
  },

  _able : function($wrap, url) {
    Loading($wrap);
    var self = this;
    $.ajax({
      type: 'GET',
      url:  url,
      success: function(rv) {
        $wrap.html(rv == 1 ? self._active : self._inactive);
      }
    });
  }
};
//var url = "?_d=<{$_d}>&_a=<{$_a}>&_w=false&f=able";
//var ableStatus = new Able();
//ableStatus.able('btn_able_status', 'wrap_able_status', url);
//ableStatus.ables('btn_all_able_status', 'wrap_able_status', 'able_status_ids', url);


function Loading($wrap, msg)
{
  var loading = "data:image/gif;base64,R0lGODlhEAAQAPfgAP////39/erq6uvr6+jo6Pn5+dPT0/v7+/X19efn5/Pz8/j4+Pf39/r6+vz8";
  loading += "/MzMzO/v7/b29svLy/7+/unp6e7u7kJCQtnZ2fHx8a+vr4mJid7e3s/PzyYmJrOzs/Dw8NLS0vT09Le3t9ra2tvb25CQkKOjo2";
  loading += "tra9DQ0KysrM3Nza2traurq729vezs7M7OzuHh4fLy8rq6und3d6CgoIGBgYCAgGRkZGJiYsPDw8fHx4eHh+Dg4J+fn6KiooiI";
  loading += "iG9vb6enp9fX18DAwOXl5d3d3e3t7WBgYJmZmZOTk9/f30VFRebm5jQ0NBUVFQQEBNjY2ISEhOTk5K6urtzc3D8/P2dnZ8LCwp";
  loading += "ubm8jIyLm5uZqamiEhIcTExC0tLbCwsIyMjNXV1dHR0VxcXOPj40lJSTw8PGxsbExMTCwsLF9fXxAQEMnJyRYWFpSUlCIiIhsb";
  loading += "GwgICAsLC11dXVhYWJGRkba2try8vMbGxr+/v7i4uDs7O76+vmFhYYaGho2NjbW1tZeXl4qKiiQkJKmpqYODg0ZGRk9PT3Z2dg";
  loading += "kJCTo6OkFBQY+Pjx8fH3l5eRMTEw8PDyoqKrGxsWhoaHNzcwcHB7KysqGhoYKCgkpKSmVlZXFxcaioqE1NTeLi4p2dnaampqSk";
  loading += "pJ6ensXFxVNTU7S0tFZWVjExMVlZWaWlpVRUVDAwMCgoKFBQUKqqqg0NDUNDQxkZGT09PUdHR3p6ehISEgICAsHBwURERDU1NZ";
  loading += "KSkm1tbTk5OWlpaRwcHFJSUtTU1DMzMyAgIH5+fiMjI3JycnR0dA4ODkhISMrKynx8fJiYmAYGBnV1dU5OTgMDA4WFhR4eHgoK";
  loading += "CpycnC8vL1paWmNjYzc3N7u7u4uLiycnJ3t7e15eXhoaGjY2NkBAQP///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";
  loading += "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBF";
  loading += "Mi4wAwEAAAAh+QQFAADgACwAAAAAEAAQAAAIpQDBCRxIsGDBF1FwOQEQwEEAg+B6XJMT5wmAAwwiFCjo480jTVOYAJhQAEMFBg";
  loading += "PFLOomyCADAQI2gqvDBQhEcBVgVBA4p4OImyFIeBIoy4uAmwcMhBFoocmAmw0kcBB4Yk+emwJyGBDYw8KPmyhkbBB4wUonTgYN";
  loading += "TBnyYaCeMaiQqMCg4EILGimKFLzj6MYZRDY0JGFxAaISD0lqaEil4+jNxwIDAgAh+QQFAADgACwBAAEADgAOAAAImwDBCTRQx1";
  loading += "SkDmj8qBDIkIUzbVzgOFkj59QWhhmqrJohggKBLzgqrQEADsocRRcZCqwBIMAEHxaiqFQZoMCBGWWuzGQYAAGDOa0q7BQ44cOH";
  loading += "G3QgDAUXQMCAHUckLEVAZoClSTSWJqBSAcYOY3d2EhFThAE4HTVsWBqBIAKTMKNeuGD4AAkYN5+CfNGSjMDMBDokgVqRY0QMhg";
  loading += "EBACH5BAUAAOAALAEAAQAOAA4AAAiZAMEJHOEDCDILOJKAEMhQxpkyFvY08dLBkAmGfPqo+nPFxQAtlBp1oAGOhzI1KRgy/NOG";
  loading += "1wtAk6apVGnlGDQ3QDjMZJgh0RJMM2LsFJjgSRsNNhQMBQegaaofUJYGOOAATwkZSxdEOECBExYUOxFUUBAAnBBQQSQkKNAAgw";
  loading += "AiAxYwJCHDg4wcEgyQYIJgJoQRKrJwKOJCrsCAACH5BAUAAOAALAEAAQAOAA4AAAiZAMEJhOFBg5UjtExAEcgwy48TN8aoQrNE";
  loading += "TQaGDwrNMKECQoUufsx8YwEuwZYafBgyxHLqkAEdYDyoVDmjQ50MSUbMZChCmCkTWBDsFEghFitCJiIMBUfg0aA8LKQszfAqkx";
  loading += "APKJYeiRPlw6gWPHZOsOXlATgieLLwwOAgQIMCDQIsY0ghDIgLPBIYUbAgwEwEAqSQoYChL8OAACH5BAUAAOAALAEAAQAOAA4A";
  loading += "AAiZAMEJFMDGFSMNSPTAEMjwwopAJX7YmAGkxhCGRVJcykNCgQIQlzRZuQPuQ4sUBhgyzIAKCAkqdl6oVFkCTSgOLQjMZJhjyS";
  loading += "Y2XQrsFOjCTBkOEhoMBTegiQUqIDAs1ZKmz4ALOoduGqRrARkYMXYKggMLBLgQCQSEODABwAprtd74YMjgA4YIBwA8SeStx0wH";
  loading += "BQrktVBIBcOAACH5BAUAAOAALAEAAQAOAA4AAAibAMEJjEFFR6kVIh5QEMiQwIMWdjIE6RHIBwqGLl7gEUKAQQQl2MCAeQCOAQ";
  loading += "kURBgyzGGjBBkjF1KqZEiIkggCGxTMZIjixJ8EUhzsFPgBx4kBAgIMBQeBzo0YEBos7XJo24IQBZb6MRQqQIECE3Zu2aMGCrgA";
  loading += "AQBwm5KAAKBm1KpkYAggDTNpkJz4ItaJxcwHhWZx6UCqhAGGAQEAIfkEBQAA4AAsAQABAA4ADgAACJkAwQksYAQGMA4GlGAQyB";
  loading += "ABgQ0XQEjo0uKKEoYLBjBxoeBAgwEGPEgiAc5BDCMIGDIUEuTLgAYhIqhUeQWLhAYMHMxkWCQJCwcHAOwUGEJDCQBIh4JTYEPD";
  loading += "oicplIpBhARTHBxKRZ0RoSIYpB87UxwZxgOcqEZtdtkRMGBItl99+DCkUSXaoDRNzCzpJWOmmBJjzFg4QWMEw4AAIfkEBQAA4A";
  loading += "AsAQABAA4ADgAACJkAwQmc0AABhAEDICwQyHCCAwYhIAiQsmFDBYZIAAQ44GBCgAgUwhgQAO6Bl2cAGDIkIIGDgiiVjqhUOWLI";
  loading += "hjJypsxkSEFLljdrEuwUuOALoA5OCAwFFyHIClJwSi3d8EkEIy7FlupxIwFEpkiBdg7Z0UMpIUW5atwyAuGBCUc7XjBcUa2KoU";
  loading += "N0cJwQxGamEBqIxtzY4cETw4AAOw==";
  loading = "<img align='absmiddle' src='" + loading + "'>";
  if (msg)
    loading += ' <b>' + msg + '</b>';

  $(loading)
    .ajaxStart( function() {
      $(this).appendTo($wrap);
    })
    .ajaxStop( function() {
      $(this).remove();
    });
}
//Loading($preview_upload, msg);

function jsonToString(json)
{
  switch (typeof(json)) {
    case 'string':
      return '"' + json.replace(/([\"\\])/g, '\\$1') + '"';
    case 'array':
      return '[' + json.map(jsonToString).join(',') + ']';
    case 'object':
      if (json instanceof Array) {
        var strArr = [];
        var len = json.length;
        for(var i=0; i<len; i++){
          strArr.push(jsonToString(json[i]));
        }
        return '[' + strArr.join(',') + ']';
      }
      else if(json==null) {
        return 'null';
      }
      else {
        var string = [];
        for (var property in json)
          string.push(jsonToString(property) + ':' + jsonToString(json[property]));
        return '{' + string.join(',') + '}';
      }
    case 'number':
      return json;
    case false:
      return json;
  }
}

function stringToJson(str)
{
  return window['eval']('(' + str + ')');
}