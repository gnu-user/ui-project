$(function(){
    //initially hide the textbox
    $("#other-q1").hide();
    $('#q1').change(function() {
      if($(this).find('option:selected').val() == "Other"){
        $("#other-q1").show();
      }else{
        $("#other-q1").hide();
      }
    });
    $("#other-q1").keyup(function(ev){
        var othersOption = $('#q1').find('option:selected');
        if(othersOption.val() == "Other")
        {
            ev.preventDefault();
            //change the selected drop down text
            // $(othersOption).html($("#other-q1").val());
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
});
