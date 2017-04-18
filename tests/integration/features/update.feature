Feature: Testing the update scenario of releases
  Scenario: Updating an outdated Nextcloud 9.0.50 on the production channel
    Given There is a release with channel "production"
    And The received version is "9.0.50"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.3.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-10.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 9.0.50 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "9.0.50"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.3.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-10.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an outdated Nextcloud 9.0.50 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "9.0.50"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.3.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-10.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 9.0.55 on the production channel
    Given There is a release with channel "production"
    And The received version is "9.0.55"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.3.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-10.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 9.0.55 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "9.0.55"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.3.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-10.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an outdated staged Nextcloud 10.0.3 with PHP 5.4 on the production channel
    Given There is a release with channel "production"
    And The received PHP version is "5.4.0"
    And the installation mtime is "60"
    And The received version is "9.1.0.2"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.3.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-10.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 10.0.3 with PHP 5.6 and no mtime on the production channel
    Given There is a release with channel "production"
    And The received PHP version is "5.6.0"
    And The received version is "9.1.0.2"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.2.7" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
  hvw4zZs6gSeP4TlU0kkfpJ1tgaSrD2M8V/MANX/YqwZBy9mG8z67Mtt07sbYByHh
  kWVd2uVmVoiEcmNEtiJUE1WEcrC+YSAFUTl8P4MjUa2jEC3k37zIn1WcFI8ZqRiH
  EBYiSef87rZXjcvuta5fC4O0cOaxU3pVkNVqeP9T0tHEI4Oorj5Uj8qoiuIH2Xbc
  chLfk+x/EatNAlTE6NJo6rJnquCErooOPgLl6k48oOcgJZZtOQ1xDhb69Yug25bv
  V12smv+3iUGpQBIJnBhIZY+Ww7SOCCca/ss1f+/uEMr3NFGiDgJ4KYoxF/pYaGo4
  MgK0pHPeAIesiUnEEq8y6w==
    """

  Scenario: Updating an up-to-date staged Nextcloud 10.0.3 with PHP 5.4 on the production channel
    Given There is a release with channel "production"
    And The received PHP version is "5.4.0"
    And the installation mtime is "60"
    And The received version is "9.1.3.2"
    When The request is sent
    Then The response is empty

  Scenario: Updating an up-to-date staged Nextcloud 10.0.3 with PHP 5.6 on the production channel
    Given There is a release with channel "production"
    And The received PHP version is "5.6.0"
    And the installation mtime is "60"
    And The received version is "9.1.3.2"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.2.7" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
  hvw4zZs6gSeP4TlU0kkfpJ1tgaSrD2M8V/MANX/YqwZBy9mG8z67Mtt07sbYByHh
  kWVd2uVmVoiEcmNEtiJUE1WEcrC+YSAFUTl8P4MjUa2jEC3k37zIn1WcFI8ZqRiH
  EBYiSef87rZXjcvuta5fC4O0cOaxU3pVkNVqeP9T0tHEI4Oorj5Uj8qoiuIH2Xbc
  chLfk+x/EatNAlTE6NJo6rJnquCErooOPgLl6k48oOcgJZZtOQ1xDhb69Yug25bv
  V12smv+3iUGpQBIJnBhIZY+Ww7SOCCca/ss1f+/uEMr3NFGiDgJ4KYoxF/pYaGo4
  MgK0pHPeAIesiUnEEq8y6w==
    """

  Scenario: Updating an up-to-date staged Nextcloud 10.0.3 with PHP 5.4 on the stable channel
    Given There is a release with channel "stable"
    And The received PHP version is "5.4.0"
    And the installation mtime is "60"
    And The received version is "9.1.3.2"
    When The request is sent
    Then The response is empty

  Scenario: Updating an outdated Nextcloud 10.0.2 on the stable channel without PHP version
    Given There is a release with channel "stable"
    And The received version is "9.1.2.0"
    When The request is sent
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.3.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-10.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date staged Nextcloud 10.0.3 with PHP 5.6 on the stable channel
    Given There is a release with channel "stable"
    And The received PHP version is "5.6.0"
    And the installation mtime is "60"
    And The received version is "9.1.3.2"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.2.7" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
  hvw4zZs6gSeP4TlU0kkfpJ1tgaSrD2M8V/MANX/YqwZBy9mG8z67Mtt07sbYByHh
  kWVd2uVmVoiEcmNEtiJUE1WEcrC+YSAFUTl8P4MjUa2jEC3k37zIn1WcFI8ZqRiH
  EBYiSef87rZXjcvuta5fC4O0cOaxU3pVkNVqeP9T0tHEI4Oorj5Uj8qoiuIH2Xbc
  chLfk+x/EatNAlTE6NJo6rJnquCErooOPgLl6k48oOcgJZZtOQ1xDhb69Yug25bv
  V12smv+3iUGpQBIJnBhIZY+Ww7SOCCca/ss1f+/uEMr3NFGiDgJ4KYoxF/pYaGo4
  MgK0pHPeAIesiUnEEq8y6w==
    """

  Scenario: Updating an outdated Nextcloud 10.0.0 on the beta channel with PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "9.1.0"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.3.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.3RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
  Ae9+zz6TESq0KrtYJebSWFHXNTOLCSecijxJ/Gtx+zvqSc0Psjl88b04oqdnCNRZ
  MLRTulNG/n1AMfnVLr5gZ6mQwrjuJ4pgVGAMdcjLmavHqBgH5kYNbnkAoWA6ICgy
  4OVrtigLvpPDd1QXBmdMpif3FAySi46CBlbdMJez5X8ARbEKTQS5yh/6NwWsnVPp
  3bP77r0TGfnMadU/d7Gf2pg/DAX+WuwBxoqiA8CUBh8J48XUBHTS1TxfDaUisVaU
  cjMggxwvqiUwKjctpneMUDXHf3oU/gXKdzvg1bFT9vgD6+PQtrwEwOtVpUU8EMqu
  0IkPTN27S7MQML+jwRUwIA==
    """

  Scenario: Updating an outdated Nextcloud 10.0.0 on the beta channel with PHP 5.4 will receive the latest compatible release
    Given There is a release with channel "beta"
    And The received version is "9.1.0"
    And The received PHP version is "5.4.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "9.1.3.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-10.0.3.zip"
    And URL to documentation is "https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html"
    And No signature is set

  Scenario: Updating an up-to-date Nextcloud 10.0.3 on the beta channel with PHP 5.4
    Given There is a release with channel "beta"
    And The received version is "9.1.3.2"
    And The received PHP version is "5.4.0"
    When The request is sent
    Then The response is empty

  Scenario: Updating an up-to-date Nextcloud 10.0.3 on the beta channel without sending PHP version
    Given There is a release with channel "beta"
    And The received version is "9.1.3.2"
    When The request is sent
    Then The response is empty

  Scenario: Updating an outdated Nextcloud 10.0.1 on the beta channel with PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "9.1.1.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.3.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.3RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
  Ae9+zz6TESq0KrtYJebSWFHXNTOLCSecijxJ/Gtx+zvqSc0Psjl88b04oqdnCNRZ
  MLRTulNG/n1AMfnVLr5gZ6mQwrjuJ4pgVGAMdcjLmavHqBgH5kYNbnkAoWA6ICgy
  4OVrtigLvpPDd1QXBmdMpif3FAySi46CBlbdMJez5X8ARbEKTQS5yh/6NwWsnVPp
  3bP77r0TGfnMadU/d7Gf2pg/DAX+WuwBxoqiA8CUBh8J48XUBHTS1TxfDaUisVaU
  cjMggxwvqiUwKjctpneMUDXHf3oU/gXKdzvg1bFT9vgD6+PQtrwEwOtVpUU8EMqu
  0IkPTN27S7MQML+jwRUwIA==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.3.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-11.0.3RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
  Ae9+zz6TESq0KrtYJebSWFHXNTOLCSecijxJ/Gtx+zvqSc0Psjl88b04oqdnCNRZ
  MLRTulNG/n1AMfnVLr5gZ6mQwrjuJ4pgVGAMdcjLmavHqBgH5kYNbnkAoWA6ICgy
  4OVrtigLvpPDd1QXBmdMpif3FAySi46CBlbdMJez5X8ARbEKTQS5yh/6NwWsnVPp
  3bP77r0TGfnMadU/d7Gf2pg/DAX+WuwBxoqiA8CUBh8J48XUBHTS1TxfDaUisVaU
  cjMggxwvqiUwKjctpneMUDXHf3oU/gXKdzvg1bFT9vgD6+PQtrwEwOtVpUU8EMqu
  0IkPTN27S7MQML+jwRUwIA==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 stable without PHP version
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.2.7" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
  hvw4zZs6gSeP4TlU0kkfpJ1tgaSrD2M8V/MANX/YqwZBy9mG8z67Mtt07sbYByHh
  kWVd2uVmVoiEcmNEtiJUE1WEcrC+YSAFUTl8P4MjUa2jEC3k37zIn1WcFI8ZqRiH
  EBYiSef87rZXjcvuta5fC4O0cOaxU3pVkNVqeP9T0tHEI4Oorj5Uj8qoiuIH2Xbc
  chLfk+x/EatNAlTE6NJo6rJnquCErooOPgLl6k48oOcgJZZtOQ1xDhb69Yug25bv
  V12smv+3iUGpQBIJnBhIZY+Ww7SOCCca/ss1f+/uEMr3NFGiDgJ4KYoxF/pYaGo4
  MgK0pHPeAIesiUnEEq8y6w==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the empty channel - will use the stable channel then
    Given There is a release with channel ""
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.2.7" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
  hvw4zZs6gSeP4TlU0kkfpJ1tgaSrD2M8V/MANX/YqwZBy9mG8z67Mtt07sbYByHh
  kWVd2uVmVoiEcmNEtiJUE1WEcrC+YSAFUTl8P4MjUa2jEC3k37zIn1WcFI8ZqRiH
  EBYiSef87rZXjcvuta5fC4O0cOaxU3pVkNVqeP9T0tHEI4Oorj5Uj8qoiuIH2Xbc
  chLfk+x/EatNAlTE6NJo6rJnquCErooOPgLl6k48oOcgJZZtOQ1xDhb69Yug25bv
  V12smv+3iUGpQBIJnBhIZY+Ww7SOCCca/ss1f+/uEMr3NFGiDgJ4KYoxF/pYaGo4
  MgK0pHPeAIesiUnEEq8y6w==
    """

  Scenario: Updating an up-to-date Nextcloud 11.0.3RC2 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "11.0.3.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is empty

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.2.7" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
  hvw4zZs6gSeP4TlU0kkfpJ1tgaSrD2M8V/MANX/YqwZBy9mG8z67Mtt07sbYByHh
  kWVd2uVmVoiEcmNEtiJUE1WEcrC+YSAFUTl8P4MjUa2jEC3k37zIn1WcFI8ZqRiH
  EBYiSef87rZXjcvuta5fC4O0cOaxU3pVkNVqeP9T0tHEI4Oorj5Uj8qoiuIH2Xbc
  chLfk+x/EatNAlTE6NJo6rJnquCErooOPgLl6k48oOcgJZZtOQ1xDhb69Yug25bv
  V12smv+3iUGpQBIJnBhIZY+Ww7SOCCca/ss1f+/uEMr3NFGiDgJ4KYoxF/pYaGo4
  MgK0pHPeAIesiUnEEq8y6w==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.2.7"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is empty

  Scenario: Updating an out-dated Nextcloud 11.0.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.2.7"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is empty

  Scenario: Updating an up-to-date Nextcloud 11.0.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "11.0.2.7"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is empty

  Scenario: Updating an up-to-date Nextcloud 11.0.0 on the stable channel without mtime
    Given There is a release with channel "stable"
    And The received version is "11.0.2.7"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is empty

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the production channel
    Given There is a release with channel "production"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "11.0.2.7" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-11.0.2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html"
    And The signature is
    """
  hvw4zZs6gSeP4TlU0kkfpJ1tgaSrD2M8V/MANX/YqwZBy9mG8z67Mtt07sbYByHh
  kWVd2uVmVoiEcmNEtiJUE1WEcrC+YSAFUTl8P4MjUa2jEC3k37zIn1WcFI8ZqRiH
  EBYiSef87rZXjcvuta5fC4O0cOaxU3pVkNVqeP9T0tHEI4Oorj5Uj8qoiuIH2Xbc
  chLfk+x/EatNAlTE6NJo6rJnquCErooOPgLl6k48oOcgJZZtOQ1xDhb69Yug25bv
  V12smv+3iUGpQBIJnBhIZY+Ww7SOCCca/ss1f+/uEMr3NFGiDgJ4KYoxF/pYaGo4
  MgK0pHPeAIesiUnEEq8y6w==
    """

  Scenario: Updating an up-to-date Nextcloud 11.0.2 on the production channel with PHP 5.6
    Given There is a release with channel "production"
    And The received version is "11.0.2.7"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is empty

  Scenario: Updating an up-to-date Nextcloud 11.0.2 on the production channel without PHP version
    Given There is a release with channel "production"
    And The received version is "11.0.2.7"
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
