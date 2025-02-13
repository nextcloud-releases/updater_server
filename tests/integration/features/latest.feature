Feature: Testing the latest endpoint

  Scenario: Get latest stable version
    Given I want to know the latest stable release
    When I send a request latest.php
    Then The JSON response is non-empty
    And Version "30.0.5" is the latest release
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-30.0.5.zip"

  Scenario: Get latest beta version
    Given I want to know the latest beta release
    When I send a request latest.php
    Then The JSON response is non-empty
    And Version "31.0.0 RC4" is the latest release
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-31.0.0rc4.zip"

  Scenario: Get latest stable version with PHP 8.0
    Given I want to know the latest stable release
    And I use PHP "8.0"
    When I send a request latest.php
    Then The JSON response is non-empty
    And Version "29.0.11" is the latest release
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-29.0.11.zip"

  Scenario: Get latest beta version with PHP 8.0
    Given I want to know the latest beta release
    And I use PHP "8.0"
    When I send a request latest.php
    Then The JSON response is non-empty
    And Version "29.0.12 RC2" is the latest release
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-29.0.12rc2.zip"

  Scenario: Get latest version with invalid PHP version
    Given I want to know the latest beta release
    And I use PHP "test"
    When I send a request latest.php
    Then The JSON response is non-empty
    And I get error "Invalid PHP version provided"

  Scenario: Get latest version with too old PHP version
    Given I want to know the latest beta release
    And I use PHP "5.0"
    When I send a request latest.php
    Then The JSON response is non-empty
    And I get error "No major version found for your version of PHP"

  Scenario: Get latest version with invalid channel
    Given I want to know the latest whatever release
    When I send a request latest.php
    Then The JSON response is non-empty
    And I get error "Invalid channel provided"

