Feature: Admin user login
  As an registered admin user
  I want to login to the app
  In order to perform management tasks

  Scenario: Login successfully
    Given I am on "/login"
    When I fill in "username" with "panda"
    And I fill in "password" with "123"
    And I press "_submit"
    Then I should see "Logged in as panda"

