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

        public function testCantBeCreatedFromMonthLowerThanOne(): void
        {
            $date = "01.00";
            $this->expectException(\InvalidArgumentException::class);
            $dayMonthDate = new DayMonthDate($date);
        }

        public function testCantBeCreatedFromMonthBiggerThanTwelve(): void
        {
            $date = "05.13";
            $this->expectException(\InvalidArgumentException::class);
            $dayMonthDate = new DayMonthDate($date);
        }

        public function testCantBeCreatedFromDayBiggerThan31(): void
        {
            $date = "32.01";
            $this->expectException(\InvalidArgumentException::class);
            $dayMonthDate = new DayMonthDate($date);
            $date = "32.03";
            $this->expectException(\InvalidArgumentException::class);
            $dayMonthDate = new DayMonthDate($date);
            $date = "32.05";
            $this->expectException(\InvalidArgumentException::class);
            $dayMonthDate = new DayMonthDate($date);
            $date = "32.07";
            $this->expectException(\InvalidArgumentException::class);
            $dayMonthDate = new DayMonthDate($date);
            $date = "32.08";
            $this->expectException(\InvalidArgumentException::class);
            $dayMonthDate = new DayMonthDate($date);
            $date = "32.10";
            $this->expectException(\InvalidArgumentException::class);
            $dayMonthDate = new DayMonthDate($date);
            $date = "32.12";
            $this->expectException(\InvalidArgumentException::class);
            $dayMonthDate = new DayMonthDate($date);
        }

        public function testCantBeCreatedFromDayBiggerThan30In30DaysMonth(): void
        {
            $date = "31.04";
            $this->expectException(\InvalidArgumentException::class);
            $dayMonthDate = new DayMonthDate($date);
            $date = "31.06";
            $this->expectException(\InvalidArgumentException::class);
            $dayMonthDate = new DayMonthDate($date);
            $date = "31.09";
            $this->expectException(\InvalidArgumentException::class);
            $dayMonthDate = new DayMonthDate($date);
            $date = "31.11";
            $this->expectException(\InvalidArgumentException::class);
            $dayMonthDate = new DayMonthDate($date);
        }

        public function testCantBeCreatedFromDayBiggerThan29InFebruary(): void
        {
            $date = "30.02";
            $this->expectException(\InvalidArgumentException::class);
            $dayMonthDate = new DayMonthDate($date);
        }
    }