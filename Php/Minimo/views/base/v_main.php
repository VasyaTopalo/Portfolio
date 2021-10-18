<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>

    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Playfair+Display&display=swap" rel="stylesheet">

    <!--plugins css-->
    <link rel="stylesheet" href="<?=BASE_URL?>assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!--css-->
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/reset.css">
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/style.css">
</head>

<body>
<div class="content">
    <header>
        <div class="wrapper">
            <div class="header-content">
                <div class="header-logo">
                    <h1>minimø</h1>
                </div>
                <div class="header-menu">
                    <div class="desktop-menu">
                        <div class="menu-item"><a href="<?=BASE_URL?>">Home</a></div>
                        <div class="menu-item"><a href="<?=BASE_URL?>all/page/1">All&nbspposts</a></div>
                        <div class="menu-item"><a href="<?=BASE_URL?>category/all">Categories</a></div>
                        <div class="menu-item">
                            <?if ($user === null):?>
                                <a href="#" class="sign-up-link">Sign up</a> / <a href="#" class="sign-in-link">Sign in</a>
                            <?elseif ($user['admin_status']):?>
                                <a href="<?=BASE_URL?>adminpanel">admin panel</a> / <a href="<?=BASE_URL?>auth/logout">log out</a>
                            <?else:?>
                                <a href="<?=BASE_URL?>auth/logout">log out</a>
                            <?endif;?>
                        </div>
                    </div>
                    <div class="mobile-menu">
                        <div class="mobile-menu-button">
                            <div class="inner-button">
                                <div class="mobile-menu-button-line"></div>
                                <div class="mobile-menu-button-line"></div>
                                <div class="mobile-menu-button-line"></div>
                                <div class="mobile-menu-button-line"></div>
                            </div>
                        </div>
                        <div class="mobile-menu-content">
                            <div class="menu-item"><a href="<?=BASE_URL?>">Home</a></div>
                            <div class="menu-item"><a href="<?=BASE_URL?>all/page/1">All&nbspposts</a></div>
                            <div class="menu-item"><a href="<?=BASE_URL?>category/all">Categories</a></div>

                                <?if ($user === null):?>
                                    <div class="menu-item">
                                        <a href="#" class="sign-up-link">Sign up</a> / <a href="#" class="sign-in-link">Sign in</a>
                                    </div>
                                <?elseif ($user['admin_status']):?>
                                    <div class="menu-item">
                                        <a href="<?=BASE_URL?>adminpanel">admin panel</a>
                                    </div>
                                    <div class="menu-item">
                                        <a href="<?=BASE_URL?>auth/logout">log out</a>
                                    </div>
                                <?else:?>
                                    <div class="menu-item">
                                        <a href="<?=BASE_URL?>auth/logout">log out</a>
                                    </div>
                                <?endif;?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="modal" id="sign-in-modal">
            <div class="modal-content">
                <h2 class="modal-title">Sign in</h2>
                <form method="post">
                    <div class="modal-inputs">
                        <input type="text" name="auth_login" placeholder="Enter your login">
                        <input type="password" name="auth_password" placeholder="Enter your password">
                        <input type="checkbox" name="auth" style="display:none" checked="checked">
                        <div class="remember">
                            <input type="checkbox" class="form-check-input" id="login-remember" name="remember">
                            <label for="login-remember" class="form-check-label">
                                Remember me
                            </label>
                        </div>

                    </div>
                    <button type="submit"><img src="<?=BASE_URL?>assets/images/send-icon.png" alt=""></button>
                    <?if($authErr):?>
                        <div class="modal-error">
                            Invalid login or password
                        </div>
                    <?endif;?>
                </form>
                <div class="close-modal">
                    <div class="close-modal-inner">
                        <div class="close-modal-line"></div>
                        <div class="close-modal-line"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="sign-up-modal">
            <div class="modal-content">
                <h2 class="modal-title">Sign up</h2>
                <form method="post">
                    <div class="modal-inputs">
                        <input type="text" name="reg_login" placeholder="Enter your login">
                        <input type="password" name="reg_password" placeholder="Enter your password">
                        <input type="password" name="confirm_password" placeholder="Confirm your password">
                        <input type="checkbox" name="register" style="display:none" checked="checked">
                    </div>
                    <button type="submit"><img src="<?=BASE_URL?>assets/images/send-icon.png" alt=""></button>
                    <?if($registerErr):?>
                        <div class="modal-error">
                            <?foreach ($validateErrors as $error):?>
                                <p><?=$error?></p>
                            <?endforeach;?>
                        </div>
                    <?endif;?>
                </form>
                <div class="close-modal">
                    <div class="close-modal-inner">
                        <div class="close-modal-line"></div>
                        <div class="close-modal-line"></div>
                    </div>
                </div>
            </div>
        </div>

        <?=$content?>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-info">
                <a href="#">Terms and conditions</a>
                <a href="#">Privacy</a>
            </div>
            <div class="social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>
</div>

<!--plugins js-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>

<!--js-->
<script src="<?=BASE_URL?>assets/js/script.js"></script>

</body>

</html>