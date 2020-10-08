<div class="main">
        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                <?php
                    if(isset($_SESSION['korisnik'])){

                        echo "<p>Vec ste logovani.<a href='index.php'>Pocetna</a></p>";

                    } else { ?>
                        <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Prijavi se</h2>
                        <div class="form-group">
                            <input type="email" class="form-input" name="tbEmail" id="tbEmail" placeholder="Email"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="tbPassword" id="tbPassword" placeholder="Sifra"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="button" name="btnLog" id="btnLog" class="form-submit" value="Ulogujte se"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Niste se registrovali?  <a href="index.php?page=registracija" class="loginhere-link">Registrujte se ovde</a>
                    </p>
                  <?php  
                  }
                    ?>
                </div>
            </div>
        </section>
	</div>
</div>