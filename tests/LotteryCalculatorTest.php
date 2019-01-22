<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @autor Rimon Costa <rimomcosta@gmail.com>
 */
class LotteryCalculatorTest extends TestCase
{
    /**
     * @return array
     */
    public function getSampleDate(): array
    {
        return [
            'first test'=> [
                new \DateTime('2019-01-09 00:00:00'),
                new \DateTime('2019-01-09 20:00:00'),
            ],
            'second test'=> [
                new \DateTime('2019-01-09 19:59:59'),
                new \DateTime('2019-01-09 20:00:00'),
            ],
            'third test'=> [
                new \DateTime('2019-01-09 20:00:00'),
                new \DateTime('2019-01-12 20:00:00'),
            ],
            'fourth test'=> [
                new \DateTime('2019-01-12 19:59:59'),
                new \DateTime('2019-01-12 20:00:00'),
            ],
        ];
    }

    /**
     * @dataProvider getSampleDate
     *
     * @param \DateTime $dateToCheck
     * @param \DateTime $expectedDrawDate
     */
    public function testGetNextDrawDate(\DateTime $dateToCheck, \DateTime $expectedDrawDate)
    {
        $lotteryCalculator = new LotteryCalculator($dateToCheck);
        $nextDate = $lotteryCalculator->getNextDrawDate();

        $this->assertEquals($expectedDrawDate, $nextDate);
    }
}
