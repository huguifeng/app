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

function app_del(obj){
    // 获取模板当中的url地址
    url = $(obj).attr('del_url');
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            success: function(data){
                if(data.code == 1) {
                    // 执行跳转
                    self.location=data.data.jump_url;
                }else if(data.code == 0) {
                    layer.msg(data.msg, {icon:2, time:2000});
                }
            },
            error:function(data) {
                console.log(data.msg);
            },
        });
    });
}
function app_sta(obj){
    // 获取模板当中的url地址
    url = $(obj).attr('url');
    layer.confirm('确认要修改吗？',function(index){
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            success: function(data){
                if(data.code == 1) {
                    // 执行跳转
                    self.location=data.data.jump_url;
                }else if(data.code == 0) {
                    layer.msg(data.msg, {icon:2, time:2000});
                }
            },
            error:function(data) {
                console.log(data.msg);
            },
        });
    });
}
