<?php session_start(); ?>

<?php include "../../config/connection.php"; ?>
<?php include "../views/admin-head.php"; ?>
<?php include "../views/admin-nav.php"; ?>


<?php if(isset($_SESSION['korisnik'])&&($_SESSION['korisnik']->id_u==1)): ?>     

        <div id="page-wrapper">
            <?php if(isset($_GET['page'])){
            $page=$_GET['page'];
            switch($page){
                case 'insertProizvod':
                include "../views/admin-insert-proizvod.php";
                break;
                case 'insertKorisnik':
                include "../views/admin-insert-korisnik.php";
                break;
                case 'ulogaKorisnika':
                include "../views/admin-insert-korisnikUloga.php";
                break;
                case 'insertKategorija':
                include "../views/admin-insert-kategorija.php";
                break;
                case 'insertBrendProizvoda':
                include "../views/admin-insert-proizvodBrend.php";
                break;
                case 'korpa':
                include "../views/admin-korpa.php";
                break;
                default :
                include "../views/admin-insert-proizvod.php";
                break;
            }
        } else {
            include "../views/admin-insert-proizvod.php";
                }?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/jscript.js"></script>

</body>

</html>
<?php else: http_response_code(404); ?>
<?php endif;?>
