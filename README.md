<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bloom - Sign In & Register</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{
 min-height:100vh;display:flex;align-items:center;
 justify-content:center;padding:22px;
 font-family:Arial,sans-serif;color:#493b45;
 background:linear-gradient(135deg,#ffe2ec,#f7d9f1,#e9ddff)
}
.container{
 width:100%;max-width:420px;background:white;
 border-radius:24px;padding:32px 27px;
 box-shadow:0 18px 45px #693d5d29
}
.logo{
 width:58px;height:58px;margin:0 auto 13px;
 border-radius:18px;display:grid;place-items:center;
 background:#ffe5ef;color:#d65d8d;font-size:28px
}
h1{text-align:center;font-size:27px;margin-bottom:7px}
.subtitle{text-align:center;color:#95838e;font-size:13px;margin-bottom:25px}
.tabs{display:flex;padding:5px;background:#fff0f5;border-radius:12px;margin-bottom:23px}
.tab{flex:1;border:0;padding:11px;border-radius:9px;background:transparent;color:#9a7587;font-weight:bold}
.tab.active{background:#d96594;color:white}
.field{margin-bottom:15px}
label{display:block;font-size:13px;font-weight:bold;margin-bottom:7px}
input{width:100%;padding:13px 14px;border:1px solid #eadde4;border-radius:10px;outline:none;font-size:14px}
input:focus{border-color:#d96594;box-shadow:0 0 0 3px #d9659418}
.password-wrap{position:relative}
.password-wrap input{padding-right:72px}
.toggle{position:absolute;right:12px;top:50%;transform:translateY(-50%);border:0;background:none;color:#c45482;font-size:12px;font-weight:bold}
.main-btn{width:100%;border:0;border-radius:11px;padding:14px;margin-top:7px;color:white;background:linear-gradient(90deg,#d96594,#bc76c7);font-size:15px;font-weight:bold}
.message{min-height:18px;margin-top:13px;text-align:center;font-size:12px;line-height:1.5}
.success{color:#258453}
.error{color:#c43f55}
.switch-text{text-align:center;margin-top:20px;font-size:13px;color:#8e7b86}
.switch-text button{border:0;background:none;color:#c45482;font-weight:bold}
.note{text-align:center;margin-top:19px;font-size:10px;color:#aa9ba3;line-height:1.5}
.hidden{display:none}
.welcome{text-align:center}
.welcome p{color:#8e7b86;margin:12px 0 20px;font-size:14px;line-height:1.6}
.logout{background:#493b45}
button{cursor:pointer}
</style>
</head>
<body>
<main class="container">
<div class="logo">✿</div>
<h1 id="heading">Welcome Back!</h1>
<p class="subtitle" id="subtitle">Sign in to continue to your account</p>

<div class="tabs" id="tabs">
<button class="tab active" id="signTab" type="button">Sign In</button>
<button class="tab" id="registerTab" type="button">Register</button>
</div>

<form id="signForm">
<div class="field">
<label for="loginUser">Username or Email</label>
<input id="loginUser" type="text" placeholder="Enter your username or email" required>
</div>
<div class="field">
<label for="loginPass">Password</label>
<div class="password-wrap">
<input id="loginPass" type="password" placeholder="Enter your password" required>
<button class="toggle" type="button" data-target="loginPass">Show</button>
</div>
</div>
<button class="main-btn" type="submit">Sign In</button>
<p class="message" id="signMessage"></p>
<p class="switch-text">Don't have an account?
<button type="button" id="goRegister">Register here</button></p>
</form>

<form id="registerForm" class="hidden">
<div class="field">
<label for="fullName">Full Name</label>
<input id="fullName" type="text" placeholder="Enter your full name" required>
</div>
<div class="field">
<label for="email">Email Address</label>
<input id="email" type="email" placeholder="Enter your email" required>
</div>
<div class="field">
<label for="newUser">Username</label>
<input id="newUser" type="text" placeholder="Create a username" required>
</div>
<div class="field">
<label for="newPass">Password</label>
<div class="password-wrap">
<input id="newPass" type="password" placeholder="Create a password" required>
<button class="toggle" type="button" data-target="newPass">Show</button>
</div>
</div>
<div class="field">
<label for="confirmPass">Confirm Password</label>
<div class="password-wrap">
<input id="confirmPass" type="password" placeholder="Re-enter your password" required>
<button class="toggle" type="button" data-target="confirmPass">Show</button>
</div>
</div>
<button class="main-btn" type="submit">Create Account</button>
<p class="message" id="registerMessage"></p>
<p class="switch-text">Already have an account?
<button type="button" id="goSign">Sign in here</button></p>
</form>

<section id="welcomeScreen" class="welcome hidden">
<h1>Hello, <span id="welcomeName"></span>!</h1>
<p>You have successfully signed in to your account. Welcome to Bloom!</p>
<button class="main-btn logout" id="logoutBtn" type="button">Log Out</button>
</section>
<p class="note">Demo project • Account details are saved in this browser only.</p>
</main>

<script>
const signForm=document.getElementById('signForm');
const registerForm=document.getElementById('registerForm');
const tabs=document.getElementById('tabs');
const welcomeScreen=document.getElementById('welcomeScreen');
const heading=document.getElementById('heading');
const subtitle=document.getElementById('subtitle');

function showPage(page){
 signForm.classList.toggle('hidden',page!=='sign');
 registerForm.classList.toggle('hidden',page!=='register');
 welcomeScreen.classList.add('hidden');
 tabs.classList.remove('hidden');
 heading.textContent=page==='sign'?'Welcome Back!':'Create Account';
 subtitle.textContent=page==='sign'?'Sign in to continue to your account':'Register to get started with us';
 document.getElementById('signTab').classList.toggle('active',page==='sign');
 document.getElementById('registerTab').classList.toggle('active',page==='register');
 document.getElementById('signMessage').textContent='';
 document.getElementById('registerMessage').textContent='';
}

document.getElementById('signTab').onclick=()=>showPage('sign');
document.getElementById('registerTab').onclick=()=>showPage('register');
document.getElementById('goRegister').onclick=()=>showPage('register');
document.getElementById('goSign').onclick=()=>showPage('sign');

document.querySelectorAll('.toggle').forEach(button=>button.onclick=()=>{
 const input=document.getElementById(button.dataset.target);
 const visible=input.type==='password';
 input.type=visible?'text':'password';
 button.textContent=visible?'Hide':'Show';
});

function getUsers(){
 try{return JSON.parse(localStorage.getItem('bloomUsers'))||[]}
 catch{return []}
}

registerForm.onsubmit=event=>{
 event.preventDefault();
 const fullName=document.getElementById('fullName').value.trim();
 const email=document.getElementById('email').value.trim().toLowerCase();
 const username=document.getElementById('newUser').value.trim();
 const password=document.getElementById('newPass').value;
 const confirm=document.getElementById('confirmPass').value;
 const message=document.getElementById('registerMessage');
 message.className='message error';

 if(username.length<3){message.textContent='Username must be at least 3 characters.';return}
 if(password.length<6){message.textContent='Password must be at least 6 characters.';return}
 if(password!==confirm){message.textContent='Passwords do not match.';return}

 const users=getUsers();
 if(users.some(user=>user.username.toLowerCase()===username.toLowerCase()||user.email===email)){
  message.textContent='Username or email is already registered.';
  return;
 }

 users.push({fullName,email,username,password});
 try{
  localStorage.setItem('bloomUsers',JSON.stringify(users));
  message.className='message success';
  message.textContent='Account created! You can now sign in.';
  registerForm.reset();
  setTimeout(()=>showPage('sign'),1200);
 }catch{
  message.textContent='Unable to save account in this browser.';
 }
};

signForm.onsubmit=event=>{
 event.preventDefault();
 const login=document.getElementById('loginUser').value.trim().toLowerCase();
 const password=document.getElementById('loginPass').value;
 const user=getUsers().find(item=>
  (item.username.toLowerCase()===login||item.email===login)&&item.password===password
 );
 const message=document.getElementById('signMessage');

 if(!user){
  message.className='message error';
  message.textContent='Account not found or incorrect password.';
  return;
 }

 signForm.classList.add('hidden');
 registerForm.classList.add('hidden');
 tabs.classList.add('hidden');
 heading.textContent='You are signed in!';
 subtitle.textContent='Your account is ready';
 document.getElementById('welcomeName').textContent=user.fullName;
 welcomeScreen.classList.remove('hidden');
};

document.getElementById('logoutBtn').onclick=()=>{
 signForm.reset();
 showPage('sign');
};
</script>
</body>
</html>
