/* -------- Menu ------- */
$('nav ul li').click(function(){
$(this).addClass("active").siblings().removeClass("active");
});

/* ------ Botoes gerenciamento ----- */
$('.btn').click(function(){
$(this).addClass("active").siblings().removeClass("active");
});

$(".btn").submit(function(e){
	e.preventDefault();
});

//----------------------------------------------------

/*visibilidade das sections*/

function principal(){
	v_adm_aux();
	document.getElementById("principal").style.visibility = "visible";
	document.getElementById("adm-slides").style.visibility = "hidden";
	document.getElementById("adm-obras").style.visibility = "hidden";
	document.getElementById("adm-clientes").style.visibility = "hidden";
	document.getElementById("config").style.visibility = "hidden";
	document.getElementById("content-adm").style.visibility = "hidden";
}

function adm(opc){

	document.getElementById("principal").style.visibility = "hidden";
	document.getElementById("config").style.visibility = "hidden";
	$('.btn').removeClass("active");
	
	switch(opc){
		//Section slides
		case 0:
			document.getElementById("adm-slides").style.visibility = "visible";
			document.getElementById("adm-tabelas-existentes-slides").style.visibility = "visible";
			
			//INVISIBILIDADE DO CONTEUDO DAS DUAS OUTRAS SEÇÕES
			document.getElementById("aux-adm-up-obras").style.visibility = "hidden";
			document.getElementById("aux-adm-novas-obras").style.visibility = "hidden";
			document.getElementById("aux-adm-up-clientes").style.visibility = "hidden";
			document.getElementById("aux-adm-novos-clientes").style.visibility = "hidden";
			document.getElementById("adm-obras").style.visibility = "hidden";
			document.getElementById("adm-clientes").style.visibility = "hidden";
			document.getElementById("adm-tabelas-existentes-obras").style.visibility = "hidden";
			document.getElementById("adm-tabelas-existentes-clientes").style.visibility = "hidden";
			break;
		//Section obras
		case 1:
			document.getElementById("adm-obras").style.visibility = "visible";
			document.getElementById("adm-tabelas-existentes-obras").style.visibility = "visible";
			
			//INVISIBILIDADE DO CONTEUDO DAS DUAS OUTRAS SEÇÕES
			document.getElementById("aux-adm-up-slides").style.visibility = "hidden";
			document.getElementById("aux-adm-novos-slides").style.visibility = "hidden";
			document.getElementById("aux-adm-up-clientes").style.visibility = "hidden";
			document.getElementById("aux-adm-novos-clientes").style.visibility = "hidden";
			document.getElementById("adm-slides").style.visibility = "hidden";
			document.getElementById("adm-clientes").style.visibility = "hidden";
			document.getElementById("adm-tabelas-existentes-slides").style.visibility = "hidden";
			document.getElementById("adm-tabelas-existentes-clientes").style.visibility = "hidden";
			break;
		//Section clientes
		case 2:
			document.getElementById("adm-clientes").style.visibility = "visible";
			document.getElementById("adm-tabelas-existentes-clientes").style.visibility = "visible";
			
			//INVISIBILIDADE DO CONTEUDO DAS DUAS OUTRAS SEÇÕES
			document.getElementById("aux-adm-up-slides").style.visibility = "hidden";
			document.getElementById("aux-adm-novos-slides").style.visibility = "hidden";
			document.getElementById("aux-adm-up-obras").style.visibility = "hidden";
			document.getElementById("aux-adm-novas-obras").style.visibility = "hidden";
			document.getElementById("adm-obras").style.visibility = "hidden";
			document.getElementById("adm-slides").style.visibility = "hidden";
			document.getElementById("adm-tabelas-existentes-obras").style.visibility = "hidden";
			document.getElementById("adm-tabelas-existentes-slides").style.visibility = "hidden";
			break;
		default:
			console.log("Opção OPC ADM inválida!");
			break;
	}
}

function config(){
	v_adm_aux();
	document.getElementById("config").style.visibility = "visible";
	document.getElementById("principal").style.visibility = "hidden";
	document.getElementById("adm-slides").style.visibility = "hidden";
	document.getElementById("adm-obras").style.visibility = "hidden";
	document.getElementById("adm-clientes").style.visibility = "hidden";
	document.getElementById("content-adm").style.visibility = "hidden";
}

// Utilizado para deixar invisivel todos os componentes da section de gerenciamento
function v_adm_aux(){
	
	$('.btn').removeClass("active");
	document.getElementById("adm-tabelas-existentes-slides").style.visibility = "hidden";
	document.getElementById("adm-tabelas-existentes-obras").style.visibility = "hidden";
	document.getElementById("adm-tabelas-existentes-clientes").style.visibility = "hidden";

	document.getElementById("aux-adm-up-slides").style.visibility = "hidden";
	document.getElementById("aux-adm-novos-slides").style.visibility = "hidden";
	document.getElementById("aux-adm-up-obras").style.visibility = "hidden";
	document.getElementById("aux-adm-novas-obras").style.visibility = "hidden";
	document.getElementById("aux-adm-up-clientes").style.visibility = "hidden";
	document.getElementById("aux-adm-novos-clientes").style.visibility = "hidden";
}

