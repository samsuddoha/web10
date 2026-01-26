<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <h1>Student marks Entry</h1>
    <form action="submit_action.php" method="get">
        <label for="">Name</label>
        <input type="text" name="name" value="bacd"> <br> <br>
        <label for="">Gender</label>
        <input type="radio" name="gender" value="male"> Male 
        <input type="radio" name="gender" value="female"> Female <br> <br>
        <label for="">Course 1</label>
        <input type="text" name="mark1" placeholder="Enter Mark"> <br><br>
        <label for="">Course 2</label>
        <input type="text" name="mark2" placeholder="Enter Mark"> <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>