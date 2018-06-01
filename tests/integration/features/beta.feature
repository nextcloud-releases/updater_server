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
    And Update to version "12.0.8.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.8RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    0Icet0wcfWu/v5ktj613NKKZDB257w0ifC+gvp/smFWgsewNKyFX58BgdgFnWT7H
    zobseOkuFkn/qvgB5kp6KGGpywHIy5Lmwj+IGaJVPvpS26j9X6rOpiZscYY8Mkn2
    qUhrCeSEZvlDM+Ky/eFVEHbmcwCC/lxbj8dnJg3aRwfLaFDLes++Qt2cmXvlQ+rN
    IzH8mLtadkyMZAp5RrGMP3lMDD9ob/E7/CumRJ+AMJbAL7nh2HhYq3IiCNfFhZ+z
    w6v8gRuDzkDxQtUBCnL4kk7pb3miAb8yWz/KjpWQrFCQD1vz/Je8fO6Sr6moYu8G
    EL8RgdVAIgCjz/QC7WnDtw==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel without an mtime
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.8.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.8RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    0Icet0wcfWu/v5ktj613NKKZDB257w0ifC+gvp/smFWgsewNKyFX58BgdgFnWT7H
    zobseOkuFkn/qvgB5kp6KGGpywHIy5Lmwj+IGaJVPvpS26j9X6rOpiZscYY8Mkn2
    qUhrCeSEZvlDM+Ky/eFVEHbmcwCC/lxbj8dnJg3aRwfLaFDLes++Qt2cmXvlQ+rN
    IzH8mLtadkyMZAp5RrGMP3lMDD9ob/E7/CumRJ+AMJbAL7nh2HhYq3IiCNfFhZ+z
    w6v8gRuDzkDxQtUBCnL4kk7pb3miAb8yWz/KjpWQrFCQD1vz/Je8fO6Sr6moYu8G
    EL8RgdVAIgCjz/QC7WnDtw==
    """

  Scenario: Updating an outdated Nextcloud 12.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.0.15"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.3.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.3RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    ZYEAj/QwAV3IREJoBz0i7tFOSUlG5O2OQHdqasW1DzzqJM1N0R30NTTVDqgSJPHG
    R8A8jkEQCbA/18tYRiaxfc3SEmwX+Wc5U/CZoDeNfbNtt2cPlGJaVz2MC14TmmgQ
    HvWpr977EC/QDxe0WJ9uibei7cKK93iCd9RTfvcHi4G1auLsxo6a90I0lV3uQ+KO
    bhLxh+IrQ06RspGEqE48r6eym2zp/3/NZsVmBWM+8xLRL5iQgL2GuKeVt+OSIHXu
    yaVZCpRZ4BqoPjK6oXgruKCS6MXoOn6oO5KDt8quMVIhxNJGuPmlE8cAW04zF1XP
    /MubRU2CR+1fgB3VuE1Arg==
    """

  Scenario: Updating an up-to-date Nextcloud 12.0.7 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.7.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.3.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.3RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    ZYEAj/QwAV3IREJoBz0i7tFOSUlG5O2OQHdqasW1DzzqJM1N0R30NTTVDqgSJPHG
    R8A8jkEQCbA/18tYRiaxfc3SEmwX+Wc5U/CZoDeNfbNtt2cPlGJaVz2MC14TmmgQ
    HvWpr977EC/QDxe0WJ9uibei7cKK93iCd9RTfvcHi4G1auLsxo6a90I0lV3uQ+KO
    bhLxh+IrQ06RspGEqE48r6eym2zp/3/NZsVmBWM+8xLRL5iQgL2GuKeVt+OSIHXu
    yaVZCpRZ4BqoPjK6oXgruKCS6MXoOn6oO5KDt8quMVIhxNJGuPmlE8cAW04zF1XP
    /MubRU2CR+1fgB3VuE1Arg==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.3.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.3RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    ZYEAj/QwAV3IREJoBz0i7tFOSUlG5O2OQHdqasW1DzzqJM1N0R30NTTVDqgSJPHG
    R8A8jkEQCbA/18tYRiaxfc3SEmwX+Wc5U/CZoDeNfbNtt2cPlGJaVz2MC14TmmgQ
    HvWpr977EC/QDxe0WJ9uibei7cKK93iCd9RTfvcHi4G1auLsxo6a90I0lV3uQ+KO
    bhLxh+IrQ06RspGEqE48r6eym2zp/3/NZsVmBWM+8xLRL5iQgL2GuKeVt+OSIHXu
    yaVZCpRZ4BqoPjK6oXgruKCS6MXoOn6oO5KDt8quMVIhxNJGuPmlE8cAW04zF1XP
    /MubRU2CR+1fgB3VuE1Arg==
    """
