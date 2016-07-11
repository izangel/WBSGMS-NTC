<div class="cart-block">
	<form action="cart/update" method="post">
	<table padding="6" cellspacing="1" style="width:100%" border="0">
		<tr>
			<th> QTY </th>
			<th> ITEM DESCRIPTION </th>
			<th style="text-align:right">PRICE</th>
		</tr>
	<?php $i = 1; ?>
	<?php foreach($this->cart->contents() as $items): ?>
		<input type="hidden" name="<?php echo $i.'[rowid]'; ?>" value="<?php echo $items['rowid']; ?>" />
			<tr>
				<td><input type="text" name="<?php echo $i.'[qty]'; ?>" value="<?php echo $items['qty']; ?>" maxlength="3" size="2"/></td>
				<td><?php echo $items['name']; ?></td>
				<td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
			</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
		<tr>
			<td> </td>
			<td class="right" style="text-align:left"><strong>Total</strong></td>
			<td class="right" style="text-align:right">$ <?php echo $this->cart->format_number($this->cart->total()); ?></td>
		</tr>
</table>
<br>
	<p><button class="btn btn-default" type="submit"> update cart</button> 
	<a class="btn btn-default" href="cart.html">go to cart</a> </p>

</div>

	<div class="panel panel-default panel-list">
	<div class="panel-heading panel-heading panel-dark">
	<h3 class="panel-title">Categories</h3>
</div>
	<!--List group-->
<ul class="list-group">
	<?php foreach(get_categories_h() as $category) : ?>
		<li class="list-group-item"><a href="<?php echo base_url(); ?>products/category/<?php echo $category->id; ?>"><?php echo $category->Name; ?></a></li>
	<?php endforeach; ?>
</ul>
</div>

</form>
<div class="panel panel-default panel-list">
	<div class="panel-heading panel-heading panel-dark">
		<h3 class="panel-title">
			Most popular
		</h3>
	</div>
	
	<!--List group-->
	<ul class="list-group">
		<?php foreach(get_popular_h() as $popular) : ?>
			<li class="list-group-item"><a href="<?php echo base_url(); ?>products/details/<?php echo $popular->id; ?>"><?php echo $popular->Title; ?></a></li>
		<?php endforeach; ?>
	</ul>