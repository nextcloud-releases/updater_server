Feature: Testing the update scenario of stable releases

  Scenario: Updating an up-to-date Nextcloud 16.0.11 on the stable channel (expect 17)
    Given There is a release with channel "stable"
    And The received version is "16.0.11.1"
    And The received PHP version is "7.2.0"
    And the installation mtime is "70"
    When The request is sent
    Then The response is non-empty
    And Update to version "17.0.10.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-17.0.10.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    UNo0Sh9xK+TlO6rL6s380gB436990558QOjdQiDaeYuFANjCQFz0aO957Fetpkol
    idhfkICTMtBC5mlSVAJjMW+5BIQ0kAHeJykqz6YD4Vw0aEIHHFgA1qCEphEj0/D5
    p5OzkP6JSkwp+/e1O8xFdr/8VIHdkCEM5Kd5lchzp83XmfZm1t6YdcV8ziACDZrT
    GaiG/TGRdHeR4ifgMpdMLZIy0x4Qd6k06dhCFsEz8H10Cf0oVmtrjxJsKEPY7doW
    4QZIg8gwFj8Uxk4ylijHFSeIxCX96ZSmj+7wolAn8kYqq5Q8iwVYjNqFtJZ/YXIc
    cNaaoBpx0s3QFdfhSnSgQQ==
    """

  Scenario: Updating an outdated Nextcloud 16.0.7 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "16.0.1.1"
    And The received PHP version is "7.2.0"
    And the installation mtime is "40"
    When The request is sent
    Then The response is non-empty
    And Update to version "16.0.11.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-16.0.11.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    b7SOD6KATY0bpbAcL/+1gdeLeuWAvsIn+tuUzF6HStrjxLrARw8cOrM7bCq5zcq7
    tJCWrI2Ww9CrKH8kNalEZNMDZy346QhYkUZNOiU2IP8wdb1601vRXfIkPyTVSpdk
    RDMQWtIushwa/WIZTKnJWo1fd0juxBnbmIl30rxDgUpBOkjx0zGvA2Ff+mssezX3
    qGhaB0Btr45xpgbHbeEQwsH1w2PXJFy9GsF2psbBEIykCPAxgRWR32bTGH8ws9Uy
    zpAxCj7W4wEnJFhsQ2zb0Wh5ZjSA9G1SARJhMp/8Efwm3uWJr5xK4MYKG2bQ29mt
    HWPTEBalqX2V9enOLAgVWQ==
    """

  Scenario: Updating an up-to-date Nextcloud 17.0.2 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "17.0.0.8"
    And The received PHP version is "7.2.0"
    And the installation mtime is "76"
    When The request is sent
    Then The response is non-empty
    And Update to version "17.0.10.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-17.0.10.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    UNo0Sh9xK+TlO6rL6s380gB436990558QOjdQiDaeYuFANjCQFz0aO957Fetpkol
    idhfkICTMtBC5mlSVAJjMW+5BIQ0kAHeJykqz6YD4Vw0aEIHHFgA1qCEphEj0/D5
    p5OzkP6JSkwp+/e1O8xFdr/8VIHdkCEM5Kd5lchzp83XmfZm1t6YdcV8ziACDZrT
    GaiG/TGRdHeR4ifgMpdMLZIy0x4Qd6k06dhCFsEz8H10Cf0oVmtrjxJsKEPY7doW
    4QZIg8gwFj8Uxk4ylijHFSeIxCX96ZSmj+7wolAn8kYqq5Q8iwVYjNqFtJZ/YXIc
    cNaaoBpx0s3QFdfhSnSgQQ==
    """

  Scenario: Updating an out-dated Nextcloud 17 on the stable channel with php 7.1
    Given There is a release with channel "stable"
    And The received version is "17.0.3.0"
    And The received PHP version is "7.1.0"
    And the installation mtime is "76"
    When The request is sent
    Then The response is non-empty
    And Update to version "17.0.10.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-17.0.10.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    UNo0Sh9xK+TlO6rL6s380gB436990558QOjdQiDaeYuFANjCQFz0aO957Fetpkol
    idhfkICTMtBC5mlSVAJjMW+5BIQ0kAHeJykqz6YD4Vw0aEIHHFgA1qCEphEj0/D5
    p5OzkP6JSkwp+/e1O8xFdr/8VIHdkCEM5Kd5lchzp83XmfZm1t6YdcV8ziACDZrT
    GaiG/TGRdHeR4ifgMpdMLZIy0x4Qd6k06dhCFsEz8H10Cf0oVmtrjxJsKEPY7doW
    4QZIg8gwFj8Uxk4ylijHFSeIxCX96ZSmj+7wolAn8kYqq5Q8iwVYjNqFtJZ/YXIc
    cNaaoBpx0s3QFdfhSnSgQQ==
    """

  Scenario: Updating an up-to-date Nextcloud 17.0.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "17.0.10.1"
    And The received PHP version is "7.2.0"
    And the installation mtime is "5"
    When The request is sent
    Then The response is non-empty
    And Update to version "18.0.14.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-18.0.14.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    nzM1fD0IYCr86Pb7fJLGQA0usVUOKE+JyFVVhJArh4BpdDI0C2yC7l2zeJgCEd+g
    RiXGB1N5a7GTfNSqdLO6ho+5dEg55OQYiTE75ji+dTKz9IDz99crk4BiYIsKc+bt
    Ztuq8p/kxJK7wkRlsxDTULQWlVe0f1shX2sTCg9CNYzY5/kwmQtz8OQ/umwya1sF
    FedS379Vnpa2NgAEq9W45r9hP6iZmKDBlwrY+r/pBWaJteI9xW9Ag8hhv4pSku0q
    BX4Qwl1YI2f8b0KHy3yIqmY58qsWTjGb319Nq3tPFsY8N2hUmFu4yve0nW6Zb/+1
    OcrbOha2Z819kkukqEE34Q==
    """

  Scenario: Updating an up to date Nextcloud 18.0.13 on the stable channel (to 19)
    Given There is a release with channel "stable"
    And The received version is "18.0.14.1"
    And The received PHP version is "7.2.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "19.0.13.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-19.0.13.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    qWFamMWZegXESQawjDX9Zn5XHVNUElbOfmVKyCG/MWqTfX0cUIt/xDOccSK24hce
    8M47spBztkAKLEqsCBfwwmnpqDL2iVhuQVAwHuOyev/53lfdge5j7AH4yqPAEa+j
    XDdnHtLClAtYI7QtIeUAhuj0ychW47rcWRNsZ1tTxKGclZqPubiMd8eO6kn8S/uP
    SnaqLa3zSAKlqrda4qsvt4AnGfOB7/MZxQBO9Sy/D6F60DqvI9/IntjJyJm6uUzo
    +ziDzSgzCHt8/tFdbtjLR1j3zEv5n7epNdTZuj/Z3FVbBi4HSk9oOHa6LQTeqAeA
    WN2PwtM3nn6/5y0BMhJueQ==
    """

  Scenario: Updating an outdated Nextcloud 18.0.0 on the stable channel (to 18)
    Given There is a release with channel "stable"
    And The received version is "18.0.0.3"
    And The received PHP version is "7.2.0"
    And the installation mtime is "50"
    When The request is sent
    Then The response is non-empty
    And Update to version "18.0.14.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-18.0.14.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    nzM1fD0IYCr86Pb7fJLGQA0usVUOKE+JyFVVhJArh4BpdDI0C2yC7l2zeJgCEd+g
    RiXGB1N5a7GTfNSqdLO6ho+5dEg55OQYiTE75ji+dTKz9IDz99crk4BiYIsKc+bt
    Ztuq8p/kxJK7wkRlsxDTULQWlVe0f1shX2sTCg9CNYzY5/kwmQtz8OQ/umwya1sF
    FedS379Vnpa2NgAEq9W45r9hP6iZmKDBlwrY+r/pBWaJteI9xW9Ag8hhv4pSku0q
    BX4Qwl1YI2f8b0KHy3yIqmY58qsWTjGb319Nq3tPFsY8N2hUmFu4yve0nW6Zb/+1
    OcrbOha2Z819kkukqEE34Q==
    """

  Scenario: Updating an outdated Nextcloud 19.0.0 on the stable channel to 19
    Given There is a release with channel "stable"
    And The received version is "19.0.0.2"
    And The received PHP version is "7.2.0"
    And the installation mtime is "33"
    When The request is sent
    Then The response is non-empty
    And Update to version "19.0.13.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-19.0.13.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    qWFamMWZegXESQawjDX9Zn5XHVNUElbOfmVKyCG/MWqTfX0cUIt/xDOccSK24hce
    8M47spBztkAKLEqsCBfwwmnpqDL2iVhuQVAwHuOyev/53lfdge5j7AH4yqPAEa+j
    XDdnHtLClAtYI7QtIeUAhuj0ychW47rcWRNsZ1tTxKGclZqPubiMd8eO6kn8S/uP
    SnaqLa3zSAKlqrda4qsvt4AnGfOB7/MZxQBO9Sy/D6F60DqvI9/IntjJyJm6uUzo
    +ziDzSgzCHt8/tFdbtjLR1j3zEv5n7epNdTZuj/Z3FVbBi4HSk9oOHa6LQTeqAeA
    WN2PwtM3nn6/5y0BMhJueQ==
    """

  Scenario: Updating an outdated Nextcloud 19.0.13 on the stable channel to 20
    Given There is a release with channel "stable"
    And The received version is "19.0.13.1"
    And The received PHP version is "7.2.0"
    And the installation mtime is "77"
    When The request is sent
    Then The response is non-empty
    And Update to version "20.0.14.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-20.0.14.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/20/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    ie2H7/drKls2RxE5aS50ocGeXIBiAlczHvhCeObYF21s0qQtx0mGJe6TUvA8diQ5
    T3ZiZwRLQT2BH6GKHbOt6ku6RRSTILhglffUAv3CellNrYmkyAl1ob6/4H5/XHjC
    DgQ6Ykglk7xvQICw2l7s4tfa8KNIWLdPuWfUvXBBDsXKtFEmv8d0SU+f/dQR6JKu
    uLzb1cmunoldyvH/qC4XdKx1r/JqPEaQxW7l3WQeXaLCA2OiLxIBcHH6ucNJ4ik6
    fZCxpy3szm7gaozWquGfD+oglIY7GLVsbeZBTDFgF44OcDAY/29AL3TKRKN+cnQr
    6feVFe2PlZ2FK5zxWZNYfw==
    """

  Scenario: Updating the Nextcloud 20.0.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "20.0.0.3"
    And The received PHP version is "7.3.0"
    And the installation mtime is "31"
    When The request is sent
    Then The response is non-empty
    And Update to version "20.0.14.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-20.0.14.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/20/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    ie2H7/drKls2RxE5aS50ocGeXIBiAlczHvhCeObYF21s0qQtx0mGJe6TUvA8diQ5
    T3ZiZwRLQT2BH6GKHbOt6ku6RRSTILhglffUAv3CellNrYmkyAl1ob6/4H5/XHjC
    DgQ6Ykglk7xvQICw2l7s4tfa8KNIWLdPuWfUvXBBDsXKtFEmv8d0SU+f/dQR6JKu
    uLzb1cmunoldyvH/qC4XdKx1r/JqPEaQxW7l3WQeXaLCA2OiLxIBcHH6ucNJ4ik6
    fZCxpy3szm7gaozWquGfD+oglIY7GLVsbeZBTDFgF44OcDAY/29AL3TKRKN+cnQr
    6feVFe2PlZ2FK5zxWZNYfw==
    """


  Scenario: Updating the Nextcloud 20.0.14 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "20.0.14.2"
    And The received PHP version is "7.3.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "21.0.9.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-21.0.9.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/21/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    UmaMy3Rp14wXYO8IQPzJWIsJnz5po9Fw42upR3ci+EPmfpptUgCpxDBZ+uIMLpIf
    Ee9waBv1ZPRgOaUmzwWQUGzL+z1+LRMe9rm/m2SKEYDWzq0Uk0wmheqAdhaZHFYq
    EIXWXKMauXl+KxdNsJOftU96NzoiWTO8m4JjT7758fyGuio7jRWHCun1m+nb4hSD
    LQHdC1Ipng5IPFcR2EJ9zP+SpLR7pO7g+2raxlnLhvqT27FfiTAw3J4ztm/BsGTW
    BQwO9DSgH23A3veRLMpZnuiZcZfOJIr/LSRjvgxU+RdHKWFJkmngNQAg7pTPnjMH
    mE2YG/R4IKW+A8xqweVzig==
    """

  Scenario: Updating the Nextcloud 20.0.9 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "20.0.9.0"
    And The received PHP version is "7.3.0"
    And the installation mtime is "31"
    When The request is sent
    Then The response is non-empty
    And Update to version "20.0.14.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-20.0.14.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/20/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    ie2H7/drKls2RxE5aS50ocGeXIBiAlczHvhCeObYF21s0qQtx0mGJe6TUvA8diQ5
    T3ZiZwRLQT2BH6GKHbOt6ku6RRSTILhglffUAv3CellNrYmkyAl1ob6/4H5/XHjC
    DgQ6Ykglk7xvQICw2l7s4tfa8KNIWLdPuWfUvXBBDsXKtFEmv8d0SU+f/dQR6JKu
    uLzb1cmunoldyvH/qC4XdKx1r/JqPEaQxW7l3WQeXaLCA2OiLxIBcHH6ucNJ4ik6
    fZCxpy3szm7gaozWquGfD+oglIY7GLVsbeZBTDFgF44OcDAY/29AL3TKRKN+cnQr
    6feVFe2PlZ2FK5zxWZNYfw==
    """

  Scenario: Updating the Nextcloud 21.0.0 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "21.0.0.7"
    And The received PHP version is "7.3.0"
    And the installation mtime is "20"
    When The request is sent
    Then The response is non-empty
    And Update to version "21.0.9.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-21.0.9.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/21/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    UmaMy3Rp14wXYO8IQPzJWIsJnz5po9Fw42upR3ci+EPmfpptUgCpxDBZ+uIMLpIf
    Ee9waBv1ZPRgOaUmzwWQUGzL+z1+LRMe9rm/m2SKEYDWzq0Uk0wmheqAdhaZHFYq
    EIXWXKMauXl+KxdNsJOftU96NzoiWTO8m4JjT7758fyGuio7jRWHCun1m+nb4hSD
    LQHdC1Ipng5IPFcR2EJ9zP+SpLR7pO7g+2raxlnLhvqT27FfiTAw3J4ztm/BsGTW
    BQwO9DSgH23A3veRLMpZnuiZcZfOJIr/LSRjvgxU+RdHKWFJkmngNQAg7pTPnjMH
    mE2YG/R4IKW+A8xqweVzig==
    """

  Scenario: Updating the Nextcloud latest 21 to 22.2.10 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "21.0.9.1"
    And The received PHP version is "7.3.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "22.2.10.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-22.2.10.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/22/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    XDDYmHMD8famkqCoed6EmUO4PNL8YsMOv859HOmcPThrQ2GcTr0jeX06oQ3ZrRsC
    wkfN+idHSOwY++S/qN7Pp65/isSfVU7LSYn/ELEnyRC5l8M1g1F/By4Bj8Np+7mA
    HIJmvvAKiVflOGPHWIhcXin1whDXeLXxpz3ntHR02XARLgozkbnyOrjxmkcx0BOk
    yyRgxVQXLR1QsFUhrt8+zjlhL/JsEHzCQ954n0mggdx8IhiEUqpHFjubwQbEytX9
    fhlPbaifQKypXBpBdN/RBRt6Ox5z2lSG5IY/g8nc4x7rYQSpiTrtWi1vlcxF0aIT
    GorEOAeOrtcV0ba4AVoETQ==
    """

  Scenario: Updating the Nextcloud 22.1.1 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "22.0.0.0"
    And The received PHP version is "7.3.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "22.2.10.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-22.2.10.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/22/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    XDDYmHMD8famkqCoed6EmUO4PNL8YsMOv859HOmcPThrQ2GcTr0jeX06oQ3ZrRsC
    wkfN+idHSOwY++S/qN7Pp65/isSfVU7LSYn/ELEnyRC5l8M1g1F/By4Bj8Np+7mA
    HIJmvvAKiVflOGPHWIhcXin1whDXeLXxpz3ntHR02XARLgozkbnyOrjxmkcx0BOk
    yyRgxVQXLR1QsFUhrt8+zjlhL/JsEHzCQ954n0mggdx8IhiEUqpHFjubwQbEytX9
    fhlPbaifQKypXBpBdN/RBRt6Ox5z2lSG5IY/g8nc4x7rYQSpiTrtWi1vlcxF0aIT
    GorEOAeOrtcV0ba4AVoETQ==
    """

  Scenario:  Updating the Nextcloud latest 22 to 23.0.12 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "22.2.10.2"
    And The received PHP version is "7.3.0"
    And the installation mtime is "28"
    When The request is sent
    Then The response is non-empty
    And Update to version "23.0.12.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-23.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/23/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    tu+v9XHqXSKxncQi5ps0Sz7DHZ8l4sXAPw/8B2REvlkw/YC8OMSpnTy8LSKKgIdZ
    sFsVcvA0Q6l84Xve6cxE3XpRKxSAxWJbamsmE35HcLwxVtuwpWxyOFD9xUzDVCVf
    nZfQcDUjeK2xQxV+qVjuPuoz0TmRwcZJwrXk/nZiA1cAV/k2PPG9FP25R8WAdIQD
    rfrM7C5GWPNSzv9qcUteJ4jv9ORJ/FiZVewSfP+5hKxTIeUw+D/9LbCjRVzKwvIx
    3r9oA+gwN2zYNOuYFvpF9FtVtJ9NLR/EJWBoHWLuO0XcrXgVWoemwF97nFeV5Hdp
    PlWRhIoX0XzP82+TC5b1dg==
    """

  Scenario:  Updating the Nextcloud 23 to latest 23.0.12 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "23.0.0.10"
    And The received PHP version is "7.3.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "23.0.12.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-23.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/23/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    tu+v9XHqXSKxncQi5ps0Sz7DHZ8l4sXAPw/8B2REvlkw/YC8OMSpnTy8LSKKgIdZ
    sFsVcvA0Q6l84Xve6cxE3XpRKxSAxWJbamsmE35HcLwxVtuwpWxyOFD9xUzDVCVf
    nZfQcDUjeK2xQxV+qVjuPuoz0TmRwcZJwrXk/nZiA1cAV/k2PPG9FP25R8WAdIQD
    rfrM7C5GWPNSzv9qcUteJ4jv9ORJ/FiZVewSfP+5hKxTIeUw+D/9LbCjRVzKwvIx
    3r9oA+gwN2zYNOuYFvpF9FtVtJ9NLR/EJWBoHWLuO0XcrXgVWoemwF97nFeV5Hdp
    PlWRhIoX0XzP82+TC5b1dg==
    """

  Scenario:  Updating the latest Nextcloud 23 to latest 24 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "23.0.12.2"
    And The received PHP version is "8.0.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "24.0.12.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-24.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/24/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    aCQnJpJjf83glgpOxTs1tenmKYhdBK34JyhBtwhikoE4bg1GpfNPe+5OVEDkKPLi
    o3tAWWdx8SAR1+PuLYwjkyy6hhr80ojDrhnmjVprB9PZ5Dqqz9Uk5sLjyse2e0FC
    L9eCQfFLRMxNYyucp8ihSW2100KbDKPXq5K/GUS/9TuLV99JdwJjAWtPQzsm5KK9
    3SMqwkuwWg+39qVS9W1w4zWjAwfP1xyJUFTIBeS35hnmnol2goE0JbSlTMoBYFyQ
    PC8WFtnBG8EIA1ncyQ/IDKUZjg79E8cM8zyIY8PYmA/Jf4MpTMwfoGJQ0GtD6nCF
    ACWMWE93WNcq+HBa025zsw==
    """

  Scenario:  Updating Nextcloud 24 to latest 24 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "24.0.0.12"
    And The received PHP version is "8.0.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "24.0.12.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-24.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/24/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    aCQnJpJjf83glgpOxTs1tenmKYhdBK34JyhBtwhikoE4bg1GpfNPe+5OVEDkKPLi
    o3tAWWdx8SAR1+PuLYwjkyy6hhr80ojDrhnmjVprB9PZ5Dqqz9Uk5sLjyse2e0FC
    L9eCQfFLRMxNYyucp8ihSW2100KbDKPXq5K/GUS/9TuLV99JdwJjAWtPQzsm5KK9
    3SMqwkuwWg+39qVS9W1w4zWjAwfP1xyJUFTIBeS35hnmnol2goE0JbSlTMoBYFyQ
    PC8WFtnBG8EIA1ncyQ/IDKUZjg79E8cM8zyIY8PYmA/Jf4MpTMwfoGJQ0GtD6nCF
    ACWMWE93WNcq+HBa025zsw==
    """

  Scenario:  Updating latest Nextcloud 24 to 25 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "24.0.12.1"
    And The received PHP version is "8.0.0"
    And the installation mtime is "91"
    When The request is sent
    Then The response is non-empty
    And Update to version "25.0.13.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-25.0.13.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/25/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    FVPFITm49G4y0pv7xo9XWeLw4zKopsAwrj2iVSW2je9Nq2U25RpudHkrSwHZY2JD
    Fsjx8xFncgjHT1iiuZJHBOkInfmJYvsBe3RVuS87uLhmeVevLKwBC+ZkgbRiMwX8
    j6TaNthAVOlYaowAQAjyRgJ8AAg3L5liYmqhobBUgtwd86wRlzk5Fy9MTAM3BSwn
    J5CqVqcGxVBCJdTp73oryXSctu1lHS4zS4eMWaqSPrCDb4uSMyjE4DESH60dwVyR
    X6IrjOfLlNvurihALJuhJzqWG+Xdi3xurMOI65ad8im2+7tiB/yu5Bb5NdSl8KvL
    c2rOEZwqzv2p7fWh4Ovl6g==
    """

  Scenario:  Updating Nextcloud 25 to latest 25 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "25.0.1.1"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "25.0.13.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-25.0.13.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/25/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    FVPFITm49G4y0pv7xo9XWeLw4zKopsAwrj2iVSW2je9Nq2U25RpudHkrSwHZY2JD
    Fsjx8xFncgjHT1iiuZJHBOkInfmJYvsBe3RVuS87uLhmeVevLKwBC+ZkgbRiMwX8
    j6TaNthAVOlYaowAQAjyRgJ8AAg3L5liYmqhobBUgtwd86wRlzk5Fy9MTAM3BSwn
    J5CqVqcGxVBCJdTp73oryXSctu1lHS4zS4eMWaqSPrCDb4uSMyjE4DESH60dwVyR
    X6IrjOfLlNvurihALJuhJzqWG+Xdi3xurMOI65ad8im2+7tiB/yu5Bb5NdSl8KvL
    c2rOEZwqzv2p7fWh4Ovl6g==
    """

  Scenario: Updating latest Nextcloud 25 to 26 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "25.0.13.2"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "26.0.13.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-26.0.13.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/26/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    bvGxFDuB+F5C9DqiARiF9MifdcZEQ2R5+AvgCEs/hnrUugRjTXMvJPRkaDLL01Yf
    QoiNwNG3da/2JQEAfZ23YkQedNQ6T3fs7HGbhUZA3xFZb06kxQpLJFI/Ncei8i16
    +QyxhlQtOlhBG0ExG0M0LD3Ow9ZFsCkRk1Ja2YIRBW3mRUdnqew8mYYKltZJL444
    D5BO/0AisCh9hVI7JzExVmwYL/HOmbG5GBpy7BLJnSOUU0Di5PSfwoLIOqLsg/9+
    qVqpedb3ivvwVR1pZqTUyrUPDYojLnyw3XCSKb588U6kSNhaMj/Kl5/5KT34OG+2
    m04vBdfnV+VUhCBz0tYn9A==
    """

  Scenario: Updating Nextcloud 26 to latest 26 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "26.0.0.10"
    And The received PHP version is "8.1.0"
    And the installation mtime is "71"
    When The request is sent
    Then The response is non-empty
    And Update to version "26.0.13.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-26.0.13.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/26/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    bvGxFDuB+F5C9DqiARiF9MifdcZEQ2R5+AvgCEs/hnrUugRjTXMvJPRkaDLL01Yf
    QoiNwNG3da/2JQEAfZ23YkQedNQ6T3fs7HGbhUZA3xFZb06kxQpLJFI/Ncei8i16
    +QyxhlQtOlhBG0ExG0M0LD3Ow9ZFsCkRk1Ja2YIRBW3mRUdnqew8mYYKltZJL444
    D5BO/0AisCh9hVI7JzExVmwYL/HOmbG5GBpy7BLJnSOUU0Di5PSfwoLIOqLsg/9+
    qVqpedb3ivvwVR1pZqTUyrUPDYojLnyw3XCSKb588U6kSNhaMj/Kl5/5KT34OG+2
    m04vBdfnV+VUhCBz0tYn9A==
    """

  Scenario: Updating latest Nextcloud 26 to 27 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "26.0.13.1"
    And The received PHP version is "8.1.0"
    And the installation mtime is "61"
    When The request is sent
    Then The response is non-empty
    And Update to version "27.1.11.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-27.1.11.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    brs2KkUu60QmFZD46rSTyg3qBSlYnv584xeFNWLl2ZM4cwItzJ5wXeajfrPvoUQJ
    GWw7Ln4pQPHja4GrYaNfrKewbBzdJ295glFA5Biwk8OaacsAh6lZm4QH87OUjvgS
    560LH0hW99Jf9aFv/qqj56T0GSGlGS3qv/HNimmeC0sZfLNDdxjaDWBpVJkt+45Z
    vJJ8XVSDOlNNKjcgvcUMrsDItXioSwBst6vTdR5IKLAFivlb7HYLUN48R9h57QM2
    v8X/N49mF+Wk3PQa19wBVsUFYkaQuG9FTjUVgvp8bgv3s9rhrOLJa5KUOpdcodgZ
    faeql723PcZEzPJ3dzisSw==
    """

  Scenario: Updating Nextcloud 27 to latest 27 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "27.0.0.7"
    And The received PHP version is "8.1.0"
    And the installation mtime is "71"
    When The request is sent
    Then The response is non-empty
    And Update to version "27.1.11.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-27.1.11.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    brs2KkUu60QmFZD46rSTyg3qBSlYnv584xeFNWLl2ZM4cwItzJ5wXeajfrPvoUQJ
    GWw7Ln4pQPHja4GrYaNfrKewbBzdJ295glFA5Biwk8OaacsAh6lZm4QH87OUjvgS
    560LH0hW99Jf9aFv/qqj56T0GSGlGS3qv/HNimmeC0sZfLNDdxjaDWBpVJkt+45Z
    vJJ8XVSDOlNNKjcgvcUMrsDItXioSwBst6vTdR5IKLAFivlb7HYLUN48R9h57QM2
    v8X/N49mF+Wk3PQa19wBVsUFYkaQuG9FTjUVgvp8bgv3s9rhrOLJa5KUOpdcodgZ
    faeql723PcZEzPJ3dzisSw==
    """

  Scenario: Updating latest Nextcloud 27.1 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "27.1.11.3"
    And The received PHP version is "8.1.0"
    And the installation mtime is "41"
    When The request is sent
    Then The response is non-empty
    And Update to version "28.0.14.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-28.0.14.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/28/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    e3wnEZE0ooyNX8CpsSEgXafLoOU/U+zORUyeqKczWuuf2Srq4edl2SCaQgvdSLsG
    DZo8h9LLEsh544/NyS8VOY7aJVqR2JOC4bUyztfNTnlppRLVTCIXx053Eht9+neN
    pYlPy8hBK+KBLoN7q3WYcWL1QOIrUAzgxhjwshMrTxNrHi8Nq7g37iZUzhPU5HWw
    MUID9gsQnT+aFurooLVvWMM8Ad0RkU72i5Y7I80c+v/2MYE9rxUmNC54noVePvrj
    R8zf/PC+Yj1vxFZ0hYAtweLgBxfwU5cNBYfH7M1I9FLlb88p/XDWx6XaBz4Ql6LK
    lbpDxNE9UiM09JG1dU7Ebg==
    """

  Scenario: Updating Nextcloud 28 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "28.0.0.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "28.0.14.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-28.0.14.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/28/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    e3wnEZE0ooyNX8CpsSEgXafLoOU/U+zORUyeqKczWuuf2Srq4edl2SCaQgvdSLsG
    DZo8h9LLEsh544/NyS8VOY7aJVqR2JOC4bUyztfNTnlppRLVTCIXx053Eht9+neN
    pYlPy8hBK+KBLoN7q3WYcWL1QOIrUAzgxhjwshMrTxNrHi8Nq7g37iZUzhPU5HWw
    MUID9gsQnT+aFurooLVvWMM8Ad0RkU72i5Y7I80c+v/2MYE9rxUmNC54noVePvrj
    R8zf/PC+Yj1vxFZ0hYAtweLgBxfwU5cNBYfH7M1I9FLlb88p/XDWx6XaBz4Ql6LK
    lbpDxNE9UiM09JG1dU7Ebg==
    """

  Scenario: Updating latest Nextcloud 28 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "28.0.14.1"
    And The received PHP version is "8.1.0"
    And the installation mtime is "61"
    When The request is sent
    Then The response is non-empty
    And Update to version "29.0.12.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-29.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/29/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    iObMMb/GmC6hn6gcTg+XED6gNXHbk2HYosaKVGxXhzWm20SH06RMLxvypJq46qal
    NmLIuf6AnRn3i/jmQJRCX+HaVCnRa4NBrsgQhXsQf8oPBJdp4yA58yJrjV6rX0NN
    09L+d7c9rvFbvAW1zj4In2z9LcSs71siLzAMumSb1BP0E/yxXsqLUPPP7Yv/gPrR
    pBmyvcZptxb51qrP8nXRxq1nanOrMdt/5tYYvS9U+TjXuyxht7UDbifHv01V51rt
    KymBaxs4l3CDVeGx10Jk5TmwKOea+9n7RJMEw1VJrT978Hm+vSlOtkDQOSZjFQms
    KNHJgqneThQiUocQTgNfnQ==
    """

  Scenario: Updating Nextcloud 29 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "29.0.0.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "29.0.12.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-29.0.12.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/29/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    iObMMb/GmC6hn6gcTg+XED6gNXHbk2HYosaKVGxXhzWm20SH06RMLxvypJq46qal
    NmLIuf6AnRn3i/jmQJRCX+HaVCnRa4NBrsgQhXsQf8oPBJdp4yA58yJrjV6rX0NN
    09L+d7c9rvFbvAW1zj4In2z9LcSs71siLzAMumSb1BP0E/yxXsqLUPPP7Yv/gPrR
    pBmyvcZptxb51qrP8nXRxq1nanOrMdt/5tYYvS9U+TjXuyxht7UDbifHv01V51rt
    KymBaxs4l3CDVeGx10Jk5TmwKOea+9n7RJMEw1VJrT978Hm+vSlOtkDQOSZjFQms
    KNHJgqneThQiUocQTgNfnQ==
    """

  Scenario: Updating Nextcloud 29 to 30 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "29.0.12.2"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "30.0.6.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-30.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/30/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    0TNMRajUF9K9h8zUldbISdl2VBxEg73xEyF8nGRftAPGIOwblD1KU6PpCok7YB/p
    jeiblqnmQGwrukf6sD3/Ndr1ko73WtXbeIgYzzrk3kPfCx9TEgKGJplMn0AiYdKx
    euDewwybpUzFIqPQEPYZA6XvWeMK54oUuzUjT/hS4VjBivAbnVUs3VTw24gA/m6U
    jnxxZN+RR89yJaWWgDNe9qlp0MLxgl2D5mGSuMiNgXq/g3AGsc9fdQZH6prAIOkx
    JiHnhxXGHhH+u7V6Odc+CApYR0xpkbzlEJ9DHXm8KpfgwE5/REwCUMt360InSO5G
    RMt4qzAka3RF5LChUI/lXg==
    """

  Scenario: Updating Nextcloud 30 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "30.0.0.1"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "30.0.6.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-30.0.6.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/30/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    0TNMRajUF9K9h8zUldbISdl2VBxEg73xEyF8nGRftAPGIOwblD1KU6PpCok7YB/p
    jeiblqnmQGwrukf6sD3/Ndr1ko73WtXbeIgYzzrk3kPfCx9TEgKGJplMn0AiYdKx
    euDewwybpUzFIqPQEPYZA6XvWeMK54oUuzUjT/hS4VjBivAbnVUs3VTw24gA/m6U
    jnxxZN+RR89yJaWWgDNe9qlp0MLxgl2D5mGSuMiNgXq/g3AGsc9fdQZH6prAIOkx
    JiHnhxXGHhH+u7V6Odc+CApYR0xpkbzlEJ9DHXm8KpfgwE5/REwCUMt360InSO5G
    RMt4qzAka3RF5LChUI/lXg==
    """

  Scenario: Not updating Nextcloud 30 to 31 on the stable channel (staged rollout)
    Given There is a release with channel "stable"
    And The received version is "30.0.6.2"
    And The received PHP version is "8.1.0"
    And the installation mtime is "31"
    When The request is sent
    Then The response is empty

  Scenario: Updating Nextcloud 30 to 31 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "30.0.6.2"
    And The received PHP version is "8.1.0"
    And the installation mtime is "21"
    When The request is sent
    Then The response is non-empty
    And Update to version "31.0.0.18" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-31.0.0.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/31/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    ue6GgTHTVjbwmTar1N9Jzfa4RuXde36jYj33/ShEHIU2jMvzRq+xbbPAfmY51ejM
    +mBqkaWr0SnOgjW+n3pg3kIAArAYAAd0UUVqsTAAjLQNRi+JodiOrkJI4GVnQkKl
    eHInhEY7vVbzBxXO1sGjw+Pt8Gt39gnhEDTGBs/uQcyyRxHXaHqDdIRJk2VOUTYz
    sHJhmfD6KvOZJe3RYvKRtO5J7mWPoDN3gyrUMhkZgQyadGWxSi/dXCejNQFMdfm2
    Kgxm9nCwKCUUuIV593rzez+nNGfOj9tEkTvw0kB0rl2yb+sUpmw9sLicBVGvtiDe
    UgGsHi8fp1WDee4UneIwfw==
    """

  Scenario: Updating Nextcloud 31 on the stable channel
    Given There is a release with channel "stable"
    And The received version is "31.0.0.1"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "31.0.0.18" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-31.0.0.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/31/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    ue6GgTHTVjbwmTar1N9Jzfa4RuXde36jYj33/ShEHIU2jMvzRq+xbbPAfmY51ejM
    +mBqkaWr0SnOgjW+n3pg3kIAArAYAAd0UUVqsTAAjLQNRi+JodiOrkJI4GVnQkKl
    eHInhEY7vVbzBxXO1sGjw+Pt8Gt39gnhEDTGBs/uQcyyRxHXaHqDdIRJk2VOUTYz
    sHJhmfD6KvOZJe3RYvKRtO5J7mWPoDN3gyrUMhkZgQyadGWxSi/dXCejNQFMdfm2
    Kgxm9nCwKCUUuIV593rzez+nNGfOj9tEkTvw0kB0rl2yb+sUpmw9sLicBVGvtiDe
    UgGsHi8fp1WDee4UneIwfw==
    """
