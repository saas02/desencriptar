<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .rTable {
                display: block;
                width: 100%; 
            } 
            .rTableHeading, 
            .rTableBody, 
            .rTableFoot, 
            .rTableRow{   	
                clear: both; 
            } 
            .rTableHead, 
            .rTableFoot{   	
                background-color: #DDD;   	
                font-weight: bold; 
            } 
            .rTableCell, 
            .rTableHead {   	
                border: 1px solid #999999;   	
                float: left;   	
                height: 20px;   	
                overflow: hidden;   	
                padding: 3px 1.8%;   	
                width: 11%; 
            } 
            .rTable:after {   	
                visibility: hidden;   	
                display: block;   	
                font-size: 0;   	
                content: " ";   	
                clear: both;   	
                height: 0; 
            }
        </style>
    </head>
    <body>
        <form id='encription' name='encription' action='index.php' method='POST'>
            <div class="rTable">
                <div class="rTableRow">
                    
                </div>    
            </div>             
            <h2>Desencriptar</h2> 
            <div class="rTable">                                
                <div class="rTableRow"> 
                    <div class="rTableHead">Request </div>
                    <div class="rTableHead"><input type='input' name='request'></div>                                                                                                
                </div>
				<div class="rTableRow"> 
                    <div class="rTableHead">Response </div>                                                               
                    <div class="rTableHead"><input type='input' name='response'></div>                                                                   
                </div> 
                <div class="rTableRow"> 
                    <div class="rTableHead">PublicKey </div>
                    <div class="rTableHead"><input type='input' name='publickey'></div>                                                                                                
                </div>
                <div class="rTableRow">
                    <div class="rTableHead">
                        <input type='submit' name='desencriptar' value='Desencriptar'>
                    </div>
                </div> 
            </div>    
        </form>
        
        
        <?php            
            require_once 'classEncription.php';
                $encription = new EncoderData();        

                @$payResponse    = $_POST['response'];
                @$payRequest     = $_POST['request'];
                @$publicKey      = $_POST['publickey'];
                
                if (isset($payResponse)){
                    $response = json_decode($encription->Decode($payResponse, $publicKey));
                    echo "-*-*-*-*-*-*- RESPONSE -*-*-*-*-*-*-*-*-<br>";
                    echo "<pre>";
                    print_r($response);
                    echo "<pre>";
                }                
                echo "<br>******************************************************************************************<br>";
                if (isset($payRequest)){
                    echo "-*-*-*-*-*-*- REQUEST -*-*-*-*-*-*-*-*-<br>";
                    $request = json_decode($encription->Decode($payRequest, $publicKey));
                    echo "<pre>";
                    print_r($request);                    
                    echo "<pre>";                    
                }

                
                
            
        ?>
    </body>
</html>
