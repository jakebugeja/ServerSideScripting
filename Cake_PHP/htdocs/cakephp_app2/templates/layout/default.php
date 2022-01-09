<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="container">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?=$this->Url->build("/")?>">Home</a>
                                                                     <!-- Url->build("/"), go to base class-->
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?=$this->Url->build("/users")?>">Users</a>                
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?=$this->Url->build("/towns")?>">Towns</a>                
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?=$this->Url->build("/pages/about")?>">About</a>                
            </li>
            <?php if(isset($loggedInUser)){?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=$this->Url->build("/users/logout")?>">Log Out</a>                
                </li>
            <?php } else{ ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=$this->Url->build("/users/login")?>">Log In</a>                
                </li>
            <?php } ?>
        </ul>
        
        <?php
        if (isset($loggedInUser)){
            echo "You are logged in as: ".$loggedInUser->first_name;
                                    //$loggedInUser is defined in AppController
        }else{
            echo "You are not logged in";
        }
        ?>
        <hr>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    
        <footer class="text-center text-muted">
            <hr>
            <p>My CakePHP App - Jake Bugeja</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
