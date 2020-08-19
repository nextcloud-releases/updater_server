Feature: Testing the update scenario of daily releases

  Scenario: Updating an outdated Nextcloud 19.0 daily
    Given There is a release with channel "daily"
    And The received version is "19.0.100"
    And the received build is "2012-10-19T18:44:30+00:00%208ee2009de36e01a9866404f07722892f84c16e3e"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable19.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 19.0 daily
    Given There is a release with channel "daily"
    And The received version is "19.0.100"
    And the received build is "2099-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is empty
