<?php foreach($products as $product):  ?>
	<div class="col-md-4 game">
		<div class="game-price">$ <?php echo $product->Price; ?></div>
		<a href="<?php echo base_url(); ?>products/details/<?php echo $product->id; ?>">
		<img src="<?php echo base_url(); ?>assets/images/products/<?php echo $product->Image; ?>" width="90%" height="90%"/>
		</a>
		<div class="game-title">
			<?php echo $product->Title; ?>
		</div>

		<div class="game-add">
			<form method="post" action="<?php echo base_url();?>cart/add">
				QTY:<input class="qty" type="text" name="qty" value="1" />
				<input type="hidden" name="item_number" value="<?php echo $product->id;?>"/>
				<input type="hidden" name="price" value="<?php echo $product->Price;?>"/>
				<input type="hidden" name="title" value="<?php echo $product->Title;?>"/>
				<button class=" btn btn-primary" type="submit"> add to cart </button>
			</form>
		</div>
	</div>
<?php endforeach; ?>

<!-- asdasdasdas -->


