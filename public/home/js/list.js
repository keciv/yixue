var gkklist={
	gkklist:function(){
		$.ajax({
			type:"get",
			url:url,
			success:function(data){
				console.log(data);
				if(data!=null&&data!=''){
					var html = '';
		    		data.forEach(item => {
		    			html += `
		    				<div class="fl left">
		    					<a href="Video/Index?id=${item.id}&class_type=3">
									<img src="${item.imageurl}" />
									<div class="course_video_posi">
										<h5 class=""><span>${item.num}</span>人在学习</h5>
										<h4 class="">8月20日 19:20-20:40</h4>
										<p class="clearfix">
											<span class="fl left">07日 19:20</span>
											<span class="fr right">回放</span>
										</p>
									</div>
								<a>
							</div>
		    			`;
		    		});
		    		
		    		$(".loadover").remove();
		    		$("#gkklist").append(html);
		    		var txt = '<div class="loadover"><span>' + '暂无更多视频' + '</span></div>'
					$("#wrapper").append(txt);
				}else{
					$(".loadover").remove();
					var txt = '<div class="loadover"><span>' + '暂无更多视频' + '</span></div>'
					$("#wrapper").append(txt);
				}
	        }
		})
	}
};

//var gkkcon={
////	selfHref=location.href;
//	//传参数据留存
//	gkkcon: function(){
//		$.ajax({
//			type:"get",
//			url:"",
//			data:{id:},
//			success:function(){
//				
//			}
//		})
//	}
//}


var fulist={
	finished:0,
	flag:true,
	fulist:function(){
		$.ajax({
			type:"get",
			url:url,
			success:function(data){
				if(data!=null&&data!=''){
					var html = '';
		    		data.forEach(item => {
		    			html += `
		    				<a href="Video/Index?id=${item.id}" class="fl">
								<div class="">
									<img src="${item.imageurl}" />
								</div>
								<p>${item.class_title}</p>
								<div class="clearfix">
									<div class="fl">
										￥${item.price}
									</div>
									<div class="fr">
										${item.num}人正在学习
									</div>
								</div>
							</a>
		    			`;
		    		});
		    		$(".loadover").remove();
		    		$("#fulist").append(html);
		    		var txt = '<div class="loadover"><span>' + '暂无更多视频' + '</span></div>'
					$("#wrapper").append(txt);
				}else{
					$(".loadover").remove();
					var txt = '<div class="loadover"><span>' + '暂无更多视频' + '</span></div>'
					$("#wrapper").append(txt);
				}
	        }
		})
	}
}

//var fucon={
//	selfHref=location.href;
//	//传参数据留存
//	
//	fucon: function(){
//		$.ajax({
//			type:"get",
//			url:"",
//			data:{id:}
//			success:function(){
//				
//			}
//		})
//	}
//}

var mflist={
	url:"",
	myid:"",
	mflist:function(myid,url){
		$.ajax({
			type:"post",
			url:url,
			data:{id:myid},
			success:function(data){
				console.log(data);
				if(data!=null&&data!=''){
					var html = '';
		    		data.forEach(item => {
		    			html += `
		    				<a href="/Video/Index?id=${item.id}" class="fl">
								<div class="free_main" value="${item.class_type}">
									<h4>2018</h4>
									<h3>护士资格考试</h3>
									<h5>[ 基础考试 ]</h5>
								</div>
								<p>${item.class_title}</p>
								<span>${item.num}人正在学习</span>
							</a>
		    			`;
		    		});
		    		$(".loadover").remove();
		    		$("#mflist").empty().html(html);
		    		var txt = '<div class="loadover"><span>' + '暂无更多视频' + '</span></div>'
					$("#wrapper").append(txt);
				}else{
					$(".loadover").remove();
					var txt = '<div class="loadover"><span>' + '暂无更多视频' + '</span></div>'
					$("#wrapper").append(txt);
				}
	        }
		})
	}
}	
	

