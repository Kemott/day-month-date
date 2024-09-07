<?php
    use PHPUnit\Framework\TestCase;
    use DayMonthDate\DayMonthDate;

    final class DayMonthDateTest extends TestCase
    {
        public function testCanBeCreatedFromTwoDigitsDayAndMonth(): void
        {
            $date = "10.12";
            $dayMonthDate = new DayMonthDate($date);
            $this->assertSame(10, $dayMonthDate->getDay());
            $this->assertSame(12, $dayMonthDate->getMonth());
        }

        public function testCanBeCreatedFromTwoDigitsDayAndOneDigitMonth(): void
        {
            $date = "25.07";
            $dayMonthDate = new DayMonthDate($date);
            $this->assertSame(25, $dayMonthDate->getDay());
            $this->assertSame(7, $dayMonthDate->getMonth());
        }

        public function testCanBeCreatedFromOneDigitDayAndTwoDigitsMonth(): void
        {
            $date = "01.12";
            $dayMonthDate = new DayMonthDate($date);
            $this->assertSame(1, $dayMonthDate->getDay());
            $this->assertSame(12, $dayMonthDate->getMonth());
            $date = "1.12";
            $dayMonthDate = new DayMonthDate($date);
            $this->assertSame(1, $dayMonthDate->getDay());
            $this->assertSame(12, $dayMonthDate->getMonth());
        }

        public function testCanBeCreatedFromOneDigitDayAndMonth(): void
        {
            $date = "01.08";
            $dayMonthDate = new DayMonthDate($date);
            $this->assertSame(1, $dayMonthDate->getDay());
            $this->assertSame(8, $dayMonthDate->getMonth());
            $date = "1.08";
            $dayMonthDate = new DayMonthDate($date);
            $this->assertSame(1, $dayMonthDate->getDay());
            $this->assertSame(8, $dayMonthDate->getMonth());
            $date = "1.8";
            $dayMonthDate = new DayMonthDate($date);
            $this->assertSame(1, $dayMonthDate->getDay());
            $this->assertSame(8, $dayMonthDate->getMonth());
            $date = "01.8";
            $dayMonthDate = new DayMonthDate($date);
            $this->assertSame(1, $dayMonthDate->getDay());
            $this->assertSame(8, $dayMonthDate->getMonth());
        }

        public function testCantBeCreatedFromDayLowerThanOne(): void
        {
            $date = "00.08";
            $this->expectException(\InvalidArgumentException::class);
            $dayMonthDate = new DayMonthDate($date);
        }

        public function testCantBeCreatedFromNonString(): void
        {
            $date = new DateTime();
            $this->expectException(\TypeError::class);
            $dayMonthDate = new DayMonthDate($date);
        }
    }