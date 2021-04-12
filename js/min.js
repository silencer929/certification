
var select= document.querySelectorAll('.select');
const test = document.querySelector(".test");
const submitBtn = document.querySelector("#submit-btn");
const sideBar = document.querySelector(".side-bar");
const tab= document.querySelector(".tab");
const progress_bar= document.querySelector("#progress-bar")
const totalScore= document.querySelector("#total-score");
const modal= document.querySelector(".modal");
// const collective_action_btn=document.querySelector("#collective-action-btn");
var tabs=[]
var total=[];
var store=[];
class storage{
    static store_tabs(){
        localStorage.setItem("test", JSON.stringify(tabs));
    }
    static get_tabs(){
        let tabs=JSON.parse(localStorage.getItem("test"));
        return tabs;
    }
    static store_total(totals){
        localStorage.setItem("total", JSON.stringify(totals));
    }
    static get_total(){
        let total=JSON.parse(localStorage.getItem('total'))
        return total;
    }
}
class Products {
    async getQuestions() {
        try {
            tabs= new Queue(2);
            let data = await fetch("js/test.json");
            let result = await data.json();
            let quiz= result.test
            quiz.forEach(part=>{
               let page={};
               let key=Object.keys(part);
               let values=Object.values(part);
                page[key]=[];
                part[key].forEach(questions=>{
                    var question= new Question();
                    question.set_question_id(questions.question_id);
                    question.set_question(questions.question);
                    question.set_marks(questions.marks);
                    question.set_status(false)
                    page[key].push(question);
                })
                tabs.enqueue(page);
                })
            progress_bar.max=tabs.get_total_items();
            return tabs;
        } catch (error) {
            console.log(error)
        }
    }
    
}
 
