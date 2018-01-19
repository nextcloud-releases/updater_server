Feature: Testing the update scenario of releases
  Scenario: Updating an outdated ownCloud 8.2.5 on the production channel
    Given There is a release with channel "production"
    And The received version is "8.2.5"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.0.58" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-9.0.58.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an outdated ownCloud 8.2.5 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "8.2.5"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.0.58" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-9.0.58.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set
    
  Scenario: Updating an outdated ownCloud 8.2.5 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "8.2.5"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.0.58" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-9.0.58.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an outdated ownCloud 8.2.5 on the daily channel
    Given There is a release with channel "daily"
    And The received version is "8.2.5"
    And the received build is "2012-10-19T18:44:30+00:00%208ee2009de36e01a9866404f07722892f84c16e3e"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable9.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 9.0.50 on the production channel
    Given There is a release with channel "production"
    And The received version is "9.0.50"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 9.0.50 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "9.0.50"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 9.0.50 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "9.0.50"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 9.0.55 on the production channel
    Given There is a release with channel "production"
    And The received version is "9.0.55"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 9.0.55 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "9.0.55"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an outdated staged Nextcloud 10.0.3 with PHP 5.4 on the production channel
    Given There is a release with channel "production"
    And The received PHP version is "5.4.0"
    And the installation mtime is "60"
    And The received version is "9.1.0.2"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 10.0.3 with PHP 5.6 and no mtime on the production channel
    Given There is a release with channel "production"
    And The received PHP version is "5.6.0"
    And The received version is "9.1.0.2"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    OaNjted6Hw/rpiE07lbWTCRgePzWO970h3/I2wRyXwctlYv5BKdFBF7Q2L6BG3ml
    alihAAjVXU9kxK/YL40ZIK7MW2RwIXTOnNSzXbi4VqpX11UhshVvRqsR+xubg0jI
    8aa1ahICZaezkfW32AdIOVmVxTfz7JOrxKEq1fg5/4n5z0J5jyBKkx2a2ZVLaMLO
    Fs4ECJ2ntpMtD4+2X0V4TXNZN3LPpDHE5vwTBHcJr52R0+s96731FYRUGesGmsHb
    xG0LjsK2vZOV4ZHT3tZPHGUV1Nrpfj5LIuCyPgn0w+XqTBm+AuF1W5MsgtDq0GOo
    /l4U06AGoCaWHiYAKXbHGg==
    """

  Scenario: Updating an up-to-date staged Nextcloud 10.0.6 with PHP 5.4 on the production channel
    Given There is a release with channel "production"
    And The received PHP version is "5.4.0"
    And the installation mtime is "60"
    And The received version is "9.1.6.1"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.6.1" is available
    And URL to download is "https://nextcloud.com/outdated-php-5-4-5-5/"
    And URL to documentation is "https://nextcloud.com/outdated-php-5-4-5-5/"
    And No signature is set
    And Autoupdater is set to "0"

  Scenario: Updating an up-to-date staged Nextcloud 10.0.6 with PHP 5.6 on the production channel
    Given There is a release with channel "production"
    And The received PHP version is "5.6.0"
    And the installation mtime is "60"
    And The received version is "9.1.6.1"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    OaNjted6Hw/rpiE07lbWTCRgePzWO970h3/I2wRyXwctlYv5BKdFBF7Q2L6BG3ml
    alihAAjVXU9kxK/YL40ZIK7MW2RwIXTOnNSzXbi4VqpX11UhshVvRqsR+xubg0jI
    8aa1ahICZaezkfW32AdIOVmVxTfz7JOrxKEq1fg5/4n5z0J5jyBKkx2a2ZVLaMLO
    Fs4ECJ2ntpMtD4+2X0V4TXNZN3LPpDHE5vwTBHcJr52R0+s96731FYRUGesGmsHb
    xG0LjsK2vZOV4ZHT3tZPHGUV1Nrpfj5LIuCyPgn0w+XqTBm+AuF1W5MsgtDq0GOo
    /l4U06AGoCaWHiYAKXbHGg==
    """

  Scenario: Updating an up-to-date staged Nextcloud 10.0.6 with PHP 5.4 on the stable channel
    Given There is a release with channel "stable"
    And The received PHP version is "5.4.0"
    And the installation mtime is "60"
    And The received version is "9.1.6.1"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.6.1" is available
    And URL to download is "https://nextcloud.com/outdated-php-5-4-5-5/"
    And URL to documentation is "https://nextcloud.com/outdated-php-5-4-5-5/"
    And No signature is set
    And Autoupdater is set to "0"

  Scenario: Updating an outdated Nextcloud 10.0.2 on the stable channel without PHP version
    Given There is a release with channel "stable"
    And The received version is "9.1.2.0"
    When The request is sent
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date staged Nextcloud 10.0.6 with PHP 5.6 on the stable channel
    Given There is a release with channel "stable"
    And The received PHP version is "5.6.0"
    And the installation mtime is "60"
    And The received version is "9.1.6.1"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    OaNjted6Hw/rpiE07lbWTCRgePzWO970h3/I2wRyXwctlYv5BKdFBF7Q2L6BG3ml
    alihAAjVXU9kxK/YL40ZIK7MW2RwIXTOnNSzXbi4VqpX11UhshVvRqsR+xubg0jI
    8aa1ahICZaezkfW32AdIOVmVxTfz7JOrxKEq1fg5/4n5z0J5jyBKkx2a2ZVLaMLO
    Fs4ECJ2ntpMtD4+2X0V4TXNZN3LPpDHE5vwTBHcJr52R0+s96731FYRUGesGmsHb
    xG0LjsK2vZOV4ZHT3tZPHGUV1Nrpfj5LIuCyPgn0w+XqTBm+AuF1W5MsgtDq0GOo
    /l4U06AGoCaWHiYAKXbHGg==
    """

  Scenario: Updating an outdated Nextcloud 10.0.0 on the beta channel with PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "9.1.0"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.7RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    X5rOHn9UJ0d78t1iiPbhm2DlXfEbd6A++YNPCwGoSBLBrJpLqoS2JBY7sjN5sZ+W
    Skp7zu55p4NJZ31xAvsf3/ZmD7Nh17+Jq0PFvd97fEEn+mrT6adLBx9LHN4+Oyjz
    8QXg0Pqj4Xs41EcvjkWVkqW2pK9IGoHC7j26D3k5NlqAHSIe4LeRg6QZgoyKtZPF
    aUDRK+VfWRD8mu/hFk1CWfLCI3t0PSxYJ+C3j6L+6XPYYw4+oF/9qSm6Gki8qOcn
    anPxbDr32MKDUgO4opS/KeSQtaNokhLjz25Crq9mtk60qcVDpcaNuGjgMTTGphpj
    Ql8peu2DgUjoFYzF5YiIpg==
    """

  Scenario: Updating an outdated Nextcloud 10.0.0 on the beta channel with PHP 5.4 will receive the latest compatible release
    Given There is a release with channel "beta"
    And The received version is "9.1.0"
    And The received PHP version is "5.4.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 10.0.6 on the beta channel with PHP 5.4
    Given There is a release with channel "beta"
    And The received version is "9.1.6.1"
    And The received PHP version is "5.4.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.6.1" is available
    And URL to download is "https://nextcloud.com/outdated-php-5-4-5-5/"
    And URL to documentation is "https://nextcloud.com/outdated-php-5-4-5-5/"
    And No signature is set
    And Autoupdater is set to "0"

  Scenario: Updating an up-to-date Nextcloud 10.0.6 on the beta channel without sending PHP version
    Given There is a release with channel "beta"
    And The received version is "9.1.6.1"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.6.1" is available
    And URL to download is "https://nextcloud.com/outdated-php-5-4-5-5/"
    And URL to documentation is "https://nextcloud.com/outdated-php-5-4-5-5/"
    And No signature is set
    And Autoupdater is set to "0"

  Scenario: Updating an outdated Nextcloud 10.0.1 on the beta channel with PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "9.1.1.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.7RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    X5rOHn9UJ0d78t1iiPbhm2DlXfEbd6A++YNPCwGoSBLBrJpLqoS2JBY7sjN5sZ+W
    Skp7zu55p4NJZ31xAvsf3/ZmD7Nh17+Jq0PFvd97fEEn+mrT6adLBx9LHN4+Oyjz
    8QXg0Pqj4Xs41EcvjkWVkqW2pK9IGoHC7j26D3k5NlqAHSIe4LeRg6QZgoyKtZPF
    aUDRK+VfWRD8mu/hFk1CWfLCI3t0PSxYJ+C3j6L+6XPYYw4+oF/9qSm6Gki8qOcn
    anPxbDr32MKDUgO4opS/KeSQtaNokhLjz25Crq9mtk60qcVDpcaNuGjgMTTGphpj
    Ql8peu2DgUjoFYzF5YiIpg==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.7RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    X5rOHn9UJ0d78t1iiPbhm2DlXfEbd6A++YNPCwGoSBLBrJpLqoS2JBY7sjN5sZ+W
    Skp7zu55p4NJZ31xAvsf3/ZmD7Nh17+Jq0PFvd97fEEn+mrT6adLBx9LHN4+Oyjz
    8QXg0Pqj4Xs41EcvjkWVkqW2pK9IGoHC7j26D3k5NlqAHSIe4LeRg6QZgoyKtZPF
    aUDRK+VfWRD8mu/hFk1CWfLCI3t0PSxYJ+C3j6L+6XPYYw4+oF/9qSm6Gki8qOcn
    anPxbDr32MKDUgO4opS/KeSQtaNokhLjz25Crq9mtk60qcVDpcaNuGjgMTTGphpj
    Ql8peu2DgUjoFYzF5YiIpg==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel without an mtime
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.7RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    X5rOHn9UJ0d78t1iiPbhm2DlXfEbd6A++YNPCwGoSBLBrJpLqoS2JBY7sjN5sZ+W
    Skp7zu55p4NJZ31xAvsf3/ZmD7Nh17+Jq0PFvd97fEEn+mrT6adLBx9LHN4+Oyjz
    8QXg0Pqj4Xs41EcvjkWVkqW2pK9IGoHC7j26D3k5NlqAHSIe4LeRg6QZgoyKtZPF
    aUDRK+VfWRD8mu/hFk1CWfLCI3t0PSxYJ+C3j6L+6XPYYw4+oF/9qSm6Gki8qOcn
    anPxbDr32MKDUgO4opS/KeSQtaNokhLjz25Crq9mtk60qcVDpcaNuGjgMTTGphpj
    Ql8peu2DgUjoFYzF5YiIpg==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 stable without PHP version
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The installation mtime is "20"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.4.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    pdpExf2i5sgwNzkP7fcOKWBcMoZzsSe8PwjZYYi0ZFlUqayQMnlVqmZ0Lc/hBWg/
    AAuiH+WViv/dHfxECMlcHTVBFABCn8qqHlfllfEoLVGI2V3GoOOYdij72N5pFm3Z
    8A8ccUEHso3QjdhiwcofSyJ5vxWdJZvruNIdW9M+UfW3Sm98HYoirRUEdvEBKJzZ
    OOkWI1NexeTzPBErQneNvI1iXl5LSV9Ert4HfIVkMA8Wfpvt8X6tH7G5pGpBrky3
    nc4UiS2SHl724076KdRNT3amt3XvhkSs6WukH6hAxiWIvygBVRYbAE2tUW+7UPoh
    1lfbqYRCWrhsrulksMda/A==
    """

  Scenario: Updating a staged outdated Nextcloud 11.0.0 stable without PHP version
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The installation mtime is "15"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.4.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    pdpExf2i5sgwNzkP7fcOKWBcMoZzsSe8PwjZYYi0ZFlUqayQMnlVqmZ0Lc/hBWg/
    AAuiH+WViv/dHfxECMlcHTVBFABCn8qqHlfllfEoLVGI2V3GoOOYdij72N5pFm3Z
    8A8ccUEHso3QjdhiwcofSyJ5vxWdJZvruNIdW9M+UfW3Sm98HYoirRUEdvEBKJzZ
    OOkWI1NexeTzPBErQneNvI1iXl5LSV9Ert4HfIVkMA8Wfpvt8X6tH7G5pGpBrky3
    nc4UiS2SHl724076KdRNT3amt3XvhkSs6WukH6hAxiWIvygBVRYbAE2tUW+7UPoh
    1lfbqYRCWrhsrulksMda/A==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 production without PHP version
    Given There is a release with channel "production"
    And The received version is "11.0.0.2"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.4.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    pdpExf2i5sgwNzkP7fcOKWBcMoZzsSe8PwjZYYi0ZFlUqayQMnlVqmZ0Lc/hBWg/
    AAuiH+WViv/dHfxECMlcHTVBFABCn8qqHlfllfEoLVGI2V3GoOOYdij72N5pFm3Z
    8A8ccUEHso3QjdhiwcofSyJ5vxWdJZvruNIdW9M+UfW3Sm98HYoirRUEdvEBKJzZ
    OOkWI1NexeTzPBErQneNvI1iXl5LSV9Ert4HfIVkMA8Wfpvt8X6tH7G5pGpBrky3
    nc4UiS2SHl724076KdRNT3amt3XvhkSs6WukH6hAxiWIvygBVRYbAE2tUW+7UPoh
    1lfbqYRCWrhsrulksMda/A==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the empty channel - will use the stable channel then
    Given There is a release with channel ""
    And The received version is "11.0.0.2"
    And the installation mtime is "20"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.4.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    pdpExf2i5sgwNzkP7fcOKWBcMoZzsSe8PwjZYYi0ZFlUqayQMnlVqmZ0Lc/hBWg/
    AAuiH+WViv/dHfxECMlcHTVBFABCn8qqHlfllfEoLVGI2V3GoOOYdij72N5pFm3Z
    8A8ccUEHso3QjdhiwcofSyJ5vxWdJZvruNIdW9M+UfW3Sm98HYoirRUEdvEBKJzZ
    OOkWI1NexeTzPBErQneNvI1iXl5LSV9Ert4HfIVkMA8Wfpvt8X6tH7G5pGpBrky3
    nc4UiS2SHl724076KdRNT3amt3XvhkSs6WukH6hAxiWIvygBVRYbAE2tUW+7UPoh
    1lfbqYRCWrhsrulksMda/A==
    """

  Scenario: Updating an outdated Nextcloud 12.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.0.15"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.5.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.5RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    giCuXP8BjgzJPgRyNVCE5GdQPGMHQArQ2aW6EThT4NuxggmZUrl+3v7ZE0NdcDHM
    TvQ0BUGBWRjGCQSK35Pl5yjMrraGWRIhHMkyMdY076zdLhWGLrQGJXpGhf9MQ4rS
    whKtqB+ZID2ipAuVDEWZsJKUypBlF7XpSnkHPPfU6i/d4f+mhXj3ZTXOKgGBYH2N
    QsX2MT2LFFggjqYqNewcNlfDYz30KNzJINcYBhy8VtLShP1/lxj/Z+wuGOYjFdHZ
    Irs0S1UWs1QlqsurdJf7NwC5+TOqsZ8F3JvKYvcOZKcQiQfsM7KRZobXlu3d9vhC
    7vZDXl3nnu/Dq78GrhEFIw==
    """

  Scenario: Updating an up-to-date Nextcloud 12.0.4 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.4.3"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.5.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.5RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    giCuXP8BjgzJPgRyNVCE5GdQPGMHQArQ2aW6EThT4NuxggmZUrl+3v7ZE0NdcDHM
    TvQ0BUGBWRjGCQSK35Pl5yjMrraGWRIhHMkyMdY076zdLhWGLrQGJXpGhf9MQ4rS
    whKtqB+ZID2ipAuVDEWZsJKUypBlF7XpSnkHPPfU6i/d4f+mhXj3ZTXOKgGBYH2N
    QsX2MT2LFFggjqYqNewcNlfDYz30KNzJINcYBhy8VtLShP1/lxj/Z+wuGOYjFdHZ
    Irs0S1UWs1QlqsurdJf7NwC5+TOqsZ8F3JvKYvcOZKcQiQfsM7KRZobXlu3d9vhC
    7vZDXl3nnu/Dq78GrhEFIw==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.0.11" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.0RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    Nr+b4svVD6Y//JQKMiRn/VSYZrTlPpdQ+3oOYVR1VFrc9ZZr0SIV9/VxDHL6prbT
    GRGSiMNBogq+mj12KC243w7TBOBT5x3zlEhbysHuNScAsKeAMf5dRlUFBb7klMEr
    9gw+Q6B57XsVHT4lxEDgLrOVsQxuuXX39tVYZi4H+Abob/VBXnBwwFXgBYKUahkx
    k8ZZNFeeXmvbIq4VcUoe3yg+dC7OpfVh6rEvlMlDLumGxk4Ht9gMP2fNeQvqOhib
    oxxOER2kH0ATEBCOsVHSMBruViAkjltOBPCSoZY+j+ggjj9wjBEjbetGepXkSgtI
    3N03uA/njV2Yx08qBHk+JQ==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And The installation mtime is "20"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.4.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    pdpExf2i5sgwNzkP7fcOKWBcMoZzsSe8PwjZYYi0ZFlUqayQMnlVqmZ0Lc/hBWg/
    AAuiH+WViv/dHfxECMlcHTVBFABCn8qqHlfllfEoLVGI2V3GoOOYdij72N5pFm3Z
    8A8ccUEHso3QjdhiwcofSyJ5vxWdJZvruNIdW9M+UfW3Sm98HYoirRUEdvEBKJzZ
    OOkWI1NexeTzPBErQneNvI1iXl5LSV9Ert4HfIVkMA8Wfpvt8X6tH7G5pGpBrky3
    nc4UiS2SHl724076KdRNT3amt3XvhkSs6WukH6hAxiWIvygBVRYbAE2tUW+7UPoh
    1lfbqYRCWrhsrulksMda/A==
    """

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.6.1"
    And The installation mtime is "20"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.4.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    pdpExf2i5sgwNzkP7fcOKWBcMoZzsSe8PwjZYYi0ZFlUqayQMnlVqmZ0Lc/hBWg/
    AAuiH+WViv/dHfxECMlcHTVBFABCn8qqHlfllfEoLVGI2V3GoOOYdij72N5pFm3Z
    8A8ccUEHso3QjdhiwcofSyJ5vxWdJZvruNIdW9M+UfW3Sm98HYoirRUEdvEBKJzZ
    OOkWI1NexeTzPBErQneNvI1iXl5LSV9Ert4HfIVkMA8Wfpvt8X6tH7G5pGpBrky3
    nc4UiS2SHl724076KdRNT3amt3XvhkSs6WukH6hAxiWIvygBVRYbAE2tUW+7UPoh
    1lfbqYRCWrhsrulksMda/A==
    """

  Scenario: Updating an up-to-date Nextcloud 11.0.0 on the stable channel without mtime
    Given There is a release with channel "stable"
    And The received version is "11.0.6.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.4.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    pdpExf2i5sgwNzkP7fcOKWBcMoZzsSe8PwjZYYi0ZFlUqayQMnlVqmZ0Lc/hBWg/
    AAuiH+WViv/dHfxECMlcHTVBFABCn8qqHlfllfEoLVGI2V3GoOOYdij72N5pFm3Z
    8A8ccUEHso3QjdhiwcofSyJ5vxWdJZvruNIdW9M+UfW3Sm98HYoirRUEdvEBKJzZ
    OOkWI1NexeTzPBErQneNvI1iXl5LSV9Ert4HfIVkMA8Wfpvt8X6tH7G5pGpBrky3
    nc4UiS2SHl724076KdRNT3amt3XvhkSs6WukH6hAxiWIvygBVRYbAE2tUW+7UPoh
    1lfbqYRCWrhsrulksMda/A==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the production channel
    Given There is a release with channel "production"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And The installation mtime is "20"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    OaNjted6Hw/rpiE07lbWTCRgePzWO970h3/I2wRyXwctlYv5BKdFBF7Q2L6BG3ml
    alihAAjVXU9kxK/YL40ZIK7MW2RwIXTOnNSzXbi4VqpX11UhshVvRqsR+xubg0jI
    8aa1ahICZaezkfW32AdIOVmVxTfz7JOrxKEq1fg5/4n5z0J5jyBKkx2a2ZVLaMLO
    Fs4ECJ2ntpMtD4+2X0V4TXNZN3LPpDHE5vwTBHcJr52R0+s96731FYRUGesGmsHb
    xG0LjsK2vZOV4ZHT3tZPHGUV1Nrpfj5LIuCyPgn0w+XqTBm+AuF1W5MsgtDq0GOo
    /l4U06AGoCaWHiYAKXbHGg==
    """

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.6 on the production channel with PHP 5.6
    Given There is a release with channel "production"
    And The received version is "11.0.6.1"
    And The received PHP version is "5.6.0"
    And The installation mtime is "20"
    When The request is sent
    Then The response is empty

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.6 on the production channel with PHP 5.6 and lower mtime
    Given There is a release with channel "production"
    And The received version is "11.0.6.1"
    And The received PHP version is "5.6.0"
    And The installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.4.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    pdpExf2i5sgwNzkP7fcOKWBcMoZzsSe8PwjZYYi0ZFlUqayQMnlVqmZ0Lc/hBWg/
    AAuiH+WViv/dHfxECMlcHTVBFABCn8qqHlfllfEoLVGI2V3GoOOYdij72N5pFm3Z
    8A8ccUEHso3QjdhiwcofSyJ5vxWdJZvruNIdW9M+UfW3Sm98HYoirRUEdvEBKJzZ
    OOkWI1NexeTzPBErQneNvI1iXl5LSV9Ert4HfIVkMA8Wfpvt8X6tH7G5pGpBrky3
    nc4UiS2SHl724076KdRNT3amt3XvhkSs6WukH6hAxiWIvygBVRYbAE2tUW+7UPoh
    1lfbqYRCWrhsrulksMda/A==
    """

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.6 on the production channel without PHP version
    Given There is a release with channel "production"
    And The received version is "11.0.6.1"
    And The installation mtime is "20"
    When The request is sent
    Then The response is empty

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.5.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.5RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    giCuXP8BjgzJPgRyNVCE5GdQPGMHQArQ2aW6EThT4NuxggmZUrl+3v7ZE0NdcDHM
    TvQ0BUGBWRjGCQSK35Pl5yjMrraGWRIhHMkyMdY076zdLhWGLrQGJXpGhf9MQ4rS
    whKtqB+ZID2ipAuVDEWZsJKUypBlF7XpSnkHPPfU6i/d4f+mhXj3ZTXOKgGBYH2N
    QsX2MT2LFFggjqYqNewcNlfDYz30KNzJINcYBhy8VtLShP1/lxj/Z+wuGOYjFdHZ
    Irs0S1UWs1QlqsurdJf7NwC5+TOqsZ8F3JvKYvcOZKcQiQfsM7KRZobXlu3d9vhC
    7vZDXl3nnu/Dq78GrhEFIw==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.4 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.4.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.5.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.5RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    giCuXP8BjgzJPgRyNVCE5GdQPGMHQArQ2aW6EThT4NuxggmZUrl+3v7ZE0NdcDHM
    TvQ0BUGBWRjGCQSK35Pl5yjMrraGWRIhHMkyMdY076zdLhWGLrQGJXpGhf9MQ4rS
    whKtqB+ZID2ipAuVDEWZsJKUypBlF7XpSnkHPPfU6i/d4f+mhXj3ZTXOKgGBYH2N
    QsX2MT2LFFggjqYqNewcNlfDYz30KNzJINcYBhy8VtLShP1/lxj/Z+wuGOYjFdHZ
    Irs0S1UWs1QlqsurdJf7NwC5+TOqsZ8F3JvKYvcOZKcQiQfsM7KRZobXlu3d9vhC
    7vZDXl3nnu/Dq78GrhEFIw==
    """

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.4.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    pdpExf2i5sgwNzkP7fcOKWBcMoZzsSe8PwjZYYi0ZFlUqayQMnlVqmZ0Lc/hBWg/
    AAuiH+WViv/dHfxECMlcHTVBFABCn8qqHlfllfEoLVGI2V3GoOOYdij72N5pFm3Z
    8A8ccUEHso3QjdhiwcofSyJ5vxWdJZvruNIdW9M+UfW3Sm98HYoirRUEdvEBKJzZ
    OOkWI1NexeTzPBErQneNvI1iXl5LSV9Ert4HfIVkMA8Wfpvt8X6tH7G5pGpBrky3
    nc4UiS2SHl724076KdRNT3amt3XvhkSs6WukH6hAxiWIvygBVRYbAE2tUW+7UPoh
    1lfbqYRCWrhsrulksMda/A==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.4 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.4.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is empty

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the production channel
    Given There is a release with channel "production"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.4.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    pdpExf2i5sgwNzkP7fcOKWBcMoZzsSe8PwjZYYi0ZFlUqayQMnlVqmZ0Lc/hBWg/
    AAuiH+WViv/dHfxECMlcHTVBFABCn8qqHlfllfEoLVGI2V3GoOOYdij72N5pFm3Z
    8A8ccUEHso3QjdhiwcofSyJ5vxWdJZvruNIdW9M+UfW3Sm98HYoirRUEdvEBKJzZ
    OOkWI1NexeTzPBErQneNvI1iXl5LSV9Ert4HfIVkMA8Wfpvt8X6tH7G5pGpBrky3
    nc4UiS2SHl724076KdRNT3amt3XvhkSs6WukH6hAxiWIvygBVRYbAE2tUW+7UPoh
    1lfbqYRCWrhsrulksMda/A==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.4 beta on the production channel
    Given There is a release with channel "production"
    And The received version is "12.0.4.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is empty

  Scenario: Updating an outdated Nextcloud 9.0 daily
    Given There is a release with channel "daily"
    And The received version is "9.0.100"
    And the received build is "2012-10-19T18:44:30+00:00%208ee2009de36e01a9866404f07722892f84c16e3e"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable9.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 9.0 daily
    Given There is a release with channel "daily"
    And The received version is "9.0.100"
    And the received build is "2019-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is empty

  Scenario: Updating an outdated Nextcloud 10.0 daily
    Given There is a release with channel "daily"
    And The received version is "9.1.100"
    And the received build is "2012-10-19T18:44:30+00:00%208ee2009de36e01a9866404f07722892f84c16e3e"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable10.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 10.0 daily
    Given There is a release with channel "daily"
    And The received version is "9.1.100"
    And the received build is "2019-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is empty

  Scenario: Updating an outdated Nextcloud 11.0 daily
    Given There is a release with channel "daily"
    And The received version is "11.0.100"
    And the received build is "2012-10-19T18:44:30+00:00%208ee2009de36e01a9866404f07722892f84c16e3e"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable11.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 11.0 daily
    Given There is a release with channel "daily"
    And The received version is "11.0.100"
    And the received build is "2019-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is empty

  Scenario: Updating an outdated Nextcloud 12.0 daily
    Given There is a release with channel "daily"
    And The received version is "12.0.100"
    And the received build is "2012-10-19T18:44:30+00:00%208ee2009de36e01a9866404f07722892f84c16e3e"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 12.0 daily
    Given There is a release with channel "daily"
    And The received version is "12.0.100"
    And the received build is "2019-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is empty

  Scenario: Updating an outdated Nextcloud 13.0 daily
    Given There is a release with channel "daily"
    And The received version is "13.0.100"
    And the received build is "2012-10-19T18:44:30+00:00%208ee2009de36e01a9866404f07722892f84c16e3e"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-stable13.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 13.0 daily
    Given There is a release with channel "daily"
    And The received version is "13.0.100"
    And the received build is "2019-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is empty

  Scenario: Updating an outdated Nextcloud 14.0 daily
    Given There is a release with channel "daily"
    And The received version is "14.0.100"
    And the received build is "2012-10-19T18:44:30+00:00%208ee2009de36e01a9866404f07722892f84c16e3e"
    When The request is sent
    Then The response is non-empty
    And Update to version "100.0.0.0" is available
    And URL to download is "https://download.nextcloud.com/server/daily/latest-master.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 14.0 daily
    Given There is a release with channel "daily"
    And The received version is "14.0.100"
    And the received build is "2019-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is empty
