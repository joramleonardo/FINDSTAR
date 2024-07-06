<?php
class Main_model extends CI_Model {

      // FOR MATERIAL
      var $table = "tbl_material";  
      var $select_column = array("material_id", "material_title", "material_description", "material_category", "material_source", "material_uploader", "material_division", "material_fileName", "material_fileType", "file", "date_created");  
      var $order_column  = array(null,          "material_title", "material_description", "material_category", "material_source", "material_uploader", "material_division", "material_fileName", "material_fileType", null, null, "date_created");  

      var $tbl_published = "tbl_to_publish";  
      var $select_column_published = array("publish_id", "publish_title", "publish_description", "publish_source", "publish_uploader", "publish_division", "publish_fileName", "publish_fileType", "file", "date_created");  
      var $order_column_published  = array(null,          "publish_title", "publish_description", "publish_source", "publish_uploader", "publish_division", "publish_fileName", "publish_fileType", null, null, "date_created");  

      // FOR USER
      var $table_user = "tbl_users";  
      var $select_column_user = array("id_user", "user_firstName", "user_lastName", "user_fullName", "user_position", "user_sex", "user_email", "user_username", "user_password", "user_confirmPassword", "user_division", "user_role", "date_created");  
      var $order_column_user = array(null, "user_firstName", "user_lastName", "user_fullName", "user_position", "user_sex", "user_email", "user_username", "user_password", "user_confirmPassword", "user_division", "user_role", "date_created");  


