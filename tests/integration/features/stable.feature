Feature: Testing the update scenario of stable releases

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

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 stable without PHP version
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The installation mtime is "20"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    d5mcL7Smk1aebH1MVRs0pWY00bq6JUIamsRVpd/uxYOeKi5z9nwhv2Ot8KfiI41S
    1mLCjZwalyJlkon+zdPgolgwT9cUiKNLLpjNCeaC46/RWUlct+8hvPq6DxiTVEkb
    k/gDAbrWBI4VtjH11b1ecSXvTGCt9zywcyl4uCeN16waz4CIcYi22/jixzdEQihj
    381raoX5ygW8Rlfpv1SwKwM1C2xYGrzsbdP34TJojw8vjNrBVus+cM3H5ZFvHRPC
    Wu+KPsSxdkQeVph+/ukn0tQoTymusbUjqhXscqg4TejDtlZ//XBlrY/xW+6pocGN
    VLCL+gCaLUQE0S7RW6FU6w==
    """

  Scenario: Updating a staged outdated Nextcloud 11.0.0 stable without PHP version
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The installation mtime is "15"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    d5mcL7Smk1aebH1MVRs0pWY00bq6JUIamsRVpd/uxYOeKi5z9nwhv2Ot8KfiI41S
    1mLCjZwalyJlkon+zdPgolgwT9cUiKNLLpjNCeaC46/RWUlct+8hvPq6DxiTVEkb
    k/gDAbrWBI4VtjH11b1ecSXvTGCt9zywcyl4uCeN16waz4CIcYi22/jixzdEQihj
    381raoX5ygW8Rlfpv1SwKwM1C2xYGrzsbdP34TJojw8vjNrBVus+cM3H5ZFvHRPC
    Wu+KPsSxdkQeVph+/ukn0tQoTymusbUjqhXscqg4TejDtlZ//XBlrY/xW+6pocGN
    VLCL+gCaLUQE0S7RW6FU6w==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the empty channel - will use the stable channel then
    Given There is a release with channel ""
    And The received version is "11.0.0.2"
    And the installation mtime is "20"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    d5mcL7Smk1aebH1MVRs0pWY00bq6JUIamsRVpd/uxYOeKi5z9nwhv2Ot8KfiI41S
    1mLCjZwalyJlkon+zdPgolgwT9cUiKNLLpjNCeaC46/RWUlct+8hvPq6DxiTVEkb
    k/gDAbrWBI4VtjH11b1ecSXvTGCt9zywcyl4uCeN16waz4CIcYi22/jixzdEQihj
    381raoX5ygW8Rlfpv1SwKwM1C2xYGrzsbdP34TJojw8vjNrBVus+cM3H5ZFvHRPC
    Wu+KPsSxdkQeVph+/ukn0tQoTymusbUjqhXscqg4TejDtlZ//XBlrY/xW+6pocGN
    VLCL+gCaLUQE0S7RW6FU6w==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the stable channel
    Given There is a release with channel "stable"
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

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And The installation mtime is "20"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    d5mcL7Smk1aebH1MVRs0pWY00bq6JUIamsRVpd/uxYOeKi5z9nwhv2Ot8KfiI41S
    1mLCjZwalyJlkon+zdPgolgwT9cUiKNLLpjNCeaC46/RWUlct+8hvPq6DxiTVEkb
    k/gDAbrWBI4VtjH11b1ecSXvTGCt9zywcyl4uCeN16waz4CIcYi22/jixzdEQihj
    381raoX5ygW8Rlfpv1SwKwM1C2xYGrzsbdP34TJojw8vjNrBVus+cM3H5ZFvHRPC
    Wu+KPsSxdkQeVph+/ukn0tQoTymusbUjqhXscqg4TejDtlZ//XBlrY/xW+6pocGN
    VLCL+gCaLUQE0S7RW6FU6w==
    """

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.6.1"
    And The installation mtime is "20"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    d5mcL7Smk1aebH1MVRs0pWY00bq6JUIamsRVpd/uxYOeKi5z9nwhv2Ot8KfiI41S
    1mLCjZwalyJlkon+zdPgolgwT9cUiKNLLpjNCeaC46/RWUlct+8hvPq6DxiTVEkb
    k/gDAbrWBI4VtjH11b1ecSXvTGCt9zywcyl4uCeN16waz4CIcYi22/jixzdEQihj
    381raoX5ygW8Rlfpv1SwKwM1C2xYGrzsbdP34TJojw8vjNrBVus+cM3H5ZFvHRPC
    Wu+KPsSxdkQeVph+/ukn0tQoTymusbUjqhXscqg4TejDtlZ//XBlrY/xW+6pocGN
    VLCL+gCaLUQE0S7RW6FU6w==
    """

  Scenario: Updating an up-to-date Nextcloud 11.0.0 on the stable channel without mtime
    Given There is a release with channel "stable"
    And The received version is "11.0.6.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    d5mcL7Smk1aebH1MVRs0pWY00bq6JUIamsRVpd/uxYOeKi5z9nwhv2Ot8KfiI41S
    1mLCjZwalyJlkon+zdPgolgwT9cUiKNLLpjNCeaC46/RWUlct+8hvPq6DxiTVEkb
    k/gDAbrWBI4VtjH11b1ecSXvTGCt9zywcyl4uCeN16waz4CIcYi22/jixzdEQihj
    381raoX5ygW8Rlfpv1SwKwM1C2xYGrzsbdP34TJojw8vjNrBVus+cM3H5ZFvHRPC
    Wu+KPsSxdkQeVph+/ukn0tQoTymusbUjqhXscqg4TejDtlZ//XBlrY/xW+6pocGN
    VLCL+gCaLUQE0S7RW6FU6w==
    """

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
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

 Scenario: Updating an up-to-date Nextcloud 12.0.5 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.5.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
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

 Scenario: Updating an up-to-date Nextcloud 12.0.5 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.5.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "65"
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
