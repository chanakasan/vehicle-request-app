<?php

$I = new WebGuy($scenario);
$I->wantTo('verify that an employee can make a request');
$I->amOnPage('/request/new');
$I->see('New vehicle reservation request');

$I->selectOption('request_journey_type_1', 'single');
$I->fillField('request_pickup_loc', 'Kollupitiya');
$I->fillField('request_pickup_time_datepicker', '2013-07-15');
$I->fillField('request_pickup_time_timepicker', '14:45');
$I->fillField('request_destination', 'Colombo 10');
$I->selectOption('request_vtype', '4-passenger-sedan');
$I->fillField('request_purpose', 'Conference');

$I->click('Send Request');
$I->see('Thank you! for using our App');