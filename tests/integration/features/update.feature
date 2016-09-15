Feature: Testing the update scenario of releases
  # ownCloud 9.0 -> Nextcloud 9
  Scenario: Updating an outdated ownCloud 9.0.4 on the production channel
    Given There is a release with channel "production"
    And The received version is "9.0.4"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.0.53" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-9.0.53.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html"

  Scenario: Updating an outdated ownCloud 9.0.4 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "9.0.4"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.0.53" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-9.0.53.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html"

  Scenario: Updating an outdated ownCloud 9.0.4 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "9.0.4"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.0.53" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-9.0.53.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html"

  # Nextcloud 9
  Scenario: Updating an outdated Nextcloud 9.0.50 on the production channel
    Given There is a release with channel "production"
    And The received version is "9.0.50"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.0.53" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-9.0.53.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html"

  Scenario: Updating an outdated ownCloud 9.0.50 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "9.0.50"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.0.53" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-9.0.53.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html"

  Scenario: Updating an outdated ownCloud 9.0.50 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "9.0.50"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.0.53" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-9.0.53.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html"

  Scenario: Updating an up-to-date Nextcloud 9.0.53 on the production channel
    Given There is a release with channel "production"
    And The received version is "9.0.53"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.0" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-10.0.0.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"

  Scenario: Updating an up-to-date Nextcloud 9.0.53 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "9.0.53"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.0" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-10.0.0.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"

  Scenario: Updating an up-to-date Nextcloud 9.0.53 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "9.0.53"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.0" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-10.0.0.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"

  Scenario: Updating an up-to-date Nextcloud 9.1.0 on the production channel
    Given There is a release with channel "production"
    And The received version is "9.1.0"
    When The request is sent
    Then The response is empty

  Scenario: Updating an up-to-date Nextcloud 9.1.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "9.1.0"
    When The request is sent
    Then The response is empty

  Scenario: Updating an outdated Nextcloud 9.1.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "9.1.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.1RC1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-10.0.1RC1.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"

  Scenario: Updating an outdated Nextcloud 9.0 daily
    Given There is a release with channel "daily"
    And The received version is "9.0.100"
    And the received build is "2012-10-19T18:44:30+00:00%208ee2009de36e01a9866404f07722892f84c16e3e"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable9.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html"

  Scenario: Updating an up-to-date Nextcloud 9.0 daily
    Given There is a release with channel "daily"
    And The received version is "9.0.100"
    And the received build is "2019-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is empty
