<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SSRF</title>
</head>
<body>
    <div class="container">
        <div class="top">
            <p>Quadirect - SSRF</p>
        </div>
        <form action="noredirect.php" method="GET">
        <div class="form">
            <div class="user">
                <input type="text" id="url"  name="url" required>
                <label for="url">URL</label>
            </div>
            <div class="button">
                <button class="btn">Exploit</button>
            </div>
        </div>
		
		<div class="author">
            <p>Developed by Qualwin</p>
        

    </div>
    </form>
</body>
</html>