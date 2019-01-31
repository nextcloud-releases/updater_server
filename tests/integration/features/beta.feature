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
    And Update to version "13.0.11.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.11RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    QmUxebC1Xc5azgyL5hyzIykfjjPtYfM+zvPUoYajNuQfm2wwdqTO3m2dWnabgWYN
    Cqm8L+cbrCrcwmm+efO5Ewr9cXB5BzrXIoll5ODD7hEOw/dFD6RPoSrw3C+8KnLb
    mqEx9o1/xMHvAdVpgKjktDHsucn3DWti1UtWTD6z4bFJfEi1gl+QkrwDlz0lptye
    vNO6pbTSu92fBV2l3zyQK8zlrZMUBIHvJtAIK0tF59mvfWNOAQCxDoBE9fanokYA
    6IPg1s+TO7zbn3n3Y84xYZB90KDD8i6i9poOR0Fg/61BMgu+efVbke82eiJCkTSi
    F0NdyBpw9eMqjeT/Kp7vIA==
    """

  Scenario: Updating an up-to-date Nextcloud 12.0.7 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.7.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.11.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.11RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    QmUxebC1Xc5azgyL5hyzIykfjjPtYfM+zvPUoYajNuQfm2wwdqTO3m2dWnabgWYN
    Cqm8L+cbrCrcwmm+efO5Ewr9cXB5BzrXIoll5ODD7hEOw/dFD6RPoSrw3C+8KnLb
    mqEx9o1/xMHvAdVpgKjktDHsucn3DWti1UtWTD6z4bFJfEi1gl+QkrwDlz0lptye
    vNO6pbTSu92fBV2l3zyQK8zlrZMUBIHvJtAIK0tF59mvfWNOAQCxDoBE9fanokYA
    6IPg1s+TO7zbn3n3Y84xYZB90KDD8i6i9poOR0Fg/61BMgu+efVbke82eiJCkTSi
    F0NdyBpw9eMqjeT/Kp7vIA==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.11.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.11RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    QmUxebC1Xc5azgyL5hyzIykfjjPtYfM+zvPUoYajNuQfm2wwdqTO3m2dWnabgWYN
    Cqm8L+cbrCrcwmm+efO5Ewr9cXB5BzrXIoll5ODD7hEOw/dFD6RPoSrw3C+8KnLb
    mqEx9o1/xMHvAdVpgKjktDHsucn3DWti1UtWTD6z4bFJfEi1gl+QkrwDlz0lptye
    vNO6pbTSu92fBV2l3zyQK8zlrZMUBIHvJtAIK0tF59mvfWNOAQCxDoBE9fanokYA
    6IPg1s+TO7zbn3n3Y84xYZB90KDD8i6i9poOR0Fg/61BMgu+efVbke82eiJCkTSi
    F0NdyBpw9eMqjeT/Kp7vIA==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    And the installation mtime is "90"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.11.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.11RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    QmUxebC1Xc5azgyL5hyzIykfjjPtYfM+zvPUoYajNuQfm2wwdqTO3m2dWnabgWYN
    Cqm8L+cbrCrcwmm+efO5Ewr9cXB5BzrXIoll5ODD7hEOw/dFD6RPoSrw3C+8KnLb
    mqEx9o1/xMHvAdVpgKjktDHsucn3DWti1UtWTD6z4bFJfEi1gl+QkrwDlz0lptye
    vNO6pbTSu92fBV2l3zyQK8zlrZMUBIHvJtAIK0tF59mvfWNOAQCxDoBE9fanokYA
    6IPg1s+TO7zbn3n3Y84xYZB90KDD8i6i9poOR0Fg/61BMgu+efVbke82eiJCkTSi
    F0NdyBpw9eMqjeT/Kp7vIA==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 7.0
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.7.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-14.0.7RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    aNxI4fSb3EBL0Qwg13JiICtX9oZTo88Q0jbcZrCqZSRcyvOk85X4yubX4s6kEg3X
    QElRP1Wsz/nppI881JUytbQb92BC1HNOaG73ZR8f+SoDoSu2QkP9e22JC1C63n0P
    ACdkFars8L/W2LbrYsiwAKOSFgB5EuW/qpB4ThuCQbZ5srTeb7bKahOdDQIuFbz8
    pu2oLcJIVAxBGM6aBNHzy/rfY13KoGh7MUSqcndRMbcESzGklLrjnHba5CNBd+88
    wSirOd4CcLcOma0GLV79xK3aYcuzcagEEm/Y/+s01MGyMIM5Fsx1o7uA2xLrd+5z
    eZEbWpxD7OJGp1ZVdB1cRw==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 7.0
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "90"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.7.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-14.0.7RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    aNxI4fSb3EBL0Qwg13JiICtX9oZTo88Q0jbcZrCqZSRcyvOk85X4yubX4s6kEg3X
    QElRP1Wsz/nppI881JUytbQb92BC1HNOaG73ZR8f+SoDoSu2QkP9e22JC1C63n0P
    ACdkFars8L/W2LbrYsiwAKOSFgB5EuW/qpB4ThuCQbZ5srTeb7bKahOdDQIuFbz8
    pu2oLcJIVAxBGM6aBNHzy/rfY13KoGh7MUSqcndRMbcESzGklLrjnHba5CNBd+88
    wSirOd4CcLcOma0GLV79xK3aYcuzcagEEm/Y/+s01MGyMIM5Fsx1o7uA2xLrd+5z
    eZEbWpxD7OJGp1ZVdB1cRw==
    """

  Scenario: Updating an up-to-date Nextcloud 14.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "14.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "9"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.3.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-15.0.3RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    lghsDIvgACtcNG09W23oGwO97OnwHK9XHdkAzSth+DXT6OxUsGYfrc1NmtYyXt6n
    HT2pUVruJcCeeGdsrn2fMIazJzFyt1iPtSpxQEyX70w0VQ0K0KfhmLgzqAj9hKb/
    taHUn3MVtJ97/BfCSO5B+7PIO8Yvgr791nRXtgrF3ZffhIce6YTJSlqFB6Sg+2dN
    yprpAV2SwQgppAbMrCc0YDeD/i8x4Qp0oukVHCod7zkA8EWTJHCR1UV7o2SWf04R
    sYAVzO+Vckl2UBeaUZjLvnct69WMZQZ3y2rgHbKYRYgxeCsFGWdIWIcyvvnGByCP
    lFfUfN/DN7LGHyZTPVPgsw==
    """

  Scenario: Updating an up-to-date Nextcloud 14.0.3 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "14.0.3.0"
    And The received PHP version is "7.0.0"
    And the installation mtime is "9"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.3.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-15.0.3RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    lghsDIvgACtcNG09W23oGwO97OnwHK9XHdkAzSth+DXT6OxUsGYfrc1NmtYyXt6n
    HT2pUVruJcCeeGdsrn2fMIazJzFyt1iPtSpxQEyX70w0VQ0K0KfhmLgzqAj9hKb/
    taHUn3MVtJ97/BfCSO5B+7PIO8Yvgr791nRXtgrF3ZffhIce6YTJSlqFB6Sg+2dN
    yprpAV2SwQgppAbMrCc0YDeD/i8x4Qp0oukVHCod7zkA8EWTJHCR1UV7o2SWf04R
    sYAVzO+Vckl2UBeaUZjLvnct69WMZQZ3y2rgHbKYRYgxeCsFGWdIWIcyvvnGByCP
    lFfUfN/DN7LGHyZTPVPgsw==
    """

  Scenario: Updating an  outdated Nextcloud 15.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "15.0.0.0"
    And The received PHP version is "7.0.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.3.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-15.0.3RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    lghsDIvgACtcNG09W23oGwO97OnwHK9XHdkAzSth+DXT6OxUsGYfrc1NmtYyXt6n
    HT2pUVruJcCeeGdsrn2fMIazJzFyt1iPtSpxQEyX70w0VQ0K0KfhmLgzqAj9hKb/
    taHUn3MVtJ97/BfCSO5B+7PIO8Yvgr791nRXtgrF3ZffhIce6YTJSlqFB6Sg+2dN
    yprpAV2SwQgppAbMrCc0YDeD/i8x4Qp0oukVHCod7zkA8EWTJHCR1UV7o2SWf04R
    sYAVzO+Vckl2UBeaUZjLvnct69WMZQZ3y2rgHbKYRYgxeCsFGWdIWIcyvvnGByCP
    lFfUfN/DN7LGHyZTPVPgsw==
    """
