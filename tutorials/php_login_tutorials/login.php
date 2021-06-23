    <?php
    //Start a session to enable the username and password data to be securely passed between pages.
    session_start();

    //Enable connection to the database.
    include "db_conn.php";

    //check if the username and password fields have been filled using the $_POST variable
    if(isset($_POST['username']) && isset($_POST['password'])) {

        //the function 'validate($data) calls three other functions:
        //1.  The trim() function strips unnecessary characters (extra space, tab, newline) from the user input data.
        //2.  The stripslashes() function removes backslashes from the user input data (it literally strips the slashes).
        //3.  The htmlspecialchars() function converts special characters to HTML entities.
        //      This means that it will replace HTML characters like < and > with &lt; and &gt;.
        //      This prevents attackers from exploiting the code by injecting HTML or Javascript code
        //          (Cross-site Scripting attacks) in forms.

        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

    //Use the validate($data) function to validate the username and password inputs.
    $username = validate($_POST['username']);
    $pass = validate($_POST['password']);

    //if the username or password field is empty return to index.php and display an error message
    if(empty($username)) {
        header ("Location: index.php?error=User Name is required");
        exit();
    }
    else if(empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    }

    //assign $_GET pro_id value in the URL to the $pro_id variable
    $id = $_GET['id'];
    //FETCH SINGLE POST
    $stmt = $db->prepare('SELECT * FROM users WHERE user_name = :id');
    $stmt->execute(['id'=>$id]);
    $result=$stmt->fetch(PDO::FETCH_OBJ);

    if(rowCount($result) === 1) {
        if($result['user_name'] === $username && $result['password'] === $pass) {
            echo "Logged In!";
            $_SESSION['user_name'] = $result['user_name'];
            $_SESSION['name'] = $result['name'];
            $_SESSION['id'] = $result['id'];
            header("Location: home.php");
            exit();
        }
        else {
            header("Location: index.php?error=Incorrect User Name or Password");
            exit();
        }
    }
    else {
        header("Location: index.php");
        exit();
    }
?>
