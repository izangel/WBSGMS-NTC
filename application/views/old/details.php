<div class="row details">
	<div class="col-md-4">
		<img src="<?php echo base_url(); ?>assets/images/products/<?php echo $products->Image; ?>" />
	</div>
	<div class="col-md-8">
		<h3><?php echo $products->Title; ?></h3>
		<div class="details-price">
			$ <?php echo $products->Price; ?>
		</div>
		<div class="details-description">
			<?php echo $products->Description; ?>
		</div>

		<div class="details-buy">
			<form method="post" action="<?php echo base_url();?>cart/add">
				QTY:<input class="qty" type="text" name="qty" value="1" />
				<input type="hidden" name="item_number" value="<?php echo $products->id;?>"/>
				<input type="hidden" name="price" value="<?php echo $products->Price;?>"/>
				<input type="hidden" name="title" value="<?php echo $products->Title;?>"/>
				<button class="btn btn-primary" type="submit"> add to cart </button>
			</form>
		</div>
	</div>
</div>