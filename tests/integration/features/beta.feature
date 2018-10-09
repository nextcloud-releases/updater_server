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
    And Update to version "12.0.12.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.12RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    XvS2Rh/RGuS2869St/quJNFIZKki3o2PYfmF74C5UckWTmY3vyft9EzpnQDKq/St
    zgVjGCpqh9UiQ20BI+dnOrJQkYMvdyJKFohB7+J6FaywZGTXuMhWrGS7rUu/79Rv
    ZDzrDIkJGZWmwBwGDmVte13iL5kOpy5Ry8lwZvPjc5B7e7ygqGWE8f+8FEZ0vtqp
    MvbJYcKy92LdstqG7XLUlWdB8r+OQiP0clBkqZqfSNnUoihEPDd0v60Q4K5MQBlw
    62pIfdJ9hzRAuGVNF6QkvHF7oaZP0L7vKMvUJyVp5E2pwaCbNYlPCMiTIT83a7sS
    +4t3xFuqgsaD9Nz93b+Eug==
    """

  Scenario: Updating an outdated Nextcloud 11.0.0 beta on the beta channel without an mtime
    Given There is a release with channel "beta"
    And The received version is "11.0.0.2"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "12.0.12.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-12.0.12RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    XvS2Rh/RGuS2869St/quJNFIZKki3o2PYfmF74C5UckWTmY3vyft9EzpnQDKq/St
    zgVjGCpqh9UiQ20BI+dnOrJQkYMvdyJKFohB7+J6FaywZGTXuMhWrGS7rUu/79Rv
    ZDzrDIkJGZWmwBwGDmVte13iL5kOpy5Ry8lwZvPjc5B7e7ygqGWE8f+8FEZ0vtqp
    MvbJYcKy92LdstqG7XLUlWdB8r+OQiP0clBkqZqfSNnUoihEPDd0v60Q4K5MQBlw
    62pIfdJ9hzRAuGVNF6QkvHF7oaZP0L7vKMvUJyVp5E2pwaCbNYlPCMiTIT83a7sS
    +4t3xFuqgsaD9Nz93b+Eug==
    """

  Scenario: Updating an outdated Nextcloud 12.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.0.15"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.7RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    yKPj4M++IOi7bIMCpNbsEJNNJraHf+a72aEfirEBqbOCHr6gFiefrKtKrcd9DaZ4
    fV84JpNddQc6gbnZxa+RzHtbTirijUb4SzCMT8/yFqdchDIiwbR7LYHbC4GI3LEx
    zM776vm5MEoq/ethKtM3wf5DWfEaUT+LvdkzUDnE1V81Pz8sJEGD3bvpxo7IEHTp
    oK9QO35dx30j64scL9xKf7BTJYPUUZxRdoAs3Y9E3AUlC77l19Hi5PXHBajh/xiN
    xXQXz+sr7B9j4GgbfxtuIV7ykhQJ5umiNk2P5qdqK0toEupy1woULkE18j7GQ0yj
    eSZt7glFVcU3h4UGgirW/Q==
    """

  Scenario: Updating an up-to-date Nextcloud 12.0.7 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "12.0.7.1"
    And The received PHP version is "5.6.0"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.7RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    yKPj4M++IOi7bIMCpNbsEJNNJraHf+a72aEfirEBqbOCHr6gFiefrKtKrcd9DaZ4
    fV84JpNddQc6gbnZxa+RzHtbTirijUb4SzCMT8/yFqdchDIiwbR7LYHbC4GI3LEx
    zM776vm5MEoq/ethKtM3wf5DWfEaUT+LvdkzUDnE1V81Pz8sJEGD3bvpxo7IEHTp
    oK9QO35dx30j64scL9xKf7BTJYPUUZxRdoAs3Y9E3AUlC77l19Hi5PXHBajh/xiN
    xXQXz+sr7B9j4GgbfxtuIV7ykhQJ5umiNk2P5qdqK0toEupy1woULkE18j7GQ0yj
    eSZt7glFVcU3h4UGgirW/Q==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.7RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    yKPj4M++IOi7bIMCpNbsEJNNJraHf+a72aEfirEBqbOCHr6gFiefrKtKrcd9DaZ4
    fV84JpNddQc6gbnZxa+RzHtbTirijUb4SzCMT8/yFqdchDIiwbR7LYHbC4GI3LEx
    zM776vm5MEoq/ethKtM3wf5DWfEaUT+LvdkzUDnE1V81Pz8sJEGD3bvpxo7IEHTp
    oK9QO35dx30j64scL9xKf7BTJYPUUZxRdoAs3Y9E3AUlC77l19Hi5PXHBajh/xiN
    xXQXz+sr7B9j4GgbfxtuIV7ykhQJ5umiNk2P5qdqK0toEupy1woULkE18j7GQ0yj
    eSZt7glFVcU3h4UGgirW/Q==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 5.6
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "5.6.0"
    And the installation mtime is "90"
    When The request is sent
    Then The response is non-empty
    And Update to version "13.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-13.0.7RC2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    yKPj4M++IOi7bIMCpNbsEJNNJraHf+a72aEfirEBqbOCHr6gFiefrKtKrcd9DaZ4
    fV84JpNddQc6gbnZxa+RzHtbTirijUb4SzCMT8/yFqdchDIiwbR7LYHbC4GI3LEx
    zM776vm5MEoq/ethKtM3wf5DWfEaUT+LvdkzUDnE1V81Pz8sJEGD3bvpxo7IEHTp
    oK9QO35dx30j64scL9xKf7BTJYPUUZxRdoAs3Y9E3AUlC77l19Hi5PXHBajh/xiN
    xXQXz+sr7B9j4GgbfxtuIV7ykhQJ5umiNk2P5qdqK0toEupy1woULkE18j7GQ0yj
    eSZt7glFVcU3h4UGgirW/Q==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 7.0
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.2.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-14.0.2RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    tCegyxsVhEbYn+FFW28hJzgHWSCnZkS12MUqglfia0gf11thw0JPFmMQbvAelpd6
    VfUVTais0NQc4VeR3Qkxk4j7a3f0Hvm9v1GcrAyC0maHnrlcUSoUubII1CtTnXNg
    TryRLCqo58YqN5hDU/0FNnewiaMKg+kEangLE8vG/Wt4Hr6aczK4iI8qsABTQreI
    Nh8UY40fq1V2pCFjrPbok/7+dBObyfTbLAS4HqG4JHYOdgxsTgZgBvMSfNSudcgY
    m6B3XTK1UiyEh6v7ffhotZ2+nBIophIDALa7AGVIVlI5alVEAaYS9ZHv7hQTraWW
    HEWuFffIBSRUwiYDrXdt3Q==
    """

  Scenario: Updating an outdated Nextcloud 13.0.0 on the beta channel on PHP 7.0
    Given There is a release with channel "beta"
    And The received version is "13.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "90"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.2.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-14.0.2RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    tCegyxsVhEbYn+FFW28hJzgHWSCnZkS12MUqglfia0gf11thw0JPFmMQbvAelpd6
    VfUVTais0NQc4VeR3Qkxk4j7a3f0Hvm9v1GcrAyC0maHnrlcUSoUubII1CtTnXNg
    TryRLCqo58YqN5hDU/0FNnewiaMKg+kEangLE8vG/Wt4Hr6aczK4iI8qsABTQreI
    Nh8UY40fq1V2pCFjrPbok/7+dBObyfTbLAS4HqG4JHYOdgxsTgZgBvMSfNSudcgY
    m6B3XTK1UiyEh6v7ffhotZ2+nBIophIDALa7AGVIVlI5alVEAaYS9ZHv7hQTraWW
    HEWuFffIBSRUwiYDrXdt3Q==
    """

  Scenario: Updating an outdated Nextcloud 14.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "14.0.0.8"
    And The received PHP version is "7.0.0"
    And the installation mtime is "10"
    When The request is sent
    Then The response is non-empty
    And Update to version "14.0.2.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-14.0.2RC1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    tCegyxsVhEbYn+FFW28hJzgHWSCnZkS12MUqglfia0gf11thw0JPFmMQbvAelpd6
    VfUVTais0NQc4VeR3Qkxk4j7a3f0Hvm9v1GcrAyC0maHnrlcUSoUubII1CtTnXNg
    TryRLCqo58YqN5hDU/0FNnewiaMKg+kEangLE8vG/Wt4Hr6aczK4iI8qsABTQreI
    Nh8UY40fq1V2pCFjrPbok/7+dBObyfTbLAS4HqG4JHYOdgxsTgZgBvMSfNSudcgY
    m6B3XTK1UiyEh6v7ffhotZ2+nBIophIDALa7AGVIVlI5alVEAaYS9ZHv7hQTraWW
    HEWuFffIBSRUwiYDrXdt3Q==
    """
