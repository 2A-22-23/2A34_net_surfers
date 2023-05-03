<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENT VIEW</title>
    <link rel="stylesheet" href="./index.css" />

</head>

<body>
    
    <div class="wrapper">
        <div class="cl-info">
            <div class ="logo">     </div>
            <h2 id="cname" style="flex:1">HELLO, CLIENT</h2>
            <button onclick="AddWidgetToggle()">Add new reclamation</button>
            <button onclick="open_blc()">list blocked</button>
        </div>
       
        <div class="recList-wrapper">
            <div class="recList-title">
                <h4>RECLAMATION LIST</h4>
                <input type="text" placeholder="search" id="search">
                <select id="filters">
                    <option value="">sort by:</option>
                    <option value="dc">Date ASC</option>
                    <option value="dd">Date DESC</option>
                    <option value="az">client name ASC</option>
                    <option value="za">client name DESC</option>
                </select>
            </div>
            <div id="recList">

            </div>
        </div>

    </div>

    <div id="AddNewRec">
        <div class="anr-content">
            <button class="cls" onclick="AddWidgetToggle()">X</button>
            <form id="AddForm" method="post">
                <h2>ADD NEW RECLAMATION</h2>
                <br>
                <input type="text" name="client" placeholder="client">
                <input type="text" name="subject" placeholder="subject">
                <textarea name="content" placeholder="content" cols="30" rows="10"></textarea>
                <button>CREATE</button>

            </form>
        </div>
    </div>
    <div id="updateRec">
        <div class="anr-content">
            <button class="cls" onclick="UpWidgetToggle()">X</button>
            <form id="UpdateForm" method="post">
                <h2>UPDATE RECLAMATION</h2>
                <br>
                <input type="text" id="uprc_ID" name="id" hidden>
                <input type="text" id="uprc_client" name="client" placeholder="client">
                <input type="text" id="uprc_subject" name="subject" placeholder="subject">
                <textarea id="uprc_content" name="content" placeholder="content" cols="30" rows="10"></textarea>
                <button>UPDATE</button>

            </form>
        </div>
    </div>
    
</body>
<script src="./index.js"> </script>

</html>


   