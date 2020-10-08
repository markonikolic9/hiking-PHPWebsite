<div class="main">
        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Napravite nalog</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="tbIme" id="tbIme" placeholder="Ime"/>
						</div>
						<div class="form-group">
                            <input type="text" class="form-input" name="tbPrezime" id="tbPrezime" placeholder="Prezime"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="tbEmail" id="tbEmail" placeholder="Email"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="tbPassword" id="tbPassword" placeholder="Šifra(najmanje 6 karaktera, obavezan broj)"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="button" name="btnPosalji" id="btnPosalji" class="form-submit" value="Registruj se"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Imate nalog? <a href="index.php?page=logovanje" class="loginhere-link">Ulogujte se ovde</a>
                    </p>
                </div>
            </div>
        </section>
	</div>
</div>