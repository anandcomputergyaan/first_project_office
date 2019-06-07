<?php 

defined('BASEPATH') OR exit('NO direct script access allowed');

class Cat extends CI_Model{

	public function save($data)
	{
	 
		 if($this->db->insert('category',$data))
		 {
		 	return true;
		 }
		 else{
		 	return false;
		 }
	}

   public function getdata(){

   	$table = $this->db->get('category');
   	 return $table->result_array();
    
   }


   public function delete_row($id){
   	if($this->db->delete('category', array('id' => $id,))){
   		return true;

   	}
   	else{
   		return false;
   	}

   }

   public function get_by_id($id){
   	$row=$this->db->get_where('category',array('id'=> $id,));
      $row= $row->result_array();
      return($row[0]);    

   }

   public function update_category($data,$id){
   
            $this->db->where('id', $id);
         if($this->db->update('category', $data)){
            return true;
         }
         else{
            return false;
         }
   }



   public function all_parent(){   

      $this->db->select('id,name,alias');
      $info =$this->db->get('category');
      return $info->result_array();

   }
         public function parent_id($cat){   

      $this->db->select('id')->where('alias',$cat);
      $info =$this->db->get('category');
      return $info->result_array();

   }





}