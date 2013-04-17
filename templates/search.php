
<div id="controls">
    <form id="view" href="javascript:void('')">
        <label for="search_pattern"><?php echo $l->t('Search Pattern').":";?></label><input type="text" id="search_pattern">
        <div class="separator"></div>
        <input type="button" value="<?php echo " ".$l->t('Search')." ";?>" id="search_button"/>
    </form>
</div>

<div id="search_result">
	<?php
	    echo $this->inc('search_result');
	?>
</div>