<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./index.css">
</head>

<body>
    <a class="backLink" href="http://localhost/REC_APP/View">BACK</a>
    <div class="card">
        <h2 id="client_name"></h2>
        <h5 id="created_at"></h5>
        <h4 id="subject"></h4>
        <p id="content"></p>
    </div>

    <div class="reponse">
        <div class="cl-info">
        <h4>REPONSE : <span id="rpCount"></span> </h4>
        <div class="recList-title">
        <button onclick="AddWidgetToggle()">ADD REPONSE</button>
        <input type="text" placeholder="search" id="search">
        </div>
        <select id="filters">
            <option value="">sort by:</option>
            <option value="dc">Date ASC</option>
            <option value="dd">Date DESC</option>
            <option value="az">client name ASC</option>
            <option value="za">client name DESC</option>
        </select>
        </div>
        
        <div id="repList">

        </div>
    </div>
    <div id="AddNewRec">
        <div class="anr-content">
            <button class="cls" onclick="AddWidgetToggle()">X</button>
            <form id="AddForm" method="post">
                <h2>ADD REPONSE</h2>
                <br>
                <input type="text" name="rec_id" hidden>
                <input type="text" name="admin" placeholder="admin">
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
                <input type="text" id="rec_id" name="rec_id" hidden>
                <input type="text" id="uprc_admin" name="admin" placeholder="client">
                <textarea id="uprc_content" name="content" placeholder="content" cols="30" rows="10"></textarea>
                <button>UPDATE</button>

            </form>
        </div>
    </div>
</body>
<script src="./reponse.js"></script>

</html>