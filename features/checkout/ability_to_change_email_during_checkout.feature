@checkout
Feature: Changing email during checkout with registered email
    In order to change email during checkout
    As a customer
    I want to see email input field when im not logged in

    Background:
        Given the store operates on a single channel in "United States"
        And the store has a product "Mantis blade" priced at "$1200"
        And the store ships everywhere for free
        And the store allows paying offline
        And there is a customer "John Doe" identified by an email "john@example.com" and a password "secret"

    @ui
    Scenario: Seeing email input when i checkout as guest
        Given I have product "Mantis blade" in the cart
        When I complete addressing step with email "john@example.com" and "United States" based billing address
        Then I go to the addressing step
        And I should see email input

    @ui
    Scenario: Hiding email input when checking as logged used
        Given I am logged in as "john@example.com"
        And I have product "Mantis blade" in the cart
        And I should not see email input
