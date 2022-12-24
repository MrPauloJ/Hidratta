/* -------- Formulário --------- */

$("input[name='user_cell']").mask("(00) 0 0000-0000");

$("#formulario").submit(function(e){
	e.preventDefault();
});

/* -------- Cards da Obra em Owl carousel --------- */

$(".cards-carousel-obras").owlCarousel({
  loop: true,
  autoplay: true,
  margin:10,
  stagePadding: 7,
  items: 3,
  autoplayHoverPause: true,
  responsive:{
        0:{
            items:1,
            nav:false
        },
        576:{
            items:2,
            nav:false
        },
        992:{
            items:3,
            nav:false
        }
	}
});

/* -------- Menu --------- */

$('nav ul li').click(function(){
$(this).addClass("active").siblings().removeClass("active");
});

/* -------- SECTION DE CONSULTAR OBRAS --------- */
$("#consultar-obras").hide();
$(document).on('click', '#saiba-mais-obras', function() {   $("#consultar-obras").show(500); });
$(document).on('click', '#close-button-obras', function() {  $("#consultar-obras").hide(500); });


// -----------------------------------------------------------------

function enviarEmail(e){
	
	//Controlar botão de submit
	document.getElementById("btn-enviar").disabled = true;
	document.getElementById("btn-enviar").value = "A G U A R D E";
	
	// Obter informações dos inputs
	let nome = document.getElementsByName("user_name")[0].value;
	let email = document.getElementsByName("user_mail")[0].value;
	let telefone = document.getElementsByName("user_cell")[0].value;
	let mensagem = document.getElementsByName("user_message")[0].value;
	let arquivo = null;
	
	//Checar se os campos obrigatórios estão preenchidos
	if ( (nome.length == 0) || (email.length == 0) || (mensagem.length == 0)){
		swal({
			title: "Alerta!",
			text: "Por favor, preencha todos os campos obrigatórios!",
			icon: "error",
			button: "Ok!",
		});
		document.getElementById("btn-enviar").disabled = false;
		document.getElementById("btn-enviar").value = "ENVIAR MENSAGEM";
	} else {
		//Enviar Email
		emailjs.send("service_kwpf1zo","template_08hsy27",{
		user_name: nome,
		user_message: mensagem,
		user_mail: email,
		user_cell: telefone,
		}).then((result) => {
          	swal({
				title: "Mensagem Enviada!",
				text: "Em breve responderemos sua dúvida!",
				icon: "success",
				button: "Ok!",
			});
			document.getElementsByName("user_name")[0].value = null;
			document.getElementsByName("user_mail")[0].value = null;
			document.getElementsByName("user_cell")[0].value = null;
			document.getElementsByName("user_message")[0].value = null;
			document.getElementById("btn-enviar").disabled = false;
			document.getElementById("btn-enviar").value = "ENVIAR MENSAGEM";
		}, (error) => {
			swal({
				title: "Algo deu errado!",
				text: "Sua mensagem não pôde ser enviada!",
				icon: "error",
				button: "Ok!",
			});
			document.getElementById("btn-enviar").disabled = false;
			document.getElementById("btn-enviar").value = "ENVIAR MENSAGEM";
		});
	}
}
