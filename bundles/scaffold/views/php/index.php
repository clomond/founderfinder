<?php echo '<?php'; ?> if(count($<?php echo $plural; ?>) == 0): ?>
	<p>No <?php echo str_replace('_', ' ', $plural); ?>.</p>
<?php echo '<?php else: ?>'.PHP_EOL; ?>
	<table>
		<thead>
			<tr>
<?php foreach($fields as $field => $type): ?>
				<th><?php echo ucwords(str_replace('_', ' ', $field)); ?></th>
<?php endforeach; ?>
<?php foreach($plural_relationships as $type => $models): ?>
<?php foreach($models as $model): ?>
				<th><?php echo ucwords(str_replace('_', ' ', Str::plural($model))); ?></th>
<?php endforeach; ?>
<?php endforeach; ?>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<?php echo '<?php'; ?> foreach($<?php echo $plural; ?> as $<?php echo $singular; ?>): ?>
				<tr>
<?php foreach($fields as $field => $type): ?>
<?php if($type != 'boolean'): ?>
<?php if(strpos($field, '_id') !== false && in_array($model = substr($field, 0, -3), $belongs_to)): ?>
					<td><a href="<?php echo '<?php'; ?> echo URL::to('<?php echo $url[$model]; ?>/view/'.$<?php echo $singular; ?>->id); ?>"><?php echo ucwords(str_replace('_', ' ', $model)); ?> #<?php echo '<?php'; ?> echo $<?php echo $singular; ?>-><?php echo $field; ?>; ?></a></td>
<?php else: ?>
					<td><?php echo '<?php'; ?> echo $<?php echo $singular; ?>-><?php echo $field; ?>; ?></td>
<?php endif; ?>
<?php else: ?>
					<td><?php echo '<?php'; ?> echo ($<?php echo $singular; ?>-><?php echo $field; ?>) ? 'True' : 'False'; ?></td>
<?php endif; ?>
<?php endforeach; ?>
<?php foreach($plural_relationships as $type => $models): ?>
<?php foreach($models as $model): ?>
					<td><?php echo '<?php'; ?> echo count($<?php echo $singular; ?>-><?php echo Str::plural($model); ?>); ?></td>
<?php endforeach; ?>
<?php endforeach; ?>
					<td>
						<a href="<?php echo '<?php'; ?> echo URL::to('<?php echo $nested_path.$plural; ?>/view/'.$<?php echo $singular; ?>->id); ?>" class="btn">View</a>
						<a href="<?php echo '<?php'; ?> echo URL::to('<?php echo $nested_path.$plural; ?>/edit/'.$<?php echo $singular; ?>->id); ?>" class="btn">Edit</a>
						<a href="<?php echo '<?php'; ?> echo URL::to('<?php echo $nested_path.$plural; ?>/delete/'.$<?php echo $singular; ?>->id); ?>" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a>
					</td>
				</tr>
			<?php echo '<?php endforeach; ?>'.PHP_EOL; ?>
		</tbody>
	</table>
<?php echo '<?php endif; ?>'.PHP_EOL; ?>

<p><a class="btn success" href="<?php echo '<?php'; ?> echo URL::to('<?php echo $nested_path.$plural; ?>/create'); ?>">Create new <?php echo str_replace('_', ' ', $singular_class); ?></a></p>