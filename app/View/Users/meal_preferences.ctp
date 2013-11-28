<?php
$dislikesTable = $this->element ( 'DislikesTable' );
echo $this->Html->div ( 'grid_12 table', $dislikesTable );

$favoritesTable = $this->element ( 'FavoritesTable' );
echo $this->Html->div ( 'grid_12 table', $favoritesTable );