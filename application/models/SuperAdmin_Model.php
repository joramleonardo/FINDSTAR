<?php
class SupeAdmin_model extends CI_Model {

      function top_encoder(){

        $query4 = $this->db->query("SELECT name, MAX(total) as final_total FROM
                  (SELECT material_uploader as name,  COUNT(material_title) as total from tbl_material 
                  
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
                  GROUP BY material_category)
                  AS new_table
                  GROUP BY total
                  ORDER BY total DESC
                  LIMIT 4");
        
        return $query4->result();

      }
}

?>
