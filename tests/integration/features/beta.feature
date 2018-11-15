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
    And Update to version "12.0.13.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.13RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    h3XoIG4U+uCpiZzCJ7UrrVHIiDny8ZaakgU4QmINGJCpyXJZp1zvulDaw8U5ld27
    VVFPQ92bgE7j9k6Cnjq/c4Lwcrd4YrLWLEG/Q+IDFgZT5/hQldVMJ2qKYB2uwzph
    rtAOop75/ax15khS7abPC8SF+u1Gp4ILDPH/7WiaoD+q143fJK/059KlgJAwD95T
    aBLbj+OAxdg4fweQA4QSbtULp4DEnmD9G+5iX65pklPL6IQB2jJzZmcpRENcWysw
    eDKNYuJXcF8Vd/lmSnL/JkynjPOhaqY2IxQWYLuMADfpkEeLgrLBUs/rMJhA2dtJ
    broNqRuCq3mdk4mjShW2EA==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel without an mtime
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.13.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.13RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    h3XoIG4U+uCpiZzCJ7UrrVHIiDny8ZaakgU4QmINGJCpyXJZp1zvulDaw8U5ld27
    VVFPQ92bgE7j9k6Cnjq/c4Lwcrd4YrLWLEG/Q+IDFgZT5/hQldVMJ2qKYB2uwzph
    rtAOop75/ax15khS7abPC8SF+u1Gp4ILDPH/7WiaoD+q143fJK/059KlgJAwD95T
    aBLbj+OAxdg4fweQA4QSbtULp4DEnmD9G+5iX65pklPL6IQB2jJzZmcpRENcWysw
    eDKNYuJXcF8Vd/lmSnL/JkynjPOhaqY2IxQWYLuMADfpkEeLgrLBUs/rMJhA2dtJ
    broNqRuCq3mdk4mjShW2EA==
    """

  Scenario: Updating an outdated Nextcloud 12.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.0.15"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.8.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.8RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    dAxk6j5jXpU5kIKFIeJV9iszF5jzkr6b7MJiaR/JVDzwBmAAn1owd/UhwTPQ+Oux
    2g55fNdciuZtSMi+dwD+kNWcZS2ZRwvNL9gkXHuNMSpnZ8aAU50gE2tw8PPq69PM
    ybjMGoch+C++m4EZt5lp1LRQdfEaPA1dmz+Q6l2LMFOp9eoyeXxdPZxShNIQs8ig
    rLa8qBUzsImB0gnICx6BKP/hMZd8SwDt/gSJiO/wTHGgVU5+4TRHef95gMdmsK7c
    0bRtqNKXpK6JsAmOR0K647btfcRvHNqMvADeYYGoOj3/5DP4Wfdef7yTkjfOoVBm
    eV1Jknbnijs9vGejO8ndLw==
    """

  Scenario: Updating an up-to-date Nextcloud 12.0.7 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.7.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.8.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.8RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    dAxk6j5jXpU5kIKFIeJV9iszF5jzkr6b7MJiaR/JVDzwBmAAn1owd/UhwTPQ+Oux
    2g55fNdciuZtSMi+dwD+kNWcZS2ZRwvNL9gkXHuNMSpnZ8aAU50gE2tw8PPq69PM
    ybjMGoch+C++m4EZt5lp1LRQdfEaPA1dmz+Q6l2LMFOp9eoyeXxdPZxShNIQs8ig
    rLa8qBUzsImB0gnICx6BKP/hMZd8SwDt/gSJiO/wTHGgVU5+4TRHef95gMdmsK7c
    0bRtqNKXpK6JsAmOR0K647btfcRvHNqMvADeYYGoOj3/5DP4Wfdef7yTkjfOoVBm
    eV1Jknbnijs9vGejO8ndLw==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.8.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.8RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    dAxk6j5jXpU5kIKFIeJV9iszF5jzkr6b7MJiaR/JVDzwBmAAn1owd/UhwTPQ+Oux
    2g55fNdciuZtSMi+dwD+kNWcZS2ZRwvNL9gkXHuNMSpnZ8aAU50gE2tw8PPq69PM
    ybjMGoch+C++m4EZt5lp1LRQdfEaPA1dmz+Q6l2LMFOp9eoyeXxdPZxShNIQs8ig
    rLa8qBUzsImB0gnICx6BKP/hMZd8SwDt/gSJiO/wTHGgVU5+4TRHef95gMdmsK7c
    0bRtqNKXpK6JsAmOR0K647btfcRvHNqMvADeYYGoOj3/5DP4Wfdef7yTkjfOoVBm
    eV1Jknbnijs9vGejO8ndLw==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    And the installation mtime is "90"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.8.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.8RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    dAxk6j5jXpU5kIKFIeJV9iszF5jzkr6b7MJiaR/JVDzwBmAAn1owd/UhwTPQ+Oux
    2g55fNdciuZtSMi+dwD+kNWcZS2ZRwvNL9gkXHuNMSpnZ8aAU50gE2tw8PPq69PM
    ybjMGoch+C++m4EZt5lp1LRQdfEaPA1dmz+Q6l2LMFOp9eoyeXxdPZxShNIQs8ig
    rLa8qBUzsImB0gnICx6BKP/hMZd8SwDt/gSJiO/wTHGgVU5+4TRHef95gMdmsK7c
    0bRtqNKXpK6JsAmOR0K647btfcRvHNqMvADeYYGoOj3/5DP4Wfdef7yTkjfOoVBm
    eV1Jknbnijs9vGejO8ndLw==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 7.0
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.4.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-14.0.4RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    iIY5kZZmyhV21svic8dM1kDXExRUVurK4Xr5kKL+9XLTWwp+0WP/wXFvImgAp3dR
    ARqDIseFTFZYQAaH+fIM3noO1nFN7ytW1Dm4+KRskAw/9s1U+n3SV4qV1YZgreNH
    GJIdiTnwsC61luVKK6VLJnwzhyibTSdfSBhj64j9XgUCskTfIH9kj2Q+MLARuyAw
    4CZCPo+jddiv5W/H+8UFNoi3xJga1VwkdezWwV3Oy7WmGipXlRrH/usGm3Ve5Z/p
    cywHfAwr0OB+mM1WBMRDtU4k0m94WlQnX5f0GfKkcP1ZnWLFH41ZzrIIFK9d526V
    K6VgBqFJPfUCAwc4wvLKWQ==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 7.0
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "90"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.4.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-14.0.4RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    iIY5kZZmyhV21svic8dM1kDXExRUVurK4Xr5kKL+9XLTWwp+0WP/wXFvImgAp3dR
    ARqDIseFTFZYQAaH+fIM3noO1nFN7ytW1Dm4+KRskAw/9s1U+n3SV4qV1YZgreNH
    GJIdiTnwsC61luVKK6VLJnwzhyibTSdfSBhj64j9XgUCskTfIH9kj2Q+MLARuyAw
    4CZCPo+jddiv5W/H+8UFNoi3xJga1VwkdezWwV3Oy7WmGipXlRrH/usGm3Ve5Z/p
    cywHfAwr0OB+mM1WBMRDtU4k0m94WlQnX5f0GfKkcP1ZnWLFH41ZzrIIFK9d526V
    K6VgBqFJPfUCAwc4wvLKWQ==
    """

  Scenario: Updating an up-to-date Nextcloud 14.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "14.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "9"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.3.0" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-14.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    cWbv8qrFK4lKaRAtHLvM3AjLcwd4S1lIWYzE3hbAN30MuW60weRqYZf412jUe/7g
    EEaas6MNqgd5omqwsnTwn4KwtfUkKSB5JbwGHZY95Wv/mf5EyZfw0x04xo5A6W5l
    Zv7kK0HOGGOzT1nqyJJHvin9jU3eBzpWe9Es2hwhQYFI9C+V/5Fvbm37dqN821gQ
    aTT4zv8XwVkAoH6BRrNGjoUqQHVBcONVEcYPEahBI9SjuTVX807e9HETrsziKtHu
    k5E2t0FCNl/qUvxEDtsvQk5+XD1fW6v5ievqfLoZhv/XqKdCfAqgyC83NijYB0/8
    ajEplLd/VwvoezLExRngLQ==
    """

  Scenario: Updating an up-to-date Nextcloud 14.0.3 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "14.0.3.0"
    And The received PHP version is "7.0.0"
    And the installation mtime is "9"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.0.5" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-15.0.0beta1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    P1W9mDD7GwgONAfAqakTgcePIHVR+bXHNFLMJF9ckUntUMiYZmeeqLQp5jWIg95i
    t6acRUZOP6GMGbHB5sSzP5E2WlgyJ2J0BTPVWT8isv0ERuFck6lWmYcup3Hy6EpV
    3sN3LrviHbsOnrvSEkbnsoFk7AT3gmugX9+uxzmM5Ad7UxrIhaF9BDn+O7LTI6Zp
    qvujmbaYn4RtYY9zO5DE69wFxFWIomrBGKYSIsEG59gbAX744/XT5vHXTjhjJdiY
    zCtLKJB75LgSfH4TLw7z6x6RIAo5QatxXZRfEh8cn5jvBXrBDzOPHqIbuB6VYuEo
    e1DtT3yg5midbTwzeBRxJw==
    """

  Scenario: Updating an  outdated Nextcloud 15.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "15.0.0.0"
    And The received PHP version is "7.0.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.0.5" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-15.0.0beta1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    P1W9mDD7GwgONAfAqakTgcePIHVR+bXHNFLMJF9ckUntUMiYZmeeqLQp5jWIg95i
    t6acRUZOP6GMGbHB5sSzP5E2WlgyJ2J0BTPVWT8isv0ERuFck6lWmYcup3Hy6EpV
    3sN3LrviHbsOnrvSEkbnsoFk7AT3gmugX9+uxzmM5Ad7UxrIhaF9BDn+O7LTI6Zp
    qvujmbaYn4RtYY9zO5DE69wFxFWIomrBGKYSIsEG59gbAX744/XT5vHXTjhjJdiY
    zCtLKJB75LgSfH4TLw7z6x6RIAo5QatxXZRfEh8cn5jvBXrBDzOPHqIbuB6VYuEo
    e1DtT3yg5midbTwzeBRxJw==
    """
