Feature: Manage Requests
  As a webssite admin
  I need to manage requests for vehicles

  Scenario: Go to Requests index page
    Given I am on "/request"
    Then I should see "Request list"

  Scenario: Go to New Request page
    Given I am on "/request/new"
    Then I should see "Request for a vehicle"

    

