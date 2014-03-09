<!-- File: /app/View/Pizzas/index.ctp -->

<h1>Blog pizzas</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $pizzas array, printing out pizza info -->

    <?php foreach ($pizzas as $pizza): ?>
    <tr>
        <td><?php echo $pizza['Pizza']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($pizza['Pizza']['topping1'],
array('controller' => 'pizzas', 'action' => 'view', $pizza['Pizza']['id'])); ?>
        </td>
        <td><?php echo $pizza['Pizza']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($pizza); ?>
</table>
