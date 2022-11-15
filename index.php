<?php 

include 'includes/header.php'; 
include 'models/emailitem.php';


//Set the page variables
$name = $email = $message = $mobile = $SaveMessage = '';
$nameErr = $emailErr = $mobileErr = $messageErr = $SaveError = '';

//Form Submit 
if (isset($_POST['submit'])) {

    //Run the validation rules
     // Validate name
        if (empty($_POST['name'])) {
            $nameErr = 'Name is required';
        } else {
            $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // Validate email
        if (empty($_POST['email'])) {
            $emailErr = 'Email is required';
        } else {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        }

        // Validate Mobile
        if (empty($_POST['mobile'])) {
            $mobileErr = 'Mobile Number is required';
        } else {
            $mobile = filter_input(INPUT_POST,'mobile',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        //Validate Message
        if (!empty($_POST['message'])){
            $message = filter_input(INPUT_POST,'message',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        //Create object and Save to DB if all is valid
        if (empty($nameErr) && empty($emailErr) && empty($mobileErr)){
           
            $EmailItem = new EmailItem($name,$email,$mobile,$message);
            $SaveMessage = $EmailItem->SaveEmailItem();

            if ($SaveMessage == 'success'){
                //The Save is successfull, clear the page and show the message
                $name = $email = $message = $mobile = '';

               // header('Location: view.php');
            }   
            else{
                //Set the Save Error
                $SaveError = $SaveMessage;
            }
        }
}
?>

<h2>Collect new Email Address</h2>
<p class="lead text-center">Enter your details below</p>
<?php if($SaveMessage == 'success') :?>
    <div class="alert alert-success" role="alert">Your record was successfully saved</div>
    <?php endif; ?>
<form method="POST" action="<?php echo htmlspecialchars(
      $_SERVER['PHP_SELF']
    ); ?>" class="mt-4 w-75">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control <?php echo !$nameErr ?:
          'is-invalid'; ?>" id="name" name="name" placeholder="Enter your name" value="<?php echo $name; ?>">
        <div id="validationServerFeedback" class="invalid-feedback">
          Please provide a valid name.
        </div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo !$emailErr ?:
          'is-invalid'; ?>" id="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>">
          <div id="validationServerFeedback" class="invalid-feedback">
          Please provide a valid Email address.
        </div>
      </div>
      <div class="mb-3">
        <label for="mobile" class="form-label">Mobile Number</label>
        <input type="tel" pattern="[0]{1}[0-9]{9}" class="form-control <?php echo !$mobileErr ?:
          'is-invalid'; ?>" id="mobile" name="mobile" placeholder="Enter a valid Mobile Number" value="<?php echo $mobile; ?>">
        <div id="validationServerFeedback" class="invalid-feedback">
          Please provide a valid Mobile Number.
        </div>
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Leave a Message</label>
        <textarea class="form-control" id="message" name="message" placeholder="Leave a message"><?php echo $message; ?></textarea>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
        <p><strong><?php echo $SaveError ?></strong></p>
      </div>
    </form>
<?php include 'includes/footer.php'; ?>