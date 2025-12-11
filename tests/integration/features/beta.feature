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

  Scenario: Updating latest Nextcloud 26 on the beta channel with instance category
    Given There is a release with channel "beta"
    And The received version is "26.0.13.1"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    And the instance category is 2
    And the instance has no subscription
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

  Scenario: Updating Nextcloud 27.0 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "27.0.0.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
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

  Scenario: Updating latest Nextcloud 27.1 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "27.1.11.3"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "28.0.14.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-28.0.14.zip"
    And Download URLS contain "https://download.nextcloud.com/server/releases/nextcloud-28.0.14.zip"
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

  Scenario: Updating Nextcloud 28 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "28.0.0.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "28.0.14.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-28.0.14.zip"
    And Download URLS contain "https://download.nextcloud.com/server/releases/nextcloud-28.0.14.zip"
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

  Scenario: Updating latest Nextcloud 28 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "28.0.14.1"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "29.0.16.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-29.0.16.zip"
    And Download URLS contain "https://download.nextcloud.com/server/releases/nextcloud-29.0.16.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/29/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    rouEEVNhNDWtZcK4LRDcYCZWS8zkSEWcjgJcbJOGnIHtH2GX4cxLR17gYpetSzfG
    GF2Dgv01dUXQw8FHI0ygaEOWYO+xz75WN5tuW3MsZ70u0xZF7bHejkv0YHHwyMjg
    6nei9Xn2FUTwmCpse6Lt6F5NUZD3Eq1ODrE3U1FKU6PB67tE7Q8kj13r7oJQ+SKw
    SO1Tn/u52YMmiGyzdmFK9zSRwa7BqkpgHVpVK+wjCkI/jk0ohUr8gcfS755BbflE
    Da0OcyJLoyz0qWyzsFAhSD7Y/Kbr8Y59wi77Z3jUUpV9IeHFmQy9OsqjyrRtIHtj
    yHoib4f8qGhnvNCT5Q/wOA==
    """

  Scenario: Updating Nextcloud 29 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "29.0.0.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "29.0.16.1" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-29.0.16.zip"
    And Download URLS contain "https://download.nextcloud.com/server/releases/nextcloud-29.0.16.zip"
    And URL to documentation is "https://docs.nextcloud.com/server/29/admin_manual/maintenance/upgrade.html"
    And EOL is set to "1"
    And The signature is
    """
    rouEEVNhNDWtZcK4LRDcYCZWS8zkSEWcjgJcbJOGnIHtH2GX4cxLR17gYpetSzfG
    GF2Dgv01dUXQw8FHI0ygaEOWYO+xz75WN5tuW3MsZ70u0xZF7bHejkv0YHHwyMjg
    6nei9Xn2FUTwmCpse6Lt6F5NUZD3Eq1ODrE3U1FKU6PB67tE7Q8kj13r7oJQ+SKw
    SO1Tn/u52YMmiGyzdmFK9zSRwa7BqkpgHVpVK+wjCkI/jk0ohUr8gcfS755BbflE
    Da0OcyJLoyz0qWyzsFAhSD7Y/Kbr8Y59wi77Z3jUUpV9IeHFmQy9OsqjyrRtIHtj
    yHoib4f8qGhnvNCT5Q/wOA==
    """

  Scenario: Updating latest Nextcloud 29 to 30 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "29.0.16.1"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "30.0.17.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-30.0.17.zip"
    And Download URLS contain "https://download.nextcloud.com/server/releases/nextcloud-30.0.17.zip"
    And Download URLS contain "https://download.nextcloud.com/server/releases/nextcloud-30.0.17.tar.bz2"
    And Download URLS contain "https://github.com/nextcloud-releases/server/releases/download/v30.0.17/nextcloud-30.0.17.zip"
    And Download URLS contain "https://github.com/nextcloud-releases/server/releases/download/v30.0.17/nextcloud-30.0.17.tar.bz2"
    And URL to documentation is "https://docs.nextcloud.com/server/30/admin_manual/maintenance/upgrade.html"
    And EOL date is "2025-09-14"
    And The signature is
    """
    bKCHRPqnAOGlv1coBuKMbG2ndH+VoO4R6Gk7LXcRk9oLJ/LhewbMQtPsyVuc2dNe
    WFTBxxm1jNwXuKPiKLfX1J8ZVbAPA1hIPom3WSt5kpBO+xS+hZGS2I+IDh3tmVwb
    UyuloprC0iWBrQSPqNj0Ov6BK9iN+wiB+Wh1UIL7ln619CtJx3pj49QSFL0kMq4K
    Xb/jm2i0Yqwh+XUJyG4Rz2UCkxeCgj6V3szC1fMNzZK1C1u/X+jA1j/OgyLxtmz9
    8Ub1U8v3WDOeDwyzG+DjjXvu4hrm8zZyu6+11ytlQG9YPfiZ0momiAQBHo9OVlBs
    dP5deAwX1CeMH4+yk2kfng==
    """

  Scenario: Updating Nextcloud 30 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "30.0.0.1"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "30.0.17.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-30.0.17.zip"
    And Download URLS contain "https://download.nextcloud.com/server/releases/nextcloud-30.0.17.zip"
    And Download URLS contain "https://download.nextcloud.com/server/releases/nextcloud-30.0.17.tar.bz2"
    And Download URLS contain "https://github.com/nextcloud-releases/server/releases/download/v30.0.17/nextcloud-30.0.17.zip"
    And Download URLS contain "https://github.com/nextcloud-releases/server/releases/download/v30.0.17/nextcloud-30.0.17.tar.bz2"
    And URL to documentation is "https://docs.nextcloud.com/server/30/admin_manual/maintenance/upgrade.html"
    And EOL date is "2025-09-14"
    And The signature is
    """
    bKCHRPqnAOGlv1coBuKMbG2ndH+VoO4R6Gk7LXcRk9oLJ/LhewbMQtPsyVuc2dNe
    WFTBxxm1jNwXuKPiKLfX1J8ZVbAPA1hIPom3WSt5kpBO+xS+hZGS2I+IDh3tmVwb
    UyuloprC0iWBrQSPqNj0Ov6BK9iN+wiB+Wh1UIL7ln619CtJx3pj49QSFL0kMq4K
    Xb/jm2i0Yqwh+XUJyG4Rz2UCkxeCgj6V3szC1fMNzZK1C1u/X+jA1j/OgyLxtmz9
    8Ub1U8v3WDOeDwyzG+DjjXvu4hrm8zZyu6+11ytlQG9YPfiZ0momiAQBHo9OVlBs
    dP5deAwX1CeMH4+yk2kfng==
    """

  Scenario: Updating Nextcloud latest 30 to 31 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "30.0.17.2"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "31.0.12.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-31.0.12.zip"
    And Download URLS contain "https://download.nextcloud.com/server/releases/nextcloud-31.0.12.zip"
    And Download URLS contain "https://download.nextcloud.com/server/releases/nextcloud-31.0.12.tar.bz2"
    And Download URLS contain "https://github.com/nextcloud-releases/server/releases/download/v31.0.12/nextcloud-31.0.12.zip"
    And Download URLS contain "https://github.com/nextcloud-releases/server/releases/download/v31.0.12/nextcloud-31.0.12.tar.bz2"
    And URL to documentation is "https://docs.nextcloud.com/server/31/admin_manual/maintenance/upgrade.html"
    And EOL date is "2026-02-25"
    And The signature is
    """
    m1btp6M0rY0SbPX+55PqRhnWyY5kEyy2Kf8Y5rCysJ+TjCMNUfcIwTwy7m6qw23z
    YQjJcuSfWA09ZkSfqfrOOF+ksJVGlmKtp3WGUX+N5db15yYSf4uXrsnXT0cu9vUW
    0HTHHUWWAVP7plmGlJKUAcMcaQXJEVzBX+l6zY3aWFQa81sY/m9deXOhkyJrkZzy
    EhlTo3qYXRbNpGm+maBpY9G3IIJCKpkG1rtlYHCw2aLomofYSwTEpMzc45ZvvgcQ
    mC8yMN/lFsxdMRucTLOE+vkfyjkzVxOM04BXQVDjMdi/e2AvGEDCyhdkrgks+1Kv
    dmpirBelKrbRFHO+Fe1yrg==
    """

  Scenario: Updating Nextcloud 31 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "31.0.0.18"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "31.0.12.3" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-31.0.12.zip"
    And Download URLS contain "https://download.nextcloud.com/server/releases/nextcloud-31.0.12.zip"
    And Download URLS contain "https://download.nextcloud.com/server/releases/nextcloud-31.0.12.tar.bz2"
    And Download URLS contain "https://github.com/nextcloud-releases/server/releases/download/v31.0.12/nextcloud-31.0.12.zip"
    And Download URLS contain "https://github.com/nextcloud-releases/server/releases/download/v31.0.12/nextcloud-31.0.12.tar.bz2"
    And URL to documentation is "https://docs.nextcloud.com/server/31/admin_manual/maintenance/upgrade.html"
    And EOL date is "2026-02-25"
    And The signature is
    """
    m1btp6M0rY0SbPX+55PqRhnWyY5kEyy2Kf8Y5rCysJ+TjCMNUfcIwTwy7m6qw23z
    YQjJcuSfWA09ZkSfqfrOOF+ksJVGlmKtp3WGUX+N5db15yYSf4uXrsnXT0cu9vUW
    0HTHHUWWAVP7plmGlJKUAcMcaQXJEVzBX+l6zY3aWFQa81sY/m9deXOhkyJrkZzy
    EhlTo3qYXRbNpGm+maBpY9G3IIJCKpkG1rtlYHCw2aLomofYSwTEpMzc45ZvvgcQ
    mC8yMN/lFsxdMRucTLOE+vkfyjkzVxOM04BXQVDjMdi/e2AvGEDCyhdkrgks+1Kv
    dmpirBelKrbRFHO+Fe1yrg==
    """

  Scenario: Updating Nextcloud latest 31 to 32 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "31.0.12.3"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "32.0.3.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-32.0.3.zip"
    And Download URLS contain "https://download.nextcloud.com/server/releases/nextcloud-32.0.3.zip"
    And Download URLS contain "https://download.nextcloud.com/server/releases/nextcloud-32.0.3.tar.bz2"
    And Download URLS contain "https://github.com/nextcloud-releases/server/releases/download/v32.0.3/nextcloud-32.0.3.zip"
    And Download URLS contain "https://github.com/nextcloud-releases/server/releases/download/v32.0.3/nextcloud-32.0.3.tar.bz2"
    And URL to documentation is "https://docs.nextcloud.com/server/32/admin_manual/maintenance/upgrade.html"
    And EOL is "0"
    And The signature is
    """
    uXHHzKxpeOeBu2SmN5iMnDrCMlsjse+ZrWf6Gndwcog9u0d6gxX1hd5vpxObt9lK
    JMrLzzi0HFGfWXltOAz4+c0GymhPKn1yf1ZlzMDBzyk+aSWQzb6HQP5y+qaJ8IjJ
    5iIjGVx9/JmtIYH9XEOLGrQ2XdhF3mUp1CnC/j9XyA3Q386EK9RVZFIwId+gWYen
    K/86xGPLc7P7/BQkOJhj72wevG9HoMssPfFnvkQYFYmX1AuwQu4eCafEUeYj6p+W
    OStU0ouyR0JcDFN1EGxW8N2qKnBKYRQaw7LbhV8KrCjXYMsP//mrm65XmuJVPrRr
    /ufSNo7WR7pO3H/QOHn2bQ==
    """

  Scenario: Updating Nextcloud 32 on the beta channel
    Given There is a release with channel "beta"
    And The received version is "32.0.0.0"
    And The received PHP version is "8.1.0"
    And the installation mtime is "11"
    When The request is sent
    Then The response is non-empty
    And Update to version "32.0.3.2" is available
    And URL to download is "https://download.nextcloud.com/server/releases/nextcloud-32.0.3.zip"
    And Download URLS contain "https://download.nextcloud.com/server/releases/nextcloud-32.0.3.zip"
    And Download URLS contain "https://download.nextcloud.com/server/releases/nextcloud-32.0.3.tar.bz2"
    And Download URLS contain "https://github.com/nextcloud-releases/server/releases/download/v32.0.3/nextcloud-32.0.3.zip"
    And Download URLS contain "https://github.com/nextcloud-releases/server/releases/download/v32.0.3/nextcloud-32.0.3.tar.bz2"
    And URL to documentation is "https://docs.nextcloud.com/server/32/admin_manual/maintenance/upgrade.html"
    And EOL is "0"
    And The signature is
    """
    uXHHzKxpeOeBu2SmN5iMnDrCMlsjse+ZrWf6Gndwcog9u0d6gxX1hd5vpxObt9lK
    JMrLzzi0HFGfWXltOAz4+c0GymhPKn1yf1ZlzMDBzyk+aSWQzb6HQP5y+qaJ8IjJ
    5iIjGVx9/JmtIYH9XEOLGrQ2XdhF3mUp1CnC/j9XyA3Q386EK9RVZFIwId+gWYen
    K/86xGPLc7P7/BQkOJhj72wevG9HoMssPfFnvkQYFYmX1AuwQu4eCafEUeYj6p+W
    OStU0ouyR0JcDFN1EGxW8N2qKnBKYRQaw7LbhV8KrCjXYMsP//mrm65XmuJVPrRr
    /ufSNo7WR7pO3H/QOHn2bQ==
    """
