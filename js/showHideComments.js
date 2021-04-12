   /* continue from here */
   
   
   
   
   const comm = document.querySelectorAll('button.comments'),
        viewComments = document.querySelector('.viewComments'),
        close = document.querySelector('.close_comments'),
        main = document.querySelector('main'),
        header = document.querySelector('.header'),
        loginDetails = document.querySelector('.loginDetails'),
        topnav = document.querySelector('.topnav'),
        footer = document.querySelector('.footer');
//add event listener for buttons next to table rows
for (let i=0; i<comm.length; i++) {
    comm[i].addEventListener('click', () => {
        const trSet = document.querySelectorAll('table tr'),
                 id = viewBtn[i].getAttribute('id');
                 let respectiveTds = "";
                 for (let s=0; s<trSet.length; s++) {
                     if (trSet[s].getAttribute('id') == id) {
                         respectiveTds = trSet[s].children;
                         break;
                     }
                 }
                 setBlur(main, header, loginDetails, topnav, footer, "0.1");
        viewDetails.style.boxShadow = "0px 0px 200px #333";
        main.style.transitionDuration = ".00001s";
      
        for (let j=0; j<spans.length; j++) {
            spans[j].innerText = respectiveTds[j].innerText;
        }
        viewDetails.setAttribute('class', 'viewDetails');
        // viewDetails.style.top = getMouseY() + "px";
    });
}
close.addEventListener('click', () => {
    viewDetails.setAttribute('class', 'viewDetails hidden');
    setBlur(main, header, loginDetails, topnav, footer, "1");
})
function setBlur(obj1, obj2, obj3, obj4, obj5, opVal) {
    obj1.style.opacity = opVal;
    obj2.style.opacity = opVal;
    obj3.style.opacity = opVal;
    obj4.style.opacity = opVal;
    obj5.style.opacity = opVal;
}
// function getMouseY() {
//     let y = event.clientY/6.4;
//     return y;
// }

