<?php

  class Employee{
    private $fullname;
    private $civil_status;
    private $position;
    private $employment_status;
    private $regular_hours;
    private $over_time;

    public function __construct($fullname, $civil_status, $position, $employment_status, $regular_hours, $over_time){
      $this->fullname           = $fullname;
      $this->civil_status       = $civil_status;
      $this->position           = $position;
      $this->employment_status  = $employment_status;
      $this->regular_hours      = $regular_hours;
      $this->over_time          = $over_time;
    }

    public function getFullName()
    {
      return $this->fullname;
    }

    public function getCivilStatus()
    {
      return $this->civil_status;
    }

    public function getPosition()
    {
      return $this->position;
    }

    public function getEmploymentStatus()
    {
      return $this->employment_status;
    }

    public function regularPay()
      {
        if($this->position == "admin" && $this->employment_status == "contractual"){
          $regular_pay = $this->regular_hours * (350 / 8);
        }elseif($this->position == "admin" && $this->employment_status == "probationary"){
          $regular_pay = $this->regular_hours * (400 / 8);
        }elseif($this->position == "admin" && $this->employment_status == "regular"){
          $regular_pay = $this->regular_hours * (500 / 8);
        }elseif($this->position == "staff" && $this->employment_status == "contractual"){  
          $regular_pay = $this->regular_hours * (300 / 8);
        }elseif($this->position == "staff" && $this->employment_status == "probationary"){
          $regular_pay = $this->regular_hours * (350 / 8);
        }elseif($this->position == "staff" && $this->employment_status == "regular"){
          $regular_pay = $this->regular_hours * (400 / 8);
        }

        return $regular_pay;
      }

      public function overtimePay()
      {
        if($this->position == "admin" && $this->employment_status == "contractual"){
          $overtime_pay = $this->over_time * 15;
        }elseif($this->position == "admin" && $this->employment_status == "probationary"){
          $overtime_pay = $this->over_time * 30;
        }elseif($this->position == "admin" && $this->employment_status == "regular"){
          $overtime_pay = $this->over_time * 40;
        }elseif($this->position == "staff" && $this->employment_status == "contractual"){  
          $overtime_pay = $this->over_time * 10;
        }elseif($this->position == "staff" && $this->employment_status == "probationary"){
          $overtime_pay = $this->over_time * 25;
        }elseif($this->position == "staff" && $this->employment_status == "regular"){
          $overtime_pay = $this->over_time * 30;
        }

        return $overtime_pay;
      }

    public function netIncome()
      {
        $gross_income = $this->regularPay() + $this->overtimePay();
        
        if($this->civil_status == "single" && $gross_income > 1000){
          $net_income = ($gross_income * 0.95) - 200;
        }elseif($this->civil_status == "single" && $gross_income <= 1000){
          $net_income = $gross_income - 200;
        }elseif($this->civil_status == "married" && $gross_income > 1500){
          $net_income = ($gross_income * 0.97) - 75;
        }elseif($this->civil_status == "married" && $gross_income <= 1500){
          $net_income = $gross_income - 75;
        }

        return $net_income;
      }
  }

?>