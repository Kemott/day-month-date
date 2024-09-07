<?php
    namespace DayMonthDate;

    class DayMonthDate{
        private int $day = 0;
        private int $month = 0;
        
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

        public function getDay(): int
        {
            return $this->day;
        }

        public function getMonth(): int
        {
            return $this->month;
        }

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

        public function same(DayMonthDate $date): bool
        {
            return $this->month == $date->getMonth() && $this->day == $date->getDay();
        }
    }