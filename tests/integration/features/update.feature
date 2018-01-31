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
    And Update to version "11.0.7.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
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
    And Update to version "11.0.7.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    seXLXR/sD23IWlku0PyyKg50GKjXJPgit96/C9Tj2oJepqGqxUZB790CcblUYNrB
    at3G1R2XCFegzaNuXTE/O8fAQxeHXXzPxaewgOgR0UseM4JzqxrYMdM1t85PqRYH
    rykDSzNdzgkwnKCT5hoLjbJgDSputtmFpt4AOntKL8/IIlLgMjptkF6qSzP6PchK
    KKYwskUesNWrab2Xxcfzs+tOP4dMpk/CPMiA+9gItdDdJPqFoFAGw+GH/oyP7iBq
    78kFVkRzB85QYZhYf+cm/YdXQOXgV/qtNPiEdZsD3ucTfqPFGiOB7ncgZEv2Z0iH
    I/7HIwvOscdRPzvEVi32ag==
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
    And Update to version "11.0.7.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    seXLXR/sD23IWlku0PyyKg50GKjXJPgit96/C9Tj2oJepqGqxUZB790CcblUYNrB
    at3G1R2XCFegzaNuXTE/O8fAQxeHXXzPxaewgOgR0UseM4JzqxrYMdM1t85PqRYH
    rykDSzNdzgkwnKCT5hoLjbJgDSputtmFpt4AOntKL8/IIlLgMjptkF6qSzP6PchK
    KKYwskUesNWrab2Xxcfzs+tOP4dMpk/CPMiA+9gItdDdJPqFoFAGw+GH/oyP7iBq
    78kFVkRzB85QYZhYf+cm/YdXQOXgV/qtNPiEdZsD3ucTfqPFGiOB7ncgZEv2Z0iH
    I/7HIwvOscdRPzvEVi32ag==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.7.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    seXLXR/sD23IWlku0PyyKg50GKjXJPgit96/C9Tj2oJepqGqxUZB790CcblUYNrB
    at3G1R2XCFegzaNuXTE/O8fAQxeHXXzPxaewgOgR0UseM4JzqxrYMdM1t85PqRYH
    rykDSzNdzgkwnKCT5hoLjbJgDSputtmFpt4AOntKL8/IIlLgMjptkF6qSzP6PchK
    KKYwskUesNWrab2Xxcfzs+tOP4dMpk/CPMiA+9gItdDdJPqFoFAGw+GH/oyP7iBq
    78kFVkRzB85QYZhYf+cm/YdXQOXgV/qtNPiEdZsD3ucTfqPFGiOB7ncgZEv2Z0iH
    I/7HIwvOscdRPzvEVi32ag==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel without an mtime
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.7.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    seXLXR/sD23IWlku0PyyKg50GKjXJPgit96/C9Tj2oJepqGqxUZB790CcblUYNrB
    at3G1R2XCFegzaNuXTE/O8fAQxeHXXzPxaewgOgR0UseM4JzqxrYMdM1t85PqRYH
    rykDSzNdzgkwnKCT5hoLjbJgDSputtmFpt4AOntKL8/IIlLgMjptkF6qSzP6PchK
    KKYwskUesNWrab2Xxcfzs+tOP4dMpk/CPMiA+9gItdDdJPqFoFAGw+GH/oyP7iBq
    78kFVkRzB85QYZhYf+cm/YdXQOXgV/qtNPiEdZsD3ucTfqPFGiOB7ncgZEv2Z0iH
    I/7HIwvOscdRPzvEVi32ag==
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
    And Update to version "13.0.0.13" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.0RC4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    BHnnXhU4rAJFktfQ9qSHCSpRdD8OYpfGyGe1JiG7Xvv19sn3pDHm0yXTSIb6c7n6
    mmDeXZkep2lnUrP37qInutYRZMAqSAwyJwoc2ecShd779Sl+l8j39vk+7gbwF/bw
    ThELb1dOHd1qS+D1GLW90gBpZxeUm/bwASqCb0zSjC8nLaO520SiUgccrscT8zNv
    F/9EkNExfQ4xhSA/jYI4wh0RpCvIw6YOcVeIjUnYUcSgvzeiZRPYrCrSk6CClbdJ
    8CkdXFHupnv4NhuXtrifO/lTGcewIvYsgGsBHLbibLCZ+qweUQ5pHRfXqv5Jm4uX
    Udl0s1UIvhl1noGXSd9Uag==
    """

  Scenario: Updating an up-to-date Nextcloud 12.0.4 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.4.3"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.0.13" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.0RC4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    BHnnXhU4rAJFktfQ9qSHCSpRdD8OYpfGyGe1JiG7Xvv19sn3pDHm0yXTSIb6c7n6
    mmDeXZkep2lnUrP37qInutYRZMAqSAwyJwoc2ecShd779Sl+l8j39vk+7gbwF/bw
    ThELb1dOHd1qS+D1GLW90gBpZxeUm/bwASqCb0zSjC8nLaO520SiUgccrscT8zNv
    F/9EkNExfQ4xhSA/jYI4wh0RpCvIw6YOcVeIjUnYUcSgvzeiZRPYrCrSk6CClbdJ
    8CkdXFHupnv4NhuXtrifO/lTGcewIvYsgGsBHLbibLCZ+qweUQ5pHRfXqv5Jm4uX
    Udl0s1UIvhl1noGXSd9Uag==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.0.13" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.0RC4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    BHnnXhU4rAJFktfQ9qSHCSpRdD8OYpfGyGe1JiG7Xvv19sn3pDHm0yXTSIb6c7n6
    mmDeXZkep2lnUrP37qInutYRZMAqSAwyJwoc2ecShd779Sl+l8j39vk+7gbwF/bw
    ThELb1dOHd1qS+D1GLW90gBpZxeUm/bwASqCb0zSjC8nLaO520SiUgccrscT8zNv
    F/9EkNExfQ4xhSA/jYI4wh0RpCvIw6YOcVeIjUnYUcSgvzeiZRPYrCrSk6CClbdJ
    8CkdXFHupnv4NhuXtrifO/lTGcewIvYsgGsBHLbibLCZ+qweUQ5pHRfXqv5Jm4uX
    Udl0s1UIvhl1noGXSd9Uag==
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
    And Update to version "13.0.0.13" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.0RC4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    BHnnXhU4rAJFktfQ9qSHCSpRdD8OYpfGyGe1JiG7Xvv19sn3pDHm0yXTSIb6c7n6
    mmDeXZkep2lnUrP37qInutYRZMAqSAwyJwoc2ecShd779Sl+l8j39vk+7gbwF/bw
    ThELb1dOHd1qS+D1GLW90gBpZxeUm/bwASqCb0zSjC8nLaO520SiUgccrscT8zNv
    F/9EkNExfQ4xhSA/jYI4wh0RpCvIw6YOcVeIjUnYUcSgvzeiZRPYrCrSk6CClbdJ
    8CkdXFHupnv4NhuXtrifO/lTGcewIvYsgGsBHLbibLCZ+qweUQ5pHRfXqv5Jm4uX
    Udl0s1UIvhl1noGXSd9Uag==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.4 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.4.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.0.13" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.0RC4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    BHnnXhU4rAJFktfQ9qSHCSpRdD8OYpfGyGe1JiG7Xvv19sn3pDHm0yXTSIb6c7n6
    mmDeXZkep2lnUrP37qInutYRZMAqSAwyJwoc2ecShd779Sl+l8j39vk+7gbwF/bw
    ThELb1dOHd1qS+D1GLW90gBpZxeUm/bwASqCb0zSjC8nLaO520SiUgccrscT8zNv
    F/9EkNExfQ4xhSA/jYI4wh0RpCvIw6YOcVeIjUnYUcSgvzeiZRPYrCrSk6CClbdJ
    8CkdXFHupnv4NhuXtrifO/lTGcewIvYsgGsBHLbibLCZ+qweUQ5pHRfXqv5Jm4uX
    Udl0s1UIvhl1noGXSd9Uag==
    """

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.5.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    N4ncV+GOn/DPTXUdmj/BH94vCxa4DpbsUI3fDM5HmW4kgVLZ6KTWKwsXVjG0Ec9z
    kkkhnJ+Hu4s21Y0w0Rs56tld3/9W+dsDw2CKsNCwBEuU3hwLj+7kckrNotOI7WDb
    GhhaUf0PKu5NisMBUBM8t+PZrR3+CvTkLOptrE6SiOtUvfs1qKTc/N93e8NNgSyS
    IAM/a0bj2SoROGohFjsWVEddHa39X2GD9T6lGULUR6TV5lGE9ODhsbsiITijUJVF
    O7rE5QeqzfSChkZ0/uP8OtrgRmBLE8PffZrsPPbFrAWaYPF7X3nZ66dzXO4PE7zl
    q6dAKP/WzDTOIWq0Tk2cFg==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.5 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.5.3"
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
    And Update to version "12.0.5.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    N4ncV+GOn/DPTXUdmj/BH94vCxa4DpbsUI3fDM5HmW4kgVLZ6KTWKwsXVjG0Ec9z
    kkkhnJ+Hu4s21Y0w0Rs56tld3/9W+dsDw2CKsNCwBEuU3hwLj+7kckrNotOI7WDb
    GhhaUf0PKu5NisMBUBM8t+PZrR3+CvTkLOptrE6SiOtUvfs1qKTc/N93e8NNgSyS
    IAM/a0bj2SoROGohFjsWVEddHa39X2GD9T6lGULUR6TV5lGE9ODhsbsiITijUJVF
    O7rE5QeqzfSChkZ0/uP8OtrgRmBLE8PffZrsPPbFrAWaYPF7X3nZ66dzXO4PE7zl
    q6dAKP/WzDTOIWq0Tk2cFg==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.5 on the production channel
    Given There is a release with channel "production"
    And The received version is "12.0.5.3"
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
