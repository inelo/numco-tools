Feature: Numco cross platform test

  Scenario: Compress data in PHP and decode in NodeJS
    Given i have a JSON array to compress "[100,101,102,103,104,105,110,120,121,122]"
    And i compress it using Numco-PHP
    And i decompress using Numco-JS
    Then the resoult array is the same as array to compress

  Scenario: Compress data in NodeJS and decode in PHP
    Given i have a JSON array to compress "[100,101,102,103,104,105,110,120,121,122,199,200,300]"
    And i compress it using Numco-JS
    And i decompress using Numco-PHP
    Then the resoult array is the same as array to compress

