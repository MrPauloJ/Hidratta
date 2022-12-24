<!-- CONFIG -->
<div class="row">
				<div class="col-lg-8 col-12" id="config" style="visibility:hidden;">
					<div class="row">
						<div class="card mb-3 ">
							<div class="card-header"><h2>Alterar Senha Atual</h2></div>
							<div class="card-body">
								<form id="formulario" action="" method="GET">
									<div id="dados-login">
										<div class="mb-3">
                                            <input name="Config" style="visibility:hidden;"/>
											<label id="senhaAntigaHelp" class="form-label">+ INFORME A SENHA ATUAL</label>
											<input type="password" name="oldPass" class="form-control" placeholder="*Senha Atual" id="exampleInputEmail1">
										</div>
										<div class="mb-3">
                                            <input name="Config" style="visibility:hidden;"/>
											<label id="senhaNovaHelp" class="form-label">+ INFORME A NOVA SENHA</label>
											<input type="password" name="newPass" class="form-control" placeholder="*Nova Senha" id="exampleInputPassword1">
										</div>
										<button class="btn" name="operation" value="alterarSenhaAdmin">ALTERAR SENHA</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>