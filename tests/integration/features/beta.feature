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
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-10.0.6.zip"
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
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-10.0.6.zip"
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

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel without an mtime
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
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

  Scenario: Updating an outdated Nextcloud 12.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.0.15"
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

  Scenario: Updating an up-to-date Nextcloud 12.0.7 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.7.1"
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

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
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

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    And the installation mtime is "90"
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

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 7.0
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
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

  Scenario: Updating an up-to-date Nextcloud 14.0.3 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "14.0.3.0"
    And The received PHP version is "7.0.0"
    And the installation mtime is "9"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.12.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-15.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    ky2vKMSu1tjkpsPaAf6CkqtKJwkeZ8fxT9a9TBNwAAbl3AAIYqQKjT0Np5nvFwzb
    Z9N2axbhWdy0WuY7ffxDwYL7lKzzJ4nfeYzIVJV49y1W2kbz5KvDhX4/ACgGw42m
    WSmJdyx7hnp5JdcddA/eZDh2yrffC+MjrSaZXBvitnxMtI2xaeOUpphvjKgy8wF+
    Cb8hjiKCAbhG11F2qq8TpX79l5I1n32RhvhJMc1GXmSSlR+dKK0zVIspW9ENMsRc
    xsVlYeI9cGdGpShVj4eC3ya2ZZ0KFsEwwvJlOjXbJ8Ctw133fWEp/1nGFuiCP3sZ
    nfCSJ75Tc780Fqo0Q4pc8A==
    """

  Scenario: Updating an outdated Nextcloud 15.0.0 on the beta channel with incompatible PHP
    Given There is a release with channel "beta"
    And The received version is "15.0.0.0"
    And The received PHP version is "7.0.0"
    And the installation mtime is "39"
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

  Scenario: Updating an outdated Nextcloud 15.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "15.0.0.0"
    And The received PHP version is "7.1.0"
    And the installation mtime is "41"
    When The request is sent
    Then The response is non-empty
    And Update to version "16.0.10.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-16.0.10.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    ONalj9Sg950TX2mX6K4ewPnlHdfQXsxTySrnmv9Y3OU8/hq7jVzu9F5HTUDgb49w
    LDwGEsxgwaJb7mSHJxz1YpCouNEUYCAuQvtdNZtgInhKdrrl4TCukmzsufr88md0
    WLV54GWV0ChwKCEuFxPHv3HGkiUdwLongzDCOclyYgfZiBsRjXODAJ7e24BOBdos
    lCzypaOy6TJmnW9FLVjY+lKR8OOqDGUDonozFaWDR99IMyRA/MzzK/mtzG//0L5J
    YUFa/dLKC9kDvdxtWv9NhWR+TTWZ/In+UE9TfbXPKWvFhn+bQvo8STQ9Xy0h6TtP
    p/i6aEm7uqv29k76A+FHEA==
    """

  Scenario: Updating an outdated Nextcloud 16.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "16.0.0.0"
    And The received PHP version is "7.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "17.0.6.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-17.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    NzziwiDIM/fLE70kL2PEvND2vY4Wn1D2Wthpqmvx+9P7+z7/TjFHmJzSwtcB8G8s
    YMFJxN+TxzMNgFX8pyg6/5i/WK7M/hjwrTpggPwdrBFYj4dhBJyDIX0HvqI5CEKU
    5zfjeGuBlPapo6GZLyB/m9g3h8oRZKlxBtGHJ/ajot1a3DC4P3VhS/6gnV0xu3dl
    QSmg5lRu8s5tLagvd63hIYT7QWQnVxFFgHAfAgTRTYzTkno8WcL4lWAY1koKs9jw
    b/+5UwnQTwGoUKCkAiTeP85SQB8fLg/ClZeLoyvFfXsKSHhWHdlPUlETqwZ3DXJi
    pPz7NXeVc4FMNn0ES5BuMw==
    """

  Scenario: Updating an outdated Nextcloud 17.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "17.0.0.2"
    And The received PHP version is "7.2.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "18.0.4.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-18.0.4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    ORSMrf2SEGyQY7cNSUugbIW3kcCMvj0/DrVqAFaemMCB6ROf/2eM0jiQHUCkr8JX
    jZc1GT5gBSedVoK9ydGcwKGTbRi8Br7SdLguaddwpr6JZola3vp7Nyv8zFiqyM+G
    ts6grDInEULqU8kQvMpbZ0uC1BVfVO8tNo7Z+PeoUn+W3qNlIp0SAcHqgB09aOIY
    xU99JPD0Xu4q7s/X35YRsKQQbKPnz6EeSTcHeoEyR1fbGyh6V3/3l3R4GUWVXMCV
    fOTMuBBBK5UCkrjDhKxPsLBAi5ZfHMhBTSzUNIWSEgbnA3FHptzxSfyQQ/36q1a1
    g+WgFEA29UXQt4NDgGTXUw==
    """

  Scenario: Updating an outdated Nextcloud 18.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "18.0.0.3"
    And The received PHP version is "7.2.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "19.0.0.10" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-19.0.0RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    pr99IaYFjvM7ke45h5t5M7ToULY2kuxn+NeOJ2vUgzLcAbBU003BuI1p1Y+CVEk8
    CoJ+c4xwrlakRdwC4NwCEhyhcwZRTl2Z+xO1BndCVSUxgDJkC25Sywin/W2XIRze
    sQujBBRKLuumKvfwxgw5TgR+pO/VQaSABkfkw6W5Qi8YgWhABigS3pBnfvWyxGFw
    EBjOdUVBZbyIRllv1GDQH5D7Cod9+u8qOeOqyWsg4uZ563OphNCD/jTSoRoZPRBA
    6m3FYt0zjAsvZfMx1CF7UV8X7A7WNuRXINpENtNpEvpW2GWWP0mk/I6ZL4A+tYPb
    SRVMI2CWCVZP2qT5w6fkqQ==
    """

  Scenario: Updating an outdated Nextcloud 19.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "19.0.0.2"
    And The received PHP version is "7.2.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "19.0.0.10" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-19.0.0RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    pr99IaYFjvM7ke45h5t5M7ToULY2kuxn+NeOJ2vUgzLcAbBU003BuI1p1Y+CVEk8
    CoJ+c4xwrlakRdwC4NwCEhyhcwZRTl2Z+xO1BndCVSUxgDJkC25Sywin/W2XIRze
    sQujBBRKLuumKvfwxgw5TgR+pO/VQaSABkfkw6W5Qi8YgWhABigS3pBnfvWyxGFw
    EBjOdUVBZbyIRllv1GDQH5D7Cod9+u8qOeOqyWsg4uZ563OphNCD/jTSoRoZPRBA
    6m3FYt0zjAsvZfMx1CF7UV8X7A7WNuRXINpENtNpEvpW2GWWP0mk/I6ZL4A+tYPb
    SRVMI2CWCVZP2qT5w6fkqQ==
    """
