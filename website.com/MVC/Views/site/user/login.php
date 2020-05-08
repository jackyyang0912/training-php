
<div class="section section-padding">
            <div class="container">
                <div class="row mbn-40 mr-auto ">

                    <!-- Login Form Start -->
                    <div class="col-lg-4 col-md-6 col-12 mr-auto mb-40" style="margin: 0px auto;">
                        <div class="login-register-form mr-auto">
                            <h3 class="mb-15 ">Đăng nhập</h3>
                            <?php
                                if(isset($this->errors) && !empty($this->errors)) { 
                            ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php
                                            foreach($this->errors as $vl) {
                                                echo '<li>'.$vl.'</li>';
                                            }
                                        ?>
                                    </ul>
                                </div>
                            <?php
                                }
                            ?>
                            <form action="#" method="POST">
                                <div class="row">
                                    <div class="col-12 mb-20">
                                        <input placeholder="Username" type="text" name="username">
                                    </div>

                                    <div class="col-12 mb-20">
                                        <input placeholder="Password" type="password" name="password">
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" name="submit" class="btn btn-round btn-lg" style="width: 100%;">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Login Form End -->

                    <!-- Register Form Start -->
                    <!-- <div class="col-lg-7 col-md-6 col-12 mb-40">
                        <div class="login-register-form">
                            <h3 class="mb-15">Register Form</h3>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6 col-12 mb-20">
                                        <input placeholder="Name" type="text">
                                    </div>

                                    <div class="col-lg-6 col-12 mb-20">
                                        <input placeholder="Enter your email" type="email">
                                    </div>

                                    <div class="col-lg-6 col-12 mb-20">
                                        <input placeholder="Password" type="password">
                                    </div>

                                    <div class="col-lg-6 col-12 mb-20">
                                        <input placeholder="Repeat Password" type="password">
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-round btn-lg">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> -->
                    <!-- Register Form End -->

                </div>
            </div>
        </div><!-- Login & Register Section End -->