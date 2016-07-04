<?php 
include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");?>

<?php if (array_key_exists("removido", $_GET) && $_GET['removido'] == true) :?>
	<p class="text-success">Produto apagado com sucesso</p>
<?php endif; ?>

<table class="table table-striped table-bordered">
	<?php foreach (listaProdutos($conexao) as $produto) :?>
	<tr>
		<td><?=$produto['nome']?></td>
		<td><?=$produto['preco']?></td>
		<td><?= substr($produto['descricao'],0,15)?></td>
		<td><?= $produto['categoria_nome']?></td>
		<td><?= $produto['usado']==1 ? "Usado" : "Novo" ?></td>
		<td><a href="produto-altera-formulario.php?id=<?=$produto['id']?>" class="btn btn-primary">Alterar</a></td>
		<td>
			<form action="remover-produto.php" method="post">
				<input type="hidden" name="id" value="<?= $produto['id']?>">
				<button  class="btn btn-danger">Remover</button>
			</form>
		</td>
	</tr>
	<?php endforeach?>
</table>


<?php include("rodape.php");?>