Feature: Testing the update scenario of production releases

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

  Scenario: Updating an up-to-date staged Nextcloud 10.0.6 with PHP 5.4 on the production channel
    Given There is a release with channel "production"
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

  Scenario: Updating an up-to-date staged Nextcloud 10.0.6 with PHP 5.6 on the production channel
    Given There is a release with channel "production"
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
    
  Scenario: Updating an outdated Nextcloud 11.0.0 production without PHP version
    Given There is a release with channel "production"
    And The received version is "11.0.0.2"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.12.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    PZ72iVGB4dQfDsiCWgGZ1WHJJG/92Xu1b8rc6XyUlwp5H3ae11KOCvnu/Yb4Fa9Y
    qQ/nfKgKM/698CoqdyzVl2GdA5OqvgLrZF4MkxP3Ybd+Ljl9rcw+ZxjQDjq/p/jj
    4O92e58qJXneoovEdxTwDTY7KlfDJQ6obEWIhXlbmegQoCug7btfIy+lFAUFoTEC
    MAQOPzi5o6P9hU9VqHIEK8KSet6Mqa6ZyN1CeEMQm77235M86OfMjfqxQIXTiSla
    ujX6Y+BpGxAOmoTCl1/vm0x5BD/7auh+Z9oXRBxpR6BnA+oYGwW4AQTApaDp2Hkq
    RqCcW694B/WCmqjxqDfbfQ==
    """

  Scenario: Updating a non-staged outdated Nextcloud 11.0.0 beta on the production channel
    Given There is a release with channel "production"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    And The installation mtime is "70"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.12.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    PZ72iVGB4dQfDsiCWgGZ1WHJJG/92Xu1b8rc6XyUlwp5H3ae11KOCvnu/Yb4Fa9Y
    qQ/nfKgKM/698CoqdyzVl2GdA5OqvgLrZF4MkxP3Ybd+Ljl9rcw+ZxjQDjq/p/jj
    4O92e58qJXneoovEdxTwDTY7KlfDJQ6obEWIhXlbmegQoCug7btfIy+lFAUFoTEC
    MAQOPzi5o6P9hU9VqHIEK8KSet6Mqa6ZyN1CeEMQm77235M86OfMjfqxQIXTiSla
    ujX6Y+BpGxAOmoTCl1/vm0x5BD/7auh+Z9oXRBxpR6BnA+oYGwW4AQTApaDp2Hkq
    RqCcW694B/WCmqjxqDfbfQ==
    """

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.6 on the production channel with PHP 5.6
    Given There is a release with channel "production"
    And The received version is "11.0.6.1"
    And The received PHP version is "5.6.0"
    And The installation mtime is "70"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.12.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    PZ72iVGB4dQfDsiCWgGZ1WHJJG/92Xu1b8rc6XyUlwp5H3ae11KOCvnu/Yb4Fa9Y
    qQ/nfKgKM/698CoqdyzVl2GdA5OqvgLrZF4MkxP3Ybd+Ljl9rcw+ZxjQDjq/p/jj
    4O92e58qJXneoovEdxTwDTY7KlfDJQ6obEWIhXlbmegQoCug7btfIy+lFAUFoTEC
    MAQOPzi5o6P9hU9VqHIEK8KSet6Mqa6ZyN1CeEMQm77235M86OfMjfqxQIXTiSla
    ujX6Y+BpGxAOmoTCl1/vm0x5BD/7auh+Z9oXRBxpR6BnA+oYGwW4AQTApaDp2Hkq
    RqCcW694B/WCmqjxqDfbfQ==
    """

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.6 on the production channel with PHP 5.6 and lower mtime
    Given There is a release with channel "production"
    And The received version is "11.0.6.1"
    And The received PHP version is "5.6.0"
    And The installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.12.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    PZ72iVGB4dQfDsiCWgGZ1WHJJG/92Xu1b8rc6XyUlwp5H3ae11KOCvnu/Yb4Fa9Y
    qQ/nfKgKM/698CoqdyzVl2GdA5OqvgLrZF4MkxP3Ybd+Ljl9rcw+ZxjQDjq/p/jj
    4O92e58qJXneoovEdxTwDTY7KlfDJQ6obEWIhXlbmegQoCug7btfIy+lFAUFoTEC
    MAQOPzi5o6P9hU9VqHIEK8KSet6Mqa6ZyN1CeEMQm77235M86OfMjfqxQIXTiSla
    ujX6Y+BpGxAOmoTCl1/vm0x5BD/7auh+Z9oXRBxpR6BnA+oYGwW4AQTApaDp2Hkq
    RqCcW694B/WCmqjxqDfbfQ==
    """

  Scenario: Updating a non-staged up-to-date Nextcloud 11.0.6 on the production channel without PHP version
    Given There is a release with channel "production"
    And The received version is "11.0.6.1"
    And The installation mtime is "70"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.12.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-12.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    PZ72iVGB4dQfDsiCWgGZ1WHJJG/92Xu1b8rc6XyUlwp5H3ae11KOCvnu/Yb4Fa9Y
    qQ/nfKgKM/698CoqdyzVl2GdA5OqvgLrZF4MkxP3Ybd+Ljl9rcw+ZxjQDjq/p/jj
    4O92e58qJXneoovEdxTwDTY7KlfDJQ6obEWIhXlbmegQoCug7btfIy+lFAUFoTEC
    MAQOPzi5o6P9hU9VqHIEK8KSet6Mqa6ZyN1CeEMQm77235M86OfMjfqxQIXTiSla
    ujX6Y+BpGxAOmoTCl1/vm0x5BD/7auh+Z9oXRBxpR6BnA+oYGwW4AQTApaDp2Hkq
    RqCcW694B/WCmqjxqDfbfQ==
    """

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the production channel
    Given There is a release with channel "production"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    d2uw9nwbyhw2wLndMnirPxXejqMhrQWWUCl/XCYJXa5LElK/QiIVOxMRw5CURxzg
    tJq442ZEJq0uzJE06MhJAixkcNCdirYEkMWxpahyfUNeZ+NFVaADftJ+V4WFgd+7
    zpqD/13QUZ7JUwXBqdjQPFPWCgyTqtSH1cE6uX1T/oHmbLGHZK5lyHT7+BvvrJuk
    UZ+cbpcPZHyeJIfe5MpQiVKLsvjg1Lik0r+J7Vtw38k517ELoP+CO61ZQOl72pDG
    nrjuv1EvWa+rO2rCbRCrNxNI0+FAZzcK3FSrWV4NcoN7V86UKSuGlUM5iY8WEZUG
    StmlJJEc960gSoV6NRLK5Q==
    """

 Scenario: Updating an outdated Nextcloud 12.0.0 beta on the production channel
    Given There is a release with channel "production"
    And The received version is "12.0.0.16"
    And The received PHP version is "5.6.0"
    And the installation mtime is "20"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    d2uw9nwbyhw2wLndMnirPxXejqMhrQWWUCl/XCYJXa5LElK/QiIVOxMRw5CURxzg
    tJq442ZEJq0uzJE06MhJAixkcNCdirYEkMWxpahyfUNeZ+NFVaADftJ+V4WFgd+7
    zpqD/13QUZ7JUwXBqdjQPFPWCgyTqtSH1cE6uX1T/oHmbLGHZK5lyHT7+BvvrJuk
    UZ+cbpcPZHyeJIfe5MpQiVKLsvjg1Lik0r+J7Vtw38k517ELoP+CO61ZQOl72pDG
    nrjuv1EvWa+rO2rCbRCrNxNI0+FAZzcK3FSrWV4NcoN7V86UKSuGlUM5iY8WEZUG
    StmlJJEc960gSoV6NRLK5Q==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.7 on the production channel
    Given There is a release with channel "production"
    And The received version is "12.0.7.1"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    d2uw9nwbyhw2wLndMnirPxXejqMhrQWWUCl/XCYJXa5LElK/QiIVOxMRw5CURxzg
    tJq442ZEJq0uzJE06MhJAixkcNCdirYEkMWxpahyfUNeZ+NFVaADftJ+V4WFgd+7
    zpqD/13QUZ7JUwXBqdjQPFPWCgyTqtSH1cE6uX1T/oHmbLGHZK5lyHT7+BvvrJuk
    UZ+cbpcPZHyeJIfe5MpQiVKLsvjg1Lik0r+J7Vtw38k517ELoP+CO61ZQOl72pDG
    nrjuv1EvWa+rO2rCbRCrNxNI0+FAZzcK3FSrWV4NcoN7V86UKSuGlUM5iY8WEZUG
    StmlJJEc960gSoV6NRLK5Q==
    """

 Scenario: Updating an up-to-date Nextcloud 12.0.7 on the production channel
    Given There is a release with channel "production"
    And The received version is "12.0.7.1"
    And The received PHP version is "5.6.0"
    And the installation mtime is "90"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    d2uw9nwbyhw2wLndMnirPxXejqMhrQWWUCl/XCYJXa5LElK/QiIVOxMRw5CURxzg
    tJq442ZEJq0uzJE06MhJAixkcNCdirYEkMWxpahyfUNeZ+NFVaADftJ+V4WFgd+7
    zpqD/13QUZ7JUwXBqdjQPFPWCgyTqtSH1cE6uX1T/oHmbLGHZK5lyHT7+BvvrJuk
    UZ+cbpcPZHyeJIfe5MpQiVKLsvjg1Lik0r+J7Vtw38k517ELoP+CO61ZQOl72pDG
    nrjuv1EvWa+rO2rCbRCrNxNI0+FAZzcK3FSrWV4NcoN7V86UKSuGlUM5iY8WEZUG
    StmlJJEc960gSoV6NRLK5Q==
    """

 Scenario: Updating an outdated Nextcloud 13.0.0 on the production channel
    Given There is a release with channel "production"
    And The received version is "13.0.0.0"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.6.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    d2uw9nwbyhw2wLndMnirPxXejqMhrQWWUCl/XCYJXa5LElK/QiIVOxMRw5CURxzg
    tJq442ZEJq0uzJE06MhJAixkcNCdirYEkMWxpahyfUNeZ+NFVaADftJ+V4WFgd+7
    zpqD/13QUZ7JUwXBqdjQPFPWCgyTqtSH1cE6uX1T/oHmbLGHZK5lyHT7+BvvrJuk
    UZ+cbpcPZHyeJIfe5MpQiVKLsvjg1Lik0r+J7Vtw38k517ELoP+CO61ZQOl72pDG
    nrjuv1EvWa+rO2rCbRCrNxNI0+FAZzcK3FSrWV4NcoN7V86UKSuGlUM5iY8WEZUG
    StmlJJEc960gSoV6NRLK5Q==
    """
