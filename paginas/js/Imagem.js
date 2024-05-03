
function carregarImagem(imagem){
    fetch(imagem).then((response)=> {
        var imagem = new Blob([response], {type: "application/png"})
        var file = new File([imagem], "fotoPerfil.png")
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        document.getElementById("imagem").files = dataTransfer.files
        
    })

    document.getElementById("foto").src = imagem
}

function mudarImagem(){
    var file = new FileReader();

    file.onload = function(e){
        document.getElementById("foto").src = e.target.result
    }

    file.readAsDataURL(this.files[0])

}

document.getElementById("imagem").addEventListener("change", mudarImagem)

