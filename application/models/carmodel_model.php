<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class carmodel_model extends CI_Model
{
    public function getAll(){
        $query=$this->db->query("SELECT `model`.*, `manufacturer`.`name` as `manufacturerName` FROM `model` LEFT OUTER JOIN `manufacturer` ON `manufacturer`.`id`=`model`.`manufacturer` WHERE `model`.`status`='1' AND `model`.`items` > 0")->result();
        return $query;
    }
    
    public function createModel($name,$manufacturer,$color,$year,$regnum,$note,$image1,$image2){
        $data=array(
            "manufacturer" => $manufacturer,
            "name" => $name,
            "color" => $color,
            "year" => $year,
            "regnum" => $regnum,
            "note" => $note,
            "image1" => $image1,
            "image2" => $image2,
            "items" => 1,
            "status" => 1
        );
        $query=$this->db->insert( "model", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    
    public function editModel($id,$name,$manufacturer,$color,$year,$regnum,$note,$image1,$image2){
        $data=array(
            "manufacturer" => $manufacturer,
            "name" => $name,
            "color" => $color,
            "year" => $year,
            "regnum" => $regnum,
            "note" => $note,
            "image1" => $image1,
            "image2" => $image2,
            "items" => 1,
            "status" => 1
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "model", $data );
        // if(!$query)
        //     return  0;
        // else
            return  $id;
    }
    
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("model")->row();
        return $query;
    }
    public function editecarmodelSubmit($id,$name){
        $data=array("name" => $name);
        $this->db->where( "id", $id );
        $query=$this->db->update( "model", $data );
        if(!$query)
            return  0;
        else
            return  $id;
    }
    
    public function getdropdown()
    {
        $query=$this->db->query("SELECT * FROM `model` ORDER BY `id` ASC")->row();
        $return=array(
            "" => "Select Option"
        );
        foreach($query as $row)
        {
            $return[$row->id]=$row->name;
        }
        return $return;
    }

    public function getcarmodelimage1byid($id)
    {
        $query=$this->db->query("SELECT `image1` FROM `model` WHERE `id`='$id'")->row();
        return $query;
    }
    public function getcarmodelimage2byid($id)
    {
        $query=$this->db->query("SELECT `image2` FROM `model` WHERE `id`='$id'")->row();
        return $query;
    }

    public function getsingle($id){

        $query=$this->db->query("SELECT `model`.*, `manufacturer`.`name` as `manufacturerName` FROM `model` LEFT OUTER JOIN `manufacturer` ON `manufacturer`.`id`=`model`.`manufacturer` WHERE `model`.`id`='$id'")->row();
        
        return $query;
    }
    public function soldcarmodel($id)
    {
        $data=array("items" => 0);
        $this->db->where( "id", $id );
        $query=$this->db->update( "model", $data );
        return 1;
    }

    public function deletecarmodel($id)
    {
        $data=array("status" => 0);
        $this->db->where( "id", $id );
        $query=$this->db->update( "model", $data );
        return 1;
    }
public function create($type,$name,$image,$timestamp,$content,$link,$logo,$hname,$hcontent)
{
$data=array("type" => $type,"name" => $name,"image" => $image,"timestamp" => $timestamp,"content" => $content,"link" => $link,"logo" => $logo,"hname" => $hname,"hcontent" => $hcontent);
$query=$this->db->insert( "jpp_news", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
function getsinglenews($id){
$this->db->where("id",$id);
$query=$this->db->get("jpp_news")->row();
return $query;
}
public function edit($id,$type,$name,$image,$timestamp,$content,$link,$logo,$hname,$hcontent)
{
if($image=="")
{
$image=$this->news_model->getimagebyid($id);
$image=$image->image;
}
    if($logo=="")
{
$logo=$this->news_model->getlogobyid($id);
$logo=$logo->logo;
}
$data=array("type" => $type,"name" => $name,"image" => $image,"timestamp" => $timestamp,"content" => $content,"link" => $link,"logo" => $logo,"hname" => $hname,"hcontent" => $hcontent);
$this->db->where( "id", $id );
$query=$this->db->update( "jpp_news", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `jpp_news` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `jpp_news` WHERE `id`='$id'")->row();
return $query;
}
    public function getlogobyid($id)
{
$query=$this->db->query("SELECT `logo` FROM `jpp_news` WHERE `id`='$id'")->row();
return $query;
}
}
?>
