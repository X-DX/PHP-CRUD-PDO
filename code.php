<?php
    // session start here for display message
    session_start();
    // session start END here for display message

    // connection to DB File
    include('dbcon.php');

    // Insert data to DB (save Data to DB)
    if(isset($_POST['save_studnt_btn']))
    {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $course = $_POST['course'];

        $query = "INSERT INTO students (fullname,email,phone,course) VALUES (:fullname, :email, :phone, :course)";

        $query_run = $conn->prepare($query);

        $data = [
            ':fullname'=> $fullname,
            ':email'=> $email,
            ':phone'=> $phone,
            ':course'=> $course,            
        ];

        $query_execute = $query_run->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Inserted Successfully"; 
            header('Location:index.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Inserted";
            header('Location:index.php');
            exit(0);
        }


    }
    // End Insert data to DB (save Data to DB)

    // Update data to DB (update Data to DB)
    if(isset($_POST['update_studnt_btn']))
    {
        $student_id = $_POST['student_id'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $course = $_POST['course'];

        try
        {
            $query = "UPDATE students SET fullname=:fullname, email=:email, phone=:phone, course=:course WHERE id=:stud_id LIMIT 1";
            $statement = $conn->prepare($query);

            $data = [
                ':stud_id' => $student_id,
                ':fullname' => $fullname,
                ':email' => $email,
                ':phone' => $phone,
                ':course' => $course,
            ];

            $query_execute = $statement->execute($data);
            if($query_execute)
            {
                $_SESSION['message'] = "Updated Successfully";
                header('Location:index.php');
                exit(0);
            }
            else
            {
                $_SESSION['message'] = "Not Updated";
                header('Location:index.php');
                exit(0);
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    // End Update data to DB (update Data to DB)


    // Delete data to DB (delete Data to DB)
    if(isset($_POST['delete_student']))
    {
        $student_id = $_POST['delete_student'];

        try
        {
            $query = "DELETE FROM students WHERE id=:stud_id";
            $statement = $conn->prepare($query);
            $data = [
                'stud_id' => $student_id
            ];
            $query_execute = $statement->execute($data);
            if($query_execute)
            {
                $_SESSION['message'] = "Deleted Successfully";
                header('Location:index.php');
                exit(0);
            }
            else
            {
                $_SESSION['message'] = "Not Deleted";
                header('Location:index.php');
                exit(0);
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    
    }
    // End Delete data to DB (delete  Data to DB)
