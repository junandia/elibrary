<!-- main content -->
<div class="container-fluid">
	<div class="row-fluid">
		<!-- sidebar -->
		<?php include_once('sidebar.php'); ?>
		
		<!-- books -->
		<div class="sn offset2">
			<div>
				<h3 style="display:inline-block;"><?php echo $title; ?></h3>
				<div class="pull-right height35">
					<a class="no-underline" href="#" title="Delete All">Delete All</a>
				</div>
			</div>
			<?php if(!empty($rows)): ?>
				<ul class="unstyled">
					<?php foreach($rows as $row) : ?>
						<?php $book = $bookModel->Get($row["ISBN"]); ?>
						<li style="border-bottom:1px solid #999;padding-top:10px;padding-bottom:10px;">
							<div class="pull-right">
								<a href="#" title="Delete"><i class="icon-remove-sign"></i></a>
							</div>
							<?php echo $book->title.' of '.$book->ISBN.' was borrowed on '.$row['date_out'] ; ?>
						</li>
					<?php endforeach; ?>
				</ul>
				<?php echo $this->pagination->create_links(); ?>
			<?php else: ?>
				<p>No data to display...</p>
			<?php endif; ?>
		</div>
		
		<div class="span2">
			Advertisment
		</div>
	</div>
</div>

<div class="push"></div>
</div>
<div class="clearfix"></div>
<!-- content end -->