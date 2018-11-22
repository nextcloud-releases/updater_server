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
    And Update to version "13.0.8.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    d220A5oVb+VhK96NmWdYMazhmcAMRT0kPuz34FnAUuVEOejRbgQ+Q+EvORMREmJg
    IRSSagXEMEVfPE0ldtQi6wmpZgNtTzkxUvB3CXzzjYBZmeOLe4fcJQQLU4oAEmAK
    KEpm74jQHqn72WE6d6PumdPPhOkgQCbO3r0oC7AY/BKKKdmCNng2GHIj3tDeQLQM
    z7ks4kiYBu6gfazMU5ZaB5GFksrqclhU/WGlF27Aqemvho83vo43GuiNSSCTXVS9
    K4p+w0pOsMnAIqXr8yEtk09DnS/gNlIn2jIHrAA1nja7hhtk23M9p0/YMKCycTPU
    3RYKhMecxckBLLZMH6VMiA==
    """

  Scenario: Updating an up-to-date Nextcloud 12.0.7 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.7.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.8.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    d220A5oVb+VhK96NmWdYMazhmcAMRT0kPuz34FnAUuVEOejRbgQ+Q+EvORMREmJg
    IRSSagXEMEVfPE0ldtQi6wmpZgNtTzkxUvB3CXzzjYBZmeOLe4fcJQQLU4oAEmAK
    KEpm74jQHqn72WE6d6PumdPPhOkgQCbO3r0oC7AY/BKKKdmCNng2GHIj3tDeQLQM
    z7ks4kiYBu6gfazMU5ZaB5GFksrqclhU/WGlF27Aqemvho83vo43GuiNSSCTXVS9
    K4p+w0pOsMnAIqXr8yEtk09DnS/gNlIn2jIHrAA1nja7hhtk23M9p0/YMKCycTPU
    3RYKhMecxckBLLZMH6VMiA==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.8.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    d220A5oVb+VhK96NmWdYMazhmcAMRT0kPuz34FnAUuVEOejRbgQ+Q+EvORMREmJg
    IRSSagXEMEVfPE0ldtQi6wmpZgNtTzkxUvB3CXzzjYBZmeOLe4fcJQQLU4oAEmAK
    KEpm74jQHqn72WE6d6PumdPPhOkgQCbO3r0oC7AY/BKKKdmCNng2GHIj3tDeQLQM
    z7ks4kiYBu6gfazMU5ZaB5GFksrqclhU/WGlF27Aqemvho83vo43GuiNSSCTXVS9
    K4p+w0pOsMnAIqXr8yEtk09DnS/gNlIn2jIHrAA1nja7hhtk23M9p0/YMKCycTPU
    3RYKhMecxckBLLZMH6VMiA==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    And the installation mtime is "90"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.8.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-13.0.8.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    d220A5oVb+VhK96NmWdYMazhmcAMRT0kPuz34FnAUuVEOejRbgQ+Q+EvORMREmJg
    IRSSagXEMEVfPE0ldtQi6wmpZgNtTzkxUvB3CXzzjYBZmeOLe4fcJQQLU4oAEmAK
    KEpm74jQHqn72WE6d6PumdPPhOkgQCbO3r0oC7AY/BKKKdmCNng2GHIj3tDeQLQM
    z7ks4kiYBu6gfazMU5ZaB5GFksrqclhU/WGlF27Aqemvho83vo43GuiNSSCTXVS9
    K4p+w0pOsMnAIqXr8yEtk09DnS/gNlIn2jIHrAA1nja7hhtk23M9p0/YMKCycTPU
    3RYKhMecxckBLLZMH6VMiA==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 7.0
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.4.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-14.0.4RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    WPwEimrTgNobwkXY9Kie0qaMr2s7SB9xpEe8nSRwCaPkg+NK2ek3OwFIGL3jNdvR
    5KMZmntHbm8FhSU0qG7eyglEeFQLB2IBw8W1I2devRK691yllyFT9/k1/Rginz7a
    hASkpSdc+8OFfgTMoQTfADOFHy16ih/eUQovBbl5EIeMpFBa6otR/IBCVs4ZnE85
    bkHSwJr2ITTnOidcG8mSP5oRvy5iUD/7U2l4WGN5utMmgUOrtyzKXovU18O9FAxr
    pVLQdwYs6vBPk5sGDcThfmCfsKv9XUtZinMCjoPsuY1Rb7GINDtBdgMa1/DK9Wv9
    tdGGedswlNhdC4b81KabeA==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 7.0
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "90"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.4.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-14.0.4RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    WPwEimrTgNobwkXY9Kie0qaMr2s7SB9xpEe8nSRwCaPkg+NK2ek3OwFIGL3jNdvR
    5KMZmntHbm8FhSU0qG7eyglEeFQLB2IBw8W1I2devRK691yllyFT9/k1/Rginz7a
    hASkpSdc+8OFfgTMoQTfADOFHy16ih/eUQovBbl5EIeMpFBa6otR/IBCVs4ZnE85
    bkHSwJr2ITTnOidcG8mSP5oRvy5iUD/7U2l4WGN5utMmgUOrtyzKXovU18O9FAxr
    pVLQdwYs6vBPk5sGDcThfmCfsKv9XUtZinMCjoPsuY1Rb7GINDtBdgMa1/DK9Wv9
    tdGGedswlNhdC4b81KabeA==
    """

  Scenario: Updating an up-to-date Nextcloud 14.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "14.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "9"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.0.6" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-15.0.0beta2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    W5QzT0g9uIjBE7WWPsaVNQI6tEZ8TotMbXW8bLgM5wpLNsHo/IDwyKAxCXbyYjML
    V165uFZjnI8QEDS8azNUz471OzFOTgJ4ZmwAgqtfa5kfGenmbeZHnVBhctP5rXAR
    CsLWlbjeCmmRYNWborX5k4X/hWenPfTitLwJMBuhXxOfRKxrtXV6jLYskmL7OKH+
    G4ZItG3u+f/qjqW3Q3zVk+SA10E3da6ReniNlZsCpr8E0tIKYw3iaQ7ziVrW0ZIL
    5FSIugBF1i1iiRCPEmWHIPQFsOf9f0uyatwU20eDvDMuq+WbHOAuo00frd/F46Sp
    ewNOcFmzQAyO4tQUjV0RJg==
    """

  Scenario: Updating an up-to-date Nextcloud 14.0.3 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "14.0.3.0"
    And The received PHP version is "7.0.0"
    And the installation mtime is "9"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.0.6" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-15.0.0beta2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    W5QzT0g9uIjBE7WWPsaVNQI6tEZ8TotMbXW8bLgM5wpLNsHo/IDwyKAxCXbyYjML
    V165uFZjnI8QEDS8azNUz471OzFOTgJ4ZmwAgqtfa5kfGenmbeZHnVBhctP5rXAR
    CsLWlbjeCmmRYNWborX5k4X/hWenPfTitLwJMBuhXxOfRKxrtXV6jLYskmL7OKH+
    G4ZItG3u+f/qjqW3Q3zVk+SA10E3da6ReniNlZsCpr8E0tIKYw3iaQ7ziVrW0ZIL
    5FSIugBF1i1iiRCPEmWHIPQFsOf9f0uyatwU20eDvDMuq+WbHOAuo00frd/F46Sp
    ewNOcFmzQAyO4tQUjV0RJg==
    """

  Scenario: Updating an  outdated Nextcloud 15.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "15.0.0.0"
    And The received PHP version is "7.0.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "15.0.0.6" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-15.0.0beta2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    W5QzT0g9uIjBE7WWPsaVNQI6tEZ8TotMbXW8bLgM5wpLNsHo/IDwyKAxCXbyYjML
    V165uFZjnI8QEDS8azNUz471OzFOTgJ4ZmwAgqtfa5kfGenmbeZHnVBhctP5rXAR
    CsLWlbjeCmmRYNWborX5k4X/hWenPfTitLwJMBuhXxOfRKxrtXV6jLYskmL7OKH+
    G4ZItG3u+f/qjqW3Q3zVk+SA10E3da6ReniNlZsCpr8E0tIKYw3iaQ7ziVrW0ZIL
    5FSIugBF1i1iiRCPEmWHIPQFsOf9f0uyatwU20eDvDMuq+WbHOAuo00frd/F46Sp
    ewNOcFmzQAyO4tQUjV0RJg==
    """
