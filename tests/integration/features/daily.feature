Feature: Testing the update scenario of daily releases

  Scenario: Updating an outdated Nextcloud 32 daily
    Given There is a release with channel "daily"
    And The received version is "32.1.0"
    And the received build is "2012-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-master.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/latest/admin_manual/maintenance/upgrade.html"
    And EOL date is set to ""
    And No signature is set

  Scenario: Updating an outdated Nextcloud 31 daily
    Given There is a release with channel "daily"
    And The received version is "31.1.0"
    And the received build is "2012-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable31.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/31/admin_manual/maintenance/upgrade.html"
    And EOL date is set to "2026-02-25"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 30 daily
    Given There is a release with channel "daily"
    And The received version is "30.1.0"
    And the received build is "2012-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable30.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/30/admin_manual/maintenance/upgrade.html"
    And EOL date is set to "2025-09-14"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 29 daily
    Given There is a release with channel "daily"
    And The received version is "29.1.0"
    And the received build is "2012-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable29.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/29/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 28 daily
    Given There is a release with channel "daily"
    And The received version is "28.1.0"
    And the received build is "2012-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable28.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/28/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 27 daily
    Given There is a release with channel "daily"
    And The received version is "27.1.0"
    And the received build is "2012-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable27.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 26 daily
    Given There is a release with channel "daily"
    And The received version is "26.1.0"
    And the received build is "2012-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable26.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/26/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 25 daily
    Given There is a release with channel "daily"
    And The received version is "25.1.0"
    And the received build is "2012-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable25.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/25/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 24 daily
    Given There is a release with channel "daily"
    And The received version is "24.1.0"
    And the received build is "2012-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable24.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/24/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 23 daily
    Given There is a release with channel "daily"
    And The received version is "23.1.0"
    And the received build is "2012-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable23.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/23/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 22 daily
    Given There is a release with channel "daily"
    And The received version is "22.1.0"
    And the received build is "2012-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable22.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/22/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
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
    And EOL is set to "1"
    And No signature is set

