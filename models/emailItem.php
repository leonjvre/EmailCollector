<?php 

class EmailItem{
    public $PersonName;
    public $PersonEmail;
    public $PersonMobile;
    public $PersonMessage;
    

    public function __construct($name, $email, $mobile, $message) {
        // We assign the properties passed in from the outside to the properties we created inside the class.
        $this->PersonName = $name;
        $this->PersonEmail = $email;
        $this->PersonMobile = $mobile;
        $this->PersonMessage = $message;
      }

    function SaveEmailItem(){
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "INSERT INTO emailitems (PersonName, PersonEmail, PersonMobile, PersonNote) 

        VALUES ('$this->PersonName', '$this->PersonEmail', '$this->PersonMobile', '$this->PersonMessage')";
        if (mysqli_query($conn, $sql)) {
          // success
          return 'success';
        } else {
          // error
          return 'Error: ' . mysqli_error($conn);
        }
    }

}

class EmailItems{

    function LoadList(){
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = 'SELECT * FROM emailitems';
        $result = mysqli_query($conn, $sql);
        $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $feedback; 
    }

}
?>