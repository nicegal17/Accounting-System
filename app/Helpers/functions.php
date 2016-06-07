<?php

function renderMenu() {
	return app('App\Libs\Navigation\Builder')->build()->render();
}
?>