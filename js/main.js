 var DOMAIN= "http://localhost:8080/cert/"
 var response
class Corrective_Action {
   async submit(comment){
       let result=`<tr>
            <td data-label="No.">1</td>
            <td data-label="observation">${comment.rec}</td>
            <td data-label="recommendation">${comment.obs}</td>
            <td data-label="edit"><button class="edit btn"><i class="fas fa-edit"></i></button></td>
            <td data-label="delete"><button class="delete btn"><i class="fas fa-trash-alt"></i></button></td>
            </tr>`;
        $("#myTable").append(result);
}
    edit_action() {
        var comment_text_box = document.querySelector('[name="obs"]');
        var rows=document.querySelectorAll("#myTable tbody tr");
        var action_text_box = document.querySelector('[name="rec"]');
        var edit_buttons = [...document.querySelectorAll("#myTable tbody .edit")];
        edit_buttons.forEach((btn, index) => {
            btn.addEventListener("click", () => {
               let tds= [...rows[index].children];
                comment_text_box.value = tds[1].textContent;
                action_text_box.value = tds[2].textContent;
            })
        })
    }
    delete_action() {
        var rows=document.querySelectorAll("#myTable tbody tr");
        var delete_buttons = [...document.querySelectorAll("#myTable tbody .delete")];
        delete_buttons.forEach((btn, index) => {
            btn.addEventListener("click",()=>{
                document.querySelector("#myTable tbody").removeChild(rows[index]);
            })

        });

    }


    }
