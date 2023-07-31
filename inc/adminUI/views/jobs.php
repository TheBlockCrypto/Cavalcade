<div class="wrap">
	<h1 class="wp-heading-inline">Cavalcade Admin</h1>
	<?php
	$default_tab = null;
	$tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;
	?>
	<nav class="nav-tab-wrapper">
		<a href="?page=cavalcade" class="nav-tab <?php if ($tab === null): ?>nav-tab-active<?php endif; ?>">Jobs</a>
		<a href="?page=cavalcade&tab=logs"
			 class="nav-tab <?php if ($tab === 'logs'): ?>nav-tab-active<?php endif; ?>">Logs</a>
	</nav>

	<div class="tab-content">
		<?php if (count($jobs) > 0) : ?>
			<p style="text-align: center;">
				<b>Total Jobs:</b> <?php echo number_format(count($jobs)); ?>
			</p>
		<?php endif; ?>

		<table class="widefat striped">
			<tr>
				<th>Id</th>
				<th>Site</th>
				<th>Hook</th>
				<th>Args</th>
				<th>Start</th>
				<th>Next Run</th>
				<th>Interval</th>
				<th>Status</th>
				<th>Schedule</th>
			</tr>
			<?php if (count($jobs) > 0) :
				foreach ($jobs as $job) :
					?>
					<tr>
						<td><?php echo $job->id; ?></td>
						<td><?php echo $job->site; ?></td>
						<td><?php echo $job->hook; ?></td>
						<td><?php echo print_r($job->args, true); ?></td>
						<td>
							<?php
							$dt = new DateTime('@' . $job->start);
							$dt->setTimeZone(new DateTimeZone('America/New_York'));
							echo $dt->format('F j, Y, h:i:s');
							?>
						</td>
						<td>
							<?php
							$dt = new DateTime('@' . $job->nextrun);
							$dt->setTimeZone(new DateTimeZone('America/New_York'));
							echo $dt->format('F j, Y, h:i:s');
							?>
						</td>
						<td><?php echo $job->interval; ?></td>
						<td><?php echo $job->status; ?></td>
						<td><?php echo $job->schedule; ?></td>
					</tr>
				<?php endforeach;
			else : ?>
				<tr>
					<td>None</td>
					<td></td>
				</tr>
			<?php endif; ?>
		</table>
	</div>
</div>
