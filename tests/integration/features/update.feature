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
    And Update to version "11.0.5.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    cHDTGRqT5giXS+sgbFsOxvpag1dZRbJdU5OJ1bHp4j1o4/WE5uGM/bEC96G3tbHM
    AT/tOw71l6lMX3zDM9QAZxAY2ZnfnQoBGn6DiURFV7DR/xpEVLY4+d/yLMlpi9bE
    y3l4SxnM0NDbF0brD168Oi4aKquccpXQmngEPK9JcRcN8OZ9PksKQmI8C78b/2b2
    PWXMikNX9t2Ir7pMnCHUoeLAuN/7KVxbkDRKIqVp/7xPEwbFKS2g4YuF7NdA2WA5
    HXOX96B1e8foC+zLoFn/BKhOWMFgOsPogn17xscfsNYsIC8kosegEp0qWmi3pFZ0
    czpgycaoL8+t+4iHq4CLiA==
    """

  Scenario: Updating an up-to-date staged Nextcloud 10.0.6 with PHP 5.4 on the production channel
    Given There is a release with channel "production"
    And The received PHP version is "5.4.0"
    And the installation mtime is "60"
    And The received version is "9.1.6.1"
    When The request is sent
    Then The response is empty

  Scenario: Updating an up-to-date staged Nextcloud 10.0.6 with PHP 5.6 on the production channel
    Given There is a release with channel "production"
    And The received PHP version is "5.6.0"
    And the installation mtime is "60"
    And The received version is "9.1.6.1"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.5.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    cHDTGRqT5giXS+sgbFsOxvpag1dZRbJdU5OJ1bHp4j1o4/WE5uGM/bEC96G3tbHM
    AT/tOw71l6lMX3zDM9QAZxAY2ZnfnQoBGn6DiURFV7DR/xpEVLY4+d/yLMlpi9bE
    y3l4SxnM0NDbF0brD168Oi4aKquccpXQmngEPK9JcRcN8OZ9PksKQmI8C78b/2b2
    PWXMikNX9t2Ir7pMnCHUoeLAuN/7KVxbkDRKIqVp/7xPEwbFKS2g4YuF7NdA2WA5
    HXOX96B1e8foC+zLoFn/BKhOWMFgOsPogn17xscfsNYsIC8kosegEp0qWmi3pFZ0
    czpgycaoL8+t+4iHq4CLiA==
    """

  Scenario: Updating an up-to-date staged Nextcloud 10.0.6 with PHP 5.4 on the stable channel
    Given There is a release with channel "stable"
    And The received PHP version is "5.4.0"
    And the installation mtime is "60"
    And The received version is "9.1.6.1"
    When The request is sent
    Then The response is empty

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
    And Update to version "11.0.5.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    cHDTGRqT5giXS+sgbFsOxvpag1dZRbJdU5OJ1bHp4j1o4/WE5uGM/bEC96G3tbHM
    AT/tOw71l6lMX3zDM9QAZxAY2ZnfnQoBGn6DiURFV7DR/xpEVLY4+d/yLMlpi9bE
    y3l4SxnM0NDbF0brD168Oi4aKquccpXQmngEPK9JcRcN8OZ9PksKQmI8C78b/2b2
    PWXMikNX9t2Ir7pMnCHUoeLAuN/7KVxbkDRKIqVp/7xPEwbFKS2g4YuF7NdA2WA5
    HXOX96B1e8foC+zLoFn/BKhOWMFgOsPogn17xscfsNYsIC8kosegEp0qWmi3pFZ0
    czpgycaoL8+t+4iHq4CLiA==
    """

  Scenario: Updating an outdated Nextcloud 10.0.0 on the beta channel with PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "9.1.0"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.5.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    cHDTGRqT5giXS+sgbFsOxvpag1dZRbJdU5OJ1bHp4j1o4/WE5uGM/bEC96G3tbHM
    AT/tOw71l6lMX3zDM9QAZxAY2ZnfnQoBGn6DiURFV7DR/xpEVLY4+d/yLMlpi9bE
    y3l4SxnM0NDbF0brD168Oi4aKquccpXQmngEPK9JcRcN8OZ9PksKQmI8C78b/2b2
    PWXMikNX9t2Ir7pMnCHUoeLAuN/7KVxbkDRKIqVp/7xPEwbFKS2g4YuF7NdA2WA5
    HXOX96B1e8foC+zLoFn/BKhOWMFgOsPogn17xscfsNYsIC8kosegEp0qWmi3pFZ0
    czpgycaoL8+t+4iHq4CLiA==
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
    Then The response is empty

  Scenario: Updating an up-to-date Nextcloud 10.0.6 on the beta channel without sending PHP version
    Given There is a release with channel "beta"
    And The received version is "9.1.6.1"
    When The request is sent
    Then The response is empty

  Scenario: Updating an outdated Nextcloud 10.0.1 on the beta channel with PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "9.1.1.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.5.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    cHDTGRqT5giXS+sgbFsOxvpag1dZRbJdU5OJ1bHp4j1o4/WE5uGM/bEC96G3tbHM
    AT/tOw71l6lMX3zDM9QAZxAY2ZnfnQoBGn6DiURFV7DR/xpEVLY4+d/yLMlpi9bE
    y3l4SxnM0NDbF0brD168Oi4aKquccpXQmngEPK9JcRcN8OZ9PksKQmI8C78b/2b2
    PWXMikNX9t2Ir7pMnCHUoeLAuN/7KVxbkDRKIqVp/7xPEwbFKS2g4YuF7NdA2WA5
    HXOX96B1e8foC+zLoFn/BKhOWMFgOsPogn17xscfsNYsIC8kosegEp0qWmi3pFZ0
    czpgycaoL8+t+4iHq4CLiA==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.4.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.4RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    fh71fTjM6wj5Bj5JR2G+Z4RsuGAWErrZP1imTzBBm1Fx3nsjpoF9pi2oo4w1e7pi
    gnJeHNJzDLKzey5/GPcZWiLI3gPdzMGE34OIDv3ohm8aOSzl/Xi9zK43faIDXUKi
    F60wJ61DrRYs4ALizadwpknzWalDC3Vgy4BBUcNIYMBsPju7Bg+KXHwdswnXD+qE
    Z4tTsFyGO9wGjjwcR+npcchvpga/W944Y5snYVaes976PjF4VBDER+NQFgLd/7Lo
    x/RzV2uCbvZYbPsA5GdCHPuOSifYLQMnIlVrR227iH5/I7gp6MNs0xILy+3Irtfy
    rPS6+0wZ1lTIgtmjcJeMJw==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel without an mtime
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.4.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.4RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    fh71fTjM6wj5Bj5JR2G+Z4RsuGAWErrZP1imTzBBm1Fx3nsjpoF9pi2oo4w1e7pi
    gnJeHNJzDLKzey5/GPcZWiLI3gPdzMGE34OIDv3ohm8aOSzl/Xi9zK43faIDXUKi
    F60wJ61DrRYs4ALizadwpknzWalDC3Vgy4BBUcNIYMBsPju7Bg+KXHwdswnXD+qE
    Z4tTsFyGO9wGjjwcR+npcchvpga/W944Y5snYVaes976PjF4VBDER+NQFgLd/7Lo
    x/RzV2uCbvZYbPsA5GdCHPuOSifYLQMnIlVrR227iH5/I7gp6MNs0xILy+3Irtfy
    rPS6+0wZ1lTIgtmjcJeMJw==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 stable without PHP version
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The installation mtime is "20"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.3.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    YDatIPqOzjHGdV4sCKAqOHPZORN4k7FswMpfTl8S7JlyRW0aLOxA8KUyBmxmfgVY
    lMujKm2gtCRHGEs7QrG+J5NeJ5g9PS1vWsrU1mCpGgLz1ifjF5VfpSuSTWK3WxpS
    b0aRy+YfJNrfZjYHGFiL/KDlr0+Eu+MWSKHNbM5YZBZcYCbgSQZH4ry2AgMPAqRq
    qaZ9jV3c0nObBq4Ha2qDAmBhcSnVMVmoXrrumgVyzSC+F7CLf7X34TjEPw/hFzr2
    N4FMRE9PHpYqRqoRF+OKNYvcs3MVAiv2QTSjJd2wtiutfaDO8zJUsd/CoTbPr750
    0ee22KtYHJFmotmZ9EjwIg==
    """

  Scenario: Updating a staged outdated Nextcloud 11.0.0 stable without PHP version
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The installation mtime is "15"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.3.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    YDatIPqOzjHGdV4sCKAqOHPZORN4k7FswMpfTl8S7JlyRW0aLOxA8KUyBmxmfgVY
    lMujKm2gtCRHGEs7QrG+J5NeJ5g9PS1vWsrU1mCpGgLz1ifjF5VfpSuSTWK3WxpS
    b0aRy+YfJNrfZjYHGFiL/KDlr0+Eu+MWSKHNbM5YZBZcYCbgSQZH4ry2AgMPAqRq
    qaZ9jV3c0nObBq4Ha2qDAmBhcSnVMVmoXrrumgVyzSC+F7CLf7X34TjEPw/hFzr2
    N4FMRE9PHpYqRqoRF+OKNYvcs3MVAiv2QTSjJd2wtiutfaDO8zJUsd/CoTbPr750
    0ee22KtYHJFmotmZ9EjwIg==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 production without PHP version
    Given There is a release with channel "production"
    And The received version is "11.0.0.2"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.5.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    cHDTGRqT5giXS+sgbFsOxvpag1dZRbJdU5OJ1bHp4j1o4/WE5uGM/bEC96G3tbHM
    AT/tOw71l6lMX3zDM9QAZxAY2ZnfnQoBGn6DiURFV7DR/xpEVLY4+d/yLMlpi9bE
    y3l4SxnM0NDbF0brD168Oi4aKquccpXQmngEPK9JcRcN8OZ9PksKQmI8C78b/2b2
    PWXMikNX9t2Ir7pMnCHUoeLAuN/7KVxbkDRKIqVp/7xPEwbFKS2g4YuF7NdA2WA5
    HXOX96B1e8foC+zLoFn/BKhOWMFgOsPogn17xscfsNYsIC8kosegEp0qWmi3pFZ0
    czpgycaoL8+t+4iHq4CLiA==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the empty channel - will use the stable channel then
    Given There is a release with channel ""
    And The received version is "11.0.0.2"
    And the installation mtime is "20"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.3.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    YDatIPqOzjHGdV4sCKAqOHPZORN4k7FswMpfTl8S7JlyRW0aLOxA8KUyBmxmfgVY
    lMujKm2gtCRHGEs7QrG+J5NeJ5g9PS1vWsrU1mCpGgLz1ifjF5VfpSuSTWK3WxpS
    b0aRy+YfJNrfZjYHGFiL/KDlr0+Eu+MWSKHNbM5YZBZcYCbgSQZH4ry2AgMPAqRq
    qaZ9jV3c0nObBq4Ha2qDAmBhcSnVMVmoXrrumgVyzSC+F7CLf7X34TjEPw/hFzr2
    N4FMRE9PHpYqRqoRF+OKNYvcs3MVAiv2QTSjJd2wtiutfaDO8zJUsd/CoTbPr750
    0ee22KtYHJFmotmZ9EjwIg==
    """

  Scenario: Updating an outdated Nextcloud 12.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.0.15"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.4.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.4RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    fh71fTjM6wj5Bj5JR2G+Z4RsuGAWErrZP1imTzBBm1Fx3nsjpoF9pi2oo4w1e7pi
    gnJeHNJzDLKzey5/GPcZWiLI3gPdzMGE34OIDv3ohm8aOSzl/Xi9zK43faIDXUKi
    F60wJ61DrRYs4ALizadwpknzWalDC3Vgy4BBUcNIYMBsPju7Bg+KXHwdswnXD+qE
    Z4tTsFyGO9wGjjwcR+npcchvpga/W944Y5snYVaes976PjF4VBDER+NQFgLd/7Lo
    x/RzV2uCbvZYbPsA5GdCHPuOSifYLQMnIlVrR227iH5/I7gp6MNs0xILy+3Irtfy
    rPS6+0wZ1lTIgtmjcJeMJw==
    """

  Scenario: Updating an up-to-date Nextcloud 12.0.4 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.4.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is empty

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And The installation mtime is "20"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.3.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    YDatIPqOzjHGdV4sCKAqOHPZORN4k7FswMpfTl8S7JlyRW0aLOxA8KUyBmxmfgVY
    lMujKm2gtCRHGEs7QrG+J5NeJ5g9PS1vWsrU1mCpGgLz1ifjF5VfpSuSTWK3WxpS
    b0aRy+YfJNrfZjYHGFiL/KDlr0+Eu+MWSKHNbM5YZBZcYCbgSQZH4ry2AgMPAqRq
    qaZ9jV3c0nObBq4Ha2qDAmBhcSnVMVmoXrrumgVyzSC+F7CLf7X34TjEPw/hFzr2
    N4FMRE9PHpYqRqoRF+OKNYvcs3MVAiv2QTSjJd2wtiutfaDO8zJUsd/CoTbPr750
    0ee22KtYHJFmotmZ9EjwIg==
    """

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.5.1"
    And The installation mtime is "20"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.3.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    YDatIPqOzjHGdV4sCKAqOHPZORN4k7FswMpfTl8S7JlyRW0aLOxA8KUyBmxmfgVY
    lMujKm2gtCRHGEs7QrG+J5NeJ5g9PS1vWsrU1mCpGgLz1ifjF5VfpSuSTWK3WxpS
    b0aRy+YfJNrfZjYHGFiL/KDlr0+Eu+MWSKHNbM5YZBZcYCbgSQZH4ry2AgMPAqRq
    qaZ9jV3c0nObBq4Ha2qDAmBhcSnVMVmoXrrumgVyzSC+F7CLf7X34TjEPw/hFzr2
    N4FMRE9PHpYqRqoRF+OKNYvcs3MVAiv2QTSjJd2wtiutfaDO8zJUsd/CoTbPr750
    0ee22KtYHJFmotmZ9EjwIg==
    """

  Scenario: Updating an up-to-date Nextcloud 11.0.0 on the stable channel without mtime
    Given There is a release with channel "stable"
    And The received version is "11.0.5.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.3.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    YDatIPqOzjHGdV4sCKAqOHPZORN4k7FswMpfTl8S7JlyRW0aLOxA8KUyBmxmfgVY
    lMujKm2gtCRHGEs7QrG+J5NeJ5g9PS1vWsrU1mCpGgLz1ifjF5VfpSuSTWK3WxpS
    b0aRy+YfJNrfZjYHGFiL/KDlr0+Eu+MWSKHNbM5YZBZcYCbgSQZH4ry2AgMPAqRq
    qaZ9jV3c0nObBq4Ha2qDAmBhcSnVMVmoXrrumgVyzSC+F7CLf7X34TjEPw/hFzr2
    N4FMRE9PHpYqRqoRF+OKNYvcs3MVAiv2QTSjJd2wtiutfaDO8zJUsd/CoTbPr750
    0ee22KtYHJFmotmZ9EjwIg==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the production channel
    Given There is a release with channel "production"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And The installation mtime is "20"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.5.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.5.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    cHDTGRqT5giXS+sgbFsOxvpag1dZRbJdU5OJ1bHp4j1o4/WE5uGM/bEC96G3tbHM
    AT/tOw71l6lMX3zDM9QAZxAY2ZnfnQoBGn6DiURFV7DR/xpEVLY4+d/yLMlpi9bE
    y3l4SxnM0NDbF0brD168Oi4aKquccpXQmngEPK9JcRcN8OZ9PksKQmI8C78b/2b2
    PWXMikNX9t2Ir7pMnCHUoeLAuN/7KVxbkDRKIqVp/7xPEwbFKS2g4YuF7NdA2WA5
    HXOX96B1e8foC+zLoFn/BKhOWMFgOsPogn17xscfsNYsIC8kosegEp0qWmi3pFZ0
    czpgycaoL8+t+4iHq4CLiA==
    """

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.5 on the production channel with PHP 5.6
    Given There is a release with channel "production"
    And The received version is "11.0.5.1"
    And The received PHP version is "5.6.0"
    And The installation mtime is "20"
    When The request is sent
    Then The response is empty

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.5 on the production channel without PHP version
    Given There is a release with channel "production"
    And The received version is "11.0.5.1"
    And The installation mtime is "20"
    When The request is sent
    Then The response is empty

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.4.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.4RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    fh71fTjM6wj5Bj5JR2G+Z4RsuGAWErrZP1imTzBBm1Fx3nsjpoF9pi2oo4w1e7pi
    gnJeHNJzDLKzey5/GPcZWiLI3gPdzMGE34OIDv3ohm8aOSzl/Xi9zK43faIDXUKi
    F60wJ61DrRYs4ALizadwpknzWalDC3Vgy4BBUcNIYMBsPju7Bg+KXHwdswnXD+qE
    Z4tTsFyGO9wGjjwcR+npcchvpga/W944Y5snYVaes976PjF4VBDER+NQFgLd/7Lo
    x/RzV2uCbvZYbPsA5GdCHPuOSifYLQMnIlVrR227iH5/I7gp6MNs0xILy+3Irtfy
    rPS6+0wZ1lTIgtmjcJeMJw==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.4 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.4.1"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is empty

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.3.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    YDatIPqOzjHGdV4sCKAqOHPZORN4k7FswMpfTl8S7JlyRW0aLOxA8KUyBmxmfgVY
    lMujKm2gtCRHGEs7QrG+J5NeJ5g9PS1vWsrU1mCpGgLz1ifjF5VfpSuSTWK3WxpS
    b0aRy+YfJNrfZjYHGFiL/KDlr0+Eu+MWSKHNbM5YZBZcYCbgSQZH4ry2AgMPAqRq
    qaZ9jV3c0nObBq4Ha2qDAmBhcSnVMVmoXrrumgVyzSC+F7CLf7X34TjEPw/hFzr2
    N4FMRE9PHpYqRqoRF+OKNYvcs3MVAiv2QTSjJd2wtiutfaDO8zJUsd/CoTbPr750
    0ee22KtYHJFmotmZ9EjwIg==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.3 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.3.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is empty

 Scenario: Updating an outdated Nextcloud 12.0.3 beta on the production channel
    Given There is a release with channel "production"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.3.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
    YDatIPqOzjHGdV4sCKAqOHPZORN4k7FswMpfTl8S7JlyRW0aLOxA8KUyBmxmfgVY
    lMujKm2gtCRHGEs7QrG+J5NeJ5g9PS1vWsrU1mCpGgLz1ifjF5VfpSuSTWK3WxpS
    b0aRy+YfJNrfZjYHGFiL/KDlr0+Eu+MWSKHNbM5YZBZcYCbgSQZH4ry2AgMPAqRq
    qaZ9jV3c0nObBq4Ha2qDAmBhcSnVMVmoXrrumgVyzSC+F7CLf7X34TjEPw/hFzr2
    N4FMRE9PHpYqRqoRF+OKNYvcs3MVAiv2QTSjJd2wtiutfaDO8zJUsd/CoTbPr750
    0ee22KtYHJFmotmZ9EjwIg==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.3 beta on the production channel
    Given There is a release with channel "production"
    And The received version is "12.0.3.3"
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
    And URL to download is "https://download.nextcloud.com/server/daily/latest-master.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 13.0 daily
    Given There is a release with channel "daily"
    And The received version is "13.0.100"
    And the received build is "2019-10-19T18:44:30+00:00"
    When The request is sent
    Then The response is empty
