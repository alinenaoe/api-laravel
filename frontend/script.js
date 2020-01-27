let form = document.getElementById('form');

form.onsubmit = (event)=>{
    event.preventDefault(); //para que o submit não deixe atualizar e ir para outra página
    let nameProfessional = document.getElementById('name').value; //value pq é input. se fosse dentro de div seria text content
    let githubProfessional = document.getElementById('github').value;
    let config = {
        headers:{
            "Content-type":"application/json"
        },
        method:"POST",
        body: JSON.stringify({name:nameProfessional, github:githubProfessional}) //os dois pontos é como usa o -> em php. estamos pegando a informação do objeto em JS
    };
    fetch('http://localhost:8000/api/profissionais', config)
    .then(function(resposta){
        return resposta.json();
    }).then(function(json){
        console.log(json);
    }).catch(function(error) {
        console.log(error);
    })
}