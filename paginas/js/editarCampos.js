
function editar(event){
    var id = event.target.getAttribute("id")
    var campo = document.getElementsByName(id)[0]
    campo.removeAttribute("disabled")
}

document.querySelector(".editar#nome").addEventListener("click", editar)

document.querySelector(".editar#email").addEventListener("click", editar)

document.querySelector(".editar#dataNascimento").addEventListener("click", editar)

document.querySelector(".editar#github").addEventListener("click", editar)

document.querySelector(".editar#linkedin").addEventListener("click", editar)

document.querySelector(".editar#descricao").addEventListener("click", editar)

function excluir(event){
    var id = event.target.getAttribute("id")
    var campo = document.getElementsByName(id)[0]
    campo.value=""
}

document.querySelector(".excluir#nome").addEventListener("click", excluir)

document.querySelector(".excluir#email").addEventListener("click", excluir)

document.querySelector(".excluir#dataNascimento").addEventListener("click", excluir)

document.querySelector(".excluir#github").addEventListener("click", excluir)

document.querySelector(".excluir#linkedin").addEventListener("click", excluir)

document.querySelector(".excluir#descricao").addEventListener("click", excluir)


document.querySelector(".form").addEventListener("submit", function(){
    var form = document.querySelectorAll(".input")

    for (let i = 0; i < form.length; i++) {
        form[i].removeAttribute("disabled")
    }

    document.querySelectorAll("textarea").removeAttribute("disabled")
})