class UI {
    getOptions(marks){
        var option = "";
        marks.forEach(mark=>{
            option+=`<option value="${mark}">${mark} marks</option>`
        })
        return option
    }
    displayQuestions(page) {
        var result="";
         var key=Object.keys(page);
        tab.textContent= key[0];
        store=page[key];
        page[key].forEach(question => {
            result +=`<div class="question-box">
                   <input type="text" readonly value="${question.question_id}" class="question_id">
                   <div class="question">${question.question}</div>
                   <div class="marks">
                    <select id="${question.question_id}" class="selected" data-id="${question.question_id}">`
                   + this.getOptions(question.marks) +
                    `<option value="pending" selected>pending</option>
                    </select>
                    </div>
                    <div class="overlay" data-id="${question.question_id}">
                    <button class="remarkBtn">Remark</button>
                    </div>
                   </div>`;
        });
        test.innerHTML = result;
    }
      getSelectedValues() {
        var overlay = [...document.querySelectorAll(".overlay")];
        var select = [...document.querySelectorAll(".selected")];
        select.forEach((option,index)=> {
            option.addEventListener("change",(event)=>{
                if(event.target.value!=="pending"){
                var curr_totalScore=[];
                var id = event.target.dataset.id;
                var score= event.target.value;
                let question= store.find(item=>item.question_id==id);
                question.status=true;
                question.mark_question(parseFloat(score),total);
                totalScore.value=total.computeTotal();
                progress_bar.value= total.get_total_questions();
                overlay[index].style.display="flex";
                this.submit();
                }
            })
        })
    }
    populate_items_in_total(){
        let selects=[...document.querySelectorAll(".selected")];
        let overlay=[...document.querySelectorAll(".overlay")];
        store.forEach(item=> {
            // check if item exists in the totalscore
           let inTotalScore=(item.question_id in total.totalScore) ? total.totalScore[item.question_id] : console.log();
            // if the item exists then style the it and change the select value
            if(typeof inTotalScore!=="undefined"){
               let select_btn=selects.find(f=>f.getAttribute("data-id")===inTotalScore.question.question_id);
               let ol=overlay.find(f=>f.getAttribute("data-id")===inTotalScore.question.question_id);
               if(typeof select_btn!=="undefined"){
                   select_btn.value=inTotalScore.score;
                   ol.style.display='flex';
                   let question=store.find(q=>q.question_id===inTotalScore.question.question_id);
                   question.status="true";
               }
           }
        })
    }
    validate(){
        let unanswered_questions=[];
       store.forEach(item=>{
           if(item.status===false){
               unanswered_questions.push(item.question_id);
           }
       })
        if(unanswered_questions.length!==0 && typeof unanswered_questions!=="undefined"){
            this.populate_side_bar(unanswered_questions);
            this.show_side_bar()
          alert("please fill all questions shown at the sidebar, click ok to see the question number")
            return false;
        }else{
            // the unanswered question array and return true;
            unanswered_questions='';
            // hide the the side bar
            sideBar.classList.add("hide-side-bar");
            return true;
        }

    }
    populate_side_bar(ids){
        var result='';
        ids.forEach(item=>{
            result+=`<button class="question-leftout">${item}</button>`
        })
        sideBar.innerHTML=result;
    }
    remark_question(){
        var remarkBtn= [...document.querySelectorAll(".remarkBtn")];
        var select=[...document.querySelectorAll(".selected")];
        var overlay= [...document.querySelectorAll(".overlay")]
        remarkBtn.forEach((button,index)=>{
            button.addEventListener("click",()=>{
                overlay[index].style.display="none";
                select[index].value="pending";
                let data_id=select[index].getAttribute("data-id");
                let question=store.find(item=>item.question_id===data_id);
                question.status=false;

            })
        })
    }
    go_to_next_tab(){
        $(".next").on("click",()=>{
            try {
                //test the validation first to ensure that all question are answered
                if(tabs.front!==tabs.length && this.validate()){
                    $("#NCF-003").animate({scrollTop:$("#NCF-003").offset().top},2000)
                    this.displayQuestions(tabs.peek_forward());
                    this.getSelectedValues();
                    this.populate_items_in_total();
                    this.remark_question();
                }
                else{
                    //bring up the submit modal that roll up to fit the test section and disabled the next and previous buttons
                }
            }catch (error){
                console.log(error)
            }
})
}
    go_to_previous_tab(){
        $(".prev").on("click",()=>{
            try{
                if(tabs.front!==1){
                    $("#NCF-003").animate({scrollTop:$("#NCF-003").offset().top},2000);
                    this.displayQuestions(tabs.peek_backward());
                    this.getSelectedValues();
                    this.populate_items_in_total();
                    this.remark_question();
                }
                else{
                    alert("Please click the next button to view More questions")
                }
            } catch(error){
                console.log(error)
            }
        })
    }
    submit(){
        if(total.get_total_questions()===tabs.get_total_items()){
            alert("Please click the submit button to complete inspection");
            submitBtn.addEventListener("click",()=>{
                send_data();
                modal.style.display="flex";
            })
        }
    }
    show_side_bar(){
        let questionLeftOut=[...document.querySelectorAll(".question-leftout")];
        sideBar.classList.remove("hide-side-bar");
        questionLeftOut.forEach((question,index)=>{
            if(question.style.animation){
                question.style.animation = "";
            }
            else{
                question.style.animation = `fade-question-leftout 2s ease forwards ${index / questionLeftOut.length}s`;
            }
        })
    }

}

// this part is where the classes are being initialized
// please take care not bring down this area or everything will go kaboom
document.addEventListener("DOMContentLoaded", ()=>{
    total = new Total();
    var products = new Products();
    const ui= new UI();
    products.getQuestions().then(()=>{
        storage.store_tabs();
        storage.get_tabs();
        (tabs.front===0) ? ui.displayQuestions(tabs.peek_forward()): console.log("hello")
        ui.getSelectedValues();
        ui.remark_question();
        ui.go_to_next_tab();
        ui.go_to_previous_tab();
    });

});
