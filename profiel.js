    let select1 = document.querySelector("#select1");
    let select2 = document.querySelector("#select2");
    let select3 = document.querySelector("#select3");
    let select4 = document.querySelector("#select4");
    let select5 = document.querySelector("#select5");
    let select6 = document.querySelector("#select6");
    let select7 = document.querySelector("#select7");
    let select8 = document.querySelector("#select8");
    let select9 = document.querySelector("#select9");
    let submit = document.querySelector("#submitBtn");
    
    submit.addEventListener("click", function(){
       select1.removeAttribute("disabled");
       select2.removeAttribute("disabled");
       select3.removeAttribute("disabled");
       select4.removeAttribute("disabled");
       select5.removeAttribute("disabled");
       select6.removeAttribute("disabled");
       select7.removeAttribute("disabled");
       select8.removeAttribute("disabled");
       select9.removeAttribute("disabled");
     
    });

    
// function showPassChange(){
//     var passChange = document.querySelector("#passChange");
//     if(passChange.style.display === "block"){
//         passChange.style.display = "none";
//     }else{
//         passChange.style.display = "block";
//     }
// }


var p = 0;
function changeProfile(){
    var changeProfileBtn = document.querySelector("#changeProfileBtn");
    var submitBtn = document.querySelector("#submitBtn");
    submitBtn.classList.toggle("hide");

    
    if(changeProfileBtn.innerHTML == "Profiel aanpassen"){
        changeProfileBtn.innerHTML="Annuleren";
    }else{
        changeProfileBtn.innerHTML="Profiel aanpassen";
    }

    var inputFields = document.querySelectorAll(".showInput");
    console.log(inputFields);
     for (i = 0; i < inputFields.length; i++) {
        inputFields[i].classList.toggle('show');
    }
}

