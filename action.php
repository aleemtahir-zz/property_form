<?php

function convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
}



?>



<html lang="en">
  	<head>
	    <link type="text/css" rel="stylesheet" href="css/cognito.css">
	    <script type="text/javascript" crossorigin="anonymous" src="js/cognito.js"></script>

	    <meta charset="utf-8">
	    <title>Property Form</title>
	    <meta name="description" content="">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1,user-scalable=no">

	    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">


	    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.css">
	    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.js"></script>

	    <link rel="stylesheet" type="text/css" href="css/style.css">    
	    <link rel="stylesheet" type="text/css" href="css/custom.css"> 
	    <script type="text/javascript" src="js/script.js"></script>

  	</head>

	<body class="c-public-form cognito-background" cz-shortcut-listen="true">
		<div id="c-forms-container" class="cognito c-safari c-lrg">
			<form method="post">
				<div class="c-forms-form" tabindex="0">
					<div class="c-forms-confirmation" style="display: block;">
						<div class="c-forms-heading">
							<div class="c-forms-form-title">
								<h2>Property Form</h2>
							</div>
						</div>
						<div class="c-forms-confirmation-message c-html"><span>Thank you for filling out the form. Your response has been recorded.</span></div>
						<div class="c-forms-confirmation-message">
							<!-- <div class="c-forms-document-links">
								<a class="c-forms-document-link" target="_blank" href="">
								<span class="ms-word-file-icon-32x32"></span>
								<span>HMF Property Sales Data Form - 13</span>
								</a>
							</div> -->
							<div class="c-choice-radiobuttons c-field c-col-13 c-sml-col-1 c-span-12 c-sml-span-12">
	                            <legend class="c-label  ">Merge Data into Documents</legend>
	                            <div class="c-helptext">Choose documents</div>
	                            <div class="c-editor c-columns-0"> <!-- c-columns-0 -->
		                            <div class="c-choice-option">
		                            	<label>
		                            		<input name="doc[]" type="radio" id="c-43-520" value="doc1">
		                            		<span>Doc1</span>
		                            	</label>
		                            </div>
		                            <div class="c-choice-option">
		                            	<label>
		                            		<input name="doc[]" type="radio" id="c-43-521" value="doc2">
		                            		<span>Doc2</span>
		                            	</label>
		                            </div>
		                            <div class="c-choice-option">
		                            	<label>
		                            		<input name="doc[]" type="radio" id="c-43-522" value="doc3">
		                            		<span>Doc3</span>
		                            	</label>
		                            </div>
		                            <div class="c-choice-option">
		                            	<label>
		                            		<input name="doc[]" type="radio" id="c-43-523" value="doc4">
		                            		<span>Doc4</span>
		                            	</label>
		                            </div>
		                        </div>
		                        <div class="c-validation"></div>
	                            
	                        </div>
							<div class="c-button-section">
			                    <div class="c-action">
			                    	<button type="submit" name="save_btn" class="c-page-nav save_btn c-button">Save</button>
			                    	<!-- <button type="button" class="c-page-nav c-page-next-page c-button">Next</button> -->
			                    </div>
			                </div>
							<?php

								echo "<pre>";print_r($_POST);echo "</pre>";
								echo "FILE: ".__FILE__." LINE: ".__LINE__;
								//die();
								$vendor = array();
								$buyer = array();
								$property = array();	
								
								foreach ($_POST as $key => $value) {

									$i=0;
									foreach ($value as $sub_key => $sub_value) {
										
										if(strpos($key, "v_") == 'false')
										{	
											$vendor[$i++][$key] = $sub_value;
										}
										if(strpos($key, "b_") == 'false')
										{	
											$buyer[$i++][$key] = $sub_value;
										} 
									}

									if(strpos($key, "p") == 'false')
									{	
										$property	=	$value;
									}
								}

								echo "<pre>";print_r($vendor);echo "</pre>";
								echo "FILE: ".__FILE__." LINE: ".__LINE__;

								echo "<pre>";print_r($buyer);echo "</pre>";
								echo "FILE: ".__FILE__." LINE: ".__LINE__;

								echo "<pre>";print_r($property);echo "</pre>";
								echo "FILE: ".__FILE__." LINE: ".__LINE__; 

								$sale_price = str_replace('  ', ' ', convertNumberToWord(1200)) ;
								echo "<pre>";print_r($sale_price);echo "</pre>";
								echo "FILE: ".__FILE__." LINE: ".__LINE__;

								if($_POST[doc]){


									// Include classes 
									include_once('open_tbs/tbs_class.php'); // Load the TinyButStrong template engine 
									include_once('open_tbs/tbs_plugin_opentbs.php'); // Load the OpenTBS plugin 

									// prevent from a PHP configuration problem when using mktime() and date() 
									if (version_compare(PHP_VERSION,'5.1.0')>=0) { 
									    if (ini_get('date.timezone')=='') { 
									        date_default_timezone_set('UTC'); 
									    } 
									} 

									// Initialize the TBS instance 
									$TBS = new clsTinyButStrong; // new instance of TBS 
									$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin 

									// ------------------------------ 
									// Prepare some data for the demo 
									// ------------------------------ 

									// Retrieve the user name to display 
									$yourname = (isset($_POST['v_first'][0])) ? $_POST['v_middle'][0] : ''; 
									$yourname = trim(''.$yourname); 
									if ($yourname=='') $yourname = "(no name)"; 

									// A recordset for merging tables 
									/*$data = array(); 
									$data[] = array('rank'=> 'A', 'firstname'=>$_POST['v_first'][0] , 'name'=>'Hill'      , 'number'=>'1523d', 'score'=>200, 'email_1'=>'sh@tbs.com',  'email_2'=>'sandra@tbs.com',  'email_3'=>'s.hill@tbs.com');
									$data[] = array('rank'=> 'A', 'firstname'=>'Roger'  , 'name'=>'Smith'     , 'number'=>'1234f', 'score'=>800, 'email_1'=>'rs@tbs.com',  'email_2'=>'robert@tbs.com',  'email_3'=>'r.smith@tbs.com' );
									$data[] = array('rank'=> 'B', 'firstname'=>'William', 'name'=>'Mac Dowell', 'number'=>'5491y', 'score'=>130, 'email_1'=>'wmc@tbs.com', 'email_2'=>'william@tbs.com', 'email_3'=>'w.m.dowell@tbs.com' );

									echo "<pre>";print_r($data);echo "</pre>";
									echo "FILE: ".__FILE__." LINE: ".__LINE__;
									die();*/

									// Other single data items 
									$x_num = 3152.456; 
									$x_pc = 0.2567; 
									$x_dt = mktime(13,0,0,2,15,2010); 
									$x_bt = true; 
									$x_bf = false; 
									$x_delete = 1; 

									// ----------------- 
									// Load the template 
									// ----------------- 

									$template = 'open_tbs/template.docx'; 
									//$template = 'open_tbs/demo_ms_word.docx'; 
									$TBS->LoadTemplate($template/*, OPENTBS_ALREADY_UTF8*/); // Also merge some [onload] automatic fields (depends of the type of document). 

									// ---------------------- 
									// Debug mode of the demo 
									// ---------------------- 
									if (isset($_POST['debug']) && ($_POST['debug']=='current')) $TBS->Plugin(OPENTBS_DEBUG_XML_CURRENT, true); // Display the intented XML of the current sub-file, and exit. 
									if (isset($_POST['debug']) && ($_POST['debug']=='info'))    $TBS->Plugin(OPENTBS_DEBUG_INFO, true); // Display information about the document, and exit. 
									if (isset($_POST['debug']) && ($_POST['debug']=='show'))    $TBS->Plugin(OPENTBS_DEBUG_XML_SHOW); // Tells TBS to display information when the document is merged. No exit. 

									// -------------------------------------------- 
									// Merging and other operations on the template 
									// -------------------------------------------- 

									// Merge data in the body of the document 
									$TBS->MergeBlock('a,b', $vendor); 

									// Merge data in colmuns 
									$data = array( 
									 array('date' => '2013-10-13', 'thin' => 156, 'heavy' => 128, 'total' => 284), 
									 array('date' => '2013-10-14', 'thin' => 233, 'heavy' =>  25, 'total' => 284), 
									 array('date' => '2013-10-15', 'thin' => 110, 'heavy' => 412, 'total' => 130), 
									 array('date' => '2013-10-16', 'thin' => 258, 'heavy' => 522, 'total' => 258), 
									); 
									$TBS->MergeBlock('c', $data); 


									// Change chart series 
									/*$ChartNameOrNum = 'a nice chart'; // Title of the shape that embeds the chart 
									$SeriesNameOrNum = 'Series 2'; 
									$NewValues = array( array('Category A','Category B','Category C','Category D'), array(3, 1.1, 4.0, 3.3) ); 
									$NewLegend = "Updated series 2"; 
									$TBS->PlugIn(OPENTBS_CHART, $ChartNameOrNum, $SeriesNameOrNum, $NewValues, $NewLegend); */

									// Delete comments 
									$TBS->PlugIn(OPENTBS_DELETE_COMMENTS); 

									// ----------------- 
									// Output the result 
									// ----------------- 
									$var = file_get_contents('counter.txt');
									$var++;
									file_put_contents('counter.txt', $var);

									if($var < 10)
										$var = "0".$var;

									// Define the name of the output file 
									$save_as	= 	'new1'.$var;
									$output_file_name = $vendor[0][v_last]."_".$buyer[0][b_last]."_".$var.".docx"; 
									if ($save_as==='') { 
									    // Output the result as a downloadable file (only streaming, no data saved in the server) 
									    $TBS->Show(OPENTBS_DOWNLOAD, $output_file_name); // Also merges all [onshow] automatic fields. 
									    // Be sure that no more output is done, otherwise the download file is corrupted with extra data. 
									    exit(); 
									} else { 
									    // Output the result as a file on the server. 
									    $TBS->Show(OPENTBS_FILE, $output_file_name); // Also merges all [onshow] automatic fields. 
									    // The script can continue. 
									    exit("File [$output_file_name] has been created."); 
									}
								} 
							?>
						</div>
					</div>
					
					<div class="c-footer-terms" >
						<!-- <ul class="terms">
							<li><a href="https://www.cognitoforms.com/reportabuse?form=https%3A%2F%2Fwww.cognitoforms.com%2FMarcusWilliams1%2FHMFPropertySalesDataForm" target="_blank">Report Abuse</a></li>
							<li><a href="https://www.cognitoforms.com/terms" target="_blank">Terms of Service</a></li>
						</ul> -->
					</div>
				</div>
			</form>

		</div>	

	</body>

</html>