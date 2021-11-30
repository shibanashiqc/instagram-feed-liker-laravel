        $(document).ready(function(){
    $("form#verifycodeform").submit(function () {
    //if($('#choice').val().length>0){
      var pdata = $(this).serialize();
      var purl = $(this).attr('action');
      $.ajax({
        url:purl,
        data:pdata,
        timeout:false,
        type:'POST',
        dataType:'JSON',
        success:function(hasil){
          $("input").removeAttr("disabled", "disabled");
          $("button").removeAttr("disabled", "disabled");
          $("#btn-verify-code").html('<i class="fa fa-sign-in"></i> Submit');
          if(hasil.result){
            window.location.replace(hasil.redirect);
            $("#responverif").html(hasil.content);
          }else
            $("#responverif").html(hasil.content);
          },error: function (a, b, c) {
            $("input").removeAttr("disabled", "disabled");
            $("button").removeAttr("disabled", "disabled");
            $("#btn-verify-code").html('<i class="fa fa-sign-in"></i> Submit');
            $("#responverif").html(c);
          },beforeSend:function() {
            $("input").attr("disabled", "disabled");
            $("#btn-verify-code").html('<i class="fa fa-spinner fa-spin" style="font-size:20px"></i> Proses...');
            $("#responverif").html('<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-spinner fa-spin" style="font-size:20px"></i> <b>Status:</b> Sedang mengecek data, tunggu sebentar ...</div>');
            $("button").attr("disabled", "disabled");
          }
      });
    //}
    return false
  });});