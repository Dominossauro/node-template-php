<?php

enum OutputNodeTest: string
{
    case SUCCESS = 'success';
    case ERROR = 'error';
}

class CustomNodeTest {
  public function testMethod(array $config, array $context): ?array {

    // do your logic here
    // use $config['input1'] to get the input value
    $input1 = $config['input1'] ?? null;

    // $context have a array with useful information and services
    // you can use it to access database, logger, etc.


    return [
      'output' => OutputNodeTest::ERROR->value,
      'data' => [
        'message' => 'This is an error message.' . $input1
      ]
    ];
  }
}