      function make_query(){  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->group_start();
                $this->db->like("material_title", $_POST["search"]["value"]);  
                $this->db->or_like("material_description", $_POST["search"]["value"]); 
                $this->db->or_like("material_category", $_POST["search"]["value"]); 
                $this->db->or_like("material_source", $_POST["search"]["value"]);  
                $this->db->or_like("material_uploader", $_POST["search"]["value"]);  
                $this->db->or_like("material_division", $_POST["search"]["value"]); 
                $this->db->or_like("material_fileType", $_POST["search"]["value"]);  
                $this->db->group_end(); 
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('material_id', 'DESC');  
           }  
      } 

      function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_material(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      } 

      function get_all_material(){  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }  



      
      function make_division_query(){  
          $this->db->select('*');
          $this->db->from('tbl_material');
          $this->db->where('material_division', $_SESSION['division']);
          $this->db->order_by('date_created', "DESC");
      } 

      function make_division_datatables(){  
           $this->make_division_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_all_division_material(){  
           $this->db->select("*");  
           $this->db->from('tbl_material');  
          $this->db->where('material_division', $_SESSION['division']);
           return $this->db->count_all_results();  
      }  

      function get_filtered_division_material(){  
           $this->make_division_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }




      function make_division_query_publish(){  
            $this->db->select('*');  
            $this->db->from('tbl_to_publish');  

            $this->db->where('publish_division', $_SESSION['division']); 
            $this->db->order_by('date_created', "DESC");

            if(isset($_POST["search"]["value"]))  
            {  
                $this->db->group_start();
                $this->db->like("publish_title", $_POST["search"]["value"]);  
                $this->db->or_like("publish_description", $_POST["search"]["value"]); 
                $this->db->or_like("publish_source", $_POST["search"]["value"]);  
                $this->db->or_like("publish_uploader", $_POST["search"]["value"]);  
                $this->db->or_like("publish_division", $_POST["search"]["value"]); 
                $this->db->or_like("publish_fileType", $_POST["search"]["value"]); 
                $this->db->group_end(); 
            }  

            if(isset($_POST["order"]))  
            {  
                $this->db->order_by($this->order_column_published[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
            }  
            else  
            {  
                $this->db->order_by('publish_id', 'DESC');  
            }  
      } 

      function make_division_datatables_publish(){  
           $this->make_division_query_publish();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_division_filtered_material_publish(){  
           $this->make_division_query_publish();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }

      function get_all_division_material_publish(){  
            $this->db->select("*");  
            $this->db->from('tbl_to_publish');  
            $this->db->where('publish_division', $_SESSION['division']); 
            return $this->db->count_all_results();  
      }




      function make_own_query(){  
          $this->db->select('*');
          $this->db->from('tbl_to_publish');
          $this->db->where('publish_uploader', $_SESSION['uploader']); 
      } 

      function make_own_datatables(){  
           $this->make_own_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_all_own_material()  
      {  
          $this->db->select("*");  
          $this->db->from('tbl_to_publish');  
          $this->db->where('publish_uploader', $_SESSION['uploader']);
          return $this->db->count_all_results();  
      }  

      function get_filtered_own_material(){  
           $this->make_own_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }




      // function make_query_publish(){  
      //      $this->db->select('*');  
      //      $this->db->from('tbl_to_publish');  
      //      if(isset($_POST["search"]["value"]))  
      //      {  
      //           $this->db->like("publish_title", $_POST["search"]["value"]);  
      //           $this->db->or_like("publish_description", $_POST["search"]["value"]); 
      //           $this->db->or_like("publish_source", $_POST["search"]["value"]);  
      //           $this->db->or_like("publish_uploader", $_POST["search"]["value"]);  
      //           $this->db->or_like("publish_division", $_POST["search"]["value"]); 
      //           $this->db->or_like("publish_fileType", $_POST["search"]["value"]); 
      //      }  
      //      if(isset($_POST["order"]))  
      //      {  
      //           $this->db->order_by($this->order_column_published[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
      //      }  
      //      else  
      //      {  
      //           $this->db->order_by('publish_id', 'DESC');  
      //      }  
      // } 

      // function make_datatables_publish(){  
      //      $this->make_query_publish();  
      //      if($_POST["length"] != -1)  
      //      {  
      //           $this->db->limit($_POST['length'], $_POST['start']);  
      //      }  
      //      $query = $this->db->get();  
      //      return $query->result();  
      // }

      // function get_filtered_material_publish(){  
      //      $this->make_query_publish();  
      //      $query = $this->db->get();  
      //      return $query->num_rows();  
      // }

      // function get_all_material_publish()  
      // {  
      //      $this->db->select("*");  
      //      $this->db->from('tbl_to_publish');  
      //      return $this->db->count_all_results();  
      // }




     function make_query_user(){  
            $this->db->select($this->select_column_user);  
            $this->db->from($this->table_user); 
            $this->db->where('user_division', $_SESSION['division']);  
            $this->db->order_by('date_created', "DESC");
           // if(isset($_POST["search"]["value"]))  
           // {  
           //      $this->db->like("user_fullName", $_POST["search"]["value"]);  
           //      $this->db->or_like("user_position", $_POST["search"]["value"]);
           //      $this->db->or_like("user_email", $_POST["search"]["value"]);  
           //      $this->db->or_like("user_username", $_POST["search"]["value"]); 
           // }  
           // if(isset($_POST["order"]))  
           // {  
           //      $this->db->order_by($this->order_column_user[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           // }  
           // else  
           // {  
           //      $this->db->order_by('id_user', 'DESC');  
           // }   
      } 

      function make_datatables_user(){  
           $this->make_query_user();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      } 

      function get_filtered_user(){  
           $this->make_query_user();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }

      function get_all_user(){  
           $this->db->select("*");  
           $this->db->from($this->table_user);  
          $this->db->where('user_division', $_SESSION['division']); 
           return $this->db->count_all_results();  
      } 




      // function getMaterials(){
      //   $query = $this->db->get('tbl_material');
      //   if($query->num_rows() > 0){
      //       return $query->result();
      //   }
      // }

      // function getUsers(){
      //   $query = $this->db->get('tbl_users');
      //   if($query->num_rows() > 0){
      //       return $query->result();
      //   }
      // }

      function insert_material($data)  
          {  
              $this->db->insert('tbl_to_publish', $data);  
          }  

      // function insert_to_publish_material($data)  
      // {  
      //     $this->db->insert('tbl_published', $data);  
      // }  

      // function publish_material($data)  
      // {  
      //     $this->db->insert('tbl_material', $data);  
      // }  

      function fetch_single_material($user_id)  
      {  
           $this->db->where("material_id", $user_id);  
           $query=$this->db->get('tbl_material');  
           return $query->result();  
      }    

      // function fetch_single_publish_material($user_id)  
      // {  
      //      $this->db->where("publish_id", $user_id);  
      //      $query=$this->db->get('tbl_to_publish');  
      //      return $query->result();  
      // } 

      function fetch_to_publish_material($user_id)  
      {  
           $this->db->where("publish_id", $user_id);  
           $query=$this->db->get('tbl_to_publish');  
           return $query->result();  
      } 

      function fetch_single_user($user_id)  
      {  
           $this->db->where("id_user", $user_id);  
           $query=$this->db->get('tbl_users');  
           return $query->result();  
      }

      function update_material($user_id, $data)  
      {  
           $this->db->where("material_id", $user_id);  
           $this->db->update("tbl_material", $data);  
      }  

      function update_to_publish_material($user_id, $data)  
      {  
           $this->db->where("publish_id", $user_id);  
           $this->db->update("tbl_to_publish", $data);  
      } 

      function update_user($user_id, $data)  
      {  
           $this->db->where("id_user", $user_id);  
           $this->db->update("tbl_users", $data);  
      } 

      // function delete_to_publish_material($user_id)  
      // {  
      //      $this->db->where("published_id", $user_id);  
      //      $this->db->delete("tbl_to_publish");   
      // } 

      function delete_single_material($user_id)  
      {  
           $this->db->where("material_id", $user_id);  
           $this->db->delete("tbl_material");   
      } 

      function delete_single_publish_material($user_id)  
      {  
           $this->db->where("publish_id", $user_id);  
           $this->db->delete("tbl_to_publish");   
      } 

      function delete_single_user($user_id)  
      {  
           $this->db->where("id_user", $user_id);  
           $this->db->delete("tbl_users");  
      } 



      function fetch_publish_material($user_id){
          $this->db->select('*');
          $this->db->from('tbl_to_publish');
          $this->db->where('publish_id', $user_id);

          $query = $this->db->get();  
          return $query->result();  
      }

      function insert_publish_material($data){
            $this->db->insert('tbl_material', $data); 
      }

      function delete_publish_material($user_id){
            $this->db->where("publish_id", $user_id);  
            $this->db->delete("tbl_to_publish"); 
      }



      function fetch_unpublish_material($user_id){
          $this->db->select('*');
          $this->db->from('tbl_material');
          $this->db->where('material_id', $user_id);

          $query = $this->db->get();  
          return $query->result();  
      }

      function insert_unpublish_material($data){
            $this->db->insert('tbl_to_publish', $data); 
      }

      function delete_unpublish_material($user_id){
            $this->db->where("material_id", $user_id);  
            $this->db->delete("tbl_material"); 
      }



      function insert_user($data)  
      {  
           $this->db->insert('tbl_users', $data);  
      } 
      function insert_try($data)  
      {  
           $this->db->insert('tbl_try', $data);  
      }

      // function get_user_totalMaterial($user_id){
      //     $this->db->select('COUNT(*)');
      //     $this->db->from('tbl_material');
      //     $this->db->where('material_uploader', $user_id);
      //     $query = $this->db->get();
      // }

      // function search($terms){
      //   // Execute our SQL statement and return the result
      //   $sql = "SELECT material_title, material_description, material_keywords, material_source, material_uploader, material_division, material_fileName
      //           FROM tbl_material
      //           WHERE MATCH (material_description) AGAINST (?) > 0";

      //   $query = $this->db->query($sql, array($terms, $terms));
      //   return $query->result();
      // }

      function insert_activity($data){

          $this->db->insert('tbl_logs', $data);
      }





      function get_search($search_val){
          $query = $this->db->query("SELECT * 
                                      FROM tbl_material 
                                      WHERE material_category LIKE '%{$search_val}%'
                                      OR material_title LIKE '%{$search_val}%' 
                                      OR material_description LIKE '%{$search_val}%' 
                                      ");
          return $query->result();
      }

      function get_search_advance($search_val, $search_categ){
          $query = $this->db->query("SELECT * 
                                      FROM tbl_material 
                                      WHERE material_title LIKE '%{$search_val}%'
                                      AND material_category LIKE '%{$search_categ}%' 
                                      
                                      ");
          return $query->result();
      }

      function get_search_advance_year($search_val, $search_categ){
          $query = $this->db->query("SELECT * 
                                      FROM tbl_material 
                                      WHERE material_title LIKE '%{$search_val}%'
                                      AND material_category LIKE '%{$search_categ}%' 
                                      
                                      ");
          return $query->result();
      }

      function get_search_advance_categ($search_val, $search_categ){
          $query = $this->db->query("SELECT * 
                                      FROM tbl_material 
                                      WHERE material_title LIKE '%{$search_val}%'
                                      AND material_category LIKE '%{$search_categ}%' 
                                      
                                      ");
          return $query->result();
      }

      function get_search_advance_keyword($search_val, $search_categ){
          $query = $this->db->query("SELECT * 
                                      FROM tbl_material 
                                      WHERE material_title LIKE '%{$search_val}%'
                                      AND material_category LIKE '%{$search_categ}%' 
                                      
                                      ");
          return $query->result();
      }









      function fetch_single_search($user_id){
        $this->db->select('*');
        $this->db->from('tbl_material');
        $this->db->where('material_id', $user_id);
        $query = $this->db->get();
        return $query->result();
      }

      function can_login($user_username, $user_password){
          $this->db->select('*');
          $this->db->from('tbl_users');
          $this->db->where('user_username', $user_username);
          $this->db->where('user_password', $user_password);
          $query = $this->db->get();

          if ($query->num_rows() >0) {
            $result = $query->row();
            $role = $result->user_role;
            $uploader = $result->user_firstName.' '.$result->user_lastName;

            $_SESSION['uploader']         = $uploader;
            $_SESSION['division']         = $result->user_division;
            $_SESSION['role']             = $role;
            $_SESSION['id_user']          =  "$result->id_user";
            $_SESSION['first_name']       =  "$result->user_firstName";
            $_SESSION['last_name']        =  "$result->user_lastName";
            $_SESSION['position']         =  "$result->user_position";
            $_SESSION['email']            =  "$result->user_email";
            $_SESSION['username']         =  "$result->user_username";
            $_SESSION['password']         =  "$result->user_password";
            $_SESSION['confirm_password'] =  "$result->user_confirmPassword";
            
            if ($role == "Admin") {
              return "Admin";
            }
            else if ($role == "Encoder") {
              return "Encoder";
            }
            else if ($role == "Super Admin") {
              return "Super Admin";
            }
          }
          else{
            return false;
          }
      }

      function can_add_user($user_username){
          $this->db->select('*');
          $this->db->from('tbl_users');
          $this->db->where('user_username', $user_username);
          $query = $this->db->get();

          if ($query->num_rows() >0){
            return true; //Username already taken
          }
          else{
            return false; //Username not taken
          }
      }

      function check_rate_record($user_email, $material_id){
        $this->db->select('*');
        $this->db->from('tbl_rating');
        $this->db->where('user_email', $user_email);
        $this->db->where('material_id', $material_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0){
          return true;
        }
        else{
          return false;
        }
      }

      function insert_rate($data){  
           $this->db->insert('tbl_rating', $data);  
      } 

      function update_rate($user_email, $material_id, $data){  
          $this->db->where("user_email", $user_email);  
          $this->db->where("material_id", $material_id);  
          $this->db->update('tbl_rating', $data);  
      }

      function update_profile($user_id, $data)  
      {  
           $this->db->where("id_user", $user_id);  
           $this->db->update("tbl_users", $data);  
      } 

      // function get_average_rate($material_id){
      //     $this->db->select('ROUND(AVG(rate), 1)');
      //     $this->db->from('tbl_rating');
      //     $this->db->where('material_id', $material_id);
      //     $query = $this->db->get();
      //     $average_rating = $query->result();
      //     return $average_rating;
      // }

      // function get_file_name($material_id){
      //   $this->db->select('*');
      //   $this->db->from('tbl_material');
      //   $this->db->where('material_id', $material_id);
      //   $query = $this->db->get();
      //   return $query->result();
      // }

      // function download_file($material_id){
      //   $this->db->select('*');
      //   $this->db->from('tbl_material');
      //   $this->db->where('material_id', $material_id);
      // }

      // function total_material(){
      //   $this->db->select(COUNT('*'));
      //   $this->db->from('tbl_material');
      //   $query = $this->db->get();
      // }






      function get_total_materials(){

        $query = $this->db->query("SELECT COUNT(*) FROM tbl_material");
        return $query->result();
         // $this->db->select("*");  
         // $this->db->from('tbl_material');  
         // return $this->db->count_all_results(); 
      }

      function top_encoder(){

        $query4 = $this->db->query("SELECT name, MAX(total) as final_total FROM
                  (SELECT material_uploader as name,  COUNT(material_title) as total from tbl_material 
                  WHERE material_division = '" . $_SESSION['division'] . "'
                  GROUP BY material_uploader)
                  AS new_table
                  GROUP BY total
                  ORDER BY total DESC
                  LIMIT 4");
        
        return $query4->result();
      }

      function top_category(){
        $query4 = $this->db->query("SELECT categ, MAX(total) as final_total FROM
                  (SELECT material_category as categ,  COUNT(material_title) as total from tbl_material 
                  WHERE material_division = '" . $_SESSION['division'] . "'
                  GROUP BY material_category)
                  AS new_table
                  GROUP BY total
                  ORDER BY total DESC
                  LIMIT 5");
        
        return $query4->result();
      }

      function encoder_top_category(){
        $query4 = $this->db->query("SELECT categ, MAX(total) as final_total FROM
                  (SELECT material_category as categ,  COUNT(material_title) as total from tbl_material 
                  WHERE material_uploader = '" . $_SESSION['uploader'] . "'
                  GROUP BY material_category)
                  AS new_table
                  GROUP BY total
                  ORDER BY total DESC
                  LIMIT 5");
        
        return $query4->result();
      }

      function total_download($data){
          $this->db->insert('tbl_downloads', $data);  
      }

      function total_visit($data){
          $this->db->insert('tbl_visit', $data);  
      }



      

      

}

?>
