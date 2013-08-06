<?php

$I = new WebGuy($scenario);
$I->wantTo('verify that admin user can log in');
$I->amOnPage('/login');
$I->fillField('username', 'admin123');
$I->fillField('password', 'pass123');
$I->click('Login');
$I->see('Logged in as admin123');