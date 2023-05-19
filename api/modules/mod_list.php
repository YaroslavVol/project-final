<form method="POST">
    <select name="groups" id="groups">
        <?php
            $result = $this->connect->query("SELECT * FROM `groups`");

            while ($row = $result->fetch_assoc()) {
                echo "
                    <option name='id' id='id' value='$row[id_group]'>$row[group_name]</option>
                ";
            }
        ?>
        <!-- Button -->
        
    </select>
    <select name="days" id="days">
        <?php
            $result = $this->connect->query("SELECT * FROM `days_week`");

            while ($row = $result->fetch_assoc()) {
                echo "
                    <option name='id' id='id' value='$row[id_days_week]'>$row[day_week]</option>
                ";
            }
        ?>
        <!-- Button -->
        
    </select>
    <input type="submit" value="Click">
</form>

<p class="group" data-id="1">I-307</p>
<p class="group" data-id="2">I-207</p>
<p class="group" data-id="3">A-406</p>


<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Modal Title</h2>
        <p class="year_sets">Modal content goes here.</p>
        <p class="number_persons"></p>
        <p class="name_elder"></p>
    </div>
</div>

<!-- <button id="openModal">Open Modal</button> -->

<?php
session_start();

$sql_sort = "";
if (isset($_POST['groups'])) {
    $id = $this->formatstr($_POST['groups']);
    $sql_sort .= "
        SELECT * FROM `groups` WHERE `id_group` = $id;
    ";
}

$sql_days = "";
if (isset($_POST['days'])) {
    $id = $this->formatstr($_POST['days']);
    $sql_days .= $id;


}



if (isset($_SESSION["user-name"])) {
    echo $_SESSION["user-name"];
    echo "<br>";
    // echo "<a href='profile.php'>перейти в профиль</a>";
    echo '
    <form action="../exit.php" method="POST">
        <input type="submit" value="Выйти">
    </form> 
    ';
}



// // Соединение к бд
// $connect = new mysqli(HOST, USER, PASSWORD, DATABASE);
// if($connect->connect_error) {
//     exit("Ошибка подключения к БД: ".$connect->connect_error);
// }

// //установить кодировку
// $connect->set_charset("utf8");

// $result= $connect->query("SELECT * FROM `days_week`");

// if($result){
//     if($result->num_rows > 0){
//         while($myrow = $result->fetch_assoc()) { 
//             echo "<div>
//                 <p>".$myrow['day_week']."</p>
//             </div>"; 
//         }
//       } 
//     }

$sql = "SELECT * FROM `groups`";

$sql3 = "SELECT * FROM `groups` WHERE `id_group` = 1";

// GET ONE GROUP
$result=$this->connect->query($sql_sort);


// ALL GROUP
// $result=$this->connect->query($sql);




echo "
    <div class='schedule'>

";



while ($row = $result->fetch_assoc()) {
    echo "
        <div>

    ";

    $group_id = $row['id_group'];
    $sql2 = "
        SELECT id_schedule, name_subject, name_audience, lesson_type, start_time, end_time, schedule.id_pair AS id_pair, day_week 
        FROM schedule 
        JOIN subjects ON schedule.id_subject=subjects.id_subject 
        JOIN audience ON schedule.id_audience=audience.id_audience 
        JOIN lessons_type ON schedule.id_lesson_type=lessons_type.id_lesson_type 
        JOIN days_week ON schedule.id_days_week=days_week.id_days_week 
        JOIN pairs ON schedule.id_pair=pairs.id_pair 
        WHERE id_group = $group_id AND days_week.id_days_week = $sql_days
        ORDER BY schedule.id_days_week, schedule.id_pair;
    ";

    $group_name = $row['group_name'];

    $_SESSION['id_group'] = $group_id;

    echo $group_name;


    
    $result2 = $this->connect->query($sql2);

    while ($row = $result2->fetch_assoc()) {
        echo "
            <p class='day_pair'>$row[day_week] $row[id_pair] ($row[start_time] - $row[end_time])</p>
            <p class='subject'>$row[name_subject]</p>
            <p class='audience'>$row[name_audience]</p>
            <p class='lesson'>$row[lesson_type]</p>
        ";

        
    }
    echo "</div>";
}

echo "</div>";

//  AND days_week.id_days_week = $days_id