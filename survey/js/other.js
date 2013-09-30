$(function(){
    //initially hide the textbox
    $("#other-q1").hide();
    $("#other-q6").hide();

    $('#q1').change(function() {
      if($(this).find('option:selected').val() == "Other"){
        $("#other-q1").show();
      }else{
        $("#other-q1").hide();
      }
    });
    $('#q6').change(function() {
      if($(this).find('option:selected').val() == "Other"){
        $("#other-q6").show();
      }else{
        $("#other-q6").hide();
      }
    });

    $('#form_id').submit(function() {
        var othersOption = $('#q1').find('option:selected');
        if(othersOption.val() == "Other")
        {
            // replace select value with text field value
            othersOption.val($("#other-q1").val());
        }
    });
    $('#form_id').submit(function() {
        var othersOption = $('#q6').find('option:selected');
        if(othersOption.val() == "Other")
        {
            // replace select value with text field value
            othersOption.val($("#other-q6").val());
        }
    });
});
