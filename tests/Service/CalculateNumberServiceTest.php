<?php


namespace App\Tests\Service;


use App\Service\SequenceNumberService;
use PHPUnit\Framework\TestCase;

class CalculateNumberServiceTest extends TestCase
{
    public function testMaxNumber()
    {
        $calculateNumberService = new SequenceNumberService();
        $maxNumber = $calculateNumberService->getMaxNumber(10);

        $this->assertEquals(4,$maxNumber);
    }
}