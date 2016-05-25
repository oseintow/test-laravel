<?php

$I = new FunctionalTester($scenario);
$I->wantTo('register for a new account');

$I->amOnPage('/register');
$I->see('Register', 'h1');
$I->fillField('Email:', 'michael@gmail.com');
$I->fillField('Password:','1234');
$I->click('Register Now');

$I->canSeeCurrentUrlEquals('/login');
$I->see('You may now sign in!', '.flash');
$I->seeInDatabase('users',['email'=>'michael@gmail.com']);
