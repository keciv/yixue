TouchSlide({
	slideCell: "#slides",
	titCell: ".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
	mainCell: ".bd ul",
	effect: "leftLoop",
	autoPage: true, //自动分页
	autoPlay: true //自动播放
});

//登录注册
$('input[type="text"]').focus(function() {
	var oldValue = $(this).val();
	if(oldValue == this.defaultValue) {
		$(this).val("").addClass('focus-fon');
	}
}).blur(function() {
	var oldValue = $(this).val();
	if(oldValue == "") {
		$(this).val(this.defaultValue).removeClass('focus-fon');;
	}
});
//		登录