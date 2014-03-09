<?php
	echo $this->Html->css('make_pizza');
?>

<div class="pizzaMaker">
	<div class="availableToppingsContainer">
		<div class="toppingHeader">
			Choose your toppings
		</div>

		<div class="toppingWarning">(maximum 3)</div>
		<div id="availableToppingsList">
		</div>
	</div>

	<div class="pizza-image">
		<?php echo $this->Html->image('pizza-small.png'); ?>
	</div>

	<div class="chosenToppingsContainer">
		<div class="toppingHeader">
			Chosen toppings
		</div>

		<div id="chosenToppingsList">
		</div>
	</div>

	<?php
	echo $this->Form->create('Pizza', array(
		'id' => 'makePizzaForm',
		'class' => 'makePizzaForm'
	));

	echo $this->Form->hidden('topping1');
	echo $this->Form->hidden('topping2');
	echo $this->Form->hidden('topping3');

	echo $this->Form->end(array(
		'label' => 'place the order',
	));
	?>
</div>


<?php
	echo $this->Html->script('make_pizza.js');
?>

<script type="text/javascript">
	var makePizza = new MakePizza({
		toppings: <?php echo $this->Js->object($toppings) ?>,
		availableToppingsList: 'availableToppingsList',
		chosenToppingsList: 'chosenToppingsList',
		form: 'makePizzaForm'
	});
</script>
