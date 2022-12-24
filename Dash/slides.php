<!-- GERENCIAR SLIDES -->
<div class="row">
				<div class="col-lg-8 col-12" id="adm-slides" style="visibility:hidden;">
					<div class="row">
						<div class="card mb-3 ">
							<div class="card-header"><h2>Gerenciamento de Slides</h2></div>
							<div class="card-body">
								<div class="container-fluid">
									<div class="row">
										<h4><b>+ ESCOLHA UMA DAS OPÇÕES ABAIXO PARA PROSSEGUIR</b></h4>
										<form id="adm-dados-card" action="" method="GET">
											<div class="container-fluid">
												<div class="row">
                                                    <input name="Slides" style="visibility:hidden;"/>
													<button name="operation" value="consultarSlide" onclick="adm_aux(0, 0)" class="btn col-sm-6 col-12">CONSULTAR <br> SLIDES</button>
													<input onclick="adm_aux(0, 1)" class="btn col-sm-6 col-12"/>NOVOS <br> SLIDES</input>
												</div>
											</div>
										</form action="" method="GET">
										<hr class="col-12">
										<article id="adm-tabelas-existentes-slides" class="col-12">
											<h2  id="card-title" class="fs-4"><b>SLIDES EXISTENTES</b></h2>
											<table>
<?php
	if($operation=="consultarSlide"){
		consultarSlide();
	}
?>
											<!--<p id="content-empresa" class="fs-5">Nenhuma slide foi criado pelo usuário até o momento.</p>-->
											</table>
										</article>
										
										<!-- NOVA TABELA -->
										<article id="aux-adm-novos-slides" style="visibility:hidden;">
											<h2 id="card-title">NOVO SLIDE</h2>
											<div class="card-body">
												<form id="formulario" action="" method="GET">
													<div id="dados-login">
														<div class="mb-3">
															<label id="FileHelp" class="form-label">+ SELECIONE UMA IMAGEM PARA O SLIDE</label>
															<input class="form-control" type="file" id="formFile" name="imgSlide">
														</div>
														<div class="row">
															<input name="Slides" style="visibility:hidden;"/>
															<button onclick="adm_aux(0, 0)" class="btn col-6">RETORNAR</button>
															<button name="operation" value="novoSlide" class="btn col-6">CRIAR</button>
														</div>
													</div>
												</form>
											</div>
										</article>
										
										<!-- ATUALIZAR DADOS -->
										<article id="aux-adm-up-slides" style="visibility:hidden;">
											<h2 id="card-title">ATUALIZAR DADOS</h2>
											<div class="card-body">
												<form id="formulario" action="operacoes.php" method="GET">
													<div id="dados-login">
														<div class="mb-3">
															<label id="DataHelp" class="form-label">+ Imagem do Primeiro Slide</label>
															<input type="text" class="form-control" placeholder="*Informação" id="exampleInputEmail1">
														</div>
														<div class="row">
														<button onclick="adm_aux(0, 0)" class="btn">RETORNAR</button>
														<button name="operation" value="atualizarSlide" class="btn">ATUALIZAR</button>
														</div>
													</div>
												</form>
											</div>
										</article>
										
										<!-- DELETAR DADOS -->
											<!-- não haverá div aqui, apenas um confirm para confirmar a exclusão -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>