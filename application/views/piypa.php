<div class="container">

<?php foreach ($products as $product): ?>
<div class="span-18">
    <div class="span-5">

   	<ul id="product_grid">

					<a href="/products/view/asin/B004SB5V5G"> <img
						src="<?= $product['medium'] ?>	" class="game_cover" alt="" /> </a>
					<br />
					<br />
					<h2>
						<a href="/products/view/asin/B004SB5V5G">
        					<?php echo $product['name'] ?>					</a>
					</h2>
				</ul>
</div>
  <div class="span-10" >
<table width="100%">
				<thead>
					<tr>
						<th>Type</th>
						<th>Title</th>
						<th></th>
						<th></th>
						<th></th>
						
					</tr>
				</thead>

					<?php foreach ($piyps as $piyp): ?>

					<?php 

					foreach($piyp as $piypa){

					if($product['id'] == $piypa['product'])
					{
					?>

					
					<tr>
					<td width="50"><?= $piypa['categoryId'] ?>					
					<td width="200"><?= $piypa['title'] ?>	</td>
					<td>
						<form method="get" action="/index.php/piypa/preview" class="formee">
							<input type="hidden" name="piypaID"
								value="61">
							<button type="submit" class="formee-button">preview</button>
						</form></td>

					<td>
						<form method="post"
							action="/index.php/piypa/edit/piypaID/<?= $piypa['id'] ?>"
							class="formee">
							<input type="hidden" name="asin" value="<?= $product['asin'] ?>">
							<input type="hidden" name="piypaID" value="<?= $piypa['id'] ?>">
							<button type="submit" class="formee-button">edit</button>
						</form></td>

					<td>
						<form method="post" action="/index.php/piypa/delete" class="formee">
							
							<input type="hidden" name="asin" value="<?= $product['asin'] ?>">
							<input type="hidden" name="piypaID" value="<?= $piypa['id'] ?>">
							<button type="submit" class="formee-button">delete</button>
						</form></td>


				</tr>

				<?php }} ?>				
				<?php endforeach ?>
				</table>

					<div id="stylized" class="formee">
					<form method="get" action="/index.php/piypa/add/asin/<?= $product["asin"] ?>" id="form"
					class="formee">
					<button type="submit" style="width: 200px" name=""
						class="formee-button">Add your own piyp!</button> 
					</form>
					</div>


</div>
</div>
<?php endforeach; ?>
</div>
