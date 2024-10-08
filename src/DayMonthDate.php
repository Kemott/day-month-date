<?php
    namespace DayMonthDate;

    /**
     * Main class of the package.
     * 
     * Objects of this class represent a combination of a 
     * day and a month within a year (without a specific year).
     */
    class DayMonthDate{
        private int $day = 0;
        private int $month = 0;
        
        /**
         * Class constructor.
         * 
         * The constructor allows you to create a class object based on a string in the format day.month
         * 
         * @since 1.0.0
         * @throws \InvalidArgumentException
         * @param string $date Date in one of the following formats: "dd.mm", "d.mm", "dd.m", "d.m"
         */
        public function __construct(string $date)
        {
            $exploded = explode(".", $date, 2);
            $this->day = $exploded[0];
            $this->month = $exploded[1];
            if($this->day <= 0 || $this->month <= 0)
            {
                throw new \InvalidArgumentException("Day or month value can't be lower than 1");
            }
            if($this->month > 12)
            {
                throw new \InvalidArgumentException("Month value can't be bigger than 12");
            }
            if($this->day > 29 && $this->month == 2)
            {
                throw new \InvalidArgumentException("February can't have more than 29 days");
            }
            elseif($this->day > 30 && in_array($this->month, [4,6,9,11]))
            {
                throw new \InvalidArgumentException("The given month can have a maximum of 30 days");
            }elseif($this->day > 31)
            {
                throw new \InvalidArgumentException("The given month can have a maximum of 31 days");
            }
        }

        /**
         * @since 1.0.0
         * @return int The numeric value of the day in the date
         */
        public function getDay(): int
        {
            return $this->day;
        }

        /**
         * @since 1.0.0
         * @return int The numeric value of the month in the date
         */
        public function getMonth(): int
        {
            return $this->month;
        }

        /**
         * @since 1.1.0
         * @param DayMonthDate $date The object you want to compare $this with
         * @return bool Is the date later than $this
         */
        public function isLaterThan(DayMonthDate $date): bool
        {
            if($this->month > $date->getMonth())
            {
                return true;
            }elseif($this->month < $date->getMonth())
            {
                return false;
            }else{
                return $this->day > $date->getDay();
            }
        }

        /**
         * @since 1.1.0
         * @param DayMonthDate $date The object you want to compare $this with
         * @return bool Is the date earlier than $this
         */
        public function isEarlierThan(DayMonthDate $date): bool
        {
            if($this->month < $date->getMonth())
            {
                return true;
            }elseif($this->month > $date->getMonth())
            {
                return false;
            }else{
                return $this->day < $date->getDay();
            }
        }

        /**
         * @since 1.1.0
         * @param DayMonthDate $date The object you want to compare $this with
         * @return bool Is the date the same as $this
         */
        public function same(DayMonthDate $date): bool
        {
            return $this->month == $date->getMonth() && $this->day == $date->getDay();
        }
    }