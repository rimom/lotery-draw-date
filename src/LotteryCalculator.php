<?php declare(strict_types=1);

/**
 * @author Rimon Costa <rimomcosta@gmail.com>
 */
class LotteryCalculator
{
    private const DRAW_DAYS = [3, 6];
    private const DRAW_TIME = 20;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @param \DateTime $date
     */
    public function __construct(\DateTime $date)
    {
        $this->date = clone $date;
    }

    /**
     * @return \DateTime
     */
    public function getNextDrawDate(): \DateTime
    {
        $actualWeekDay = $this->date->format('N');

        if (in_array($actualWeekDay, self::DRAW_DAYS)) {
            $drawTime = (clone $this->date)->setTime(self::DRAW_TIME, 0);
            if ($this->date < $drawTime) {
                return $drawTime;
            }
        }

        if ($actualWeekDay < 3 || $actualWeekDay >= 6) {
            return (clone $this->date)->modify('next wednesday')->setTime(20, 0);
        }

        return (clone $this->date)->modify('next saturday')->setTime(20, 0);
    }
}
