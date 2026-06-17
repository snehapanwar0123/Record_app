<?php

$conn = mysqli_connect("localhost","root","","record_app");

$edit = false;

$id = "";
$name = "";
$address = "";
$city = "";
$state = "";
$country = "India";
$email = "";
$phone = "";
$sex = "";
$course = "";

if(isset($_GET['id']))
{
    $edit = true;

    $id = $_GET['id'];

    $result = mysqli_query($conn,"SELECT * FROM users WHERE id=$id");

    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $address = $row['address'];
    $city = $row['city'];
    $state = $row['state'];
    $country = $row['country'];
    $email = $row['email'];
    $phone = $row['phone'];
    $sex = $row['sex'];
    $course = $row['course'];
}

?>

<!DOCTYPE html>
<html>
<head>

<title>User Form</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f4f4;
}

.form-box{
    width:900px;
    margin:30px auto;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0px 0px 10px gray;
}

</style>

<script>

function validateForm()
{
    let name = document.forms["userForm"]["name"].value.trim();
    let address = document.forms["userForm"]["address"].value.trim();
    let city = document.forms["userForm"]["city"].value.trim();
    let state = document.forms["userForm"]["state"].value;
    let country = document.forms["userForm"]["country"].value;
    let email = document.forms["userForm"]["email"].value.trim();
    let phone = document.forms["userForm"]["phone"].value.trim();

    if(name == "")
    {
        alert("Enter Name");
        return false;
    }

    if(address == "")
    {
        alert("Enter Address");
        return false;
    }

    if(city == "")
    {
        alert("Enter City");
        return false;
    }

    if(state == "")
    {
        alert("Select State");
        return false;
    }

    if(country == "")
    {
        alert("Select Country");
        return false;
    }

    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(!emailPattern.test(email))
    {
        alert("Enter Valid Email");
        return false;
    }

    let phonePattern = /^[0-9]{10}$/;

    if(!phonePattern.test(phone))
    {
        alert("Phone must contain exactly 10 digits");
        return false;
    }

    let sex = document.querySelector('input[name="sex"]:checked');

    if(!sex)
    {
        alert("Select Sex");
        return false;
    }

    let course = document.querySelector('input[name="course"]:checked');

    if(!course)
    {
        alert("Select Course");
        return false;
    }

    return true;
}

</script>

</head>

<body>

<div class="form-box">

<h2 class="text-center mb-4">
<?php echo $edit ? "Edit Record" : "Add Record"; ?>
</h2>

<form name="userForm"
      action="/record_app/save.php"
      method="post"
      onsubmit="return validateForm()">

<?php if($edit){ ?>

<input type="hidden" name="id" value="<?php echo $id; ?>">

<?php } ?>

<table class="table table-bordered">
    <tr>
    <td>Name</td>
    <td>
        <input type="text"
               name="name"
               class="form-control"
               value="<?php echo $name; ?>">
    </td>
</tr>

<tr>
    <td>Address</td>
    <td>
        <textarea name="address"
                  class="form-control"><?php echo $address; ?></textarea>
    </td>
</tr>

<tr>
    <td>City</td>
    <td>
        <input type="text"
               name="city"
               class="form-control"
               value="<?php echo $city; ?>">
    </td>
</tr>

