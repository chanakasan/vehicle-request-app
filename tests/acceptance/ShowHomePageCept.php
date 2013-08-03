<?php

$I = new WebGuy($scenario);
$I->wantTo('verify that homepage contents can be displayed');
$I->amOnPage('/');
$I->see('Admin Section');
