Feature: Testing the update scenario of beta releases

  Scenario: Updating an outdated Nextcloud 16.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "16.0.0.0"
    And The received PHP version is "7.1.0"
    And the installation mtime is "11"
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

  Scenario: Updating an outdated Nextcloud 17.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "17.0.10.2"
    And The received PHP version is "7.2.0"
    And the installation mtime is "11"
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

  Scenario: Updating an outdated Nextcloud 18.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "18.0.10.2"
    And The received PHP version is "7.2.0"
    And the installation mtime is "11"
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

  Scenario: Updating an outdated Nextcloud 18.0.14.1 on the beta channel
    Given There is a release with channel "beta"
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

  Scenario: Updating an outdated Nextcloud 19.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "19.0.0.2"
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

  Scenario: Updating the latest Nextcloud 19.0.13 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "19.0.13.0"
    And The received PHP version is "7.2.0"
    And the installation mtime is "11"
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

  Scenario: Updating the Nextcloud 20.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "20.0.0.3"
    And The received PHP version is "7.3.0"
    And the installation mtime is "11"
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

  Scenario: Updating the Nextcloud 20.0.14 on the beta channel
    Given There is a release with channel "beta"
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

  Scenario: Updating the Nextcloud 21.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "21.0.0.9"
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

  Scenario: Updating the Nextcloud 21.0.9 on the beta channel
    Given There is a release with channel "beta"
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

  Scenario: Updating the Nextcloud 22.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "22.0.0.11"
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

  Scenario: Updating the latest Nextcloud 22 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "22.2.10.0"
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

  Scenario: Updating Nextcloud 23.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "23.0.0.0"
    And The received PHP version is "7.4.0"
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

  Scenario: Updating the latest Nextcloud 23 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "23.0.12.2"
    And The received PHP version is "7.4.0"
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

  Scenario: Updating Nextcloud 24.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "24.0.0.6"
    And The received PHP version is "7.4.0"
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

  Scenario: Updating the latest Nextcloud 24 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "24.0.12.0"
    And The received PHP version is "7.4.0"
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

  Scenario: Updating Nextcloud 25.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "25.0.0.0"
    And The received PHP version is "7.4.0"
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

  Scenario: Updating latest Nextcloud 25 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "25.0.13.2"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "26.0.13.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-26.0.13rc1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/26/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    e2hyhdRHna5M14k6ugsyfv+lbYU7I8JmjyNpHXhumgHt3XTbSkWO4/JECdUhLZxy
    UPFfon7E/aMJH3mRDIxCbe1UTefLjWmgoO57HlQUnjhP9l2Ep6TY057d3AThVeP2
    RcVtpntbHIfFec5jf36LMruQOVzUHJZBjAO8SXiovTYknaYcUeWsQdkvfkX3F+Br
    hB3+ecdeSIvHlnOguiA3YfAGJNAg2rh8kynL30du/BuX7tUkZSG02p6/hxAhPUlR
    1vOyxtwCJgX0LXHCxcp99fYSQPH72ZwBE6ep2EcFToaKGiUUwyjhbEk1H+PejZHZ
    29FQnxEDvUO82Hnf2CsDtA==
    """

  Scenario: Updating Nextcloud 26 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "26.0.0.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "26.0.13.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-26.0.13rc1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/26/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    e2hyhdRHna5M14k6ugsyfv+lbYU7I8JmjyNpHXhumgHt3XTbSkWO4/JECdUhLZxy
    UPFfon7E/aMJH3mRDIxCbe1UTefLjWmgoO57HlQUnjhP9l2Ep6TY057d3AThVeP2
    RcVtpntbHIfFec5jf36LMruQOVzUHJZBjAO8SXiovTYknaYcUeWsQdkvfkX3F+Br
    hB3+ecdeSIvHlnOguiA3YfAGJNAg2rh8kynL30du/BuX7tUkZSG02p6/hxAhPUlR
    1vOyxtwCJgX0LXHCxcp99fYSQPH72ZwBE6ep2EcFToaKGiUUwyjhbEk1H+PejZHZ
    29FQnxEDvUO82Hnf2CsDtA==
    """

  Scenario: Updating latest Nextcloud 26 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "26.0.13.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "27.1.8.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-27.1.8rc1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    JBH/DJjXPxCx4ZQxWApUvhzlbFl0MVOpaq0UBO/xyK6rpEJCtdiojVZ0zeTDHiag
    Gop2OyHVeqMSDwDHLcXEXGZdcj3596CvvRm6hVZR/m51uz7saHnrRBspNefeRXUI
    I+eOpqUREZixADI/h781VmW46WMbW3TMaNMswq0ET4DLTOusUKEmWL3m/9v+5UoA
    IkE1SRZBzfGxQLL1jgi+Rd8xsZrm5/YxxU0DG5G1JRMUYCrmQ3iGCm7PM6rJ3kPo
    DOhbC+vBZ9XEuGZV2WBzPqyj+Tt83tRxZGLfVZQL6D2o4P454P07Zr5esvB7S7Ak
    q2joxDtYcOf2G5pgY1C4Uw==
    """

  Scenario: Updating latest Nextcloud 26 on the beta channel with instance category
    Given There is a release with channel "beta"
    And The received version is "26.0.13.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    And the instance category is 2
    And the instance has no subscription
    When The request is sent
    Then The response is non-empty
    And Update to version "27.1.8.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-27.1.8rc1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    JBH/DJjXPxCx4ZQxWApUvhzlbFl0MVOpaq0UBO/xyK6rpEJCtdiojVZ0zeTDHiag
    Gop2OyHVeqMSDwDHLcXEXGZdcj3596CvvRm6hVZR/m51uz7saHnrRBspNefeRXUI
    I+eOpqUREZixADI/h781VmW46WMbW3TMaNMswq0ET4DLTOusUKEmWL3m/9v+5UoA
    IkE1SRZBzfGxQLL1jgi+Rd8xsZrm5/YxxU0DG5G1JRMUYCrmQ3iGCm7PM6rJ3kPo
    DOhbC+vBZ9XEuGZV2WBzPqyj+Tt83tRxZGLfVZQL6D2o4P454P07Zr5esvB7S7Ak
    q2joxDtYcOf2G5pgY1C4Uw==
    """

  Scenario: Updating Nextcloud 27.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "27.0.0.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "27.1.8.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-27.1.8rc1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    JBH/DJjXPxCx4ZQxWApUvhzlbFl0MVOpaq0UBO/xyK6rpEJCtdiojVZ0zeTDHiag
    Gop2OyHVeqMSDwDHLcXEXGZdcj3596CvvRm6hVZR/m51uz7saHnrRBspNefeRXUI
    I+eOpqUREZixADI/h781VmW46WMbW3TMaNMswq0ET4DLTOusUKEmWL3m/9v+5UoA
    IkE1SRZBzfGxQLL1jgi+Rd8xsZrm5/YxxU0DG5G1JRMUYCrmQ3iGCm7PM6rJ3kPo
    DOhbC+vBZ9XEuGZV2WBzPqyj+Tt83tRxZGLfVZQL6D2o4P454P07Zr5esvB7S7Ak
    q2joxDtYcOf2G5pgY1C4Uw==
    """

  Scenario: Updating latest Nextcloud 27.1 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "27.1.8.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "28.0.4.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-28.0.4rc1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/28/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    RalaBLqyrKSLafafgMO215LV/iuX0ghJM8oXFUnzG8bv36Z+SU9rhJo2xb5I0h/j
    J26cGqlXmG9iGenhP/vn10HEad8qrkBAfA8sUvgaRLji1HDGTkYfFYi1Vn1ZkYco
    JinQw90OC94vIyJ/9ZaG8q2pxy5dYRWLaGZmuwx1zE1Q4ZMedJj3jZZ9vxOsv315
    LClUP0IkT97su55t2Sac/2ybRWc8qy6bPB84h0RHUJAmQIzh8H5FAqFRiu1yetco
    DI7V7x/+/gCytTmOkkbrLkFv9xtLkz9ktlt67/l8l0o5O2CZcner2X+dKh2YwX65
    pRny4F333ksT8d5Ca+5a/Q==
    """

  Scenario: Updating Nextcloud 28 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "28.0.0.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "28.0.4.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-28.0.4rc1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/28/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    RalaBLqyrKSLafafgMO215LV/iuX0ghJM8oXFUnzG8bv36Z+SU9rhJo2xb5I0h/j
    J26cGqlXmG9iGenhP/vn10HEad8qrkBAfA8sUvgaRLji1HDGTkYfFYi1Vn1ZkYco
    JinQw90OC94vIyJ/9ZaG8q2pxy5dYRWLaGZmuwx1zE1Q4ZMedJj3jZZ9vxOsv315
    LClUP0IkT97su55t2Sac/2ybRWc8qy6bPB84h0RHUJAmQIzh8H5FAqFRiu1yetco
    DI7V7x/+/gCytTmOkkbrLkFv9xtLkz9ktlt67/l8l0o5O2CZcner2X+dKh2YwX65
    pRny4F333ksT8d5Ca+5a/Q==
    """

  Scenario: Updating latest Nextcloud 28 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "28.0.4.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "29.0.0.11" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-29.0.0beta4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/29/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    iv20FvBh8am3X2mkhaf6FHK8nDJm1XTOSzAnpivyNeRuG6eGWFOXSQWq23AbuD04
    rdDjd2Qfv/XNQb8DNmYUcqGM+Cz2UFXULcWEbxZXAKIfdenfUNIciyY+VLCJ8ysy
    HIaOVd+H3OneTEFAOegOVnhhfB1QHBguW6NX/7gXn1yDLccdYPIG4n2uoJbhGa2W
    87GKrEFfEOsrRmLq4OO0a175r+MDMHhYrBQXJUGWLD6JeJvHf6D8hRMNdRIz3QGy
    tlaE3/UBPS9PFfij1ZudAzljnkxkc3176hwT0pverfBJlyOgQ7P69vRjcvdCqUBk
    VBTGOlFCkWIsdw/K6LF7Qw==
    """

  Scenario: Updating Nextcloud 29 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "29.0.0.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "29.0.0.11" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-29.0.0beta4.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/29/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    iv20FvBh8am3X2mkhaf6FHK8nDJm1XTOSzAnpivyNeRuG6eGWFOXSQWq23AbuD04
    rdDjd2Qfv/XNQb8DNmYUcqGM+Cz2UFXULcWEbxZXAKIfdenfUNIciyY+VLCJ8ysy
    HIaOVd+H3OneTEFAOegOVnhhfB1QHBguW6NX/7gXn1yDLccdYPIG4n2uoJbhGa2W
    87GKrEFfEOsrRmLq4OO0a175r+MDMHhYrBQXJUGWLD6JeJvHf6D8hRMNdRIz3QGy
    tlaE3/UBPS9PFfij1ZudAzljnkxkc3176hwT0pverfBJlyOgQ7P69vRjcvdCqUBk
    VBTGOlFCkWIsdw/K6LF7Qw==
    """
