function singwaapp_save(form){
    var data = $(form).serialize();
    $.ajax({
        'type' : 'POST',
        'url'  : $(form).attr('url'),
        'dataType' : 'json',
        'data' : data,
        success :function(result){
            if(result.code == 0){
                layer.msg(result.msg, {icon:5, time:2000});
            }else if (result.code == 1){
                location.href = result.data.url;
            }
    }
    });

}
function selecttime(flag){
    if(flag==1){
        var endTime = $("#countTimeend").val();
        if(endTime != ""){
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:endTime})}else{
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})}
    }else{
        var startTime = $("#countTimestart").val();
        if(startTime != ""){
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:startTime})}else{
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})}
    }
 }