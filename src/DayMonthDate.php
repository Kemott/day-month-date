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
        }

        public function getDay()
        {
            return $this->day;
        }

        public function getMonth()
        {
            return $this->month;
        }
    }