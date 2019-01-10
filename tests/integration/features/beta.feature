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
    And Update to version "13.0.9.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.9.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    rehJgqUaStoNHib1vsA6HDqa7fnbyLQzRhobahQvBV/YUBHAroRkOyWKbEeUak87
    fHYHYs/pVmqE83cHxMhx5lmKQ/syQLS+pF7dHCP26fiz9kink61c2R2qOXpevIUQ
    isN1KoNp6qW9y9o9yoyWzMcu4tM+QL9HYFv//5pIXToi6ZmPXgZHtMNsypi31vyg
    W2agvoSrpWLH1qt6LNAQPq+3MreY2IM7aW9VQedH0yXbcLOoe6yW/9EP956kuW0t
    bEcPOMbL1oHIBx5Vb5gbRyVDYmdSX5FBgGz8WV2Gdrhq2vHF2bb62TkxcL3xCWtA
    l7z9Jqz0zO2ZF21HB5bkhA==
    """

  Scenario: Updating an up-to-date Nextcloud 12.0.7 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.7.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.9.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.9.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    rehJgqUaStoNHib1vsA6HDqa7fnbyLQzRhobahQvBV/YUBHAroRkOyWKbEeUak87
    fHYHYs/pVmqE83cHxMhx5lmKQ/syQLS+pF7dHCP26fiz9kink61c2R2qOXpevIUQ
    isN1KoNp6qW9y9o9yoyWzMcu4tM+QL9HYFv//5pIXToi6ZmPXgZHtMNsypi31vyg
    W2agvoSrpWLH1qt6LNAQPq+3MreY2IM7aW9VQedH0yXbcLOoe6yW/9EP956kuW0t
    bEcPOMbL1oHIBx5Vb5gbRyVDYmdSX5FBgGz8WV2Gdrhq2vHF2bb62TkxcL3xCWtA
    l7z9Jqz0zO2ZF21HB5bkhA==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.9.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.9.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    rehJgqUaStoNHib1vsA6HDqa7fnbyLQzRhobahQvBV/YUBHAroRkOyWKbEeUak87
    fHYHYs/pVmqE83cHxMhx5lmKQ/syQLS+pF7dHCP26fiz9kink61c2R2qOXpevIUQ
    isN1KoNp6qW9y9o9yoyWzMcu4tM+QL9HYFv//5pIXToi6ZmPXgZHtMNsypi31vyg
    W2agvoSrpWLH1qt6LNAQPq+3MreY2IM7aW9VQedH0yXbcLOoe6yW/9EP956kuW0t
    bEcPOMbL1oHIBx5Vb5gbRyVDYmdSX5FBgGz8WV2Gdrhq2vHF2bb62TkxcL3xCWtA
    l7z9Jqz0zO2ZF21HB5bkhA==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    And the installation mtime is "90"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.9.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.9.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    rehJgqUaStoNHib1vsA6HDqa7fnbyLQzRhobahQvBV/YUBHAroRkOyWKbEeUak87
    fHYHYs/pVmqE83cHxMhx5lmKQ/syQLS+pF7dHCP26fiz9kink61c2R2qOXpevIUQ
    isN1KoNp6qW9y9o9yoyWzMcu4tM+QL9HYFv//5pIXToi6ZmPXgZHtMNsypi31vyg
    W2agvoSrpWLH1qt6LNAQPq+3MreY2IM7aW9VQedH0yXbcLOoe6yW/9EP956kuW0t
    bEcPOMbL1oHIBx5Vb5gbRyVDYmdSX5FBgGz8WV2Gdrhq2vHF2bb62TkxcL3xCWtA
    l7z9Jqz0zO2ZF21HB5bkhA==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 7.0
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.5.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-14.0.5RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    kzK9VgjnyMbkR2zNgzpvYEa3BuQlrMZAmsMAHx0FSyuQJ33vN6tn5+J5hXae9mKW
    aQiKZhgJODJ6oi03S3ZnMUtYtPBcjTRqj6Q+ZB9DkeZnNWZkfE5KoECY+H6JYmqm
    533HSLI5BihnStZoxgU5mlMxx9FDbsI1T17QgZEwIG/ZeexoyNElBIaTmH7IL7co
    SFjmksJPdcE2w1/ohtLR++13MwSEUpogq/OmJidgF4gvryoW28koRpBRlhOR2zPG
    8hyohaaAB0TVXfOby8kTUpLQ3Pab2f4MOK5IzvDsskvTOtZ0iI+QKZdakUI16cI1
    qj9u0T9uIQBwpt+eF/qz7g==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 7.0
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "90"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.5.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-14.0.5RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    kzK9VgjnyMbkR2zNgzpvYEa3BuQlrMZAmsMAHx0FSyuQJ33vN6tn5+J5hXae9mKW
    aQiKZhgJODJ6oi03S3ZnMUtYtPBcjTRqj6Q+ZB9DkeZnNWZkfE5KoECY+H6JYmqm
    533HSLI5BihnStZoxgU5mlMxx9FDbsI1T17QgZEwIG/ZeexoyNElBIaTmH7IL7co
    SFjmksJPdcE2w1/ohtLR++13MwSEUpogq/OmJidgF4gvryoW28koRpBRlhOR2zPG
    8hyohaaAB0TVXfOby8kTUpLQ3Pab2f4MOK5IzvDsskvTOtZ0iI+QKZdakUI16cI1
    qj9u0T9uIQBwpt+eF/qz7g==
    """

  Scenario: Updating an up-to-date Nextcloud 14.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "14.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "9"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.1.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-15.0.1RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    lWfgNpHkfoLo0iI61MUdpJH8hfq1anmqagmEJi/mKFzdlQgcOkdxct1COlmGWr3v
    GaUm/HkIkGRtkEG2FU79zdHp4Z6Z3y/BY/knGZG/6YLvFcyBm49A5Ub6Y0L47llC
    1H/bnHl6lgvb2hMF+bKLcK7FEAmP66RVt8SXm7e66h7ShQdy1Byg3IcIhWVKZmdA
    RZg0HpGwMkJODHSI3MXqgt8yb/lDPTb9oWOBQ/bPgUnXwhTBKSnMTuIHjRUUFHQ7
    y0ELeAcA8BH2v7LLx89EPSdyfFPE2hD/ex4G71pADUZTne0cZjnhc4FSlou5VREJ
    DWwKcXWlP8hiZ8Dc+sUjZQ==
    """

  Scenario: Updating an up-to-date Nextcloud 14.0.3 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "14.0.3.0"
    And The received PHP version is "7.0.0"
    And the installation mtime is "9"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.1.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-15.0.1RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    lWfgNpHkfoLo0iI61MUdpJH8hfq1anmqagmEJi/mKFzdlQgcOkdxct1COlmGWr3v
    GaUm/HkIkGRtkEG2FU79zdHp4Z6Z3y/BY/knGZG/6YLvFcyBm49A5Ub6Y0L47llC
    1H/bnHl6lgvb2hMF+bKLcK7FEAmP66RVt8SXm7e66h7ShQdy1Byg3IcIhWVKZmdA
    RZg0HpGwMkJODHSI3MXqgt8yb/lDPTb9oWOBQ/bPgUnXwhTBKSnMTuIHjRUUFHQ7
    y0ELeAcA8BH2v7LLx89EPSdyfFPE2hD/ex4G71pADUZTne0cZjnhc4FSlou5VREJ
    DWwKcXWlP8hiZ8Dc+sUjZQ==
    """

  Scenario: Updating an  outdated Nextcloud 15.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "15.0.0.0"
    And The received PHP version is "7.0.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.1.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-15.0.1RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    lWfgNpHkfoLo0iI61MUdpJH8hfq1anmqagmEJi/mKFzdlQgcOkdxct1COlmGWr3v
    GaUm/HkIkGRtkEG2FU79zdHp4Z6Z3y/BY/knGZG/6YLvFcyBm49A5Ub6Y0L47llC
    1H/bnHl6lgvb2hMF+bKLcK7FEAmP66RVt8SXm7e66h7ShQdy1Byg3IcIhWVKZmdA
    RZg0HpGwMkJODHSI3MXqgt8yb/lDPTb9oWOBQ/bPgUnXwhTBKSnMTuIHjRUUFHQ7
    y0ELeAcA8BH2v7LLx89EPSdyfFPE2hD/ex4G71pADUZTne0cZjnhc4FSlou5VREJ
    DWwKcXWlP8hiZ8Dc+sUjZQ==
    """
