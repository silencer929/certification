<?php
require_once "database.php";
class Report
{
    public string $message='';
    public float $percentage=0;
    public string $status="";
    public int $rate=0;
    public string $kefri_num='';
    public int $application_id=0;
    function __constructor(){
        
    }
}

class Certify
{
    private float $score=0;
    private float $percentage=0;
    private string $nurseryType="";
    private string $kefri_num='';
    private int    $application_id=0;
    
    function __constructor(){
        
    }
    public function set_score($score){
        $this->score=$score;
    }
    public function set_nurseryType($nurseryType){
         $this->nurseryType=$nurseryType;
    }
    public function set_kefri_num($kefri_num){
        $this->kefri_num=$kefri_num;
    }
    public function set_application_id($application_id){
        $this->application_id=$application_id;
    }
    public function evaluate(){
        $this->rate_nursery();
        if($this->nurseryType=="private" || "public"){
            if($this->percentage>=60){
                $newReport= new Report();
                 $newReport->status="certified";
                $newReport->rate=$this->rate_nursery();
                $newReport->percentage= $this->percentage;
                $newReport->message=" the nursery qualifies for a certifiacte";
                $newReport->application_id=$this->application_id;
                $newReport->kefri_num=$this->kefri_num;
                 return $newReport;
            }
            else {
                $newReport= new Report();
                $newReport->status="rejected";
                $newReport->rate=$this->rate_nursery();
                $newReport->percentage= $this->percentage;
                $newReport->message=" the nursery failed the test";
                $newReport->application_id=$this->application_id;
                $newReport->kefri_num=$this->kefri_num;
                return $newReport;
            }
        }
        if($this->nurseryType==="commercial"){
            if($this->percentage()>=80){
                $newReport= new Report();
                $newReport->status="certified";
                $newReport->rate=$this->rate_nursery();
                $newReport->percentage= $this->percentage;
                $newReport->message=" the nursery qualifies for a certifiacte";
                $newReport->application_id=$this->application_id;
                $newReport->kefri_num=$this->kefri_num;
                 return $newReport;
            }
            else{
                $newReport= new Report();
                $newReport->status="rejected";
                $newReport->rate=$this->rate_nursery();
                $newReport->percentage= $this->percentage;
                $newReport->message=" the nursery failed the test";
                $newReport->application_id=$this->application_id;
                $newReport->kefri_num=$this->kefri_num;
                 return $newReport;
            }
        }
    }
    public function rate_nursery(){
        $percentage= ($this->score/100)*100;
        $this->percentage=$percentage;
        $rate;
        $image='';
        if($percentage>=90){
            return $rate=5;
        }
        if($percentage>=80){
             return $rate=4;
        }
        if($percentage>=70){
            return $rate=3;
        }
        if($percentage>=60){
            return $rate=2;
        }
        if($percentage<=50){
           return $rate=1;
    }
 }
  public function  insert_into_database($db,Report $report){
        $conn=$db;
        $arr=[
            "score"=>$report->percentage,
            "rate"=>$report->rate,
            "message"=>$report->message,
            "application_id"=>$report->application_id,
            "kefri_num"=>$report->kefri_num
            
        ];
        $query= "INSERT INTO inspection(score,rate,message,app_id,kefri_num) values(:score, :rate,:message,:application_id,:kefri_num)";
        $query2="UPDATE applications SET applications.status='$report->status' where applications.application_id='$report->application_id'";
        $conn->execQuery($query,$arr);
        $conn->execQuery($query2,[]);
    }
}
?>