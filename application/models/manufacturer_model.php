<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class manufacturer_model extends CI_Model
{
    public function getAll(){
        $query=$this->db->query("SELECT * FROM `manufacturer` WHERE `status`='1'")->result();
        return $query;
    }
    
    public function createManufacturer($name){
        $query=$this->db->query("INSERT INTO `manufacturer` (`name`, `status`) VALUES ('$name', '1')");
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("manufacturer")->row();
        return $query;
    }
    public function editeManufacturerSubmit($id,$name){
        $data=array("name" => $name);
        $this->db->where( "id", $id );
        $query=$this->db->update( "manufacturer", $data );
        if(!$query)
            return  0;
        else
            return  $id;
    }
      
    public function getdropdown()
    {
        $query=$this->db->query("SELECT * FROM `manufacturer` ORDER BY `id` ASC")->result();
        // print_r($query);
        $return=array(
        );
        foreach($query as $row)
        {
            $return[$row->id]=$row->name;
        }
        return $return;
    }
    
    public function deletemanufacturer($id)
    {
        $data=array("status" => 0);
        $this->db->where( "id", $id );
        $query=$this->db->update( "manufacturer", $data );
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
