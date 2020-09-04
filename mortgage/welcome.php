<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Amortization Mortgage Table</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>

    <div class="header">
      <h1>Amortization Mortgage Table</h1>
    </div>
    
    <div class="row">
      <div class="main-table">
        <div class="container">
        <?php
            $principal = $_POST["principal"];
            $interest = $_POST["interest"];
            $time = $_POST["time"];


            $interestPerMonth = $interest/12;
            $repetition = $time*12;
            $fixedPayment = round($principal/$repetition);

            $difference = 0;
            $inPrincipal = $principal;
            echo "<table>";
            echo"<tr>
                    <th>Month</th>
                    <th>Left Over Principal</th>
                    <th>Monthly Interest</th>
                    <th>Payable Per Month</th>
                </tr>";
            for($i=0;$i<$repetition;$i++)
            {
            echo "<tr>";
            $monthlyInterest = round(($inPrincipal*$interestPerMonth)/100);
            $payable = $monthlyInterest + $fixedPayment;
            $monthMeasure = $i +1;
            echo "<td>".$monthMeasure."</td>";
            echo "<td>".$inPrincipal."</td>";
            echo "<td>".$monthlyInterest."</td>";
            if($i == ($repetition - 1))
            {
                $unique = $inPrincipal + $monthlyInterest;
                echo "<td>".$unique."</td>";  
                echo "</tr>";
                break;
            } 
            echo "<td>".$payable."</td>";  
            echo "</tr>";
            $inPrincipal = $inPrincipal - $fixedPayment;
            }

            echo "</table>";
            ?>
        </div> 
      </div>
    </div>
    
    <div class="footer">
      <h2>2020</h2>
    </div>
    
    </script>
    </body>
</html>
