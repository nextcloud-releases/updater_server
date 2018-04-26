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

  Scenario: Updating an up-to-date staged Nextcloud 10.0.6 with PHP 5.4 on the production channel
    Given There is a release with channel "production"
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

  Scenario: Updating an up-to-date staged Nextcloud 10.0.6 with PHP 5.6 on the production channel
    Given There is a release with channel "production"
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

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel without an mtime
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
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

  Scenario: Updating an outdated Nextcloud 11.0.0 production without PHP version
    Given There is a release with channel "production"
    And The received version is "11.0.0.2"
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

  Scenario: Updating an outdated Nextcloud 12.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.0.15"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    d5mcL7Smk1aebH1MVRs0pWY00bq6JUIamsRVpd/uxYOeKi5z9nwhv2Ot8KfiI41S
    1mLCjZwalyJlkon+zdPgolgwT9cUiKNLLpjNCeaC46/RWUlct+8hvPq6DxiTVEkb
    k/gDAbrWBI4VtjH11b1ecSXvTGCt9zywcyl4uCeN16waz4CIcYi22/jixzdEQihj
    381raoX5ygW8Rlfpv1SwKwM1C2xYGrzsbdP34TJojw8vjNrBVus+cM3H5ZFvHRPC
    Wu+KPsSxdkQeVph+/ukn0tQoTymusbUjqhXscqg4TejDtlZ//XBlrY/xW+6pocGN
    VLCL+gCaLUQE0S7RW6FU6w==
    """

  Scenario: Updating an up-to-date Nextcloud 12.0.4 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.4.3"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    d5mcL7Smk1aebH1MVRs0pWY00bq6JUIamsRVpd/uxYOeKi5z9nwhv2Ot8KfiI41S
    1mLCjZwalyJlkon+zdPgolgwT9cUiKNLLpjNCeaC46/RWUlct+8hvPq6DxiTVEkb
    k/gDAbrWBI4VtjH11b1ecSXvTGCt9zywcyl4uCeN16waz4CIcYi22/jixzdEQihj
    381raoX5ygW8Rlfpv1SwKwM1C2xYGrzsbdP34TJojw8vjNrBVus+cM3H5ZFvHRPC
    Wu+KPsSxdkQeVph+/ukn0tQoTymusbUjqhXscqg4TejDtlZ//XBlrY/xW+6pocGN
    VLCL+gCaLUQE0S7RW6FU6w==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.2.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    LM7g6SaWxzArRLd++9sdk80UZw1mIzAaqEnH75YO3EBK7qF7xxVdvb7tnu9cipsr
    Y5e/MoISsNOgc3FZoRygGrkKl4GVf4SZSOSusmoDxwHNT0tBSK8u0QMRXrEXLuyE
    pxyvA3hHMP/gGhLn+T0/CrvI/QBy3QO1N74OUWc+nc+NnKnWSwwVP4/OITRkAtYj
    zsIH95cgI4e3Eez6c63YsITKLWVwoE4Qu0ubU8HGfhHBYxqFoGbNfSWvB78gV/gf
    S3QFUmoMjKoOvo1Q4s7UQv0xE5TUDC4XFIW6q1ly1Z/XRPZaywstv3br8J52L6+J
    G2ZuS4ms5s9o5i2OrogYRQ==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.2.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    LM7g6SaWxzArRLd++9sdk80UZw1mIzAaqEnH75YO3EBK7qF7xxVdvb7tnu9cipsr
    Y5e/MoISsNOgc3FZoRygGrkKl4GVf4SZSOSusmoDxwHNT0tBSK8u0QMRXrEXLuyE
    pxyvA3hHMP/gGhLn+T0/CrvI/QBy3QO1N74OUWc+nc+NnKnWSwwVP4/OITRkAtYj
    zsIH95cgI4e3Eez6c63YsITKLWVwoE4Qu0ubU8HGfhHBYxqFoGbNfSWvB78gV/gf
    S3QFUmoMjKoOvo1Q4s7UQv0xE5TUDC4XFIW6q1ly1Z/XRPZaywstv3br8J52L6+J
    G2ZuS4ms5s9o5i2OrogYRQ==
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

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the production channel
    Given There is a release with channel "production"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And The installation mtime is "70"
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

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.6 on the production channel with PHP 5.6
    Given There is a release with channel "production"
    And The received version is "11.0.6.1"
    And The received PHP version is "5.6.0"
    And The installation mtime is "70"
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

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.6 on the production channel with PHP 5.6 and lower mtime
    Given There is a release with channel "production"
    And The received version is "11.0.6.1"
    And The received PHP version is "5.6.0"
    And The installation mtime is "10"
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

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.6 on the production channel without PHP version
    Given There is a release with channel "production"
    And The received version is "11.0.6.1"
    And The installation mtime is "70"
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

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    d5mcL7Smk1aebH1MVRs0pWY00bq6JUIamsRVpd/uxYOeKi5z9nwhv2Ot8KfiI41S
    1mLCjZwalyJlkon+zdPgolgwT9cUiKNLLpjNCeaC46/RWUlct+8hvPq6DxiTVEkb
    k/gDAbrWBI4VtjH11b1ecSXvTGCt9zywcyl4uCeN16waz4CIcYi22/jixzdEQihj
    381raoX5ygW8Rlfpv1SwKwM1C2xYGrzsbdP34TJojw8vjNrBVus+cM3H5ZFvHRPC
    Wu+KPsSxdkQeVph+/ukn0tQoTymusbUjqhXscqg4TejDtlZ//XBlrY/xW+6pocGN
    VLCL+gCaLUQE0S7RW6FU6w==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.4 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.4.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
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
    And Update to version "13.0.2.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    LM7g6SaWxzArRLd++9sdk80UZw1mIzAaqEnH75YO3EBK7qF7xxVdvb7tnu9cipsr
    Y5e/MoISsNOgc3FZoRygGrkKl4GVf4SZSOSusmoDxwHNT0tBSK8u0QMRXrEXLuyE
    pxyvA3hHMP/gGhLn+T0/CrvI/QBy3QO1N74OUWc+nc+NnKnWSwwVP4/OITRkAtYj
    zsIH95cgI4e3Eez6c63YsITKLWVwoE4Qu0ubU8HGfhHBYxqFoGbNfSWvB78gV/gf
    S3QFUmoMjKoOvo1Q4s7UQv0xE5TUDC4XFIW6q1ly1Z/XRPZaywstv3br8J52L6+J
    G2ZuS4ms5s9o5i2OrogYRQ==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.5 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.5.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.2.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    LM7g6SaWxzArRLd++9sdk80UZw1mIzAaqEnH75YO3EBK7qF7xxVdvb7tnu9cipsr
    Y5e/MoISsNOgc3FZoRygGrkKl4GVf4SZSOSusmoDxwHNT0tBSK8u0QMRXrEXLuyE
    pxyvA3hHMP/gGhLn+T0/CrvI/QBy3QO1N74OUWc+nc+NnKnWSwwVP4/OITRkAtYj
    zsIH95cgI4e3Eez6c63YsITKLWVwoE4Qu0ubU8HGfhHBYxqFoGbNfSWvB78gV/gf
    S3QFUmoMjKoOvo1Q4s7UQv0xE5TUDC4XFIW6q1ly1Z/XRPZaywstv3br8J52L6+J
    G2ZuS4ms5s9o5i2OrogYRQ==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.5 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.5.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "65"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.2.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    LM7g6SaWxzArRLd++9sdk80UZw1mIzAaqEnH75YO3EBK7qF7xxVdvb7tnu9cipsr
    Y5e/MoISsNOgc3FZoRygGrkKl4GVf4SZSOSusmoDxwHNT0tBSK8u0QMRXrEXLuyE
    pxyvA3hHMP/gGhLn+T0/CrvI/QBy3QO1N74OUWc+nc+NnKnWSwwVP4/OITRkAtYj
    zsIH95cgI4e3Eez6c63YsITKLWVwoE4Qu0ubU8HGfhHBYxqFoGbNfSWvB78gV/gf
    S3QFUmoMjKoOvo1Q4s7UQv0xE5TUDC4XFIW6q1ly1Z/XRPZaywstv3br8J52L6+J
    G2ZuS4ms5s9o5i2OrogYRQ==
    """

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the production channel
    Given There is a release with channel "production"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    d5mcL7Smk1aebH1MVRs0pWY00bq6JUIamsRVpd/uxYOeKi5z9nwhv2Ot8KfiI41S
    1mLCjZwalyJlkon+zdPgolgwT9cUiKNLLpjNCeaC46/RWUlct+8hvPq6DxiTVEkb
    k/gDAbrWBI4VtjH11b1ecSXvTGCt9zywcyl4uCeN16waz4CIcYi22/jixzdEQihj
    381raoX5ygW8Rlfpv1SwKwM1C2xYGrzsbdP34TJojw8vjNrBVus+cM3H5ZFvHRPC
    Wu+KPsSxdkQeVph+/ukn0tQoTymusbUjqhXscqg4TejDtlZ//XBlrY/xW+6pocGN
    VLCL+gCaLUQE0S7RW6FU6w==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.6 on the production channel
    Given There is a release with channel "production"
    And The received version is "12.0.7.1"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is empty

 Scenario: Updating an outdated Nextcloud 13.0.0 on the production channel
    Given There is a release with channel "production"
    And The received version is "13.0.0.0"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.2.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    LM7g6SaWxzArRLd++9sdk80UZw1mIzAaqEnH75YO3EBK7qF7xxVdvb7tnu9cipsr
    Y5e/MoISsNOgc3FZoRygGrkKl4GVf4SZSOSusmoDxwHNT0tBSK8u0QMRXrEXLuyE
    pxyvA3hHMP/gGhLn+T0/CrvI/QBy3QO1N74OUWc+nc+NnKnWSwwVP4/OITRkAtYj
    zsIH95cgI4e3Eez6c63YsITKLWVwoE4Qu0ubU8HGfhHBYxqFoGbNfSWvB78gV/gf
    S3QFUmoMjKoOvo1Q4s7UQv0xE5TUDC4XFIW6q1ly1Z/XRPZaywstv3br8J52L6+J
    G2ZuS4ms5s9o5i2OrogYRQ==
    """

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
