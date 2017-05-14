$(document).ready(function(){

$(".hmodaldismiss").on('click',function(){
	var id  = $(this).attr('id');

	var idarr= id.split("link");
	console.log(id);
	console.log(idarr);
	var modalid = '#'+idarr[0];
	console.log(modalid);
	$(modalid).fadeOut();
})
});