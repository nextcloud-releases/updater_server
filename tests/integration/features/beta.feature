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
    And Update to version "12.0.10.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.10.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    wCWCrhlkL8YYL7UdYUeMnCJIgJSuZrjTe1kMd/HW7ZmJQi6v20ReIB8mTz1UZoPw
    HPiTIQmSClg2QN0J3NJCA4ZgZOhNpdqpD+hlKdVs+Tejj2rOEpxCRb8G3qH23pFy
    2zDik1SCHjO2UEmqHa8lZhr/DwsZrU5y2tmc37BM6DNSYMn9EDAlQ9Zf3tfdJyzb
    q+PLEagO07LU2TpELpYWcxKy/DeLnCbxhhKVAVfnUFVjrpn/a/oaRvhmnGkkUpIJ
    1YyE6sebvGVBt2sNA1I6eDGojI1bo5qYLwXsPUeD2DUo/BqR593nIQJU/AldFnaA
    JCqlRb+QYQLpwipZJEukaw==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel without an mtime
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.10.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.10.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    wCWCrhlkL8YYL7UdYUeMnCJIgJSuZrjTe1kMd/HW7ZmJQi6v20ReIB8mTz1UZoPw
    HPiTIQmSClg2QN0J3NJCA4ZgZOhNpdqpD+hlKdVs+Tejj2rOEpxCRb8G3qH23pFy
    2zDik1SCHjO2UEmqHa8lZhr/DwsZrU5y2tmc37BM6DNSYMn9EDAlQ9Zf3tfdJyzb
    q+PLEagO07LU2TpELpYWcxKy/DeLnCbxhhKVAVfnUFVjrpn/a/oaRvhmnGkkUpIJ
    1YyE6sebvGVBt2sNA1I6eDGojI1bo5qYLwXsPUeD2DUo/BqR593nIQJU/AldFnaA
    JCqlRb+QYQLpwipZJEukaw==
    """

  Scenario: Updating an outdated Nextcloud 12.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.0.15"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.6.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.6RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    O7gXhgsU0bVx0eFClikpuhlzMvaI0+eZ58YfVbB1kRbBks6FHV2Pw3yh10OuMMsY
    3328CGAkBP8ssbDGBgMzGGLEJy378BQYRy0LFmZxdx+tGujXG9Z8FVjaIqNg9J+P
    EkXPn2JomQtnObteKqEmO6cTvATgzzgZV146h1GiQGycS/dCe53woaawL8yvFMv6
    WOlM7eALurFp1lEa/PLUF2OVYMu2KIZE4m8zbhW+2z8tAFYY4HnFo64or8Ia8Ijp
    WQXVrV/RxrMR4271gpRH/0WpTbt0Z8u3LCOZ/XjmaV1QKOCqRKdjJTWvjXsN5g6Q
    ChgTVur6gQUFtt73Lx0FTg==
    """

  Scenario: Updating an up-to-date Nextcloud 12.0.7 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.7.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.6.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.6RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    O7gXhgsU0bVx0eFClikpuhlzMvaI0+eZ58YfVbB1kRbBks6FHV2Pw3yh10OuMMsY
    3328CGAkBP8ssbDGBgMzGGLEJy378BQYRy0LFmZxdx+tGujXG9Z8FVjaIqNg9J+P
    EkXPn2JomQtnObteKqEmO6cTvATgzzgZV146h1GiQGycS/dCe53woaawL8yvFMv6
    WOlM7eALurFp1lEa/PLUF2OVYMu2KIZE4m8zbhW+2z8tAFYY4HnFo64or8Ia8Ijp
    WQXVrV/RxrMR4271gpRH/0WpTbt0Z8u3LCOZ/XjmaV1QKOCqRKdjJTWvjXsN5g6Q
    ChgTVur6gQUFtt73Lx0FTg==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.6.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.6RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    O7gXhgsU0bVx0eFClikpuhlzMvaI0+eZ58YfVbB1kRbBks6FHV2Pw3yh10OuMMsY
    3328CGAkBP8ssbDGBgMzGGLEJy378BQYRy0LFmZxdx+tGujXG9Z8FVjaIqNg9J+P
    EkXPn2JomQtnObteKqEmO6cTvATgzzgZV146h1GiQGycS/dCe53woaawL8yvFMv6
    WOlM7eALurFp1lEa/PLUF2OVYMu2KIZE4m8zbhW+2z8tAFYY4HnFo64or8Ia8Ijp
    WQXVrV/RxrMR4271gpRH/0WpTbt0Z8u3LCOZ/XjmaV1QKOCqRKdjJTWvjXsN5g6Q
    ChgTVur6gQUFtt73Lx0FTg==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    And the installation mtime is "90"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.6.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.6RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    O7gXhgsU0bVx0eFClikpuhlzMvaI0+eZ58YfVbB1kRbBks6FHV2Pw3yh10OuMMsY
    3328CGAkBP8ssbDGBgMzGGLEJy378BQYRy0LFmZxdx+tGujXG9Z8FVjaIqNg9J+P
    EkXPn2JomQtnObteKqEmO6cTvATgzzgZV146h1GiQGycS/dCe53woaawL8yvFMv6
    WOlM7eALurFp1lEa/PLUF2OVYMu2KIZE4m8zbhW+2z8tAFYY4HnFo64or8Ia8Ijp
    WQXVrV/RxrMR4271gpRH/0WpTbt0Z8u3LCOZ/XjmaV1QKOCqRKdjJTWvjXsN5g6Q
    ChgTVur6gQUFtt73Lx0FTg==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 7.0
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.6.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.6RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    O7gXhgsU0bVx0eFClikpuhlzMvaI0+eZ58YfVbB1kRbBks6FHV2Pw3yh10OuMMsY
    3328CGAkBP8ssbDGBgMzGGLEJy378BQYRy0LFmZxdx+tGujXG9Z8FVjaIqNg9J+P
    EkXPn2JomQtnObteKqEmO6cTvATgzzgZV146h1GiQGycS/dCe53woaawL8yvFMv6
    WOlM7eALurFp1lEa/PLUF2OVYMu2KIZE4m8zbhW+2z8tAFYY4HnFo64or8Ia8Ijp
    WQXVrV/RxrMR4271gpRH/0WpTbt0Z8u3LCOZ/XjmaV1QKOCqRKdjJTWvjXsN5g6Q
    ChgTVur6gQUFtt73Lx0FTg==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 7.0
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "90"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.0.16" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-14.0.0beta4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    CzR5n7lAlFCVoqtW+/JAp1KhIUYNOF/VxSyt3vKggdEonb+uOoAvrHfGHhbE7ToK
    0jyez1aRAK6afl3zevAzMBqfj+L7xadHBheXQtDioeMzXKi2iRDKud5fTAHKXUIm
    AosTbSo2eqiD5n1ItEeQYdtTAl58x3LMtcuMAtbjjSEcJkeujoXeXXLAo+DkmgZB
    uYz3OsJGnNjpD0ePZioWotPyuO+N+ECBKEc4iOf9UFtumxvUKq3wqFPpAnStqvcy
    mu1hsW//a0wKeG03xDFQIYmhHfRDbd/FMyP/YGoQ6y+D6Aihvo2Ob1x6tNmFB9nZ
    N5i5tYq8/4xRA2bmHpv7Hw==
    """

  Scenario: Updating an outdated Nextcloud 14.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "14.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.0.16" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-14.0.0beta4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    CzR5n7lAlFCVoqtW+/JAp1KhIUYNOF/VxSyt3vKggdEonb+uOoAvrHfGHhbE7ToK
    0jyez1aRAK6afl3zevAzMBqfj+L7xadHBheXQtDioeMzXKi2iRDKud5fTAHKXUIm
    AosTbSo2eqiD5n1ItEeQYdtTAl58x3LMtcuMAtbjjSEcJkeujoXeXXLAo+DkmgZB
    uYz3OsJGnNjpD0ePZioWotPyuO+N+ECBKEc4iOf9UFtumxvUKq3wqFPpAnStqvcy
    mu1hsW//a0wKeG03xDFQIYmhHfRDbd/FMyP/YGoQ6y+D6Aihvo2Ob1x6tNmFB9nZ
    N5i5tYq8/4xRA2bmHpv7Hw==
    """
