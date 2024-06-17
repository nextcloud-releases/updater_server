Feature: Testing the update scenario of beta releases

  Scenario: Updating an outdated Nextcloud 16.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "16.0.0.0"
    And The received PHP version is "7.1.0"
    And the installation mtime is "11"
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

  Scenario: Updating an outdated Nextcloud 17.0.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "17.0.10.1"
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
    And The received version is "19.0.13.1"
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
    And The received version is "22.2.10.2"
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
    And The received version is "24.0.12.1"
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

  Scenario: Updating Nextcloud 26 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "26.0.0.0"
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

  Scenario: Updating latest Nextcloud 26 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "26.0.13.1"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "27.1.11.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-27.1.11rc1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    y2VBhAdlW50pxpqvBHoir4TLKuUq7/rm8jdJTnUSMn2Ceq5UDMgAvCnLBqM4ZIi0
    qtfOkJ8gQV5YgmLQeJmsM+fOQnvvFv/MeQLm4l7jh9LaxFFOEYATHLvi1cS+OHO6
    kcLkq/2knNphen3NOowoEFL1JXVeTE7poiH4IO0jXC+aiXoG0RgCUNYYceANcglv
    JR8p/dGhRl/MxyuR69Rk/r8M2iqQ6M2rI5SwT5jflwzrxMt2XVMje9Wu+1/pKH46
    c2qlqB+68bMEC6IEiHEfCFDcondlvoptIMwd3kWxFv3q4N0TqQastRFRaAG3lbHZ
    QFY6//AsBVieGOd682b6UA==
    """

  Scenario: Updating latest Nextcloud 26 on the beta channel with instance category
    Given There is a release with channel "beta"
    And The received version is "26.0.13.1"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    And the instance category is 2
    And the instance has no subscription
    When The request is sent
    Then The response is non-empty
    And Update to version "27.1.11.0" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-27.1.11rc1.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    y2VBhAdlW50pxpqvBHoir4TLKuUq7/rm8jdJTnUSMn2Ceq5UDMgAvCnLBqM4ZIi0
    qtfOkJ8gQV5YgmLQeJmsM+fOQnvvFv/MeQLm4l7jh9LaxFFOEYATHLvi1cS+OHO6
    kcLkq/2knNphen3NOowoEFL1JXVeTE7poiH4IO0jXC+aiXoG0RgCUNYYceANcglv
    JR8p/dGhRl/MxyuR69Rk/r8M2iqQ6M2rI5SwT5jflwzrxMt2XVMje9Wu+1/pKH46
    c2qlqB+68bMEC6IEiHEfCFDcondlvoptIMwd3kWxFv3q4N0TqQastRFRaAG3lbHZ
    QFY6//AsBVieGOd682b6UA==
    """

  Scenario: Updating Nextcloud 27.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "27.0.0.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "28.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-28.0.7rc2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/28/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    at2MCRqIVgt47KZMiTShHfzYW1GzYUnn2WXW0B5YRNmimTzc5urn9S+vppdR+xTk
    3JROVYvZ+h4ay3RkeH0DWZjDe7f+0+MoAnUlfnY89TlLe6MCHHSVN03Yir4mhKHO
    FH3n5PFdeqBBsDoYHHn31N+DVzSEmJJM62u6kSw82TIJ4K+WvdUOQCWb4WQwFxtk
    d/IQB6VS3s0674wYcxI68Cs64LRmIoeFfUVbfSSsrVBOlkQJJYezIvaR+dh1naAI
    IG4SB2nwoWwqRaxjQHej0KNilG4PZhuQWbA3WYdMseKuHEwYFlm3KUzu3nc4RuEc
    Djv4QXNyyaF55M5OWV2dTg==
    """

  Scenario: Updating latest Nextcloud 27.1 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "27.1.11.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "28.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-28.0.7rc2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/28/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    at2MCRqIVgt47KZMiTShHfzYW1GzYUnn2WXW0B5YRNmimTzc5urn9S+vppdR+xTk
    3JROVYvZ+h4ay3RkeH0DWZjDe7f+0+MoAnUlfnY89TlLe6MCHHSVN03Yir4mhKHO
    FH3n5PFdeqBBsDoYHHn31N+DVzSEmJJM62u6kSw82TIJ4K+WvdUOQCWb4WQwFxtk
    d/IQB6VS3s0674wYcxI68Cs64LRmIoeFfUVbfSSsrVBOlkQJJYezIvaR+dh1naAI
    IG4SB2nwoWwqRaxjQHej0KNilG4PZhuQWbA3WYdMseKuHEwYFlm3KUzu3nc4RuEc
    Djv4QXNyyaF55M5OWV2dTg==
    """

  Scenario: Updating Nextcloud 28 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "28.0.0.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "28.0.7.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-28.0.7rc2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/28/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    at2MCRqIVgt47KZMiTShHfzYW1GzYUnn2WXW0B5YRNmimTzc5urn9S+vppdR+xTk
    3JROVYvZ+h4ay3RkeH0DWZjDe7f+0+MoAnUlfnY89TlLe6MCHHSVN03Yir4mhKHO
    FH3n5PFdeqBBsDoYHHn31N+DVzSEmJJM62u6kSw82TIJ4K+WvdUOQCWb4WQwFxtk
    d/IQB6VS3s0674wYcxI68Cs64LRmIoeFfUVbfSSsrVBOlkQJJYezIvaR+dh1naAI
    IG4SB2nwoWwqRaxjQHej0KNilG4PZhuQWbA3WYdMseKuHEwYFlm3KUzu3nc4RuEc
    Djv4QXNyyaF55M5OWV2dTg==
    """

  Scenario: Updating latest Nextcloud 28 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "28.0.7.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "29.0.3.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-29.0.3rc2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/29/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    CZyFVLThOIsf6IrVzcLIpF+AnwxNYtxw0R7UhZP+lKwMv7jYBzcKBy438Z8dDic5
    ZAQuBYheM1VwZs2a0df5CsUDEcTB6J0/umNjVNwdXsKaGMytNMBZl0jRSyag3CYN
    27A4OKWvwrhEgSFBCPR9AJd07tCNBi1emqRATWbEIKoGwOZrXeeN8MkNoQUDajpZ
    0CkgyvaQfxVX1XHZrOjLmdFWIpDA2KCoRmto5KHNyG+bccIHraHKQvafzoGV2vJY
    dP0HhPRx4Eontglix+BSwlbwJfc3ao3SwPlQAjUphbrw+rFp3y03ZzfSxD4bb3Ml
    bwZLxwvB/VhCZKcYxq/xAA==
    """

  Scenario: Updating Nextcloud 29 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "29.0.0.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "29.0.3.1" is available
    And URL to download is "https://download.nextcloud.com/server/prereleases/nextcloud-29.0.3rc2.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/29/admin_manual/maintenance/upgrade.html"
    And EOL is set to "0"
    And The signature is
    """
    CZyFVLThOIsf6IrVzcLIpF+AnwxNYtxw0R7UhZP+lKwMv7jYBzcKBy438Z8dDic5
    ZAQuBYheM1VwZs2a0df5CsUDEcTB6J0/umNjVNwdXsKaGMytNMBZl0jRSyag3CYN
    27A4OKWvwrhEgSFBCPR9AJd07tCNBi1emqRATWbEIKoGwOZrXeeN8MkNoQUDajpZ
    0CkgyvaQfxVX1XHZrOjLmdFWIpDA2KCoRmto5KHNyG+bccIHraHKQvafzoGV2vJY
    dP0HhPRx4Eontglix+BSwlbwJfc3ao3SwPlQAjUphbrw+rFp3y03ZzfSxD4bb3Ml
    bwZLxwvB/VhCZKcYxq/xAA==
    """
