<p id="search_result_caption"><?php echo $_['caption']; ?></p>

<ul id="search_result_list">

	<?php

		foreach ($_['search'] as $item) {
			
			$name = str_ireplace($_['pattern'], '<span style="background-color: yellow;">' . $_['pattern'] . '</span>' , $item['name']);
			$link = OC_Helper::linkToAbsolute( '', 'public.php' ) . '?service=files&t=' . $item['token'] ;

			echo '<li class="search_result_item">' ;
			echo '<p class="search_result_item_name">' . $name . '<spam class="search_result_item_size">[' . OCP\Util::humanFileSize($item['size']) . ']<spam></p>';
			echo '<a href="' . $link . '">' . $link . '</a>';
			echo '<p  style="14px;">' . $l->t('shared by') . ' <strong>' . $item['uid_owner'] . '</strong> [' . OCP\Util::formatDate( $item['stime'] ) . ']</p>';
			echo '</li>' ;
		}


	?>

</ul>