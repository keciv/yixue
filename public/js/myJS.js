function upload(url,fileID,formID,filePath) {

    var fileName = $('#'+fileID).val();
    fileName = fileName.split("\\"); //这里要将 \ 转义一下
    fileName = fileName[fileName.length - 1];
    shangchuan(url, fileID, formID, 'public/upload/'+filePath+"/");
}			