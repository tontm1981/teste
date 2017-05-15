<div class="row">
	<div class="col-lg-10 col-lg-offset-1">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Proprietário</th>
					<th>Url</th>
					<th>Linguagem</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($repos AS $n => $repo) {
						echo "<tr>
							<td>".($n+1)."</td>
							<td>{$repo['name']}</td>
							<td>{$repo['description']}</td>
							<td>{$repo['owner']}</td>
							<td><a href='{$repo['url']}'>{$repo['url']}</a></td>
							<td>{$repo['language']}</td>
						</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>