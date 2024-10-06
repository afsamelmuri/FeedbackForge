<?php

include("connect.php");
include("fusioncharts.php");
?>
<html>
<head>
        <title>Feedback Analysis</title>
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.charts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.zune.js"></script>
    </head>

    <body>

        <?php

  $strQuery = "SELECT * FROM feedback ";
  $result = mysql_query($strQuery);
while($row = mysql_fetch_array($result)) 
		  {  
		  if ($result)
		   {

  $arrData = array(
        "chart" => array(
            "caption"=> "Feedback Analysis",
            "subCaption"=> "Semester Wise",
            "xAxisname"=> "Quality Parameters",
            "yAxisName"=> "Total Points",
            "numberPrefix"=> "",
            "legendItemFontColor"=> "#666666",
            "theme"=> "zune"
            )
          );
          // creating array for categories object

          $categoryArray=array();
          $dataseries1=array();
          $dataseries2=array();
          $dataseries3=array();

          // pushing category array values

            array_push($categoryArray, array("label" => $row["SUBJECTID"]));
        array_push($dataseries1, array("value" => $row["Q1"],"value" => $row["Q2"],"value" => $row["Q3"],"value" => $row["Q4"],"value" => $row["Q5"]));

       

      }

      $arrData["categories"]=array(array("category"=>$categoryArray));
      // creating dataset object
      $arrData["dataset"] = array(array("seriesName"=> "Actual Points", "data"=>$dataseries1), array("seriesName"=> "Projected Points",  "renderAs"=>"bar", "data"=>$dataseries2),array("seriesName"=> "Proficiency",  "renderAs"=>"area", "data"=>$dataseries3));


      /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */
      $jsonEncodedData = json_encode($arrData);

      // chart object
      $msChart = new FusionCharts("mscombi2d", "chart1" , "600", "350", "chart-container", "json", $jsonEncodedData);

      // Render the chart
      $msChart->render();

      // closing db connection
      

   }

?>

            <center>
                <div id="chart-container">Chart will render here!</div>
            </center>
    </body>

    </html>