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
    And Update to version "11.0.6.1" is available
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
    And Update to version "11.0.7.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    seXLXR/sD23IWlku0PyyKg50GKjXJPgit96/C9Tj2oJepqGqxUZB790CcblUYNrB
    at3G1R2XCFegzaNuXTE/O8fAQxeHXXzPxaewgOgR0UseM4JzqxrYMdM1t85PqRYH
    rykDSzNdzgkwnKCT5hoLjbJgDSputtmFpt4AOntKL8/IIlLgMjptkF6qSzP6PchK
    KKYwskUesNWrab2Xxcfzs+tOP4dMpk/CPMiA+9gItdDdJPqFoFAGw+GH/oyP7iBq
    78kFVkRzB85QYZhYf+cm/YdXQOXgV/qtNPiEdZsD3ucTfqPFGiOB7ncgZEv2Z0iH
    I/7HIwvOscdRPzvEVi32ag==
    """

  Scenario: Updating an outdated Nextcloud 10.0.0 on the beta channel with PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "9.1.0"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.8RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    R9ZLRj5beKy9hmTiV7Z0xCbT9fxEMRm74l2aAAumzqw7HuyOfKqycdIGPGDpIMtg
    UYT52U2ENWPA4JtXiKnmpch8grnQu+OuzN7NmmIqeeKvYeT/KUavEHx2aWL9nRPA
    5XxaiGtXtLMuj+a2cQmGdx7KOgJlyA9jLA9Ur7ctS0KtPng4ONcRoFcBoGFREsYj
    ARySXBUPcwGuXlwjjAs9eetN0pqamZcx37s2q1Y3cE1aBuiisVwiySQSaCd1d0GW
    JbA5zC9hxy3U9d5ZHbQhIcpnkjO5vJi71HeocptFp71RxGF3SEVg6URcIh4+qPvm
    I5PlzjCamIDyP/EpyaIUQg==
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
    And Update to version "11.0.6.1" is available
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
    And Update to version "11.0.6.1" is available
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
    And Update to version "11.0.8.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.8RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    R9ZLRj5beKy9hmTiV7Z0xCbT9fxEMRm74l2aAAumzqw7HuyOfKqycdIGPGDpIMtg
    UYT52U2ENWPA4JtXiKnmpch8grnQu+OuzN7NmmIqeeKvYeT/KUavEHx2aWL9nRPA
    5XxaiGtXtLMuj+a2cQmGdx7KOgJlyA9jLA9Ur7ctS0KtPng4ONcRoFcBoGFREsYj
    ARySXBUPcwGuXlwjjAs9eetN0pqamZcx37s2q1Y3cE1aBuiisVwiySQSaCd1d0GW
    JbA5zC9hxy3U9d5ZHbQhIcpnkjO5vJi71HeocptFp71RxGF3SEVg6URcIh4+qPvm
    I5PlzjCamIDyP/EpyaIUQg==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.8RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    R9ZLRj5beKy9hmTiV7Z0xCbT9fxEMRm74l2aAAumzqw7HuyOfKqycdIGPGDpIMtg
    UYT52U2ENWPA4JtXiKnmpch8grnQu+OuzN7NmmIqeeKvYeT/KUavEHx2aWL9nRPA
    5XxaiGtXtLMuj+a2cQmGdx7KOgJlyA9jLA9Ur7ctS0KtPng4ONcRoFcBoGFREsYj
    ARySXBUPcwGuXlwjjAs9eetN0pqamZcx37s2q1Y3cE1aBuiisVwiySQSaCd1d0GW
    JbA5zC9hxy3U9d5ZHbQhIcpnkjO5vJi71HeocptFp71RxGF3SEVg6URcIh4+qPvm
    I5PlzjCamIDyP/EpyaIUQg==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel without an mtime
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.8.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.8RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    R9ZLRj5beKy9hmTiV7Z0xCbT9fxEMRm74l2aAAumzqw7HuyOfKqycdIGPGDpIMtg
    UYT52U2ENWPA4JtXiKnmpch8grnQu+OuzN7NmmIqeeKvYeT/KUavEHx2aWL9nRPA
    5XxaiGtXtLMuj+a2cQmGdx7KOgJlyA9jLA9Ur7ctS0KtPng4ONcRoFcBoGFREsYj
    ARySXBUPcwGuXlwjjAs9eetN0pqamZcx37s2q1Y3cE1aBuiisVwiySQSaCd1d0GW
    JbA5zC9hxy3U9d5ZHbQhIcpnkjO5vJi71HeocptFp71RxGF3SEVg6URcIh4+qPvm
    I5PlzjCamIDyP/EpyaIUQg==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 stable without PHP version
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The installation mtime is "20"
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

  Scenario: Updating a staged outdated Nextcloud 11.0.0 stable without PHP version
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The installation mtime is "15"
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

  Scenario: Updating an outdated Nextcloud 12.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.0.15"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.6.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.6RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    KMrid5qSb2qj2COsp6JWBc8X4mmwUOEyqXIZ64F9KvKF2uexeiXTKlbNwc//41CD
    3xef1hhuTOMhKyiB+jOv06OLQ1fgGMgil8P9aC/XaLxA5mLlYVtTCFQ9r7auI/cM
    3wi9MhYk/J3VjuMUrpCaABfaaU4W39t1xEx8/RerTc91C5e/+/f9wth09ZJgD8Ax
    Lr/yeKOolzEOUh0/CoyVKmC3/wnfqEtvFmzRke4vksNGr2l+7SxA5nh+WFuSkHcs
    20vyewN68Ptp0Ju4FLbXEWAMd/moxNRf46E/yoSJ2Hz/jyT/h2DZ4aBbzeYAKJR4
    ae/rLIEZUnBd+w7ghYJ+gA==
    """

  Scenario: Updating an up-to-date Nextcloud 12.0.4 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.4.3"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.6.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.6RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    KMrid5qSb2qj2COsp6JWBc8X4mmwUOEyqXIZ64F9KvKF2uexeiXTKlbNwc//41CD
    3xef1hhuTOMhKyiB+jOv06OLQ1fgGMgil8P9aC/XaLxA5mLlYVtTCFQ9r7auI/cM
    3wi9MhYk/J3VjuMUrpCaABfaaU4W39t1xEx8/RerTc91C5e/+/f9wth09ZJgD8Ax
    Lr/yeKOolzEOUh0/CoyVKmC3/wnfqEtvFmzRke4vksNGr2l+7SxA5nh+WFuSkHcs
    20vyewN68Ptp0Ju4FLbXEWAMd/moxNRf46E/yoSJ2Hz/jyT/h2DZ4aBbzeYAKJR4
    ae/rLIEZUnBd+w7ghYJ+gA==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.1.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.1RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    MUL0Bkdy8OuYQtuqZ9WqT8gH0rCAXv9kJbDS1vCsoUwbQ07S1s5woRlMGeN+xJah
    2q2w0l/MCFwQY8VDGGX0JHhUZgWlYbf//E74VuA4SvJqIzD2byc4D8Q70MR6qhOH
    i6NQnvXHgTx6iw4IO3UH38fxdvsEzeDRQt+uxVJNlEYUZ6axbQazooL0ojRtyEPn
    GKcp0BKMoI8Ft1cOUBxW5MRJ6320mPNIj7dq1YWOHxidytbF4Wczf5o1M39Fx0dF
    YqUnwyhDP8tjg+/FLCFcFklZPbQtnEEp4xjBZMwKcAuI7aZFDZoTdXYf1URXvCSb
    FILG5JOjLatMdCh4vRLl6g==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And The installation mtime is "20"
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

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.6.1"
    And The installation mtime is "20"
    And The received PHP version is "5.6.0"
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

  Scenario: Updating an up-to-date Nextcloud 11.0.0 on the stable channel without mtime
    Given There is a release with channel "stable"
    And The received version is "11.0.6.1"
    And The received PHP version is "5.6.0"
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
    And Update to version "12.0.6.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.6RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    KMrid5qSb2qj2COsp6JWBc8X4mmwUOEyqXIZ64F9KvKF2uexeiXTKlbNwc//41CD
    3xef1hhuTOMhKyiB+jOv06OLQ1fgGMgil8P9aC/XaLxA5mLlYVtTCFQ9r7auI/cM
    3wi9MhYk/J3VjuMUrpCaABfaaU4W39t1xEx8/RerTc91C5e/+/f9wth09ZJgD8Ax
    Lr/yeKOolzEOUh0/CoyVKmC3/wnfqEtvFmzRke4vksNGr2l+7SxA5nh+WFuSkHcs
    20vyewN68Ptp0Ju4FLbXEWAMd/moxNRf46E/yoSJ2Hz/jyT/h2DZ4aBbzeYAKJR4
    ae/rLIEZUnBd+w7ghYJ+gA==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.4 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.4.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.6.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.6RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    KMrid5qSb2qj2COsp6JWBc8X4mmwUOEyqXIZ64F9KvKF2uexeiXTKlbNwc//41CD
    3xef1hhuTOMhKyiB+jOv06OLQ1fgGMgil8P9aC/XaLxA5mLlYVtTCFQ9r7auI/cM
    3wi9MhYk/J3VjuMUrpCaABfaaU4W39t1xEx8/RerTc91C5e/+/f9wth09ZJgD8Ax
    Lr/yeKOolzEOUh0/CoyVKmC3/wnfqEtvFmzRke4vksNGr2l+7SxA5nh+WFuSkHcs
    20vyewN68Ptp0Ju4FLbXEWAMd/moxNRf46E/yoSJ2Hz/jyT/h2DZ4aBbzeYAKJR4
    ae/rLIEZUnBd+w7ghYJ+gA==
    """

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.0.14" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.0.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    q5bqFR15JaWW6oGM+iNtC7JoDsRHPXAkySJ5TMgcbAfajheMUwgQtytK2S1vpJd7
    UbhO5CfWStBQKFNR6/tV6R++xLbIBZgXhvjLtpciug+dNBMANZNUiqEbdYLZSWEp
    Y3HOk087s3o0wazQ/kLDmFmCzW8bngpcI1rRDJTXCS6uf/0BVatOaIoByJRkArnw
    ir+Hd8swyREt3jrngeePu6/ZrB+5toGcEHaSCmTNwJ7ipKnwi3mPP0XcGWJVswzY
    WpeJUBR9OkzLQ8Y6sKIEOZrDBsoSjFp0YN6Adgbxgbd4UPwgaJVOFdfuW18RNWWw
    Tx/vStIU+zA9/Yan/RotKg==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.5 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.5.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.0.14" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.0.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    q5bqFR15JaWW6oGM+iNtC7JoDsRHPXAkySJ5TMgcbAfajheMUwgQtytK2S1vpJd7
    UbhO5CfWStBQKFNR6/tV6R++xLbIBZgXhvjLtpciug+dNBMANZNUiqEbdYLZSWEp
    Y3HOk087s3o0wazQ/kLDmFmCzW8bngpcI1rRDJTXCS6uf/0BVatOaIoByJRkArnw
    ir+Hd8swyREt3jrngeePu6/ZrB+5toGcEHaSCmTNwJ7ipKnwi3mPP0XcGWJVswzY
    WpeJUBR9OkzLQ8Y6sKIEOZrDBsoSjFp0YN6Adgbxgbd4UPwgaJVOFdfuW18RNWWw
    Tx/vStIU+zA9/Yan/RotKg==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.5 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.5.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "65"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.0.14" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.0.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    q5bqFR15JaWW6oGM+iNtC7JoDsRHPXAkySJ5TMgcbAfajheMUwgQtytK2S1vpJd7
    UbhO5CfWStBQKFNR6/tV6R++xLbIBZgXhvjLtpciug+dNBMANZNUiqEbdYLZSWEp
    Y3HOk087s3o0wazQ/kLDmFmCzW8bngpcI1rRDJTXCS6uf/0BVatOaIoByJRkArnw
    ir+Hd8swyREt3jrngeePu6/ZrB+5toGcEHaSCmTNwJ7ipKnwi3mPP0XcGWJVswzY
    WpeJUBR9OkzLQ8Y6sKIEOZrDBsoSjFp0YN6Adgbxgbd4UPwgaJVOFdfuW18RNWWw
    Tx/vStIU+zA9/Yan/RotKg==
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
