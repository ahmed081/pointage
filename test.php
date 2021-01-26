<?php
   session_start();  
   include("connexion.php");  
$row = 1;
if (($handle = fopen("types.csv", "r")) !== FALSE):
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE):
        $num = count($data);
        $row++;
        for ($c=0; $c < $num; $c++):
            $var[]=$data[$c];
            $sql ="INSERT INTO etudiant (num_etudiant,nu_carte,n_etudiant, p_etudiant, filiere) VALUES ($var[0],$var[1],$var[2],,$var[3],$var[4] )";
            $exec=$pdo->exec($sql);
        endfor;
    endwhile;
    fclose($handle);
endif;
?>




<?php
   session_start();  
   include("connexion.php"); 
header("Content-Type: text/plain");
header("Content-disposition: attachment; filename=types.csv");

$out = fopen('PHP://output', 'r');
$row = 1;
if (($handle = fopen("import.csv", "r")) !== FALSE):
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE):
        fgetcsv($out, array(
            "COL1",
            "COL2",
            "COL3"
            ));
        $num = count($data);
       echo "<br /><br /><p> $num champs à la ligne $row:</p>";
        $row++;
        for ($c=0; $c < $num; $c++):
            $var1 = $row['col1'];
            $var2 =$row['col1'];
            $var3 = $row['col1'];
            $sql ="INSERT INTO types (niveau,filiere,parcour) VALUES ('$var1','$var2','$var3')";
            $exec=$pdo->exec($sql);
        endfor;
    endwhile;
    fclose($handle);
endif;
fclose($out);
?>


<?php
   session_start();  
   include("connexion.php");  
$row = 1;
if (($handle = fopen("types.csv", "r")) !== FALSE):
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE):
        $num = count($data);
        $row++;
        for ($c=0; $c < $num; $c++):
            $var[]=$data[$c];
            $sql ="INSERT INTO etudiant (num_etudiant,nu_carte,n_etudiant, p_etudiant, filiere) VALUES ($var[0],$var[1],$var[2],,$var[3],$var[4] )";
            $exec=$pdo->exec($sql);
        endfor;
    endwhile;
    fclose($handle);
endif;
?>