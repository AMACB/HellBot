<!DOCTYPE html>
<html lang=en>
<head>
    <link rel="stylesheet" type="text/css" href="/css/root.css">
    <link rel="stylesheet" type="text/css" href="/css/nav.css">
    <link rel="icon" href="/img/favicon.ico">
    <link rel="apple-touch-icon" href="/img/favicon.jpg">
    <link rel="apple-touch-icon-precomposed" href="/img/favicon.jpg">
    <link rel="apple-touch-startup-image" href="/img/load.jpg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<header>
    <?php
    include '/utils/.nav.php'
    ?>
</header>
<body>
<div id="level-list">
    <table>
        <tbody>
        <tr>
            <td>Username</td>
            <td>10XP</td>
            <td>50XP</td>
            <td>#10</td>
        </tr>
        <tr>
            <td>Username</td>
            <td>5XP</td>
            <td>50XP</td>
            <td>#11</td>
        </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">

    xp = function(lvl){
        if(lvl == 1){
            return 0;
        }
        return 50 + 5 * (lvl-2) + xp(lvl-1)
    }

    users = {};
    $.getJSON("conf/levels.json", function(json){
        keys = Object.keys(json);
        for(i = 0; i < keys.length; i++){
            users[i] = {};
            users[i]['id'] = keys[i];
            users[i]['xp'] = json[keys[i]]['xp'];
            users[i]['of'] = 50 + 5 * (json[keys[i]]['lvl'] - 1);
            users[i]['lvl'] = json[keys[i]]['lvl'];
            users[i]['total'] = users[i]['xp'] + xp(users[i]['lvl']);
            users[i]['name'] = json[keys[i]]['name'];
        }
        console.log(users);
    });

</script>
</body>
</html>