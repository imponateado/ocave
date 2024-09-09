<!doctype html>
<html lang="pt-br">
    <?php require '../functions/head.php'; ?>

    <body>
        <div class="wrapper d-flex align-items-stretch">
            <?php require '../functions/navbar.php'; ?>
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
				<div class="card">
					<div class="card-body" id="entireForm"> <!-- card body -->
						<!-- BEGIN OF AN INPUT TYPE TEXT -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Distribuidora</span>
							</div>
							<input type="text" class="form-control" aria-label="Default" id="distribuidora" aria-describedby="inputGroup-sizing-default">
						</div>
						<!-- END OF AN INPUT TYPE TEXT -->
						<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="clienteNovo">
							<label class="form-check-label" for="clienteNovo">
								Cliente Novo
							</label>
						</div>
						<!-- END OF AN INPUT TYPE CHECKBOX -->
						<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="ohOhOh">
							<label class="form-check-label" for="ohOhOh">
								R$0,00
							</label>
						</div>
						<!-- END OF AN INPUT TYPE CHECKBOX -->
						<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="inativo">
							<label class="form-check-label" for="inativo">
								Inativo
							</label>
						</div>
						<!-- END OF AN INPUT TYPE CHECKBOX -->
						<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="empresaFechou">
							<label class="form-check-label" for="empresaFechou">
								Empresa Fechou
							</label>
						</div>
						<!-- END OF AN INPUT TYPE CHECKBOX -->
						<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="enderecoNaoLocalizado">
							<label class="form-check-label" for="enderecoNaoLocalizado">
								Endereço Não Localizado
							</label>
						</div>
						<!-- END OF AN INPUT TYPE CHECKBOX -->
						<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="telefoneNaoAtende">
							<label class="form-check-label" for="telefoneNaoAtende">
								Telefone Não Atende
							</label>
						</div>
						<!-- END OF AN INPUT TYPE CHECKBOX -->
						<!-- BEGIN OF AN INPUT TYPE TEXT -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Código do cliente</span>
							</div>
							<input type="text" class="form-control" aria-label="Default" id="codigoCliente" aria-describedby="inputGroup-sizing-default">
						</div>
						<!-- END OF AN INPUT TYPE TEXT -->
						<!-- BEGIN OF AN INPUT TYPE TEXT -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Vendedor</span>
							</div>
							<input type="text" class="form-control" aria-label="Default" id="vendedor" aria-describedby="inputGroup-sizing-default">
						</div>
						<!-- END OF AN INPUT TYPE TEXT -->
						<!-- BEGIN OF AN INPUT TYPE TEXT -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Cidade</span>
							</div>
							<input type="text" class="form-control" aria-label="Default" id="cidade" aria-describedby="inputGroup-sizing-default">
						</div>
						<!-- END OF AN INPUT TYPE TEXT -->
						<!-- BEGIN OF AN INPUT TYPE TEXT -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Rota</span>
							</div>
							<input type="text" class="form-control" aria-label="Default" id="rota" aria-describedby="inputGroup-sizing-default">
						</div>
						<!-- END OF AN INPUT TYPE TEXT -->
						<!-- BEGIN OF AN INPUT TYPE TEXT -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Localização Geográfica</span>
							</div>
							<input type="text" class="form-control" aria-label="Default" id="localizacaoGeografica" aria-describedby="inputGroup-sizing-default">
						</div>
						<!-- END OF AN INPUT TYPE TEXT -->
						<!-- BEGIN OF AN INPUT TYPE TEXT -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Nome Fantasia</span>
							</div>
							<input type="text" class="form-control" aria-label="Default" id="nomeFantasia" aria-describedby="inputGroup-sizing-default">
						</div>
						<!-- END OF AN INPUT TYPE TEXT -->
						<!-- BEGIN OF AN INPUT TYPE TEXT -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Telefone Empresa</span>
							</div>
							<input type="text" class="form-control" aria-label="Default" id="telefoneEmpresa" aria-describedby="inputGroup-sizing-default">
						</div>
						<!-- END OF AN INPUT TYPE TEXT -->
						<!-- BEGIN OF AN INPUT TYPE TEXT -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">CPF/CNPJ</span>
							</div>
							<input type="text" class="form-control" aria-label="Default" id="cpfCNPJ" aria-describedby="inputGroup-sizing-default">
						</div>
						<!-- END OF AN INPUT TYPE TEXT -->
						<!-- BEGIN OF AN INPUT TYPE TEXT -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Nome Responsável Compra</span>
							</div>
							<input type="text" class="form-control" aria-label="Default" id="nomeResponsavelCompra" aria-describedby="inputGroup-sizing-default">
						</div>
						<!-- END OF AN INPUT TYPE TEXT -->
						<!-- BEGIN OF AN INPUT TYPE TEXT -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Telefone Responsável Compra</span>
							</div>
							<input type="text" class="form-control" aria-label="Default" id="telefoneResponsavelCompra" aria-describedby="inputGroup-sizing-default">
						</div>
						<!-- END OF AN INPUT TYPE TEXT -->
						<!-- BEGIN OF AN INPUT TYPE TEXT -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Contato Empresa</span>
							</div>
							<input type="text" class="form-control" aria-label="Default" id="contatoEmpresa" aria-describedby="inputGroup-sizing-default">
						</div>
						<!-- END OF AN INPUT TYPE TEXT -->
						<div class="card" style="padding: 1rem 1rem 1rem;">

							<h5>Formas de pagamento</h5>

							<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="" name="formaPgto">
								<label class="form-check-label" for="aVista">
									A vista
								</label>
							</div>
							<!-- END OF AN INPUT TYPE CHECKBOX -->
							<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="" name="formaPgto">
								<label class="form-check-label" for="cartao">
									Cartão
								</label>
							</div>
							<!-- END OF AN INPUT TYPE CHECKBOX -->
							<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="" name="formaPgto">
								<label class="form-check-label" for="boleto">
									Boleto
								</label>
							</div>
							<!-- END OF AN INPUT TYPE CHECKBOX -->
							<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="" name="formaPgto">
								<label class="form-check-label" for="chequeTerceiro">
									Cheque de terceiros
								</label>
							</div>
							<!-- END OF AN INPUT TYPE CHECKBOX -->
							<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="" name="formaPgto">
								<label class="form-check-label" for="chequeProprio">
									Cheque Próprio
								</label>
							</div>
							<!-- END OF AN INPUT TYPE CHECKBOX -->
						</div>
						<div class="card" style="padding: 1rem 1rem 1rem 1rem">

							<h5>Posse do imóvel</h5>

							<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="alugado" name="posseImovel">
								<label class="form-check-label" for="alugado">
									Imóvel Alugado
								</label>
							</div>
							<!-- END OF AN INPUT TYPE CHECKBOX -->
							<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="proprio" name="posseImovel">
								<label class="form-check-label" for="proprio">
									Imóvel Próprio
								</label>
							</div>
							<!-- END OF AN INPUT TYPE CHECKBOX -->
						</div>
						<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="fotoImovel">
							<label class="form-check-label" for="fotoImovel">
								Fotos do imóvel
							</label>
						</div>
						<!-- END OF AN INPUT TYPE CHECKBOX -->
						<!-- BEGIN OF AN INPUT TYPE TEXT -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Média de compra mensal</span>
							</div>
							<input type="text" class="form-control" aria-label="Default" id="mediaComprasMensais" aria-describedby="inputGroup-sizing-default">
						</div>
						<!-- END OF AN INPUT TYPE TEXT -->
						<!-- BEGIN OF AN INPUT TYPE TEXT -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Fornecedores</span>
							</div>
							<input type="text" class="form-control" aria-label="Default" id="fornecedores" aria-describedby="inputGroup-sizing-default">
						</div>
						<!-- END OF AN INPUT TYPE TEXT -->
						<div class="card" style="padding: 1rem 1rem 1rem 1rem;">
							<h5>Preços</h5>
							<!-- BEGIN OF AN INPUT TYPE TEXT -->
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-default">Box e janela incolor</span>
								</div>
								<input type="text" class="form-control" aria-label="Default" id="boxJanelaIncolor" aria-describedby="inputGroup-sizing-default" name="precos">
							</div>
							<!-- END OF AN INPUT TYPE TEXT -->
							<!-- BEGIN OF AN INPUT TYPE TEXT -->
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-default">Box e janela fumê</span>
								</div>
								<input type="text" class="form-control" aria-label="Default" id="boxJanelaFume" aria-describedby="inputGroup-sizing-default" name="precos">
							</div>
							<!-- END OF AN INPUT TYPE TEXT -->
							<!-- BEGIN OF AN INPUT TYPE TEXT -->
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-default">Porta</span>
								</div>
								<input type="text" class="form-control" aria-label="Default" id="porta" aria-describedby="inputGroup-sizing-default" name="precos">
							</div>
							<!-- END OF AN INPUT TYPE TEXT -->
							<!-- BEGIN OF AN INPUT TYPE TEXT -->
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-default">Engenharia Incolor</span>
								</div>
								<input type="text" class="form-control" aria-label="Default" id="engenhariaIncolor" aria-describedby="inputGroup-sizing-default" name="precos">
							</div>
							<!-- END OF AN INPUT TYPE TEXT -->
							<!-- BEGIN OF AN INPUT TYPE TEXT -->
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-default">Engenharia Fumê</span>
								</div>
								<input type="text" class="form-control" aria-label="Default" id="engenhariaFume" aria-describedby="inputGroup-sizing-default" name="precos">
							</div>
							<!-- END OF AN INPUT TYPE TEXT -->
						</div>
						<!-- BEGIN OF AN INPUT TYPE TEXT -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">obsCliente</span>
							</div>
							<input type="text" class="form-control" aria-label="Default" id="obsCliente" aria-describedby="inputGroup-sizing-default">
						</div>
						<!-- END OF AN INPUT TYPE TEXT -->
						<!-- BEGIN OF AN INPUT TYPE TEXT -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">obsRepresentante</span>
							</div>
							<input type="text" class="form-control" aria-label="Default" id="obsRepresentante" aria-describedby="inputGroup-sizing-default">
						</div>
						<!-- END OF AN INPUT TYPE TEXT -->
						<div class="card" style="padding: 1rem 1rem 1rem 1rem">
							<h5>Reportar</h5>
							<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="wesley" name="reportar">
								<label class="form-check-label" for="wesley">
									Wesley
								</label>
							</div>
							<!-- END OF AN INPUT TYPE CHECKBOX -->
							<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="victor" name="reportar">
								<label class="form-check-label" for="victor">
									Victor
								</label>
							</div>
							<!-- END OF AN INPUT TYPE CHECKBOX -->
							<!-- BEGIN OF AN INPUT TYPE CHECKBOX -->
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="lazinho" name="reportar">
								<label class="form-check-label" for="lazinho">
									Lazinho
								</label>
							</div>
							<!-- END OF AN INPUT TYPE CHECKBOX -->
						</div>
						<button class="btn btn-success" style="margin-top: 1rem" onclick="putFormRepresentante()">Gravar</button>
					</div> <!-- end of card body -->
				</div>
            </div>
			<!-- End page content -->
        </div>

		<?php require '../functions/scripts.php'; ?>
		
		<script>
			function putFormRepresentante() {
				
				var inputs = document.querySelectorAll('input');
				var dados = {};

				inputs.forEach(function(input) {
					if(input.name) {
						if (input.type === 'checkbox') {
							if(input.checked) {
								dados[input.name] ? (dados[input.name] += `, ${input.id}`) : (dados[input.name] = input.id);
							}
						}
						if (input.type === 'text') {
							dados[input.name] ? (dados[input.name] += `, ${input.value}`) : (dados[input.name] = input.value);
						}
					} else {
						if (input.type === "checkbox") {
							input.checked ? (dados[input.id] = 1) : (dados[input.id] = 0);
						}
						if (input.type === "text") {
							dados[input.id] = input.value;
						}
					}
				});

				const url = `${baseUrl}/ocave/backend/putFormRepresentante.php`;
				const options = {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify(dados)
				};

				fetch(url, options)
				.then(response => {
					if(!response.ok) {
						throw new Error('Erro ao enviar os dados');
					}
					return response.text();
				})
				.then(data => {
					window.alert(data);
				})
				.catch(err => {
					window.alert(err);
				});
			}
		</script>
    </body>
</html>