<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="/script/Login.js"></script>
    <link rel="stylesheet" href="Style/Login.css">
</head>

<body>

    <form action="" class="out-form">
        <div class="in-form">
            <h1 class="logo">For U</h1>

            <div class="inp-form">
                <div class="inp-email">
                    <h3>email</h3>
                    <input type="email" id="email" name="email">
                </div> <br>
                <div class="inp-password">
                    <h3>Password</h3>
                    <input type="password" id="password" name="password">
                </div>
            </div>

            <div class="forgot-regist">
                <a href="">Lupa Password</a>
                <a href="Registrasi.html">Daftar</a>
            </div>

            <div class="btn-login">
                <button type="submit">Login</button>
            </div>
        </div>
    </form>
</body>

</html>

body {
    margin: 0;
    padding: 0;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-weight: bold;
    background-image: url("/assets/Untitled.png");
    background-size: cover;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}


.out-form {
    background-image: url("/assets/Untitled\ \(1\).png");
    width: 605px;
    height: 658px;
}

.in-form {
    margin: 5rem auto;
    width: 21.1rem;
}

.in-form .logo {
    text-align: center;
    margin-top: 2rem;
    margin-bottom: 2rem;
}


.inp-form {
    text-align: center;
}

.inp-email {
    margin: auto;
}

.inp-email h3 {
    margin: 0;
    text-align: start;
}

.inp-email input {
    padding: 1em 5rem;
    border: 8px solid black;
}

.inp-password {
    margin: auto;
}

.inp-password h3 {
    margin: 0;
    text-align: start;
}

.inp-password input {
    padding: 1em 5rem;
    border: 8px solid black;
}

.forgot-regist {
    display: flex;
    justify-content: space-between;
    margin: 0 2px 0 2px;
}

.forgot-regist a {
    color: black;
    transition: 0.3s ease-in-out;
    font-weight: 500;
}

.forgot-regist a:hover {
    color: gray;
}

.btn-login {
    text-align: center;
    margin: 5.8rem auto;
}

.btn-login button{
    text-decoration: none;
    color: white;
    background-color: black;
    padding: 13px 2rem;
    font-size: 21px;
    transition: 0.4s ease-in-out;
    font-weight: bold;
}

.btn-login button:hover {
    box-shadow: 5px 6px 4.5px 1px gray ;
    cursor: pointer;
}

document.addEventListener("DOMContentLoaded", (event)=> {
    let form = document.forms[0]
    form.addEventListener("submit", (evt)=> {
        evt.preventDefault()
        let datanya = new FormData(form)
        // console.log([...datanya.entries()])
        datanya.forEach((val,key)=> {
            // console.log(key+" = "+val)
            if(val == '' || val == 0) {
                alert(key + 'tidak boleh kosooooooooong')
                form[key].style.backgroundColor="red"
            }
            
        })
    })
})









































/* .in-form .logo {
    margin-top: 2rem;
    margin-bottom: 2rem;
}

.in-form ul {
    list-style-type: none;
    padding: 0;
}

.in-form input {
    padding: 1em 3em;
    border: 2.7px solid black;
}

.in-form .inp-email {
    margin-bottom: 2rem;
}

.in-form .btn-lupapassword {
    padding-top: 5px;
    padding-right: 6px;
    text-align: end;
    font-size: 13px;
    margin-bottom: 3.5rem;
}

.in-form .btn-lupapassword a {
    color: black;
    transition: 0.2s ease-in-out;
}

.in-form .btn-lupapassword a:hover {
    color:rgb(143, 137, 137);
}

.in-form .btn-submit-login a {
    border: 1px solid black;
    padding: 0.8rem 1rem 0.8rem 1rem;
    text-decoration: none;
    background-color: black;
    color: white;
    transition: 0.4s ease-in-out;
}

.in-form .btn-submit-login a:hover {
    box-shadow: 5px 6px 4.5px 1px rgb(143, 137, 137);
}

.in-form .btn-registrasi {
    margin-top: 3rem;
    margin-bottom: 2.5rem;
    font-size: 13px;
}

.in-form .btn-registrasi a {
    color: black;
    transition: 0.2s ease-in-out
}

.in-form .btn-registrasi a:hover {
    color: rgb(143, 137, 137);
}  */