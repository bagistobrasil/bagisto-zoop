<?php
use LevanteLab\Zoop\Payment\Zoop;
/** @var Zoop $zoop */
$zoop = app(Zoop::class);
$zoop->init();
$response = $zoop->send();
?>