<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}


if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];

    $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');

    $stmt = $pdo->query('SELECT * FROM users WHERE id = ' . $userId);
    $user = $stmt->fetch();

}else{
    header('/Location:/login');
}
?>





<div id="profile-edit-area">
    <form action="" method="post">
        <div id="profile-edit-save">
            <button id="editSave" type="submit">Сохранить профиль</button>
        </div>

        <div id="edit-area-left">
            <table>
                <tbody>
<!--                <tr>-->
<!--                    <td class="edit-title">Логин:</td>-->
<!--                    <td><input type="text" class="profileInputBox"/></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="edit-title">Фамилия:</td>-->
<!--                    <td><input type="text" class="profileInputBox"/></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="edit-title">Отчество:</td>-->
<!--                    <td><input type="text" class="profileInputBox"/></td>-->
<!--                </tr>-->
                <tr>
                    <td class="edit-title">Имя:</td>
                    <td><input type="text" class="profileInputBox" name="name" value="<?php echo $user['name']  ?>"/></td>
                </tr>

                <tr>
                    <td class="edit-title">E-mail:</td>
                    <td><input type="text" class="profileInputBox" name="email" value="<?php echo $user['email']  ?>"/></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div id="edit-area-right">
            <table>
                <tbody>

<!--                <td class="edit-title">Телефон:</td>-->
<!--                <td><input type="text" class="profileInputBox"/></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="edit-title">О себе:</td>-->
<!--                    <td><textarea class="profileInputBox"></textarea></td>-->
<!--                </tr>-->
                </tbody>
            </table>
        </div>
    </form>
</div>

<style>
    @import url('https://fonts.googleapis.com/css?family=Ubuntu:500&subset=latin,cyrillic');

body {
padding: 0;
margin: 0;
font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;
font-size: 100%;
line-height: 1.45;
color: #333;
}

a {
text-decoration: none;
color: #111;
}

p {
text-indent: 20px;
text-align: justify;
}

.button {
width: 150px;
height: 25px;
margin: 5px 0 5px 0;
color: #fff;
background: rgba(71, 73, 77, 1);
border: none;
font-size: 14px;
outline: none;
border-radius: 5px;
}

.button:hover {
background: rgba(71, 73, 77, 0.8);
}

.button:active {
margin: 6px inherit 4px inherit;
background: rgba(71, 73, 77, 0.8);
}

/*--- /GENERAL ---*/

#profile-edit-save {
box-sizing:border-box;
width:800px;
margin:0 auto;
padding:10px;
border-bottom:1px solid rgba(84,183,222,0.5);
background-color:rgba(84,183,222,0.3);
}

#editSave {
display:block;
margin: 0 auto;
border:none;
border-radius:5px;
padding:10px 20px;
background-color:#2699c7;
color:#fff;
font-size:14px;
outline: none;
}

#profile-edit-area {
width:800px;
margin: 0 auto;
}

#edit-area-left, #edit-area-right {
box-sizing:border-box;
}

#edit-area-left {
width:400px;
morgin:0;
float:left;
}

#edit-area-right {
width:400px;
margin-left:400px;
}
#profile-edit-area {
margin: 50px auto 10px;
}

#profile-edit-area table {
margin: 0 auto 10px;
vertical-align:top;
}

#profile-edit-area table tr {
vertical-align:top;
}

.edit-title {
padding-top:15px;
}

.profileInputBox {
width:200px;
height:auto;
margin:10px;
padding:10px;
border:none;
border-radius:10px;
box-shadow: 0 0 5px rgba(0,0,0,0.5);
background-color:rgb(255, 255, 255);
font-size:16px;
color:rgb(63, 63, 63);
outline: none;
}

#edit-area-right textarea {
height:200px;
resize:none;
}