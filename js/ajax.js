function send_data(){
    var total= $("#total-score").val();
    var application_id= $("[name='application_id']").val();
    var kefri_num=$("[name='kefri_num']").val();
    var nurseryType= $("[name='nurseryType']").val();
    $.ajax({
      method: "POST",
        data: {"total":total,"nurseryType":nurseryType,"kefri_num":kefri_num,"application_id":application_id},
        url: "process.php",
        error: function(error){
            console.log(error);
    },
        success: function(response){
            console.log(response)
          populate_modal(jQuery.parseJSON(response));
    }
      })
    function populate_modal(report){
        if(report.rate==5){
            document.querySelector(".rating img").src="img/5_star.png";
        }
        else if(report.rate==4){
            document.querySelector(".rating img").src="img/4_star.png";
        }
        else if(report.rate==3){
            document.querySelector(".rating img").src="img/3_star.png";
        }
        else if(report.rate==2){
            document.querySelector(".rating img").src="img/2_star.png";
        }
        else{
            document.querySelector(".rating img").src="img/1_star.png";
        }
       document.querySelector(".score span").textContent=`${report.percentage}`;
        document.querySelector(".message").textContent=`${report.message}`;
    }
}
 function insert_action(){
     var response;
    $(".obs-rec-form").on("submit",function(e){
        e.preventDefault()
        var form = $(this),
            data = {},
            method = form.attr("method");
        form.find('[name]').each(function(item){
            var input = $(this),
                name = input.attr("name"),
                value = input.val();
            data[name] = value;
        })
        $.ajax({
            data: data,
            method: method,
            url:"process.php",
            error: function (error) {
                console.log(error)
            },
            success: function (data) {
                 $("[name='obs']").val('');
                $("[name='rec']").val('');
                var corrective_action = new Corrective_Action();
                corrective_action.submit(jQuery.parseJSON(data)).then(()=>{
                    corrective_action.edit_action();
                    corrective_action.delete_action();
                });
            }
        })
        
    })
}
function delete_comment(commnet_id){
    // delete some commnet with the following details
    //commnet id  and the 
    // make and ajax call
    $.ajax({
        method: "POST",
        url: "process.php",
        data: {"commnet_id":comment_id},
        success: function(response){
            console.log(response);
        }
    })
}
insert_action();