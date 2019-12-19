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
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-10.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And EOL is set to "1"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 9.0.55 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "9.0.55"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-10.0.6.zip"
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
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-10.0.6.zip"
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
    And Update to version "12.0.13.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.13.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    jZbAdJ9cHzBcw7BatJoX7/0Nv9NdecbsR4wEnRBbWI/EmAQ09HoMmmC1xiY88ME5
    lvHlcEgF0sVTx6tdg4LvqAH2ze34LhzxgIu7mS1tAHIZ81elGhv66VuRv17QYVs1
    7QQySikKMprI+mzdTjIf3rloc97lpm9ynQ+6vizwdxhZ0w5r4Gl85ni52MpeN1Zd
    Sx/Z9LJ0bCIO9C+E6kyQvjI7Q7A+WpMF1SiQL2RJsLJERtV4BP8izVuZQ/hI9NDj
    rdZAAiMKh8jB0atDNbxu24dWI2Ie7MvnzadL6Ax9+qIWUzlZIqX9yXgFVE2RsGVS
    vbaIJ8CiZnKdMBDAdXAVMA==
    """

  Scenario: Updating a staged outdated Nextcloud 11.0.0 stable without PHP version
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The installation mtime is "15"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.13.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.13.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    jZbAdJ9cHzBcw7BatJoX7/0Nv9NdecbsR4wEnRBbWI/EmAQ09HoMmmC1xiY88ME5
    lvHlcEgF0sVTx6tdg4LvqAH2ze34LhzxgIu7mS1tAHIZ81elGhv66VuRv17QYVs1
    7QQySikKMprI+mzdTjIf3rloc97lpm9ynQ+6vizwdxhZ0w5r4Gl85ni52MpeN1Zd
    Sx/Z9LJ0bCIO9C+E6kyQvjI7Q7A+WpMF1SiQL2RJsLJERtV4BP8izVuZQ/hI9NDj
    rdZAAiMKh8jB0atDNbxu24dWI2Ie7MvnzadL6Ax9+qIWUzlZIqX9yXgFVE2RsGVS
    vbaIJ8CiZnKdMBDAdXAVMA==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the empty channel - will use the stable channel then
    Given There is a release with channel ""
    And The received version is "11.0.0.2"
    And the installation mtime is "20"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.13.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.13.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    jZbAdJ9cHzBcw7BatJoX7/0Nv9NdecbsR4wEnRBbWI/EmAQ09HoMmmC1xiY88ME5
    lvHlcEgF0sVTx6tdg4LvqAH2ze34LhzxgIu7mS1tAHIZ81elGhv66VuRv17QYVs1
    7QQySikKMprI+mzdTjIf3rloc97lpm9ynQ+6vizwdxhZ0w5r4Gl85ni52MpeN1Zd
    Sx/Z9LJ0bCIO9C+E6kyQvjI7Q7A+WpMF1SiQL2RJsLJERtV4BP8izVuZQ/hI9NDj
    rdZAAiMKh8jB0atDNbxu24dWI2Ie7MvnzadL6Ax9+qIWUzlZIqX9yXgFVE2RsGVS
    vbaIJ8CiZnKdMBDAdXAVMA==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.12.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    GRVpINAV11LUd+UxjnQtb2gbFHaxNrh9WzzQgPpjaKJ6J28PRQ9sq8J1GlfEN2K7
    RnD/6pFkDRTlBOU56g4XC3GgDpY6F88OVQ0z9D1/nudSZV+cSu6xRuC6q7Z9sStG
    oyDn+o4Z8c+i2yR6zcoVD5itXiU1w41fMT/dlzCtIDmo953+K9fNlTPlU9h9H3MI
    HVECrm+3NmISmI8+5hl4Ju5p8tudxVhGF2aHR0ilG0ff+wjdz5CtsiZXoP+BUNn+
    VFRfhy9vBf+VD6khhFkDXSymw0X6xNN3lMqQIJmJPsPONDXtk2diY6h204uEUofP
    yiBfUT4yVTwIOt+tnqZzzw==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And The installation mtime is "20"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.13.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.13.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    jZbAdJ9cHzBcw7BatJoX7/0Nv9NdecbsR4wEnRBbWI/EmAQ09HoMmmC1xiY88ME5
    lvHlcEgF0sVTx6tdg4LvqAH2ze34LhzxgIu7mS1tAHIZ81elGhv66VuRv17QYVs1
    7QQySikKMprI+mzdTjIf3rloc97lpm9ynQ+6vizwdxhZ0w5r4Gl85ni52MpeN1Zd
    Sx/Z9LJ0bCIO9C+E6kyQvjI7Q7A+WpMF1SiQL2RJsLJERtV4BP8izVuZQ/hI9NDj
    rdZAAiMKh8jB0atDNbxu24dWI2Ie7MvnzadL6Ax9+qIWUzlZIqX9yXgFVE2RsGVS
    vbaIJ8CiZnKdMBDAdXAVMA==
    """

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.6.1"
    And The installation mtime is "20"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.13.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.13.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    jZbAdJ9cHzBcw7BatJoX7/0Nv9NdecbsR4wEnRBbWI/EmAQ09HoMmmC1xiY88ME5
    lvHlcEgF0sVTx6tdg4LvqAH2ze34LhzxgIu7mS1tAHIZ81elGhv66VuRv17QYVs1
    7QQySikKMprI+mzdTjIf3rloc97lpm9ynQ+6vizwdxhZ0w5r4Gl85ni52MpeN1Zd
    Sx/Z9LJ0bCIO9C+E6kyQvjI7Q7A+WpMF1SiQL2RJsLJERtV4BP8izVuZQ/hI9NDj
    rdZAAiMKh8jB0atDNbxu24dWI2Ie7MvnzadL6Ax9+qIWUzlZIqX9yXgFVE2RsGVS
    vbaIJ8CiZnKdMBDAdXAVMA==
    """

  Scenario: Updating an up-to-date Nextcloud 11.0.0 on the stable channel without mtime
    Given There is a release with channel "stable"
    And The received version is "11.0.6.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.13.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.13.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    jZbAdJ9cHzBcw7BatJoX7/0Nv9NdecbsR4wEnRBbWI/EmAQ09HoMmmC1xiY88ME5
    lvHlcEgF0sVTx6tdg4LvqAH2ze34LhzxgIu7mS1tAHIZ81elGhv66VuRv17QYVs1
    7QQySikKMprI+mzdTjIf3rloc97lpm9ynQ+6vizwdxhZ0w5r4Gl85ni52MpeN1Zd
    Sx/Z9LJ0bCIO9C+E6kyQvjI7Q7A+WpMF1SiQL2RJsLJERtV4BP8izVuZQ/hI9NDj
    rdZAAiMKh8jB0atDNbxu24dWI2Ie7MvnzadL6Ax9+qIWUzlZIqX9yXgFVE2RsGVS
    vbaIJ8CiZnKdMBDAdXAVMA==
    """

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.12.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    GRVpINAV11LUd+UxjnQtb2gbFHaxNrh9WzzQgPpjaKJ6J28PRQ9sq8J1GlfEN2K7
    RnD/6pFkDRTlBOU56g4XC3GgDpY6F88OVQ0z9D1/nudSZV+cSu6xRuC6q7Z9sStG
    oyDn+o4Z8c+i2yR6zcoVD5itXiU1w41fMT/dlzCtIDmo953+K9fNlTPlU9h9H3MI
    HVECrm+3NmISmI8+5hl4Ju5p8tudxVhGF2aHR0ilG0ff+wjdz5CtsiZXoP+BUNn+
    VFRfhy9vBf+VD6khhFkDXSymw0X6xNN3lMqQIJmJPsPONDXtk2diY6h204uEUofP
    yiBfUT4yVTwIOt+tnqZzzw==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.5 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.5.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.12.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    GRVpINAV11LUd+UxjnQtb2gbFHaxNrh9WzzQgPpjaKJ6J28PRQ9sq8J1GlfEN2K7
    RnD/6pFkDRTlBOU56g4XC3GgDpY6F88OVQ0z9D1/nudSZV+cSu6xRuC6q7Z9sStG
    oyDn+o4Z8c+i2yR6zcoVD5itXiU1w41fMT/dlzCtIDmo953+K9fNlTPlU9h9H3MI
    HVECrm+3NmISmI8+5hl4Ju5p8tudxVhGF2aHR0ilG0ff+wjdz5CtsiZXoP+BUNn+
    VFRfhy9vBf+VD6khhFkDXSymw0X6xNN3lMqQIJmJPsPONDXtk2diY6h204uEUofP
    yiBfUT4yVTwIOt+tnqZzzw==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.5 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "12.0.5.3"
    And The received PHP version is "5.6.0"
    And the installation mtime is "65"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.12.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    GRVpINAV11LUd+UxjnQtb2gbFHaxNrh9WzzQgPpjaKJ6J28PRQ9sq8J1GlfEN2K7
    RnD/6pFkDRTlBOU56g4XC3GgDpY6F88OVQ0z9D1/nudSZV+cSu6xRuC6q7Z9sStG
    oyDn+o4Z8c+i2yR6zcoVD5itXiU1w41fMT/dlzCtIDmo953+K9fNlTPlU9h9H3MI
    HVECrm+3NmISmI8+5hl4Ju5p8tudxVhGF2aHR0ilG0ff+wjdz5CtsiZXoP+BUNn+
    VFRfhy9vBf+VD6khhFkDXSymw0X6xNN3lMqQIJmJPsPONDXtk2diY6h204uEUofP
    yiBfUT4yVTwIOt+tnqZzzw==
    """

 Scenario: Updating an outdated Nextcloud 13.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "13.0.0.16"
    And The received PHP version is "7.0.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.14.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-14.0.14.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    Nw1PhE391uasWeU66JtBoJGTRHDdImBNBkpMlh4nTG6UJFouFTDDmqHq6DcanS5e
    qoC79rxiC7lloaN/05AZ7AY1FSNjG5G9xPM4OWgTCbwXhUfD3DjGVzzbMVnTWgeK
    ZMgZqqU8F4uWHkcEB0fqImZYnFMdX7E7xZmEIO8BSOOdS6PvvZTAeDXEwWSBMRVa
    7wEYp/hwJzV3UCy5SThYHqs+8EIdQeql1/3o/P/0bsGnsgpLGK/2bV4lzVV74m3T
    RrZ6EDdSnGyybYX4QGv/wfng9RijMdMdr1SYzJfkRKj+JX37zgscL/87XgnApkQS
    FaqAZYszh1hjGEyQaoibXw==
    """

 Scenario: Updating an outdated Nextcloud 13.0.0 beta on the stable channel (php 5.6)
    Given There is a release with channel "stable"
    And The received version is "13.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.12.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    GRVpINAV11LUd+UxjnQtb2gbFHaxNrh9WzzQgPpjaKJ6J28PRQ9sq8J1GlfEN2K7
    RnD/6pFkDRTlBOU56g4XC3GgDpY6F88OVQ0z9D1/nudSZV+cSu6xRuC6q7Z9sStG
    oyDn+o4Z8c+i2yR6zcoVD5itXiU1w41fMT/dlzCtIDmo953+K9fNlTPlU9h9H3MI
    HVECrm+3NmISmI8+5hl4Ju5p8tudxVhGF2aHR0ilG0ff+wjdz5CtsiZXoP+BUNn+
    VFRfhy9vBf+VD6khhFkDXSymw0X6xNN3lMqQIJmJPsPONDXtk2diY6h204uEUofP
    yiBfUT4yVTwIOt+tnqZzzw==
    """

 Scenario: Updating an up-to-date Nextcloud 13.0.7 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "13.0.7.2"
    And The received PHP version is "7.0.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.14.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-14.0.14.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    Nw1PhE391uasWeU66JtBoJGTRHDdImBNBkpMlh4nTG6UJFouFTDDmqHq6DcanS5e
    qoC79rxiC7lloaN/05AZ7AY1FSNjG5G9xPM4OWgTCbwXhUfD3DjGVzzbMVnTWgeK
    ZMgZqqU8F4uWHkcEB0fqImZYnFMdX7E7xZmEIO8BSOOdS6PvvZTAeDXEwWSBMRVa
    7wEYp/hwJzV3UCy5SThYHqs+8EIdQeql1/3o/P/0bsGnsgpLGK/2bV4lzVV74m3T
    RrZ6EDdSnGyybYX4QGv/wfng9RijMdMdr1SYzJfkRKj+JX37zgscL/87XgnApkQS
    FaqAZYszh1hjGEyQaoibXw==
    """

 Scenario: Updating an up-to-date Nextcloud 13.0.11 on the stable channel (late update)
    Given There is a release with channel "stable"
    And The received version is "13.0.11.1"
    And The received PHP version is "7.0.0"
    And the installation mtime is "65"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.14.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-14.0.14.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    Nw1PhE391uasWeU66JtBoJGTRHDdImBNBkpMlh4nTG6UJFouFTDDmqHq6DcanS5e
    qoC79rxiC7lloaN/05AZ7AY1FSNjG5G9xPM4OWgTCbwXhUfD3DjGVzzbMVnTWgeK
    ZMgZqqU8F4uWHkcEB0fqImZYnFMdX7E7xZmEIO8BSOOdS6PvvZTAeDXEwWSBMRVa
    7wEYp/hwJzV3UCy5SThYHqs+8EIdQeql1/3o/P/0bsGnsgpLGK/2bV4lzVV74m3T
    RrZ6EDdSnGyybYX4QGv/wfng9RijMdMdr1SYzJfkRKj+JX37zgscL/87XgnApkQS
    FaqAZYszh1hjGEyQaoibXw==
    """

 Scenario: Updating an up-to-date Nextcloud 13.0.12 on the stable channel (php 5.6)
    Given There is a release with channel "stable"
    And The received version is "13.0.12.1"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.14.1" is available
    And URL to download is "https://nextcloud.com/outdated-php-5-6/"
    And URL to documentation is "https://nextcloud.com/outdated-php-5-6/"
    And No signature is set
    And Autoupdater is set to "0"

 Scenario: Updating an outdated Nextcloud 14.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "14.0.0.18"
    And The received PHP version is "7.0.0"
    And the installation mtime is "30"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.12.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-15.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    ky2vKMSu1tjkpsPaAf6CkqtKJwkeZ8fxT9a9TBNwAAbl3AAIYqQKjT0Np5nvFwzb
    Z9N2axbhWdy0WuY7ffxDwYL7lKzzJ4nfeYzIVJV49y1W2kbz5KvDhX4/ACgGw42m
    WSmJdyx7hnp5JdcddA/eZDh2yrffC+MjrSaZXBvitnxMtI2xaeOUpphvjKgy8wF+
    Cb8hjiKCAbhG11F2qq8TpX79l5I1n32RhvhJMc1GXmSSlR+dKK0zVIspW9ENMsRc
    xsVlYeI9cGdGpShVj4eC3ya2ZZ0KFsEwwvJlOjXbJ8Ctw133fWEp/1nGFuiCP3sZ
    nfCSJ75Tc780Fqo0Q4pc8A==
    """

 Scenario: Updating an up-to-date Nextcloud 14.0.8 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "14.0.8.2"
    And The received PHP version is "7.0.0"
    And the installation mtime is "90"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.12.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-15.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    ky2vKMSu1tjkpsPaAf6CkqtKJwkeZ8fxT9a9TBNwAAbl3AAIYqQKjT0Np5nvFwzb
    Z9N2axbhWdy0WuY7ffxDwYL7lKzzJ4nfeYzIVJV49y1W2kbz5KvDhX4/ACgGw42m
    WSmJdyx7hnp5JdcddA/eZDh2yrffC+MjrSaZXBvitnxMtI2xaeOUpphvjKgy8wF+
    Cb8hjiKCAbhG11F2qq8TpX79l5I1n32RhvhJMc1GXmSSlR+dKK0zVIspW9ENMsRc
    xsVlYeI9cGdGpShVj4eC3ya2ZZ0KFsEwwvJlOjXbJ8Ctw133fWEp/1nGFuiCP3sZ
    nfCSJ75Tc780Fqo0Q4pc8A==
    """

 Scenario: Updating an outdated Nextcloud 15.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "15.0.0.9"
    And The received PHP version is "7.0.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.14.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-15.0.14.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
     """
     A5WWizBmhSC+dfJNrA3eNjx4w3w9i+9GKs0TWCEOAi74E1gfQymaSa3UNdm/fjmP
     Osy1fnmICjDfXoIwkle+dlfAbwg2faRkF1px9a538Y5XXTXZ63P5JXABHYSvIAY3
     QDk2CwzM4tSiL2rf7tGgG8uxtvXkyG7DfHH7BweKFBPQ0Ly2ESiSHzVagAHo7f/O
     x3G7qC6o4g8pVPfVyXhOZcwf29et9DY3xtKluMQxrmHVTQ6mJ65IRny+/MNMrjwf
     05B0WC1WDnIiMAfUcEMovxuqoFexvrpnJ9ByOPPLTYMWfpQcJHjw4FiqgFQ/of/i
     DvYBQvWAJx0Q7tV9bofZjA==
     """

  Scenario: Updating an up-to-date Nextcloud 14.0.10 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "14.0.10.0"
    And The received PHP version is "7.0.0"
    And the installation mtime is "30"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.12.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-15.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    ky2vKMSu1tjkpsPaAf6CkqtKJwkeZ8fxT9a9TBNwAAbl3AAIYqQKjT0Np5nvFwzb
    Z9N2axbhWdy0WuY7ffxDwYL7lKzzJ4nfeYzIVJV49y1W2kbz5KvDhX4/ACgGw42m
    WSmJdyx7hnp5JdcddA/eZDh2yrffC+MjrSaZXBvitnxMtI2xaeOUpphvjKgy8wF+
    Cb8hjiKCAbhG11F2qq8TpX79l5I1n32RhvhJMc1GXmSSlR+dKK0zVIspW9ENMsRc
    xsVlYeI9cGdGpShVj4eC3ya2ZZ0KFsEwwvJlOjXbJ8Ctw133fWEp/1nGFuiCP3sZ
    nfCSJ75Tc780Fqo0Q4pc8A==
    """

  Scenario: Updating an up-to-date Nextcloud 15.0.7 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "15.0.7.0"
    And The received PHP version is "7.1.0"
    And the installation mtime is "15"
    When The request is sent
    Then The response is non-empty
    And Update to version "16.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-16.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    nFE6lCqzsoyiRuNrBv5qNODIG7nW/FinO/uuNR296Zzdcu4hqdlCaFSFep15vpB0
    fLD13HaT3omwb4AS9WVt7UN0tL6a0/XYOp29+byFIjd2JJQRmAbbFgeaV9G48JL2
    AVZQAV0MNiiW5JUv4DcIVLLV1hQ0c5AS5XSpvQcGf5CmptrGMCrXtrgLm5mmhzfH
    TiXAb4JZu6UeIZlnzygFgs41uiXQZVCzNg26XnvJFv/yEST9+Y1ExYmI/kaIOUMK
    7KjJy1UWqBuwlVkbgckG240f7YicMioFIplPpB5IUkxdIu/R0g3y9jBjw7HOwCbo
    Pixphd+KrSmXSX1p9fXsIA==
    """

  Scenario: Updating an up-to-date Nextcloud 15.0.8 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "15.0.8.1"
    And The received PHP version is "7.1.0"
    And the installation mtime is "30"
    When The request is sent
    Then The response is non-empty
    And Update to version "16.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-16.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    nFE6lCqzsoyiRuNrBv5qNODIG7nW/FinO/uuNR296Zzdcu4hqdlCaFSFep15vpB0
    fLD13HaT3omwb4AS9WVt7UN0tL6a0/XYOp29+byFIjd2JJQRmAbbFgeaV9G48JL2
    AVZQAV0MNiiW5JUv4DcIVLLV1hQ0c5AS5XSpvQcGf5CmptrGMCrXtrgLm5mmhzfH
    TiXAb4JZu6UeIZlnzygFgs41uiXQZVCzNg26XnvJFv/yEST9+Y1ExYmI/kaIOUMK
    7KjJy1UWqBuwlVkbgckG240f7YicMioFIplPpB5IUkxdIu/R0g3y9jBjw7HOwCbo
    Pixphd+KrSmXSX1p9fXsIA==
    """

  Scenario: Updating an up-to-date Nextcloud 16.0.1 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "16.0.1.1"
    And The received PHP version is "7.2.0"
    And the installation mtime is "70"
    When The request is sent
    Then The response is non-empty
    And Update to version "17.0.2.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-17.0.2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    iJ366fgx+zH3tEbM2kPLvwqm3GgeXdwu8Fg0eOsw642TqB/7FKkL940Tj9e8UdNr
    pQXXmfTxc/X9UXmmBf2be+g18+EORlE656+AHOGpImqSg6c/iMGFSyj9iPZgjk5F
    IDdagzpqNjZt8RVF3Ka/EBSSD2Xkrx71IKWxU8Yj0OhdXgPGrBFhxBmzT6Jibu6e
    LVdwNzom8VhIKeOiteZ0LfioqIqBcpjRBzuZ6qm0izHQUAvxsFDN8gdUGdDmOzyM
    7lZPg0Hh+7+Hp+AtSbOKmx9qUwM651QZ8tA2R2XPBrfjMDbWhFUuggfLwNrwD6mq
    7mBUyQAHyb2Na0zF6rT8UA==
    """

  Scenario: Updating an up-to-date Nextcloud 16.0.1 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "16.0.1.1"
    And The received PHP version is "7.2.0"
    And the installation mtime is "40"
    When The request is sent
    Then The response is non-empty
    And Update to version "16.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-16.0.7.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    nFE6lCqzsoyiRuNrBv5qNODIG7nW/FinO/uuNR296Zzdcu4hqdlCaFSFep15vpB0
    fLD13HaT3omwb4AS9WVt7UN0tL6a0/XYOp29+byFIjd2JJQRmAbbFgeaV9G48JL2
    AVZQAV0MNiiW5JUv4DcIVLLV1hQ0c5AS5XSpvQcGf5CmptrGMCrXtrgLm5mmhzfH
    TiXAb4JZu6UeIZlnzygFgs41uiXQZVCzNg26XnvJFv/yEST9+Y1ExYmI/kaIOUMK
    7KjJy1UWqBuwlVkbgckG240f7YicMioFIplPpB5IUkxdIu/R0g3y9jBjw7HOwCbo
    Pixphd+KrSmXSX1p9fXsIA==
    """

  Scenario: Updating an up-to-date Nextcloud 17.0.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "17.0.0.8"
    And The received PHP version is "7.2.0"
    And the installation mtime is "30"
    When The request is sent
    Then The response is non-empty
    And Update to version "17.0.2.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-17.0.2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    iJ366fgx+zH3tEbM2kPLvwqm3GgeXdwu8Fg0eOsw642TqB/7FKkL940Tj9e8UdNr
    pQXXmfTxc/X9UXmmBf2be+g18+EORlE656+AHOGpImqSg6c/iMGFSyj9iPZgjk5F
    IDdagzpqNjZt8RVF3Ka/EBSSD2Xkrx71IKWxU8Yj0OhdXgPGrBFhxBmzT6Jibu6e
    LVdwNzom8VhIKeOiteZ0LfioqIqBcpjRBzuZ6qm0izHQUAvxsFDN8gdUGdDmOzyM
    7lZPg0Hh+7+Hp+AtSbOKmx9qUwM651QZ8tA2R2XPBrfjMDbWhFUuggfLwNrwD6mq
    7mBUyQAHyb2Na0zF6rT8UA==
    """
