$(function() {
    $("#file_upload").uploadify({
        swf           : swf,
        uploader      : upload_img_url,
        buttonText    :  '图片上传',
        fileObjName   : 'img',
        fileTypeExts  : '*.gif; *.jpg; *.png',
        onUploadSuccess : function(file, data, response) {
           if(response){
               var obj = JSON.parse(data);
               console.log(obj.url);
               $("#upload_org_code_img").attr('src', obj.url);
               $("#upload_org_code_img").show();
               $("#file_upload_image").val(obj.url);
           }

        }
    });
 });
