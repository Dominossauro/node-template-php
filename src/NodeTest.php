<?php

enum OutputNodeTest: string
{
    case SUCCESS = 'success';
    case ERROR = 'error';
}

class CustomNodeTest {
  public function testMethod(array $config, array $context): ?array {

    // do your logic here

    return [
      'output' => OutputNodeTest::SUCCESS->value,
      'data' => [
        'message' => 'This is a test message.'
      ]
    ];
  }
}
