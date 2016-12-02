/**
 * Created by 123 on 2016/12/2.
 */
$("#subm").click(function () {
  $.ajax({
      type:"POST",
      url:".php",
      contentType:"application/json; charset=utf-8",
      data:JSON.stringify(getData()),
      dataType:"json",
      success:function(message){
          if(message>0){
              alert("上传成功");
          }
    },
    error:function(message){
          alert("上传失败");
    }
  });
});
function getData(){
    var json = {
       "foodName":$(""),
       "foodPrice":$(""),
        "foodDesc":$("")
    };
    return json;
}