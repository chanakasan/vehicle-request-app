  Feature: Admin user login
  As an registered admin user
  I want to login to the app
  In order to perform management tasks

  //@javascript
  Scenario: Login successfully
    Given I am on "/"
    When I follow "login"
    And I fill in "username" with "panda01"
    And I fill in "password" with "pass123"
    And I press "_submit"
    Then I should see "Logged in as panda01"

