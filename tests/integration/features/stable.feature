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

  Scenario: Updating a staged outdated Nextcloud 11.0.0 stable without PHP version
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The installation mtime is "15"
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

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the empty channel - will use the stable channel then
    Given There is a release with channel ""
    And The received version is "11.0.0.2"
    And the installation mtime is "20"
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

  Scenario: Updating an outdated Nextcloud 13.0.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.5.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    smxcnfDAiZHDgbJRf4qKOgpTHm2mPprJL4qD5B68uNh/p4QGrxWDt4aY1XDss5+V
    xplKiW/3vdsmKnfND4Cl7bXa/SnlqVgN+OSIrln1o8CCL5BZBJfC3dvU/w7LuMH8
    pCX3pcBFC540fZbsiAudAYB0YkejSxDSNb8D1QIczvArxFV6PXcSHICJpdichPjr
    tjZDyKnAJlTM2Exip5tcECQphEWPTV/EagpcPpsuRhKkn8LKNhIlytf4hdfEjqr8
    KgojhI6GtJy2hSAqN7uMFlK17a8xwpOx688Imt1CtXquUuHOoWLFDPp3BXjh+YB9
    M6c+ZbHYI28XtFGOSCqcbA==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And The installation mtime is "20"
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

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.6.1"
    And The installation mtime is "20"
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

  Scenario: Updating an up-to-date Nextcloud 11.0.0 on the stable channel without mtime
    Given There is a release with channel "stable"
    And The received version is "11.0.6.1"
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

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.5.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    smxcnfDAiZHDgbJRf4qKOgpTHm2mPprJL4qD5B68uNh/p4QGrxWDt4aY1XDss5+V
    xplKiW/3vdsmKnfND4Cl7bXa/SnlqVgN+OSIrln1o8CCL5BZBJfC3dvU/w7LuMH8
    pCX3pcBFC540fZbsiAudAYB0YkejSxDSNb8D1QIczvArxFV6PXcSHICJpdichPjr
    tjZDyKnAJlTM2Exip5tcECQphEWPTV/EagpcPpsuRhKkn8LKNhIlytf4hdfEjqr8
    KgojhI6GtJy2hSAqN7uMFlK17a8xwpOx688Imt1CtXquUuHOoWLFDPp3BXjh+YB9
    M6c+ZbHYI28XtFGOSCqcbA==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.5 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.5.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.5.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    smxcnfDAiZHDgbJRf4qKOgpTHm2mPprJL4qD5B68uNh/p4QGrxWDt4aY1XDss5+V
    xplKiW/3vdsmKnfND4Cl7bXa/SnlqVgN+OSIrln1o8CCL5BZBJfC3dvU/w7LuMH8
    pCX3pcBFC540fZbsiAudAYB0YkejSxDSNb8D1QIczvArxFV6PXcSHICJpdichPjr
    tjZDyKnAJlTM2Exip5tcECQphEWPTV/EagpcPpsuRhKkn8LKNhIlytf4hdfEjqr8
    KgojhI6GtJy2hSAqN7uMFlK17a8xwpOx688Imt1CtXquUuHOoWLFDPp3BXjh+YB9
    M6c+ZbHYI28XtFGOSCqcbA==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.5 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.5.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "65"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.5.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    smxcnfDAiZHDgbJRf4qKOgpTHm2mPprJL4qD5B68uNh/p4QGrxWDt4aY1XDss5+V
    xplKiW/3vdsmKnfND4Cl7bXa/SnlqVgN+OSIrln1o8CCL5BZBJfC3dvU/w7LuMH8
    pCX3pcBFC540fZbsiAudAYB0YkejSxDSNb8D1QIczvArxFV6PXcSHICJpdichPjr
    tjZDyKnAJlTM2Exip5tcECQphEWPTV/EagpcPpsuRhKkn8LKNhIlytf4hdfEjqr8
    KgojhI6GtJy2hSAqN7uMFlK17a8xwpOx688Imt1CtXquUuHOoWLFDPp3BXjh+YB9
    M6c+ZbHYI28XtFGOSCqcbA==
    """