// MANIPULAÇÃO DOS BOTÕES DENTRO DE CADA SEÇÃO DE GERENCIAMENTO
// TYPE => SLIDES, OBRAS, CLIENTES // OPC => CONSULTAR, CRIAR, ATUALIZAR, EXCLUIR
function adm_aux(type, opc){
	
	switch(type){ //SELECIONA A SEÇÃO QUE SERÁ GERENCIADA
		case 0: // SLIDES
	
			switch(opc){ //SELECIONA O BOTAO QUE FOI ACIONADO
				case 0: //Consultar Slides
					document.getElementById("adm-tabelas-existentes-slides").style.visibility = "visible";
					document.getElementById("aux-adm-novos-slides").style.visibility = "hidden";
					document.getElementById("aux-adm-up-slides").style.visibility = "hidden";
					break;
				case 1: //Novos Slides
					document.getElementById("adm-tabelas-existentes-slides").style.visibility = "hidden";
					document.getElementById("aux-adm-up-slides").style.visibility = "hidden";
					document.getElementById("aux-adm-novos-slides").style.visibility = "visible";
					break;
				case 2: //Atualizar Slides
					document.getElementById("adm-tabelas-existentes-slides").style.visibility = "hidden";
					document.getElementById("aux-adm-novos-slides").style.visibility = "hidden";
					document.getElementById("aux-adm-up-slides").style.visibility = "visible";
					break;
				case 3: //Deletar Slides
					let text = "Você confirma a eliminação da tabela selecionada?"
					if (confirm(text) == true){
						alert("você excluiu a tabela");
					} else {
						alert("você cancelou a operação");
					}
					break;
				default:
					console.log("Opção OPC ADM-AUX inválida!");
					break;
			}
	
			break;
		case 1: //OBRAS

			switch(opc){ //SELECIONA O BOTAO QUE FOI ACIONADO
				case 0: //Consultar Obras
					document.getElementById("adm-tabelas-existentes-obras").style.visibility = "visible";
					document.getElementById("aux-adm-novas-obras").style.visibility = "hidden";
					document.getElementById("aux-adm-up-obras").style.visibility = "hidden";
					break;
				case 1: //Novas Obras
					document.getElementById("adm-tabelas-existentes-obras").style.visibility = "hidden";
					document.getElementById("aux-adm-up-obras").style.visibility = "hidden";
					document.getElementById("aux-adm-novas-obras").style.visibility = "visible";
					break;
				case 2: //Atualizar Obras
					document.getElementById("adm-tabelas-existentes-obras").style.visibility = "hidden";
					document.getElementById("aux-adm-novas-obras").style.visibility = "hidden";
					document.getElementById("aux-adm-up-obras").style.visibility = "visible";
					break;
				case 3: //Deletar Obras
					let text = "Você confirma a eliminação da tabela selecionada?"
					if (confirm(text) == true){
						alert("você excluiu a tabela");
					} else {
						alert("você cancelou a operação");
					}
					break;
				default:
					console.log("Opção OPC ADM-AUX inválida!");
					break;
			}
		
			break;
		case 2: //CLIENTES

			switch(opc){ //SELECIONA O BOTAO QUE FOI ACIONADO
				case 0: //Consultar Clientes
					document.getElementById("adm-tabelas-existentes-clientes").style.visibility = "visible";
					document.getElementById("aux-adm-novos-clientes").style.visibility = "hidden";
					document.getElementById("aux-adm-up-clientes").style.visibility = "hidden";
					break;
				case 1: //Novas Clientes
					document.getElementById("adm-tabelas-existentes-clientes").style.visibility = "hidden";
					document.getElementById("aux-adm-up-clientes").style.visibility = "hidden";
					document.getElementById("aux-adm-novos-clientes").style.visibility = "visible";
					break;
				case 2: //Atualizar Clientes
					document.getElementById("adm-tabelas-existentes-clientes").style.visibility = "hidden";
					document.getElementById("aux-adm-novos-clientes").style.visibility = "hidden";
					document.getElementById("aux-adm-up-clientes").style.visibility = "visible";
					break;
				case 3: //Deletar Clientes
					let text = "Você confirma a eliminação da tabela selecionada?"
					if (confirm(text) == true){
						alert("você excluiu a tabela");
					} else {
						alert("você cancelou a operação");
					}
					break;
				default:
					console.log("Opção OPC inválida!");
					break;
			}
			
			break;
		
		default:
			console.log("Opção TYPE inválida!");
			break;
	}
}

/*
function teste(){
	var elemento_Pai = document.getElementById("adm-tabelas-existentes-slides");
	var titulo = document.createElement('h1');
	var texto  = document.createTextNode("Um título qualquer");
	titulo.appendChild(texto);
	elemento_Pai.appendChild(titulo);
}*/