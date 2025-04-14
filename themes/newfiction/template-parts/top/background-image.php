<div class="background-image top-0 absolute z-[1]">
	<div class="sticky top-[87px] h-[calc(100vh-87px)] w-full">
		<?php
			$args = [
				'pc' => 'top/top_thumbnail1_pc.jpg',
				'sp' => 'top/top_thumbnail1_sp.jpg',
				'alt' => '',
			];
			include get_template_directory() . '/components/image.php';
		?>
		<?php
			$args = [
				'pc' => 'top/top_thumbnail2_pc.jpg',
				'sp' => 'top/top_thumbnail2_sp.jpg',
				'alt' => '',
				'class' => 'background-1',
			];
			include get_template_directory() . '/components/image.php';
		?>
		<?php
			$args = [
				'pc' => 'top/top_thumbnail3_pc.jpg',
				'sp' => 'top/top_thumbnail3_sp.jpg',
				'alt' => '',
				'class' => 'background-2',
			];
			include get_template_directory() . '/components/image.php';
		?>
		<?php
			$args = [
				'pc' => 'top/top_thumbnail4_pc.jpg',
				'sp' => 'top/top_thumbnail4_sp.jpg',
				'alt' => '',
				'class' => 'background-3',
			];
			include get_template_directory() . '/components/image.php';
		?>
	</div>
</div>