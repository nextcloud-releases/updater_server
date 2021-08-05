Feature: Testing the update scenario of daily releases

  Scenario: Updating an outdated Nextcloud 22 daily
    Given There is a release with channel "daily"
    And The received version is "22.1.0"
    And the received build is "2012-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable22.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/stable/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 21 daily
    Given There is a release with channel "daily"
    And The received version is "21.0.4"
    And the received build is "2012-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable21.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/21/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 19.0 daily
    Given There is a release with channel "daily"
    And The received version is "19.0.100"
    And the received build is "2099-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is empty
