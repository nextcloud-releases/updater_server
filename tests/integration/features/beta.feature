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
    And Update to version "12.0.8.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    biPXDdq3dyx8gEKDm8m1Xrn3z3hbdMGPXKI9wP4LdGNB7MKg1ityzKcI+o5DcDEi
    RsM07EYGjCECny2QpBKUWxx47F+A+nG7IkCgKMK+MIgL6zuu9e7xgxhQZoEi/pOh
    7a/Mk93Rk/rrXtRbhd8vOOfk8UN8lxMqduOG4L6B6kqswrIJiF7ZHZrSQdxItguw
    XO6OYtQ7qRvgcrjQxzsPsHKBrKVoxjiKDAv5z2zPjd6LlPkIVMg1go22rKzcs2ku
    uWLbkiq2HnMNY/3jj2U6xCXfvFbiD0O25OJeHseD3OOWNxteywnRnVKbJ2T97rHI
    Tqydle9UHEDLKR5ZboRuMQ==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel without an mtime
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.8.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    biPXDdq3dyx8gEKDm8m1Xrn3z3hbdMGPXKI9wP4LdGNB7MKg1ityzKcI+o5DcDEi
    RsM07EYGjCECny2QpBKUWxx47F+A+nG7IkCgKMK+MIgL6zuu9e7xgxhQZoEi/pOh
    7a/Mk93Rk/rrXtRbhd8vOOfk8UN8lxMqduOG4L6B6kqswrIJiF7ZHZrSQdxItguw
    XO6OYtQ7qRvgcrjQxzsPsHKBrKVoxjiKDAv5z2zPjd6LlPkIVMg1go22rKzcs2ku
    uWLbkiq2HnMNY/3jj2U6xCXfvFbiD0O25OJeHseD3OOWNxteywnRnVKbJ2T97rHI
    Tqydle9UHEDLKR5ZboRuMQ==
    """

  Scenario: Updating an outdated Nextcloud 12.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.0.15"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.3.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    gChiPrImbGhY1jTyVocuQDTKxvHE2bLjYfypKttt/x7+M+Dac254MTzxDrKj6rOL
    BH69fAzNlcyBx5z6rOQEhOfzsB829feg17vDMyKyzqBCXB1T0uzfmHTXoYe3178/
    lJuVvUxxb9IY9vZDn1+4RcpBW8rgkDw/cCXaCkgDGaPB66J3ZN5tWVNMgkPpgbZu
    uRnsX/E3NJrOIIi5xUTuV4sgiZAKkqNjwrxpRY2jsl70XADn4kEHI11MM8DJocfW
    ha+n7dtPBee5zNOR08IQ8jyGZxEjq74SWKPPf7Gb5zlw09H8y3HVWWEcZO0qydPr
    jyH7iWsIYoUb6x9PoDiGkQ==
    """

  Scenario: Updating an up-to-date Nextcloud 12.0.7 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.7.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.3.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    gChiPrImbGhY1jTyVocuQDTKxvHE2bLjYfypKttt/x7+M+Dac254MTzxDrKj6rOL
    BH69fAzNlcyBx5z6rOQEhOfzsB829feg17vDMyKyzqBCXB1T0uzfmHTXoYe3178/
    lJuVvUxxb9IY9vZDn1+4RcpBW8rgkDw/cCXaCkgDGaPB66J3ZN5tWVNMgkPpgbZu
    uRnsX/E3NJrOIIi5xUTuV4sgiZAKkqNjwrxpRY2jsl70XADn4kEHI11MM8DJocfW
    ha+n7dtPBee5zNOR08IQ8jyGZxEjq74SWKPPf7Gb5zlw09H8y3HVWWEcZO0qydPr
    jyH7iWsIYoUb6x9PoDiGkQ==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.3.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    gChiPrImbGhY1jTyVocuQDTKxvHE2bLjYfypKttt/x7+M+Dac254MTzxDrKj6rOL
    BH69fAzNlcyBx5z6rOQEhOfzsB829feg17vDMyKyzqBCXB1T0uzfmHTXoYe3178/
    lJuVvUxxb9IY9vZDn1+4RcpBW8rgkDw/cCXaCkgDGaPB66J3ZN5tWVNMgkPpgbZu
    uRnsX/E3NJrOIIi5xUTuV4sgiZAKkqNjwrxpRY2jsl70XADn4kEHI11MM8DJocfW
    ha+n7dtPBee5zNOR08IQ8jyGZxEjq74SWKPPf7Gb5zlw09H8y3HVWWEcZO0qydPr
    jyH7iWsIYoUb6x9PoDiGkQ==
    """
