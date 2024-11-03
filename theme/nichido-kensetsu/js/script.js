//modal
$(function(){
	　　　$('.menu-trigger').on("click", function(){
	　　　　if ($('.menu-trigger').hasClass('active')) {
	　　　　　$('.menu-trigger').removeClass('active');
	　　　　} else {
	　　　　　$('.menu-trigger').addClass('active');
	　　　　}
	　　　});
	　　});		


$(function(){
　　　$('.menu-trigger').on("click", function(){
　　　　if ($('.gnav').hasClass('active')) {
　　　　　$('.gnav').removeClass('active');
　　　　} else {
　　　　　$('.gnav').addClass('active');
　　　　}
　　　});
　　});
		
$(function(){
　　　$('.menu-trigger').on("click", function(){
　　　　if ($('body').hasClass('open')) {
　　　　　$('body').removeClass('open');
　　　　} else {
　　　　　$('body').addClass('open');
　　　　}
　　　});
　　});

//ページ内リンククリック時にメニューを閉じる 
$(function(){
	$('.gnav a[href*="#"]').on('click', function() {  
		$('body').removeClass('open');
		$('.gnav').removeClass('active');
		$('.menu-trigger').removeClass('active');
	  });
	});



//slider

$('.slider').slick({
    fade: true,    // fedeオン
    speed: 1500,   // 画像切り替えにかかる時間（ミリ秒）
    autoplaySpeed: 3000,   // 自動スライド切り替え速度
    arrows: false,         // 矢印表示・非表示
    autoplay: true,        // 自動再生
    slidesToShow: 1,       // スライド表示数
    slidesToScroll: 1,     // スライドする数
    infinite: true ,      // 無限リピート オン・オフ
    pauseOnFocus: false,//フォーカスで一時停止
    pauseOnHover: false,//マウスホバーで一時停止
    pauseOnDotsHover: false//ドットナビをマウスホバーで一時停止
});


$('.hambtn').click(function(){
	$(this).siblings('.hamd').stop().slideToggle(300);
	$('.hambtn').not($(this)).siblings('.hamd').slideUp(300);
	$(this).toggleClass('open');
	$('.hambtn').not($(this)).removeClass('open');
  });

//qa
  $(".qa dd").hide();
  $(".qa dl").on("click", function(e){
	  $('dd',this).slideToggle('fast');
	  if($(this).hasClass('open')){
		  $(this).removeClass('open');
	  }else{
		  $(this).addClass('open');
	  }
  });