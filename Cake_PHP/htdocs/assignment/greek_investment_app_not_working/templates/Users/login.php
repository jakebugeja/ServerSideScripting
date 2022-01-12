<script src="google.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--IF imports do not work <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-auth.js"></script>-->
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.2/firebase-app.js";
  import { } from 'firebase/auth';
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyDI9YPrbhnlz_vjrW0fdbl88Xag5sIw8uQ",
    authDomain: "greek-investment-app.firebaseapp.com",
    projectId: "greek-investment-app",
    storageBucket: "greek-investment-app.appspot.com",
    messagingSenderId: "881961358640",
    appId: "1:881961358640:web:fbbb7795798271c1c8a4f5"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  
  document.getElementById('googlebttn').addEventListener('click',GoogleLogin)
  //document.getElementById (FOR THE LOGOUT)

  function GoogleLogin(){
      alert("TTT");
  }
  
</script>

<script>
//jquery
</script>
<div class="users form">
    <h3>Login</h3>
    <button id="googlebttn">Login with Google</button>

    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('email', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Login')); ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link("Add User", ['action' => 'add']) ?>
</div>
