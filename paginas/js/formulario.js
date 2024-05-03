
var form1 = document.getElementById("form1")
var form2 = document.getElementById("form2")

function mudar(numero){
    if(numero == 1){
        form1.classList.remove("animacao")
        form2.classList.add("animacao")
    }else{
        form1.classList.add("animacao")
        form2.classList.remove("animacao")
    }
}

document.getElementById("proximo").addEventListener("click", function(){
    mudar(2)
})

document.getElementById("voltar").addEventListener("click", function(){
    mudar(1)
})