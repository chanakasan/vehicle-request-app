Feature: Manage details about vehicles
  As a webssite admin
  I need to manage details about vehicles

  Scenario: Go to Vehicles index page
    Given I am on "/vehicle"
    Then I should see "Vehicle list"
 
  Scenario: Go to Add New Vehicle page
    Given I am on "/vehicle/new"
    Then I should see "Vehicle Creation"

    

