<?php
class Db_Functions{

    private $conn;

    function __construct(){
        require_once 'Db_Config.php';
        $database = new Db_Config();

        $this->conn = $database->connect();
    }

    /**
     * User Registration.
     */
    public function user_registration($lastname,$firstname,$middlename,$username,$password){

        $password = md5($password);

        $sql = "INSERT INTO user(lastname,firstname,middlename,username,password)VALUES(?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($lastname,$firstname,$middlename,$username,$password));
        $result = $stmt->fetch();
        return $result;
    }

    /**
     * User Login Authentication.
     */
    public function user_authentication($username,$password){

        $password = md5($password);

        $sql = "SELECT * FROM user WHERE username=? AND password =?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($username,$password));
        $result = $stmt->fetch();
        return $result;

    }

    /**
     * Database Table check if the username if exists.
     */
    public function check_username_if_exists($username){
        
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute(array($username));
        $result = $stmt->fetch();
        return $result;
    }

    /**Alumni Records Events */
    public function get_all_alumni(){
        
        $sql = "SELECT * FROM alumni";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    /**
     * Add new Alumni records
     */
    public function add_new_alumni($familyname,$firstname,$maidenname,$age,$nationality,$status,
                                $year_graduated,$present_address,$present_employment,$employment_status,
                                $office_address,$contact_number,$email,$facebook,$name_of_classmate,$classmate_address){

        $sql = "INSERT INTO alumni(familyname,firstname,maidenname,age,nationality,status,
        year_graduated,present_address,present_employment,employment_status,
        office_address,contact_number,email,facebook,name_of_classmate,classmate_address)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($familyname,$firstname,$maidenname,$age,$nationality,$status,
                            $year_graduated,$present_address,$present_employment,$employment_status,
                            $office_address,$contact_number,$email,$facebook,$name_of_classmate,$classmate_address));
        $result = $stmt->fetch();
        return $result;
    }

    /**
     * Get Single alumni
     */
    public function get_single_alumni($id){

        $sql = "SELECT * FROM alumni WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($id));
        $result = $stmt->fetch();
        return $result;
    }


    /**
     * Edit ALumni Record
     */
    public function edit_alumni_record($id,$familyname,$firstname,$maidenname,$age,$nationality,$status,
                                $year_graduated,$present_address,$present_employment,$employment_status,
                                $office_address,$contact_number,$email,$facebook,$name_of_classmate,$classmate_address){
        
        $sql = "UPDATE alumni SET familyname = ?, firstname = ?, maidenname = ?, age = ?, nationality = ?,
                status = ?, year_graduated = ?, present_address = ?, present_employment = ?, employment_status = ?,
                office_address = ?, contact_number = ?, email = ?, facebook = ?, name_of_classmate = ?, classmate_address = ?
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($familyname,$firstname,$maidenname,$age,$nationality,$status,
                            $year_graduated,$present_address,$present_employment,$employment_status,
                            $office_address,$contact_number,$email,$facebook,$name_of_classmate,$classmate_address,$id));
        $result = $stmt->fetch();
        return $result;
    
    }

    /**
     * Delete
     */
    public function delete_single_record($id){

        $sql = "DELETE FROM alumni WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($id));
        $result = $stmt->fetch();
        return $result;
    }
    
     /**
     * Search Alumni
     */
    public function search_alumni($keyword){

        $sql = "SELECT * FROM alumni WHERE familyname LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($keyword));
        $result = $stmt->fetchAll();
        return $result;
    }
    
}
?>