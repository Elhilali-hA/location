<?php 





class Reserve {


    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectall()
    {
        $this->db->query('SELECT * from vehicule ');
           return $this->db->resultSet();
    }
    public function selectbyInfo($code)
    {
        $this->db->query("SELECT * from vehicule where code = '$code'");

           return $this->db->resultSet();
    }

// ///////////////////////////////////////////
    public function selectbycars($code)
    {
        $this->db->query("SELECT * from vehicule where code = '$code'");

           return $this->db->resultSet();
    }

    public function selectReserve()
    {
        $this->db->query("SELECT * from resrvation");

           return $this->db->resultSet();
    }
    public function selectReserveId($id)
    {
        $this->db->query("SELECT * from resrvation where Code = '$id'");

           return $this->db->resultSet();
    }



    public function add2($data){
        $this->db->query("INSERT INTO `resrvation`(`Name`, `datedebut`, `datefin`, `Prix`) VALUES(:Name , :datedebut, :datefin, :Prix)");
        // Bind values

        $this->db->bind(':prix', $data['prix']);
        $this->db->bind(':name', $data['Name']);
        $this->db->bind(':datedebut', $data['datedebut']);
        $this->db->bind(':datefin', $data['datefin']);

        // Execute
        if( $this->db->execute() ){
            return true;
        } else {
            return false;
        }
    }


    public function edit ($data) {
  
        
        $this->db->query('UPDATE resrvation SET  prix = :prix , Name = :name , datedebut = :datedebut , datefin = :datefin where Code = :code');
        // Bind values
        $this->db->bind(':code', $data['Code']);
        $this->db->bind(':prix', $data['prix']);
        $this->db->bind(':name', $data['Name']);
        $this->db->bind(':datedebut', $data['datedebut']);
        $this->db->bind(':datefin', $data['datefin']);

        // Execute
        if( $this->db->execute() ){
            return true;
        } else {
            return false;
        }
    



}
public function deleteRes($id)
    {
        $this->db->query('DELETE FROM resrvation where Code = :code');
        // Bind values
        $this->db->bind(':code', $id);

        // Execute
        if( $this->db->execute() ){
            return true;
        } else {
            return false;
        }
    }

}
  



