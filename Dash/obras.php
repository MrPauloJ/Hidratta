<!-- GERENCIAR OBRAS -->
<div class="row">
				<div class="col-lg-8 col-12" id="adm-obras" style="visibility:hidden;">
					<div class="row">
						<div class="card mb-3 ">
							<div class="card-header"><h2>Gerenciamento de Obras</h2></div>
							<div class="card-body">
								<div class="container-fluid">
									<div class="row">
										<h4><b>+ ESCOLHA UMA DAS OPÇÕES ABAIXO PARA PROSSEGUIR</b></h4>
										<form id="adm-dados-card" action="" method="GET">
											<div class="container-fluid">
												<div class="row">
                                                    <input name="Obras" style="visibility:hidden;"/>
													<button name="operation" value="consultarPost" onclick="adm_aux(1, 0)" class="btn col-sm-6 col-12">CONSULTAR <br> OBRAS</button>
													<INPUT onclick="adm_aux(1, 1)" class="btn col-sm-6 col-12">NOVAS <br> OBRAS</INPUT>
												</div>
											</div>
										</form>
										<hr class="col-12">
										<article id="adm-tabelas-existentes-obras" class="col-12">
											<h2  id="card-title" class="fs-4"><b>OBRAS EXISTENTES</b></h2>
                                            <table>
<?php
	if($operation=="consultarPost"){
		consultarPost();
	}
?>
                                            </table>
                                        </article>
										
										<!-- NOVA TABELA -->
										<article id="aux-adm-novas-obras" style="visibility:hidden;">
											<h2 id="card-title">NOVA OBRA</h2>
											<div class="card-body">
												<form id="formulario" action="operacoes.php" method="GET">
													<div id="dados-login">
														<div class="mb-3">
															<label id="FileHelp" class="form-label">+ INFORME UMA IMAGEM E UM TEXTO RESUMO PARA A OBRA</label>
															<input class="form-control" type="file" id="formFile" name="user_file">
															<textarea class="form-control textarea-box" name="user_message" rows="4" style="resize: none; margin-top:10px;" placeholder="Texto resumo*"></textarea>
														</div>
														<div class="row">
															<button onclick="adm_aux(1, 0)" class="btn col-6">RETORNAR</button>
															<button name="operation" value="novoPost" class="btn col-6">CRIAR</button>
														</div>
													</div>
												</form>
											</div>
										</article>
									
										<!-- ATUALIZAR DADOS -->
										<article id="aux-adm-up-obras" style="visibility:hidden;">
											<h2 id="card-title">ATUALIZAR DADOS</h2>
											<div class="card-body">
												<form id="formulario" action="operacoes.php" method="GET">
													<div id="dados-login">
														<div class="mb-3">
															<label id="DataHelp" class="form-label">+ INFORME O NOVO DADO</label>
															<input type="text" class="form-control" placeholder="*Informação" id="exampleInputEmail1">
														</div>
														<div class="row">
														<button onclick="adm_aux(1, 0)" class="btn">RETORNAR</button>
														<button name="operation" value="atualizarPost" class="btn">ATUALIZAR</button>
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