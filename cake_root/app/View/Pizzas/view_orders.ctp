<!-- File: /app/View/Pizzas/index.ctp -->

<h1>Blog pizzas</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Customer</th>
        <th>Topping 1</th>
        <th>Topping 2</th>
        <th>Topping 3</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $pizzas array, printing out pizza info -->

    <?php foreach ($pizzas as $pizza): ?>
    <tr>
        <td><?php echo $pizza['Pizza']['id']; ?></td>
		<td><?php echo $pizza['User']['username']; ?></td>
		<td><?php echo $pizza['Pizza']['topping1']; ?></td>
		<td><?php echo $pizza['Pizza']['topping2']; ?></td>
		<td><?php echo $pizza['Pizza']['topping3']; ?></td>
        <td><?php echo $pizza['Pizza']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($pizza); ?>
</table>
