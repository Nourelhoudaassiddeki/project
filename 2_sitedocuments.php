<?php
include('2_site.php');
if (isset($_POST["Submit"])) {
    $titre =  $_POST["titre"];
    $pilote =  $_POST["pilote"];
    $code = $_POST["code"];
    $support=$_POST["support"];
    $supp= " ";
    foreach($support as $row){
      $supp .= $row .",";
   }
    $fournisseur= $_POST["fournisseur"];
   $destinataire= $_POST["destinataire"];
   $dest = " ";
   foreach($destinataire as $row){
      $dest .= $row .",";
   }
    $lieu= $_POST["lieu"];
  // Check if destinataire is set
    $requete =mysqli_query($conn, "INSERT INTO docs ( titre, pilote, code, supportdocument, fournisseur, destinataire, lieu) VALUES ('$titre','$pilote','$code','$supp','$fournisseur', '$dest','$lieu')");
    
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Document Management Portal</title>
    <style>
        body {
            padding: 20px;
            font-family: 'Roboto', sans-serif;
            background-color: #f1f5f9;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .form-table {
            font-size: 15px;
            margin-bottom: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-table th, .form-table td {
            border: 1px solid #dee2e6;
            text-align: center;
            padding: 12px;
        }
        .form-table th {
            background-color: #007bff;
            color: #ffffff;
        }
        .btn-submit {
            margin-top: 10px;
        }
        .header-content {
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header-content img {
            max-height: 120px;
            display: block;
            margin: 0 auto;
        }
        .table-container {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #dee2e6;
            text-align: center;
            padding: 12px;
        }
        th {
            background-color: #007bff;
            color: #ffffff;
        }
        .btn {
            font-size: 14px;
        }
        .btn-primary, .btn-success, .btn-danger, .btn-warning {
            margin: 5px;
        }
        .search-form {
            margin-top: 20px;
        }
        .search-form input {
            border-radius: 8px 0 0 8px;
            border: 1px solid #dee2e6;
        }
        .search-form button {
            border-radius: 0 8px 8px 0;
        }
        .document-table {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .document-table th, .document-table td {
            border: none;
            padding: 12px;
            text-align: center;
        }
        .document-table th {
            background-color: #007bff;
            color: #ffffff;
        }
        .document-table tbody tr {
            transition: background-color 0.3s ease;
        }
        .document-table tbody tr:hover {
            background-color: #f1f5f9;
        }
        .document-table .btn {
            font-size: 13px;
            margin: 2px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4 text-center">Document Upload Portal</h2>
        <form action="" method="post">
            <table class="form-table">
                <thead>
                    <tr>
                    <th scope="col">Titre du Document</th>
                        <th scope="col">Pilote du Document</th>
                        <th scope="col">Code du Document</th>
                        <th scope="col">Type de Document</th>
                        <th scope="col">Fournisseur</th>
                        <th scope="col">Destinataires</th>
                        <th scope="col">Lieu de Classification</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td><input type="text" placeholder="Entrez le titre du document" name="titre" class="form-control"></td>
                        <td><input type="text" placeholder="Entrez le pilote du document" name="pilote" class="form-control"></td>
                        <td><input type="text" placeholder="e.g., ESU.PS08" name="code" class="form-control"></td>
                        <td>
                            <div>
                                <input type="radio" name="support[]" value="papier"> Papier <br>
                                <input type="radio" name="support[]" value="numerique"> Numérique
                            </div>
                        </td>
                        <td><input type="text" placeholder="e.g., Responsable Technique" name="fournisseur" class="form-control"></td>
                        <td>
                            <div>
                                <input type="radio" name="destinataire[]" value="service_technique_navigation"> Service Technique Navigation <br>
                                <input type="checkbox" name="destinataire[]" value="section_CNS"> Section CNS <br>
                                <input type="checkbox" name="destinataire[]" value="section_infrastructure_electricite"> Section Infrastructure & Électricité <br>
                                <input type="radio" name="destinataire[]" value="section_navigation"> Section Navigation <br>
                                <input type="checkbox" name="destinataire[]" value="section_controle_aerien"> Section Contrôle Aérien <br>
                                <input type="checkbox" name="destinataire[]" value="section_SLIA"> Section SLIA <br>
                                <input type="radio" name="destinataire[]" value="section_SSQE"> Section SSQE <br>
                                <input type="radio" name="destinataire[]" value="section_exploitation_aeroportuaire"> Section Exploitation Aéroportuaire <br>
                                <input type="radio" name="destinataire[]" value="section_ressources"> Section Ressources <br>
                                <input type="radio" name="destinataire[]" value="autre"> Autre
                            </div>
                        </td>
                        <td><input type="text" placeholder="Entrez le lieu de classification" name="lieu" class="form-control"></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary btn-submit" name="Submit">Add Document</button>
        </form>

        <form method="post" class="search-form">
            <div class="input-group">
                <input type="text" name="search" placeholder="Search documents" class="form-control" required>
                <button type="submit" name="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <hr>

        <div class="table-container">
            <div class="header-content">
                <img src="onda logo.jpeg" alt="Logo">
                <div>Office National des Aéroports</div>
                <div>Aéroport Essaouira Mogador</div>
            </div>
            <h2 class="mt-4 mb-4 text-center">Document List</h2>
            <table class="document-table">
                <thead>
                    <tr>
                    <th>Titre du Document</th>
                        <th>Pilote du Document</th>
                        <th>Code du Document</th>
                        <th>Type de Document</th>
                        <th>Fournisseur</th>
                        <th>Destinataires</th>
                        <th>Lieu de Classification</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
			<?php                
			require '2_site.php'; 
			$display_query = "SELECT titre, pilote, code, supportdocument, fournisseur, destinataire, lieu FROM docs";
if ($results = mysqli_query($conn, $display_query)) {
    $count = mysqli_num_rows($results);
    if($count>0) 
    {
      while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
      {
        ?>
       <tr>
         <td><?php echo $data_row['titre']; ?></td>
         <td><?php echo $data_row['pilote']; ?></td>
         <td><?php echo $data_row['code']; ?></td>
         <td><?php echo $data_row['supportdocument']; ?>
      <td><?php echo $data_row['fournisseur']; ?>
      <td><?php echo $data_row['destinataire']; ?>
      <td><?php echo $data_row['lieu']; ?>
         <td>
           <a href="pdf_maker.php?titre=<?php echo $data_row['titre']; ?>&ACTION=VIEW" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> View PDF</a> &nbsp;&nbsp; 
           <a href="pdf_maker.php?titre=<?php echo $data_row['titre']; ?>&ACTION=DOWNLOAD" class="btn btn-danger"><i class="fa fa-download"></i> Download PDF</a>
          &nbsp;&nbsp; 
           <a href="pdf_maker.php?titre=<?php echo $data_row['titre']; ?>&ACTION=UPLOAD" class="btn btn-warning"><i class="fa fa-upload"></i> Upload PDF</a>
        </td>
       </tr>
       <?php
      }
    }
    // rest of your code
} else {
    echo "Error: " . mysqli_error($conn);
}
    

    if (isset($_POST['search'])) {
      $search = $_POST['search'];
      $query = "SELECT * FROM docs WHERE titre LIKE '%$search%' OR pilote LIKE '%$search%' OR code LIKE '%$search%' OR supportdocument LIKE '%$search%' OR fournisseur LIKE '%$search%' OR destinataire LIKE '%$search%' OR lieu LIKE '%$search%'";
      $result = mysqli_query($conn, $query);
      if ($result) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          // display search results
          echo "<tr>";
          echo "<td>" . $row['titre'] . "</td>";
          echo "<td>" . $row['pilote'] . "</td>";
          echo "<td>" . $row['code'] . "</td>";
          echo "<td>" . $row['supportdocument'] . "</td>";
          echo "<td>" . $row['fournisseur'] . "</td>";
          echo "<td>" . $row['destinataire'] . "</td>";
          echo "<td>" . $row['lieu'] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "No results found";
      }
    }
		
			?>
			</tbody>
			</table>
		</div>
	</div>
</div>
<br>
</body>
</html>