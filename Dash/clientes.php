<!-- GERENCIAR CLIENTES -->
<div class="row">
				<div class="col-lg-8 col-12" id="adm-clientes" style="visibility:hidden;">
					<div class="row">
						<div class="card mb-3 ">
							<div class="card-header"><h2>Gerenciamento de Clientes</h2></div>
							<div class="card-body">
								<div class="container-fluid">
									<div class="row">
										<h4><b>+ ESCOLHA UMA DAS OPÇÕES ABAIXO PARA PROSSEGUIR</b></h4>
										<form id="adm-dados-card" action="" method="GET">
											<div class="container-fluid">
												<div class="row">
                                                    <input name="Clientes" style="visibility:hidden;"/>
													<button name="operation" value="consultarCliente" onclick="adm_aux(2, 0)" class="btn col-sm-6 col-12">CONSULTAR <br> CLIENTES</button>
													<INPUT onclick="adm_aux(2, 1)" class="btn col-sm-6 col-12">NOVOS <br> CLIENTES</INPUT>
												</div>
											</div>
										</form>
										<hr class="col-12">
										<article id="adm-tabelas-existentes-clientes" class="col-12">
											<h2  id="card-title" class="fs-4"><b>CLIENTES EXISTENTES</b></h2>
                                            <table>
<?php
	if($operation=="consultarCliente"){
		consultarCliente();
	}
?>
                                            </table>
										</article>
										
										<!-- NOVA TABELA -->
										<article id="aux-adm-novos-clientes" style="visibility:hidden;">
											<h2 id="card-title">NOVO CLIENTE</h2>
											<div class="card-body">
												<form id="formulario" action="" method="GET">
													<div id="dados-login">
														<div class="mb-3">
															<label id="FileHelp" class="form-label">+ INFORME A IMAGEM DO CLIENTE</label>
															<input class="form-control" type="file" id="formFile" name="user_file">
														</div>
														<div class="row">
															<button onclick="adm_aux(2, 0)" class="btn col-6">RETORNAR</button>
															<button name="operation" value="novoCliente" class="btn col-6">CRIAR</button>
														</div>
													</div>
												</form>
											</div>
										</article>
										
										<!-- ATUALIZAR DADOS -->
										<article id="aux-adm-up-clientes" style="visibility:hidden;">
											<h2 id="card-title">ATUALIZAR DADOS</h2>
											<div class="card-body">
												<form id="formulario" action="" method="GET">
													<div id="dados-login">
														<div class="mb-3">
															<label id="DataHelp" class="form-label">+ INFORME O NOVO DADO</label>
															<input type="text" class="form-control" placeholder="*Informação" id="exampleInputEmail1">
														</div>
														<div class="row">
														<button onclick="adm_aux(2, 0)" class="btn">RETORNAR</button>
														<button name="operation" value="atualizarCliente" class="btn">ATUALIZAR</button>
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