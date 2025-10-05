  <!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: rgb(239, 236, 236);
        display: flex;
        justify-content: center;
        align-items: center;
      }

      * {
        box-sizing: border-box;
      }

      /* Add padding to containers */
      .container-fluid {
        padding: 16px;
        background-color: white;
        max-width: 400px;
      }

      /* Full-width input fields */
      input[type="text"],
      input[type="password"] {
        width: 100%;
        padding: 5px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #ffffff;
        border-bottom: 1px solid #615e5e;
      }

      input[type="text"]:focus,
      input[type="password"]:focus {
        background-color: #ddd;
        outline: none;
      }

      /* Overwrite default styles of hr */
      hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
      }

      /* Set a style for the submit button */
      .registerbtn {
        background-color: #04aa6d;
        color: white;
        padding: 10px 10px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
        border-radius: 5px;
      }

      .registerbtn:hover {
        opacity: 1;
      }

      /* Add a blue text color to links */
      a {
        color: dodgerblue;
      }

      /* Set a grey background color and center the text of the "sign in" section */
      .signin {
        background-color: #ffffff;
        text-align: center;
      }
    </style>
  </head>
  <body>
  <?php
    include 'db_connection.php';   
    //insert data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                      alert('New record created successfully');
                      window.location.href = window.location.href; // reload page
                    </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>
<form action="" method="post" enctype="multipart/form-data">
      <div class="container-fluid">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr />

        <label for="username"></label>
        <input
          type="text"
          placeholder="Enter Username"
          name="username"
          id="username"
          required
        />

        <label for="email"></label>
        <input
          type="text"
          placeholder="Enter Email"
          name="email"
          id="email"
          required
        />

        <label for="password"></label>
        <input
          type="password"
          placeholder="Enter Password"
          name="password"
          id="password"
          required
        />

        <label for="psw-repeat"></label>
        <input
          type="password"
          placeholder="Repeat Password"
          name="psw-repeat"
          id="psw-repeat"
          required
        />
        <hr />
        <p>
          By creating an account you agree to our
          <a href="#">Terms & Privacy</a>.
        </p>

        <button type="submit" class="registerbtn">Register</button>

        <p class="signin">Already have an account? <a href="#">Sign in</a>.</p>
      </div>

      <!-- <div class="container signin"></div> -->
    </form>

      </body>
</html>
