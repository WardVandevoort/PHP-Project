let select1 = document.querySelector("#select1");
    let select2 = document.querySelector("#select2");
    let select3 = document.querySelector("#select3");
    let select4 = document.querySelector("#select4");
    let select5 = document.querySelector("#select5");
    let select6 = document.querySelector("#select6");
    let select7 = document.querySelector("#select7");
    let submit = document.querySelector("#submit");
    submit.addEventListener("click", function(){
       select1.removeAttribute("disabled");
       select2.removeAttribute("disabled");
       select3.removeAttribute("disabled");
       select4.removeAttribute("disabled");
       select5.removeAttribute("disabled");
       select6.removeAttribute("disabled");
       select7.removeAttribute("disabled");
     
    });