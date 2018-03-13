Feature: Testing the update scenario of releases
  Scenario: Updating an outdated ownCloud 8.2.5 on the production channel
    Given There is a release with channel "production"
    And The received version is "8.2.5"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.0.58" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-9.0.58.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html"
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an outdated ownCloud 8.2.5 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "8.2.5"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.0.58" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-9.0.58.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html"
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an outdated ownCloud 8.2.5 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "8.2.5"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.0.58" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-9.0.58.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html"
    And EOL is set to "1"
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
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 9.0.50 on the production channel
    Given There is a release with channel "production"
    And The received version is "9.0.50"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 9.0.50 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "9.0.50"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 9.0.50 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "9.0.50"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 9.0.55 on the production channel
    Given There is a release with channel "production"
    And The received version is "9.0.55"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 9.0.55 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "9.0.55"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And EOL is set to "1"
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
    And EOL is set to "1"
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
    And EOL is set to "1"
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
    And EOL is set to "1"
    And URL to documentation is "https://nextcloud.com/outdated-php-5-4-5-5/"
    And EOL is set to "1"
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
    And EOL is set to "1"
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
    And Update to version "11.0.8.1" is available
    And URL to download is "https://nextcloud.com/outdated-php-5-4-5-5/"
    And EOL is set to "1"
    And URL to documentation is "https://nextcloud.com/outdated-php-5-4-5-5/"
    And EOL is set to "1"
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
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an up-to-date staged Nextcloud 10.0.6 with PHP 5.6 on the stable channel
    Given There is a release with channel "stable"
    And The received PHP version is "5.6.0"
    And the installation mtime is "60"
    And The received version is "9.1.6.1"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
    PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
    8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
    ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
    ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
    ZH1PxQilL7ihAvnOb2oU1Q==
    """

  Scenario: Updating an outdated Nextcloud 10.0.0 on the beta channel with PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "9.1.0"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
    PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
    8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
    ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
    ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
    ZH1PxQilL7ihAvnOb2oU1Q==
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
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 10.0.6 on the beta channel with PHP 5.4
    Given There is a release with channel "beta"
    And The received version is "9.1.6.1"
    And The received PHP version is "5.4.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.1" is available
    And URL to download is "https://nextcloud.com/outdated-php-5-4-5-5/"
    And URL to documentation is "https://nextcloud.com/outdated-php-5-4-5-5/"
    And EOL is set to "1"
    And No signature is set
    And Autoupdater is set to "0"

  Scenario: Updating an up-to-date Nextcloud 10.0.6 on the beta channel without sending PHP version
    Given There is a release with channel "beta"
    And The received version is "9.1.6.1"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.1" is available
    And URL to download is "https://nextcloud.com/outdated-php-5-4-5-5/"
    And URL to documentation is "https://nextcloud.com/outdated-php-5-4-5-5/"
    And EOL is set to "1"
    And No signature is set
    And Autoupdater is set to "0"

  Scenario: Updating an outdated Nextcloud 10.0.1 on the beta channel with PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "9.1.1.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
    PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
    8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
    ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
    ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
    ZH1PxQilL7ihAvnOb2oU1Q==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
    PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
    8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
    ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
    ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
    ZH1PxQilL7ihAvnOb2oU1Q==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel without an mtime
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
    PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
    8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
    ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
    ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
    ZH1PxQilL7ihAvnOb2oU1Q==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 stable without PHP version
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The installation mtime is "20"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
    PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
    8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
    ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
    ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
    ZH1PxQilL7ihAvnOb2oU1Q==
    """

  Scenario: Updating a staged outdated Nextcloud 11.0.0 stable without PHP version
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The installation mtime is "15"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
    PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
    8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
    ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
    ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
    ZH1PxQilL7ihAvnOb2oU1Q==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 production without PHP version
    Given There is a release with channel "production"
    And The received version is "11.0.0.2"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.5.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    N4ncV+GOn/DPTXUdmj/BH94vCxa4DpbsUI3fDM5HmW4kgVLZ6KTWKwsXVjG0Ec9z
    kkkhnJ+Hu4s21Y0w0Rs56tld3/9W+dsDw2CKsNCwBEuU3hwLj+7kckrNotOI7WDb
    GhhaUf0PKu5NisMBUBM8t+PZrR3+CvTkLOptrE6SiOtUvfs1qKTc/N93e8NNgSyS
    IAM/a0bj2SoROGohFjsWVEddHa39X2GD9T6lGULUR6TV5lGE9ODhsbsiITijUJVF
    O7rE5QeqzfSChkZ0/uP8OtrgRmBLE8PffZrsPPbFrAWaYPF7X3nZ66dzXO4PE7zl
    q6dAKP/WzDTOIWq0Tk2cFg==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the empty channel - will use the stable channel then
    Given There is a release with channel ""
    And The received version is "11.0.0.2"
    And the installation mtime is "20"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
    PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
    8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
    ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
    ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
    ZH1PxQilL7ihAvnOb2oU1Q==
    """

  Scenario: Updating an outdated Nextcloud 12.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.0.15"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    Brjtru6WbcguHL9npwnWnFudYdPXWh1GeeIIUjQ3X005twowP9UmEw0r1Gg58omy
    vSBKmyUOgT3ohBAKiqKm8Lrd4zLw6sWBHmNhwzfDPDDGQmZAF7ET4PeUwV9hQM3C
    pt0Ubp29GasnI5bRvFpbrigfcx3c8+/X9w4hLO55Ki0oERSFgbxGijRxxnwFHe9X
    PwPBWhrg2qD7MujuNFIINSvWy1ArV0uAgKbCKVcUpJVOqMGnp1YQ5wd4+nJHJhSf
    Kee2dk0x6/w//wT1focJxm+4pokAT2iGbh1LYR9jS7+UDeNXNJ5uqKlmMXayYG5O
    rfd8M6Q7rnKdCxtjfF95fQ==
    """

  Scenario: Updating an up-to-date Nextcloud 12.0.4 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.4.3"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    Brjtru6WbcguHL9npwnWnFudYdPXWh1GeeIIUjQ3X005twowP9UmEw0r1Gg58omy
    vSBKmyUOgT3ohBAKiqKm8Lrd4zLw6sWBHmNhwzfDPDDGQmZAF7ET4PeUwV9hQM3C
    pt0Ubp29GasnI5bRvFpbrigfcx3c8+/X9w4hLO55Ki0oERSFgbxGijRxxnwFHe9X
    PwPBWhrg2qD7MujuNFIINSvWy1ArV0uAgKbCKVcUpJVOqMGnp1YQ5wd4+nJHJhSf
    Kee2dk0x6/w//wT1focJxm+4pokAT2iGbh1LYR9jS7+UDeNXNJ5uqKlmMXayYG5O
    rfd8M6Q7rnKdCxtjfF95fQ==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.1.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    AG3egWHJkQaqCraVLiRq5Q7GvqArmBgVv8PNAfVYTOXPN6xWmw8cbUeBvBZ3OS1/
    bup1ktLDwTLDjWm1XMBUhhQCxVDLtEd3A6WfaVJz9BWoz1MyxUGlaIJSzTHLoEfz
    nFVUdoGH0mAdq8WtxRQSNwQWeKn+iF1jpbtIbDc29POtWvvzEgT/KW8MDzeidx6s
    W78tH4vldR0/aBn1D3hwnkQEQ8+Kz+Y4ItjHHi6XpJEfRQzYD0j9T+VTQ9IX4Xf/
    XqTrcaUCqwOlSC4pM7aUUzgaePPcYU2zrRDRaEgLma9eSkVMzkkc4kfM3izBG0Iv
    STb5hZFB2HMLyJxuj1l05w==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And The installation mtime is "20"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
    PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
    8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
    ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
    ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
    ZH1PxQilL7ihAvnOb2oU1Q==
    """

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.6.1"
    And The installation mtime is "20"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
    PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
    8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
    ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
    ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
    ZH1PxQilL7ihAvnOb2oU1Q==
    """

  Scenario: Updating an up-to-date Nextcloud 11.0.0 on the stable channel without mtime
    Given There is a release with channel "stable"
    And The received version is "11.0.6.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
    PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
    8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
    ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
    ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
    ZH1PxQilL7ihAvnOb2oU1Q==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the production channel
    Given There is a release with channel "production"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And The installation mtime is "70"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.5.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    N4ncV+GOn/DPTXUdmj/BH94vCxa4DpbsUI3fDM5HmW4kgVLZ6KTWKwsXVjG0Ec9z
    kkkhnJ+Hu4s21Y0w0Rs56tld3/9W+dsDw2CKsNCwBEuU3hwLj+7kckrNotOI7WDb
    GhhaUf0PKu5NisMBUBM8t+PZrR3+CvTkLOptrE6SiOtUvfs1qKTc/N93e8NNgSyS
    IAM/a0bj2SoROGohFjsWVEddHa39X2GD9T6lGULUR6TV5lGE9ODhsbsiITijUJVF
    O7rE5QeqzfSChkZ0/uP8OtrgRmBLE8PffZrsPPbFrAWaYPF7X3nZ66dzXO4PE7zl
    q6dAKP/WzDTOIWq0Tk2cFg==
    """

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.6 on the production channel with PHP 5.6
    Given There is a release with channel "production"
    And The received version is "11.0.6.1"
    And The received PHP version is "5.6.0"
    And The installation mtime is "70"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.5.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    N4ncV+GOn/DPTXUdmj/BH94vCxa4DpbsUI3fDM5HmW4kgVLZ6KTWKwsXVjG0Ec9z
    kkkhnJ+Hu4s21Y0w0Rs56tld3/9W+dsDw2CKsNCwBEuU3hwLj+7kckrNotOI7WDb
    GhhaUf0PKu5NisMBUBM8t+PZrR3+CvTkLOptrE6SiOtUvfs1qKTc/N93e8NNgSyS
    IAM/a0bj2SoROGohFjsWVEddHa39X2GD9T6lGULUR6TV5lGE9ODhsbsiITijUJVF
    O7rE5QeqzfSChkZ0/uP8OtrgRmBLE8PffZrsPPbFrAWaYPF7X3nZ66dzXO4PE7zl
    q6dAKP/WzDTOIWq0Tk2cFg==
    """

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.6 on the production channel with PHP 5.6 and lower mtime
    Given There is a release with channel "production"
    And The received version is "11.0.6.1"
    And The received PHP version is "5.6.0"
    And The installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.5.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    N4ncV+GOn/DPTXUdmj/BH94vCxa4DpbsUI3fDM5HmW4kgVLZ6KTWKwsXVjG0Ec9z
    kkkhnJ+Hu4s21Y0w0Rs56tld3/9W+dsDw2CKsNCwBEuU3hwLj+7kckrNotOI7WDb
    GhhaUf0PKu5NisMBUBM8t+PZrR3+CvTkLOptrE6SiOtUvfs1qKTc/N93e8NNgSyS
    IAM/a0bj2SoROGohFjsWVEddHa39X2GD9T6lGULUR6TV5lGE9ODhsbsiITijUJVF
    O7rE5QeqzfSChkZ0/uP8OtrgRmBLE8PffZrsPPbFrAWaYPF7X3nZ66dzXO4PE7zl
    q6dAKP/WzDTOIWq0Tk2cFg==
    """

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.6 on the production channel without PHP version
    Given There is a release with channel "production"
    And The received version is "11.0.6.1"
    And The installation mtime is "70"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.5.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    N4ncV+GOn/DPTXUdmj/BH94vCxa4DpbsUI3fDM5HmW4kgVLZ6KTWKwsXVjG0Ec9z
    kkkhnJ+Hu4s21Y0w0Rs56tld3/9W+dsDw2CKsNCwBEuU3hwLj+7kckrNotOI7WDb
    GhhaUf0PKu5NisMBUBM8t+PZrR3+CvTkLOptrE6SiOtUvfs1qKTc/N93e8NNgSyS
    IAM/a0bj2SoROGohFjsWVEddHa39X2GD9T6lGULUR6TV5lGE9ODhsbsiITijUJVF
    O7rE5QeqzfSChkZ0/uP8OtrgRmBLE8PffZrsPPbFrAWaYPF7X3nZ66dzXO4PE7zl
    q6dAKP/WzDTOIWq0Tk2cFg==
    """

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    Brjtru6WbcguHL9npwnWnFudYdPXWh1GeeIIUjQ3X005twowP9UmEw0r1Gg58omy
    vSBKmyUOgT3ohBAKiqKm8Lrd4zLw6sWBHmNhwzfDPDDGQmZAF7ET4PeUwV9hQM3C
    pt0Ubp29GasnI5bRvFpbrigfcx3c8+/X9w4hLO55Ki0oERSFgbxGijRxxnwFHe9X
    PwPBWhrg2qD7MujuNFIINSvWy1ArV0uAgKbCKVcUpJVOqMGnp1YQ5wd4+nJHJhSf
    Kee2dk0x6/w//wT1focJxm+4pokAT2iGbh1LYR9jS7+UDeNXNJ5uqKlmMXayYG5O
    rfd8M6Q7rnKdCxtjfF95fQ==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.4 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.4.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    Brjtru6WbcguHL9npwnWnFudYdPXWh1GeeIIUjQ3X005twowP9UmEw0r1Gg58omy
    vSBKmyUOgT3ohBAKiqKm8Lrd4zLw6sWBHmNhwzfDPDDGQmZAF7ET4PeUwV9hQM3C
    pt0Ubp29GasnI5bRvFpbrigfcx3c8+/X9w4hLO55Ki0oERSFgbxGijRxxnwFHe9X
    PwPBWhrg2qD7MujuNFIINSvWy1ArV0uAgKbCKVcUpJVOqMGnp1YQ5wd4+nJHJhSf
    Kee2dk0x6/w//wT1focJxm+4pokAT2iGbh1LYR9jS7+UDeNXNJ5uqKlmMXayYG5O
    rfd8M6Q7rnKdCxtjfF95fQ==
    """

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    Brjtru6WbcguHL9npwnWnFudYdPXWh1GeeIIUjQ3X005twowP9UmEw0r1Gg58omy
    vSBKmyUOgT3ohBAKiqKm8Lrd4zLw6sWBHmNhwzfDPDDGQmZAF7ET4PeUwV9hQM3C
    pt0Ubp29GasnI5bRvFpbrigfcx3c8+/X9w4hLO55Ki0oERSFgbxGijRxxnwFHe9X
    PwPBWhrg2qD7MujuNFIINSvWy1ArV0uAgKbCKVcUpJVOqMGnp1YQ5wd4+nJHJhSf
    Kee2dk0x6/w//wT1focJxm+4pokAT2iGbh1LYR9jS7+UDeNXNJ5uqKlmMXayYG5O
    rfd8M6Q7rnKdCxtjfF95fQ==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.5 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.5.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    Brjtru6WbcguHL9npwnWnFudYdPXWh1GeeIIUjQ3X005twowP9UmEw0r1Gg58omy
    vSBKmyUOgT3ohBAKiqKm8Lrd4zLw6sWBHmNhwzfDPDDGQmZAF7ET4PeUwV9hQM3C
    pt0Ubp29GasnI5bRvFpbrigfcx3c8+/X9w4hLO55Ki0oERSFgbxGijRxxnwFHe9X
    PwPBWhrg2qD7MujuNFIINSvWy1ArV0uAgKbCKVcUpJVOqMGnp1YQ5wd4+nJHJhSf
    Kee2dk0x6/w//wT1focJxm+4pokAT2iGbh1LYR9jS7+UDeNXNJ5uqKlmMXayYG5O
    rfd8M6Q7rnKdCxtjfF95fQ==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.5 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.5.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "65"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    Brjtru6WbcguHL9npwnWnFudYdPXWh1GeeIIUjQ3X005twowP9UmEw0r1Gg58omy
    vSBKmyUOgT3ohBAKiqKm8Lrd4zLw6sWBHmNhwzfDPDDGQmZAF7ET4PeUwV9hQM3C
    pt0Ubp29GasnI5bRvFpbrigfcx3c8+/X9w4hLO55Ki0oERSFgbxGijRxxnwFHe9X
    PwPBWhrg2qD7MujuNFIINSvWy1ArV0uAgKbCKVcUpJVOqMGnp1YQ5wd4+nJHJhSf
    Kee2dk0x6/w//wT1focJxm+4pokAT2iGbh1LYR9jS7+UDeNXNJ5uqKlmMXayYG5O
    rfd8M6Q7rnKdCxtjfF95fQ==
    """

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the production channel
    Given There is a release with channel "production"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.5.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    N4ncV+GOn/DPTXUdmj/BH94vCxa4DpbsUI3fDM5HmW4kgVLZ6KTWKwsXVjG0Ec9z
    kkkhnJ+Hu4s21Y0w0Rs56tld3/9W+dsDw2CKsNCwBEuU3hwLj+7kckrNotOI7WDb
    GhhaUf0PKu5NisMBUBM8t+PZrR3+CvTkLOptrE6SiOtUvfs1qKTc/N93e8NNgSyS
    IAM/a0bj2SoROGohFjsWVEddHa39X2GD9T6lGULUR6TV5lGE9ODhsbsiITijUJVF
    O7rE5QeqzfSChkZ0/uP8OtrgRmBLE8PffZrsPPbFrAWaYPF7X3nZ66dzXO4PE7zl
    q6dAKP/WzDTOIWq0Tk2cFg==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.6 on the production channel
    Given There is a release with channel "production"
    And The received version is "12.0.6.0"
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
    And EOL is set to "1"
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
    And EOL is set to "1"
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
    And EOL is set to "0"
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
    And EOL is set to "0"
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
    And EOL is set to "0"
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
    And EOL is set to "0"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 14.0 daily
    Given There is a release with channel "daily"
    And The received version is "14.0.100"
    And the received build is "2019-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is empty
