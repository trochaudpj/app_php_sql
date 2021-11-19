<?php

    function getFullQtt(): int
    {
        if(isset($_SESSION['products']) && !empty($_SESSION['products'])){
            return array_reduce($_SESSION["products"], function($acc, $prod){
                return $acc + $prod["qtt"];
            }, 0);
        }
        else return 0;
    }

    function getMessage(): void
    {
        if(isset($_SESSION["message"])){
            ?><div class="alert alert-warning alert-dismissible fade show" role='<?= $_SESSION["message"]['type'] ?>'>
                
                    <?= $_SESSION["message"]['msg'] ?> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
                unset($_SESSION["message"]);
        }
    }

    function setMessage(string $type, string $msg): void
    {
        $_SESSION['message'] = ["type" => $type, 'msg' => $msg];
    }

    function redirect($url): void
    {
        header("Location:".$url);
        die;
    }