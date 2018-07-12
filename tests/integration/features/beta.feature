Feature: Testing the update scenario of beta releases

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

  Scenario: Updating an outdated Nextcloud 10.0.0 on the beta channel with PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "9.1.0"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.8.zip"
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
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.8.zip"
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
    And Update to version "12.0.9.0" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.9.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    VJaOSKDB3j2w3NIt5ZZ7K0s4ZLjcISj/7GGAaRlqamRLOVI+KXonm3ij+x6Liejn
    8a//7H8p5gKb6SA//8xgcYscioSjaen9yprSY9Wcr4VxeG4VZCBnDDnwjy1CMd8o
    1JoRoJ7wFKaIzsp0n9YY7lKz2aOiYYAT43nFwcKbTTCy+bABPc8DQdKd76S62dlZ
    xFAWF0U1b4FrLbprTbFgK1IBvRxPz+/6VLIjv6Vw+HaNR1G0m0/Y5N9r6wkCxycQ
    16ioKnOJFQNKFpM4bOU1MVo9sOeIJ5P4xH8cR/jlOYRNiRNIg51oo0p7glnt8E+Z
    opffCkYONZh0uwZ6FFQtCA==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel without an mtime
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.9.0" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.9.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    VJaOSKDB3j2w3NIt5ZZ7K0s4ZLjcISj/7GGAaRlqamRLOVI+KXonm3ij+x6Liejn
    8a//7H8p5gKb6SA//8xgcYscioSjaen9yprSY9Wcr4VxeG4VZCBnDDnwjy1CMd8o
    1JoRoJ7wFKaIzsp0n9YY7lKz2aOiYYAT43nFwcKbTTCy+bABPc8DQdKd76S62dlZ
    xFAWF0U1b4FrLbprTbFgK1IBvRxPz+/6VLIjv6Vw+HaNR1G0m0/Y5N9r6wkCxycQ
    16ioKnOJFQNKFpM4bOU1MVo9sOeIJ5P4xH8cR/jlOYRNiRNIg51oo0p7glnt8E+Z
    opffCkYONZh0uwZ6FFQtCA==
    """

  Scenario: Updating an outdated Nextcloud 12.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.0.15"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.5.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.5RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    nMwQKM3o10/QnhEDEkGFwr6as5nD12y6IwpDiEnV0g26NW3RHzNMMUzdxuXNKkg6
    9Rpz+3h4joTcfN2lh+Qjq+aVSvzZXPf1uGIf9REElv/HbH4+9Ij4lVTLQNLLGEa4
    a0IrmOhMsaQMlxMViK7N9QFVpr5h04Pd/aQOwgMY5CjCgVNnjDMc8KG4k5e+Isv2
    Y0JVhfvIFqjBpzYlAHf2M9f0dvdV3X51dt+Q1Klb3YQcEhI1MMORr48VjGywYt59
    fL1D9tniHpN82JNfxx6MS5sB/k5415A9amKWXLq2McKZOPjMlY2BlKGvqZgX5n+P
    sy4zt0XUNzYH+idjQ/q10Q==
    """

  Scenario: Updating an up-to-date Nextcloud 12.0.7 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.7.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.5.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.5RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    nMwQKM3o10/QnhEDEkGFwr6as5nD12y6IwpDiEnV0g26NW3RHzNMMUzdxuXNKkg6
    9Rpz+3h4joTcfN2lh+Qjq+aVSvzZXPf1uGIf9REElv/HbH4+9Ij4lVTLQNLLGEa4
    a0IrmOhMsaQMlxMViK7N9QFVpr5h04Pd/aQOwgMY5CjCgVNnjDMc8KG4k5e+Isv2
    Y0JVhfvIFqjBpzYlAHf2M9f0dvdV3X51dt+Q1Klb3YQcEhI1MMORr48VjGywYt59
    fL1D9tniHpN82JNfxx6MS5sB/k5415A9amKWXLq2McKZOPjMlY2BlKGvqZgX5n+P
    sy4zt0XUNzYH+idjQ/q10Q==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.5.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.5RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    nMwQKM3o10/QnhEDEkGFwr6as5nD12y6IwpDiEnV0g26NW3RHzNMMUzdxuXNKkg6
    9Rpz+3h4joTcfN2lh+Qjq+aVSvzZXPf1uGIf9REElv/HbH4+9Ij4lVTLQNLLGEa4
    a0IrmOhMsaQMlxMViK7N9QFVpr5h04Pd/aQOwgMY5CjCgVNnjDMc8KG4k5e+Isv2
    Y0JVhfvIFqjBpzYlAHf2M9f0dvdV3X51dt+Q1Klb3YQcEhI1MMORr48VjGywYt59
    fL1D9tniHpN82JNfxx6MS5sB/k5415A9amKWXLq2McKZOPjMlY2BlKGvqZgX5n+P
    sy4zt0XUNzYH+idjQ/q10Q==
    """
