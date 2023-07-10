<footer class="bg-dark   text-light"><br><br>
    <div class="container">
        <div class="row">
            <div class="f-items">
                <div class="col-md-3  ">
                    <div class="f-item text-center">
                        <img src="assets/img/logos.png" alt="Logo" style="width:140px;">
                        <h4>


                            <b>"Education is the most powerful weapon which you can use to change the world"</b>

                            <br><br>
                            Nelson Mandela
                        </h4>


                    </div>
                </div>
                <div class="col-md-1  "></div>
                <div class="col-md-2 col-sm-6 item"><br>
                    <div class="f-item link">
                        <h4>STUDY LINKS</h4>
                         <ul><?php
                            $q = mysqli_query($con, "SELECT * FROM `main_courses` order by `id` asc limit 5 ");
                            while ($rr = mysqli_fetch_array($q)) {
                                echo '
                                <li>
                                    	<a href="sub-courses.php?id=' . $rr['id'] . '"  >
											  ' . $rr['name'] . '
											</a>
                                </li>
                                ';
                            }
                            ?>
                        </ul>
                    </div>

                </div>
                <div class="col-md-3 col-sm-6 item"><br>
                    <div class="f-item link">
                        <h4>Study links</h4>
                        <ul><?php
                            $q = mysqli_query($con, "SELECT * FROM `main_courses` order by `id` desc limit 3 ");
                            while ($rr = mysqli_fetch_array($q)) {
                                echo '
                                <li>
                                    	<a href="sub-courses.php?id=' . $rr['id'] . '"  >
											  ' . $rr['name'] . '
											</a>
                                </li>
                                ';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 item">
                    <div class="f-item address"><br>
                        <h4>Address</h4>
                        <ul>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <p> <span><a href="mailto:<?= $emailid ?>"><?= $emailid ?></a></span></p>
                            </li>
                            <li class="row">
                                <i class="fas fa-map"></i>
                                <p>H.no 1 Tagore Nagar phase 1 khajuri kalan road PIPLANI BHOPAL</span></p>
                            </li>
                        </ul>
                        <div class="opening-info">
                            <h4>Social Links</h4>
                            <div class="social">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/people/C-Cube-Coaching-Classes/pfbid0zqRULoT2ZxwDLAdTw53HZ2NayrXQCKtuxJ3n5t4gsBS38wqjK9icbaL3sgxU2K7Hl/?mibextid=ZbWKwL"  target="_blank"><i class="fab fa-facebook-f" target="_blank"></i></a>
                                    </li>
                                   
                                   
                                    <li class="instagram">
                                        <a href="https://instagram.com/ccubecoachingclasses?igshid=ZDdkNTZiNTM=" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </li>
                                   

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom" style="margin-top:10px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <p>&copy; Copyright <?= date("Y") ?>. All Rights Reserved by <a href="#">C cube Coaching Classes</a></p>
                    </div>
                    <div class="col-md-6 text-right link">
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>

                            <li><a href="terms-and-condition.php">Terms and condition</a></li>
                            <li><a href="refund-policy.php">Refund policy</a></li>
                            <li><a href="privacy-policy.php">Privacy policy</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>

<script>
    function onSubmitbar(token) {
        document.getElementById("login-form").submit();
    }

    function onSubmitbarreg(token) {
        document.getElementById("register-form").submit();
    }
</script>