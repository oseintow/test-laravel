<?php


class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }

    public function logsInUserWithProperCredentials(AcceptanceTester $I)
    {
        $I->am('Site Owner');
        $I->wantTo("Login to a password-protected area");
        $I->lookForwardTo("Perform administrative tasks");

        $I->amOnPage("/admin");
        $I->canSeeCurrentUrlEquals("/login");
        $I->fillField("email", "oseintow@gmail.com");
        $I->fillField("password","1234");
        $I->click("Login");
//
        $I->canSeeCurrentUrlEquals("/admin");
        $I->see("Admin Area", "h1");
    }

    public function loginWithInvalidCredentials(AcceptanceTester $I)
    {
        $I->amOnPage("/login");
        $I->click('Login');

        $I->canSeeCurrentUrlEquals("/login");
        $I->see('Invalid Credentials','.flash');
    }
}
