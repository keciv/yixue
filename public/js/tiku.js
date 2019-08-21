$('.menu .to').click(function() {
	$('.menu').hide()
	$('html').css('overflow', 'auto');
	$('html').css('height', 'auto');
	$('body').css('overflow', 'auto');
	$('body').css('height', 'auto')
})
$('#over').click(function() {
	$('.menu').show()
	$('html').css('overflow', 'hidden');
	$('html').css('height', 'auto');
	$('body').css('overflow', 'hidden');
	$('body').css('height', 'auto')
	var awidth = $('.menu_main a').width();
	$('.menu_main a').height(awidth)
	var aline = awidth + 'px'
	$('.menu_main a').css('line-height', aline);
})

$('.lpk_f .left').click(function() {
	$('.lpk_f .left span').addClass('lpk_fcolor');
})
//收藏

var newheight = $('.timu_info').height();
var nheight = 9 + newheight + 'rem';
$('#lpk').css('height', 'nheight');
var p2height = $('.abcd ul li .p2');
var p1height = $('.abcd ul li .p1');
var p3height = $('.abcd ul li .p3');
for(var i = 0; i < p2height.length; i++) {
	var add = p2height[i].offsetHeight;
	if(add == 40) {
		p1height[i].style.lineHeight = add + 'px'
		p3height[i].style.lineHeight = add + 'px'
	} else if(add > 40) {
		p1height[i].style.lineHeight = add + 'px'
		p3height[i].style.lineHeight = add + 'px'
	} else if(add < 40) {
		p1height[i].style.lineHeight = add + 'px'
		p3height[i].style.lineHeight = add + 'px'
	}

}
//		正确的
$('.abcd ul li').click(function() {
	$(this).addClass('abcdlitrue')
	$('.abcd ul li .p1').eq($(this).index()).addClass('p1colortrue')
	$('.abcd ul li .p2').eq($(this).index()).addClass('p2widthtrue')
	$('.abcd ul li .p3').eq($(this).index()).show().addClass('p3colortrue')
})
//		错误的
//		$('.abcd ul li').click(function(){
//			$(this).addClass('abcdlifalse')
//			$('.abcd ul li .p1').addClass('p1colorfalse')
//			$('.abcd ul li .p2').addClass('p2widthfalse')
//			$('.abcd ul li .p3').eq($(this).index()).show().addClass('p3colorfalse')
//		})