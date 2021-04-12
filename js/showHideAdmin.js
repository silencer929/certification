function blowUp() {
    const viewBtn = document.querySelectorAll('button.view'),
      spans = document.querySelectorAll('.group p span'),
      viewDetails = document.querySelector('.viewDetails'),
      close = document.querySelector('.close'),
      main = document.querySelector('main'),
      header = document.querySelector('.header'),
      loginDetails = document.querySelector('.loginDetails')
      topnav = document.querySelector('.topnav'),
      footer = document.querySelector('.footer');
      const tableSet = document.querySelectorAll('table');

    //add event listener for buttons next to table rows
   
    for (let i=0; i<viewBtn.length; i++) {
        viewBtn[i].addEventListener('click', () => {
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
        
    });
    }

    

    function setBlur(obj1, obj2, obj3, obj4, obj5, opVal) {
        setOpacity(obj1);
        setOpacity(obj2);
        setOpacity(obj3);
        setOpacity(obj4);
        setOpacity(obj5);

        function setOpacity(el) {
            el.style.opacity = opVal;
        }
    }



    // function getMouseY() {
    //     let y = event.clientY/6.4;
    //     return y;
    // }

