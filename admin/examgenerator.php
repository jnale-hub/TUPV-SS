<?php 
include '../php/session.php';
include '../php/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../src/img/tupvlogo.png">
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="stylesheet" href="../src/css/jquery.dataTables.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <title>Exam Genarator | TUPV Syllabus System</title>
</head>
<body class="bg-light-100">
<?php 
$page = 'examgenerator';
include '../php/header.php';




$sql = "SELECT COUNT(id)`id` FROM exammaker_tbl";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(); // Use fetch instead of fetchAll

if ($result) {
   $qty232 = $result['id'];
} else {
   $qty232 = 0; // Handle the case when no rows are returned
}

?>

<div class="p-2 sm:ml-64 relative">
   <div class="p-4 mt-14">
      <div class="bg-light border border-light-200 rounded-lg h-full p-4">
         <div class="mb-6">
            <h1 class="leading-tight tracking-tight text-2xl font-bold">Exam Generator History</h1>
            <h2 class="text-sm font-medium">Total number of Files: <span class="text-main"><?php echo  $qty232 ?></span></h2>
         </div>
         <div>
            <?php
             $sql = "SELECT * FROM exammaker_tbl";
             $stmt = $conn->prepare($sql);
             $stmt->execute();
             $data1 = $stmt->fetchAll()


            ?>
            <table id="examGenListTable" class="pt-3 mb-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
               <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                     
                     <th scope="col" class="px-4 py-2 font-medium">
                        Date Generated
                     </th>
                     <th scope="col" class="px-4 py-2 font-medium">
                        Generated by
                     </th>
                     <th scope="col" class="px-4 py-2 font-medium">
                        Subject
                     </th>
                     <th scope="col" class="px-4 py-2 font-medium">
                        Sem
                     </th>
                     <th scope="col" class="px-4 py-2 font-medium">
                        Term
                     </th>
                     <th scope="col" class="px-4 py-2 font-medium">
                        No. of items
                     </th>
                     <th scope="col" class="px-4 py-2 font-medium">
                        Exam Code
                     </th>

               
               
                  </tr>
               </thead>
               <tbody class="text-gray-900">

               <?php foreach ($data1 as $row): ?>
                  
                  <tr onclick="redirectToExamPrint('<?php echo $row['uniquecode']; ?>', '<?php echo $row['Term']; ?>', '<?php echo $row['Subj']; ?>', '<?php echo $row['Semester']; ?>')" class="bg-white border-b dark:bg-gray-800 cursor-pointer dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">

                  <input type="hidden" name="uniquecode" value="<?php echo $row['uniquecode']; ?>">
                  <input type="hidden" name="Term" value="<?php echo $row['Term']; ?>">
                  <input type="hidden" name="Subj" value="<?php echo $row['Subj']; ?>">
                  <input type="hidden" name="Semester" value="<?php echo $row['Semester']; ?>">
                 
                     <td class="px-4 py-2">
                     <?php 
                        $old_date_timestamp = strtotime($row['dateUpload']);
                        $date = date('Y/m/d', $old_date_timestamp);
                        echo $date;
                        ?>
                        <span class="block text-xs text-gray-600">
                           <?php 
                           $time = date('g:i A', $old_date_timestamp);
                           echo $time 
                           ?>
                        </span>
               
                     </td>
                     <td class="px-4 py-2">
                     <?php echo $row['uploader']; ?>
                     </td>
                     <th scope="row" class="px-4 py-2 font-normal  whitespace-nowrap dark:text-white">
                     <?php echo $row['Subj']; ?>
                     </th>

                     <td class="px-4 py-2">
                     <?php echo $row['Semester']; ?>
                     </td>
                     <td class="px-4 py-2">
                     <?php echo $row['Term']; ?>
                     </td>
                     <td class="px-4 py-2">
                     <?php echo $row['items']; ?>
                     </td>
                     <td class="px-4 py-2 text-blue-600">
                     <?php echo $row['uniquecode']; ?>
                     </td>
                  </tr>
          
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script>
$(document).ready( function () {
   $('#examGenListTable').DataTable({
      "ordering": false,
      "lengthChange": false,
      "info": false
   });
} );

function redirectToExamPrint(uniquecode, term, subj, semester) {
    // Redirect to examprint.php with the data
    window.location.href = `./Examprint.php?uniquecode=${uniquecode}&Term=${term}&Subj=${subj}&Semester=${semester}`;
}
</script>
<script src="../src/js/jquery.dataTables.js"></script>
</body>