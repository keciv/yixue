function shangchuan(url,fileID, form, filePath) {
    var options = {
        url: url,
        data: { "filePath": filePath,fileID:fileID ,'file':$("#f").val()},
        type:'post',
        dataType:'json',
        success: function (data) {
        	console.log(data);
            $('#hidden_'+fileID).val(data.filename);
            $('#img_'+fileID).attr('src',"http://localhost/admin/" + $('#hidden_'+fileID).val());
            if (data.status=="ok") {
            	
            	alert("更新成功，正在修改。。。。。。");
               window.location.reload();
           
            }
            else if (data.status=="null") {
                alert("文件格式有误");
            }
            else if (data.status=="error"){
            	 alert("上传失败，请重新上传");
            }
        }
    };
  $('#'+form).ajaxSubmit(options);

}	
function video(url, form, filePath) {
	
    var options = {
        url: url,
        data: { "filePath": filePath },
        dataType:'json',
        
        success: function (msg) {
        	
        	$('#hidden_video').val(msg.b);
        	
        	
            if (msg.a=1) {
                alert("上传成功");
                
            }
            else if (msg.a=0) {
                alert("文件格式有误");
            }else if (msg.a=-1){
            	 alert("上传失败，请重新上传");
            }
        }
    };
    
    $(form).ajaxSubmit(options);
    
}