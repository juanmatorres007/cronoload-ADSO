<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class OperationsTest extends TestCase{

  public function test_sumar():void{
      $n1 = 1;
      $n2 = 2;

      $this->assertSame(4, $n1 + $n2);
    }
}