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
    And Update to version "13.0.12.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.12RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    OqBzXyl7eI6KWhJfzZGli0V87TYEzpY1v+zWTMWyrbtpGjuVJMIKBuHvO5MsCzF5
    6fuuOn17A3z3XmvHp5gs4nliSbMNaYrSEMy1X9pRDjcmqs96MhphV//XZpsigfcu
    mD2Fw2w7mhbnwJJyHMYb9/QkOceJSJ64vmMnXC+e1Phnkx4ixECn2o8dZZoqB4RF
    QzzmBNY4Uf+j8vtMnqBpQ7GITvu+gO75JfJ6X/E8c4sqw8ob0OoOO+As0YKP1L1n
    cjKP2EK5zEWo3mo1hrddiVXmC8lNQdkmMLHwNN+If+4mLN30SWeu3xBGxw5w8gUf
    sociqWNeP1tudPnoWkS2jg==
    """

  Scenario: Updating an up-to-date Nextcloud 12.0.7 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.7.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.12.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.12RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    OqBzXyl7eI6KWhJfzZGli0V87TYEzpY1v+zWTMWyrbtpGjuVJMIKBuHvO5MsCzF5
    6fuuOn17A3z3XmvHp5gs4nliSbMNaYrSEMy1X9pRDjcmqs96MhphV//XZpsigfcu
    mD2Fw2w7mhbnwJJyHMYb9/QkOceJSJ64vmMnXC+e1Phnkx4ixECn2o8dZZoqB4RF
    QzzmBNY4Uf+j8vtMnqBpQ7GITvu+gO75JfJ6X/E8c4sqw8ob0OoOO+As0YKP1L1n
    cjKP2EK5zEWo3mo1hrddiVXmC8lNQdkmMLHwNN+If+4mLN30SWeu3xBGxw5w8gUf
    sociqWNeP1tudPnoWkS2jg==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.12.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.12RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    OqBzXyl7eI6KWhJfzZGli0V87TYEzpY1v+zWTMWyrbtpGjuVJMIKBuHvO5MsCzF5
    6fuuOn17A3z3XmvHp5gs4nliSbMNaYrSEMy1X9pRDjcmqs96MhphV//XZpsigfcu
    mD2Fw2w7mhbnwJJyHMYb9/QkOceJSJ64vmMnXC+e1Phnkx4ixECn2o8dZZoqB4RF
    QzzmBNY4Uf+j8vtMnqBpQ7GITvu+gO75JfJ6X/E8c4sqw8ob0OoOO+As0YKP1L1n
    cjKP2EK5zEWo3mo1hrddiVXmC8lNQdkmMLHwNN+If+4mLN30SWeu3xBGxw5w8gUf
    sociqWNeP1tudPnoWkS2jg==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    And the installation mtime is "90"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.12.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.12RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    OqBzXyl7eI6KWhJfzZGli0V87TYEzpY1v+zWTMWyrbtpGjuVJMIKBuHvO5MsCzF5
    6fuuOn17A3z3XmvHp5gs4nliSbMNaYrSEMy1X9pRDjcmqs96MhphV//XZpsigfcu
    mD2Fw2w7mhbnwJJyHMYb9/QkOceJSJ64vmMnXC+e1Phnkx4ixECn2o8dZZoqB4RF
    QzzmBNY4Uf+j8vtMnqBpQ7GITvu+gO75JfJ6X/E8c4sqw8ob0OoOO+As0YKP1L1n
    cjKP2EK5zEWo3mo1hrddiVXmC8lNQdkmMLHwNN+If+4mLN30SWeu3xBGxw5w8gUf
    sociqWNeP1tudPnoWkS2jg==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 7.0
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.8.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-14.0.8RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    yvPFEDOcMJE7Vx4Ht8UHNNL1FuN3EPmYcCnpa8IomihJ5jzMqIluzRgYMRyM/1KO
    KtIf24bERLv89OQBAU8K1aL8q9+4u1s9489mJkwJe13har6ip0E81dSHjveRMCG/
    ydGudWT6LnS3iTXuebMxkfw33rkmzF/9JAvy3EmSg3fl9ieIhTBO478YRNLSvSuk
    BHfMHGZl7qgdH9zJKJ5iaz40PQzwD6VkUq25ZHtZzq6tViCc7J4e+r4XAIKSZMDY
    PKocVq7acbcISPljMyMbONRdhyvwTf5loN0dADALoKm7ugXDoQk2Zrpss25CKiNP
    DNNDS3fPJx6q7FmHFZbIPw==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 7.0
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "90"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.8.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-14.0.8RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    yvPFEDOcMJE7Vx4Ht8UHNNL1FuN3EPmYcCnpa8IomihJ5jzMqIluzRgYMRyM/1KO
    KtIf24bERLv89OQBAU8K1aL8q9+4u1s9489mJkwJe13har6ip0E81dSHjveRMCG/
    ydGudWT6LnS3iTXuebMxkfw33rkmzF/9JAvy3EmSg3fl9ieIhTBO478YRNLSvSuk
    BHfMHGZl7qgdH9zJKJ5iaz40PQzwD6VkUq25ZHtZzq6tViCc7J4e+r4XAIKSZMDY
    PKocVq7acbcISPljMyMbONRdhyvwTf5loN0dADALoKm7ugXDoQk2Zrpss25CKiNP
    DNNDS3fPJx6q7FmHFZbIPw==
    """

  Scenario: Updating an up-to-date Nextcloud 14.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "14.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "9"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.5.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-15.0.5RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    xYEV2LBCztzGp0MjiITli6OLyzB6KjVqpiCShLMBoieFTsTzigxcawI5fFs+HnWv
    FtNl/E4qtNdRoawlFrUhGmjeIZC9FyUUOcFCHhvK1ZutcBp2MWq/DU15oSoyNEod
    JXVmC87MGS5/dE2ZL4IJP2cUxi3wR1wVGrnLe+k8trjfAr44sKTx3jziED6U21Xk
    3/wfxCaSfAFlCVKVcsH5lTaM84dOKxrriVGcI3sRgCsLQZG5qMmH08KaVZOzH/Hl
    HkW0O5Y5rOVkI6cs7tB79NPWRia69wRorIdMgtxJOWeIIqdqz3IFHgvZ2Wf/noQU
    iHMF5gt+bWuSQGV3t4MwqA==
    """

  Scenario: Updating an up-to-date Nextcloud 14.0.3 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "14.0.3.0"
    And The received PHP version is "7.0.0"
    And the installation mtime is "9"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.5.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-15.0.5RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    xYEV2LBCztzGp0MjiITli6OLyzB6KjVqpiCShLMBoieFTsTzigxcawI5fFs+HnWv
    FtNl/E4qtNdRoawlFrUhGmjeIZC9FyUUOcFCHhvK1ZutcBp2MWq/DU15oSoyNEod
    JXVmC87MGS5/dE2ZL4IJP2cUxi3wR1wVGrnLe+k8trjfAr44sKTx3jziED6U21Xk
    3/wfxCaSfAFlCVKVcsH5lTaM84dOKxrriVGcI3sRgCsLQZG5qMmH08KaVZOzH/Hl
    HkW0O5Y5rOVkI6cs7tB79NPWRia69wRorIdMgtxJOWeIIqdqz3IFHgvZ2Wf/noQU
    iHMF5gt+bWuSQGV3t4MwqA==
    """

  Scenario: Updating an  outdated Nextcloud 15.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "15.0.0.0"
    And The received PHP version is "7.0.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.5.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-15.0.5RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    xYEV2LBCztzGp0MjiITli6OLyzB6KjVqpiCShLMBoieFTsTzigxcawI5fFs+HnWv
    FtNl/E4qtNdRoawlFrUhGmjeIZC9FyUUOcFCHhvK1ZutcBp2MWq/DU15oSoyNEod
    JXVmC87MGS5/dE2ZL4IJP2cUxi3wR1wVGrnLe+k8trjfAr44sKTx3jziED6U21Xk
    3/wfxCaSfAFlCVKVcsH5lTaM84dOKxrriVGcI3sRgCsLQZG5qMmH08KaVZOzH/Hl
    HkW0O5Y5rOVkI6cs7tB79NPWRia69wRorIdMgtxJOWeIIqdqz3IFHgvZ2Wf/noQU
    iHMF5gt+bWuSQGV3t4MwqA==
    """