<tr>
    <td>State</td>
    <td>

        <select name="state" class="form-select">

    <option value="">Select State</option>

    <option value="Andhra Pradesh" <?php if($state=="Andhra Pradesh") echo "selected"; ?>>Andhra Pradesh</option>
    <option value="Arunachal Pradesh" <?php if($state=="Arunachal Pradesh") echo "selected"; ?>>Arunachal Pradesh</option>
    <option value="Assam" <?php if($state=="Assam") echo "selected"; ?>>Assam</option>
    <option value="Bihar" <?php if($state=="Bihar") echo "selected"; ?>>Bihar</option>
    <option value="Chhattisgarh" <?php if($state=="Chhattisgarh") echo "selected"; ?>>Chhattisgarh</option>
    <option value="Goa" <?php if($state=="Goa") echo "selected"; ?>>Goa</option>
    <option value="Gujarat" <?php if($state=="Gujarat") echo "selected"; ?>>Gujarat</option>
    <option value="Haryana" <?php if($state=="Haryana") echo "selected"; ?>>Haryana</option>
    <option value="Himachal Pradesh" <?php if($state=="Himachal Pradesh") echo "selected"; ?>>Himachal Pradesh</option>
    <option value="Jharkhand" <?php if($state=="Jharkhand") echo "selected"; ?>>Jharkhand</option>
    <option value="Karnataka" <?php if($state=="Karnataka") echo "selected"; ?>>Karnataka</option>
    <option value="Kerala" <?php if($state=="Kerala") echo "selected"; ?>>Kerala</option>
    <option value="Madhya Pradesh" <?php if($state=="Madhya Pradesh") echo "selected"; ?>>Madhya Pradesh</option>
    <option value="Maharashtra" <?php if($state=="Maharashtra") echo "selected"; ?>>Maharashtra</option>
    <option value="Manipur" <?php if($state=="Manipur") echo "selected"; ?>>Manipur</option>
    <option value="Meghalaya" <?php if($state=="Meghalaya") echo "selected"; ?>>Meghalaya</option>
    <option value="Mizoram" <?php if($state=="Mizoram") echo "selected"; ?>>Mizoram</option>
    <option value="Nagaland" <?php if($state=="Nagaland") echo "selected"; ?>>Nagaland</option>
    <option value="Odisha" <?php if($state=="Odisha") echo "selected"; ?>>Odisha</option>
    <option value="Punjab" <?php if($state=="Punjab") echo "selected"; ?>>Punjab</option>
    <option value="Rajasthan" <?php if($state=="Rajasthan") echo "selected"; ?>>Rajasthan</option>
    <option value="Sikkim" <?php if($state=="Sikkim") echo "selected"; ?>>Sikkim</option>
    <option value="Tamil Nadu" <?php if($state=="Tamil Nadu") echo "selected"; ?>>Tamil Nadu</option>
    <option value="Telangana" <?php if($state=="Telangana") echo "selected"; ?>>Telangana</option>
    <option value="Tripura" <?php if($state=="Tripura") echo "selected"; ?>>Tripura</option>
    <option value="Uttar Pradesh" <?php if($state=="Uttar Pradesh") echo "selected"; ?>>Uttar Pradesh</option>
    <option value="Uttarakhand" <?php if($state=="Uttarakhand") echo "selected"; ?>>Uttarakhand</option>
    <option value="West Bengal" <?php if($state=="West Bengal") echo "selected"; ?>>West Bengal</option>

    <option value="Andaman and Nicobar Islands" <?php if($state=="Andaman and Nicobar Islands") echo "selected"; ?>>Andaman and Nicobar Islands</option>
    <option value="Chandigarh" <?php if($state=="Chandigarh") echo "selected"; ?>>Chandigarh</option>
    <option value="Dadra and Nagar Haveli and Daman and Diu" <?php if($state=="Dadra and Nagar Haveli and Daman and Diu") echo "selected"; ?>>Dadra and Nagar Haveli and Daman and Diu</option>
    <option value="Delhi" <?php if($state=="Delhi") echo "selected"; ?>>Delhi</option>
    <option value="Jammu and Kashmir" <?php if($state=="Jammu and Kashmir") echo "selected"; ?>>Jammu and Kashmir</option>
    <option value="Ladakh" <?php if($state=="Ladakh") echo "selected"; ?>>Ladakh</option>
    <option value="Lakshadweep" <?php if($state=="Lakshadweep") echo "selected"; ?>>Lakshadweep</option>
    <option value="Puducherry" <?php if($state=="Puducherry") echo "selected"; ?>>Puducherry</option>

    </select>

    </td>
</tr>

<tr>
    <td>Country</td>
    <td>

        <select name="country" class="form-select">

            <option value="India"
            <?php if($country=="India") echo "selected"; ?>>
                India
            </option>

        </select>

    </td>
</tr>

<tr>
    <td>Email</td>
    <td>

        <input type="email"
               name="email"
               class="form-control"
               value="<?php echo $email; ?>">

    </td>
</tr>

<tr>
    <td>Phone</td>
    <td>

        <input type="text"
               name="phone"
               maxlength="10"
               class="form-control"
               value="<?php echo $phone; ?>">

    </td>
</tr>
<tr>
    <td>Sex</td>
    <td>

        <input type="radio"
               name="sex"
               value="Male"
               <?php if($sex=="Male") echo "checked"; ?>>
        Male

        &nbsp;&nbsp;

        <input type="radio"
               name="sex"
               value="Female"
               <?php if($sex=="Female") echo "checked"; ?>>
        Female

        &nbsp;&nbsp;

        <input type="radio"
               name="sex"
               value="Other"
               <?php if($sex=="Other") echo "checked"; ?>>
        Other

    </td>
</tr>

<tr>
    <td>Course</td>
    <td>

        <input type="radio"
               name="course"
               value="Science"
               <?php if($course=="Science") echo "checked"; ?>>
        Science

        &nbsp;&nbsp;

        <input type="radio"
               name="course"
               value="Humanities"
               <?php if($course=="Humanities") echo "checked"; ?>>
        Humanities

        &nbsp;&nbsp;

        <input type="radio"
               name="course"
               value="Commerce"
               <?php if($course=="Commerce") echo "checked"; ?>>
        Commerce

    </td>
</tr>

<tr>
    <td colspan="2" class="text-center">

    <button type="submit" class="btn btn-success">

        <?php echo $edit ? "Update Record" : "Add Record"; ?>

    </button>

</td>
</tr>

</table>

</form>

</div>

</body>
</html>