/**
 * Created by 123 on 2016/12/2.
 */
$(function () {
    $("[data-toggle='popover']").popover();
});
function showCode(){
    $("#abc").attr("style","display:block;");
}
function hideCode(){
    $("#abc").attr("style","display:none;");
}