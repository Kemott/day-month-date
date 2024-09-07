<?php
    use PHPUnit\Framework\TestCase;
    use DayMonthDate\DayMonthDate;

    final class DayMonthDateComparisionsTest extends TestCase
    {
        public function testIsLaterThanReturnsTrueIfDateIsLaterThanArg(): void
        {
            $date = "10.12";
            $laterDate = "11.12";
            $dateObj = new DayMonthDate($date);
            $laterDateObj = new DayMonthDate($laterDate);
            $this->assertTrue($laterDateObj->isLaterThan($dateObj));
        }

        public function testIsLaterThanReturnsFalseIfDateIsEarlierThanArg(): void
        {
            $date = "10.12";
            $laterDate = "11.12";
            $dateObj = new DayMonthDate($date);
            $laterDateObj = new DayMonthDate($laterDate);
            $this->assertFalse($dateObj->isLaterThan($laterDateObj));
        }
        public function testIsEarlierThanReturnsFalseIfDateIsLaterThanArg(): void
        {
            $date = "10.12";
            $laterDate = "11.12";
            $dateObj = new DayMonthDate($date);
            $laterDateObj = new DayMonthDate($laterDate);
            $this->assertFalse($laterDateObj->isEarlierThan($dateObj));
        }

        public function testIsEarlierThanReturnsTrueIfDateIsEarlierThanArg(): void
        {
            $date = "10.12";
            $laterDate = "11.12";
            $dateObj = new DayMonthDate($date);
            $laterDateObj = new DayMonthDate($laterDate);
            $this->assertTrue($dateObj->isEarlierThan($laterDateObj));
        }

        public function testSameReturnsTrueIfDatesAreTheSame(): void
        {
            $date = "10.12";
            $dateObj = new DayMonthDate($date);
            $secondDateObj = new DayMonthDate($date);
            $this->assertTrue($dateObj->same($secondDateObj));
        }

        public function testSameReturnsFalseIfDatesAreNotTheSame(): void
        {
            $date = "10.12";
            $date2 = "11.12";
            $dateObj = new DayMonthDate($date);
            $secondDateObj = new DayMonthDate($date2);
            $this->assertFalse($dateObj->same($secondDateObj));
        }
    }