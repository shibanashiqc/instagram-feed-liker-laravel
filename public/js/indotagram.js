function laod() {
	var s = '<i class="fa fa-spinner fa-spin"></i>';
	$(document).ready(function(){
		$.ajax({
			url: baseurl+'page/countb',
			type: "GET",
			dataType:'JSON',
			success: function(data){
				$("#alluser").html(data.alluser);
				$("#useractive").html(data.useractive);
				$("#usernotactive").html(data.usernotactive);
				$("#blocklike").html(data.blocklike);
				$("#blockpost").html(data.blockpost);
				$("#blockkomen").html(data.blockkomen);
				$("#allmedia").html(data.allmedia);
				$("#mediasuccess").html(data.mediasuccess);
				$("#mediafailed").html(data.mediafailed);
				$("#allpost").html(data.allpost);
				$("#postsuccess").html(data.postsuccess);
				$("#postfailed").html(data.postfailed);
				$("#allkomen").html(data.allkomen);
				$("#komensuccess").html(data.komensuccess);
				$("#komenfailed").html(data.komenfailed);
				$("#premium").html(data.premium);
				$("#cpu").html(data.cpu);
			},
			beforeSend:function() {
				$("#alluser").html(s);
				$("#useractive").html(s);
				$("#usernotactive").html(s);
				$("#blocklike").html(s);
				$("#blockpost").html(s);
				$("#blockkomen").html(s);
				$("#allmedia").html(s);
				$("#mediasuccess").html(s);
				$("#mediafailed").html(s);
				$("#allpost").html(s);
				$("#postsuccess").html(s);
				$("#postfailed").html(s);
				$("#allkomen").html(s);
				$("#komensuccess").html(s);
				$("#komenfailed").html(s);
				$("#premium").html(s);
				$("#cpu").html(s);
			}          
		});
	});
}
laod();
$(document).ready(function(){
	setInterval(function(){
		laod();
	}, 20000);
});