function change_brand(){
    $("#c1").change(function(){
          $("#get_brand")[0].options.length=0;
        $.getJSON('http://localhost/rangjiajie/index.php/Admin/Brand/getbrand?cat_id='+ $("#c1").val(), function(data){
          $.each(data, function(i,data){  
          $("#get_brand").append("<option value="+data.id+">"+data.brand_name+"</option>");
      });
                      
        });
         return false;  
    });
    
    $("#c2").change(function(){
    	 $("#get_brand")[0].options.length=0;
        $.getJSON('http://localhost/rangjiajie/index.php/Admin/Brand/getbrand?cat_id='+ $("#c2").val(), function(data){
          $.each(data, function(i,data){  
          $("#get_brand").append("<option value="+data.id+">"+data.brand_name+"</option>");
      });
                         
        });
         return false; 
    });
    $("#c3").change(function(){
    	 $("#get_brand")[0].options.length=0;
        $.getJSON('http://localhost/rangjiajie/index.php/Admin/Brand/getbrand?cat_id='+ $("#c3").val(), function(data){
          $.each(data, function(i,data){  
          $("#get_brand").append("<option value="+data.id+">"+data.brand_name+"</option>");
      });
                      
        });
         return false;  
    });
    $("#c4").change(function(){
    	 $("#get_brand")[0].options.length=0;
        $.getJSON('http://localhost/rangjiajie/index.php/Admin/Brand/getbrand?cat_id='+ $("#c4").val(), function(data){
          $.each(data, function(i,data){  
          $("#get_brand").append("<option value="+data.id+">"+data.brand_name+"</option>");
      });
                          
        });
        return false; 
    });
  }