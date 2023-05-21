<?php
// database connection code
$con = mysqli_connect('localhost', 'root', '','pod_baranje');

// get the post records
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$kat_oddel = $_POST['kat_oddel'];
$kat_opst = $_POST['kat_opst'];
$kat_parcela = $_POST['kat_parcela'];

// database insert SQL code
$sql = "INSERT INTO `baranje` (`Име`, `Презиме`, `Катастарско Одделение`, `Катастарско Општина`, `Катастарска Парцела`)
VALUES ('$ime', '$prezime', '$kat_oddel', '$kat_opst', '$kat_parcela')";

// insert in database
$rs = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Table</title>
<style>
@import "https://fonts.googleapis.com/css?family=Open+Sans:600,700";

* {
  font-family: "Open Sans", sans-serif;
}

.rwd-table {
  margin: auto;
  min-width: 300px;
  max-width: 100%;
  border-collapse: collapse;
}

.rwd-table tr:first-child {
  border-top: none;
  background: forestgreen;
  color: #fff;
}

.rwd-table tr {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  background-color: #f5f9fc;
}

.rwd-table tr:nth-child(odd):not(:first-child) {
  background-color: darkseagreen;
}

.rwd-table th {
  display: none;
}

.rwd-table td {
  display: block;
}

.rwd-table td:first-child {
  margin-top: 0.5em;
}

.rwd-table td:last-child {
  margin-bottom: 0.5em;
}

.rwd-table td:before {
  content: attr(data-th) ": ";
  font-weight: bold;
  width: 120px;
  display: inline-block;
  color: #000;
}

.rwd-table th,
.rwd-table td {
  text-align: left;
}

.rwd-table {
  color: #333;
  border-radius: 0.4em;
  overflow: hidden;
}

.rwd-table tr {
  border-color: #bfbfbf;
}

.rwd-table th,
.rwd-table td {
  padding: 0.5em 1em;
}
@media screen and (max-width: 601px) {
  .rwd-table tr:nth-child(2) {
    border-top: none;
  }
}
@media screen and (min-width: 600px) {
  .rwd-table tr:hover:not(:first-child) {
    background-color: #d8e7f3;
  }
  .rwd-table td:before {
    display: none;
  }
  .rwd-table th,
  .rwd-table td {
    display: table-cell;
    padding: 0.25em 0.5em;
  }
  .rwd-table th:first-child,
  .rwd-table td:first-child {
    padding-left: 0;
  }
  .rwd-table th:last-child,
  .rwd-table td:last-child {
    padding-right: 0;
  }
  .rwd-table th,
  .rwd-table td {
    padding: 1em !important;
  }
}

body {
  background: #4b79a1;
  background: -webkit-linear-gradient(to left, #4b79a1, #283e51);
  background: linear-gradient(to left, #4b79a1, #283e51);
}
h1 {
  text-align: center;
  font-size: 2.4em;
  color: white;
}
.container {
  display: block;
  text-align: center;
}
h3 {
  display: inline-block;
  position: relative;
  text-align: center;
  font-size: 1.5em;
  color: #cecece;
}
h3:before {
  content: "\25C0";
  position: absolute;
  left: -50px;
  -webkit-animation: leftRight 2s linear infinite;
  animation: leftRight 2s linear infinite;
}
h3:after {
  content: "\25b6";
  position: absolute;
  right: -50px;
  -webkit-animation: leftRight 2s linear infinite reverse;
  animation: leftRight 2s linear infinite reverse;
}
@-webkit-keyframes leftRight {
  0% {
    -webkit-transform: translateX(0);
  }
  25% {
    -webkit-transform: translateX(-10px);
  }
  75% {
    -webkit-transform: translateX(10px);
  }
  100% {
    -webkit-transform: translateX(0);
  }
}
@keyframes leftRight {
  0% {
    transform: translateX(0);
  }
  25% {
    transform: translateX(-10px);
  }
  75% {
    transform: translateX(10px);
  }
  100% {
    transform: translateX(0);
  }
}
</style>
</head>
<body>
  <div class="container" style="margin-top: 4rem;">
  <h1>Податоци за Поднесителот и Недвижноста</h1><br>
   <table class="rwd-table" border ="1">
      <tr>
        <th>Име</th>
        <th>Презиме</th>
        <th>Катастарско Одделение</th>
        <th>Катастарско Општина</th>
        <th>Катастарска Парцела</th>
      </tr>
    <?php
//fetching data from mysql
      $query = mysqli_query($con, "SELECT * FROM `baranje`");
      $checkQuery = mysqli_num_rows($query);
      if ($checkQuery) {
        while($row = mysqli_fetch_array($query)){
    ?>
    <tr>
      <td data-th="Име">
        <?php echo $row['Име'] ?>
      </td>
      <td data-th="Презиме">
       <?php echo $row['Презиме'] ?>
      </td>
      <td data-th="Катастарско Одделение">
        <?php echo $row['Катастарско Одделение'] ?>
      </td>
      <td data-th="Катастарско Општина">
        <?php echo $row['Катастарско Општина'] ?>
      </td>
      <td data-th="Катастарска Парцела">
        <?php echo $row['Катастарска Парцела'] ?>
      </td>
    </tr>
    <?php
      }
      }else{
        echo "Податоците не се достапни";
      }
    ?>
</table>
</div>
</body>
</html>
