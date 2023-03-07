<?php
session_start();
if(isset($_SESSION['user_id'])) {
}
?>

<!DOCTYPE Html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Community</title>
        <link rel="stylesheet" href="../assess/vendors/aos/aos.css" />
        <link rel="icon" type="access/png" href="../assess/favicon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../style/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../style/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
         <?php

        include('../include/logout.php');
        include('../include/count_users.php');
        include('../include/active_status.php');

        ?>
    </head>
    <body>
        <header class="header fixed-top">
            <div class="max_width">
                <nav class="nav-bar-tmh">
                    <a href="../index.php">
                        <div class="nav-bar-tmh-logpc">
                            <!--<p><a href="index.html">THE MOTHER’S <span>HAVEN</span></a></p>-->
                        </div>
                    </a>
                    <div class="nav-bar-tmh-links">
                        <ul>
                            <li><a href="../index.php">Home</a></li>
                            <li><a href="../index.php">About Us</a></li>
                            <li><a href="../blog/blog.php">Blog</a></li>
                            <li><a href="../user/login.php">Community</a></li>
                            <li><a href="../index.php">Contact Us</a></li>
                        </ul>
                    </div>
                    <p class="nav-bar-tmh-links-signup"><a href="../user/signup.php">Sign Up</a></p>
                </nav>
            </div>
        </header>
        <!--Header ends here-->
       <section class="communitySection" style="margin-top: 100px; background: #FCFCFC;">
        <div class="max_width">
            <!--Search section starts here-->
            <form class="community-form-input" action="" method="post">
                <p>
                    <input type="search" name="search" placeholder="Search">
                    <span class="search-icon">
                        <i class="fa fa-search icon-search-community" aria-hidden="true"></i>
                    </span>
                    <button class="lettalk-button" type="submit" name="search" value="Search">Let’s talk</button>
                </p>
            </form>
            <!--Search section ends here-->
            <!---community profile news starts here-->
            <div class="community-profile-news">
                <!--Community profile new flex starts here-->
                <div class="community-profile-news-flex">
                    <!--community profile news userprofile starts here-->
                    <div class="community-profile-news-userprofile">
                        <div class="community-profile-news-userprofile-section">
                            <img src=""><span><?php if ($is_online) {
                                echo "Active";
                            } ?></span>
                        </div>
                        <p class="community-user-name-profile"><?php echo $_SESSION['name']; ?></p>
                        <p class="community-profile-text-link">
                            <img src="../assess/profile.svg">
                            <a href="../user/profile.php" class="community-profile-text-link-list">View profile</a>
                        </p>
                        <p class="community-profile-text-link">
                            <img src="../assess/notification.svg">
                            <a href="" class="community-profile-text-link-list">Notifications</a>
                        </p>
                        <p class="community-profile-text-link">
                            <img src="../assess/question.svg">
                            <a href="../community/community.php" class="community-profile-text-link-list">All questions</a>
                        </p>
                        <p class="community-profile-text-link">
                            <img src="../assess/answer.svg">
                            <a href="../blog/post.php" class="community-profile-text-link-list">Answered</a>
                        </p>
                        <p class="community-profile-text-link">
                            <img src="../assess/unsolve.svg">
                            <a href="" class="community-profile-text-link-list">Unsolved</a>
                        </p>
                        <p class="community-profile-text-link">
                            <img src="../assess/solve.svg">
                            <a href="" class="community-profile-text-link-list">Solved</a>
                        </p>
                        <p class="community-profile-text-link">
                            <img src="../assess/setting.svg">
                            <a href="" class="community-profile-text-link-list">Settings</a>
                        </p>
                        <form class="log-out-form" action="" method="post">
                            <button type="submit" name="logout" value="Logout">
                                <img src="../assess/logout.svg">
                                <span>Log out</span>
                            </button>
                        </form>
                    </div>
                    <!--community profile news userprofile ends here-->
                    <div class="community-profile-news-filters" id="community-profile-news-filters">
                        <ul id="community-filter" class="community-filters-section">
                            <li data-filter="*" class="active">All questions</li>
                            <li data-filter="Latest">Latest</li>
                            <li data-filter="Popular">Popular</li>
                        </ul>
                        <div class="community-filters-section-array" id="community-filters-section-array">
                            <div class="community-filters-section-list" data-filter="Popular">
                                <div class="community-filters-section-list-profile">
                                    <img class="community-filters-section-list-profile-img" src="">
                                    <div class="community-filters-section-list-profile-flex">
                                        <p class="community-filters-section-list-profile-name">Emily Temi</p>
                                        <p class="community-filters-section-list-profile-time">3 mins ago</p>
                                    </div>
                                </div>
                                <p class="community-filters-section-list-comment">Hi there! I'm a new mom and I'm curious 
                                    about what type of activities I should be doing with my baby. Are there any tips 
                                    for encouraging healthy development?
                                </p>
                                <div class="community-filters-section-list-links">
                                    <a href="#">Replies</a>
                                    <a href="#">Share</a>
                                    <a href="#">Report</a>
                                </div>
                            </div>
                            <div class="community-filters-section-list" data-filter="Latest">
                                <div class="community-filters-section-list-profile">
                                    <img class="community-filters-section-list-profile-img" src="">
                                    <div class="community-filters-section-list-profile-flex">
                                        <p class="community-filters-section-list-profile-name">Zoe Lola</p>
                                        <p class="community-filters-section-list-profile-time">1 hr ago</p>
                                    </div>
                                </div>
                                <p class="community-filters-section-list-comment">Hi there! I'm a parent and I'm trying to 
                                    figure out the best way to care for my baby. I'm wondering when is the best 
                                    time to start introducing solid foods?
                                </p>
                                <div class="community-filters-section-list-links">
                                    <a href="#">Replies</a>
                                    <a href="#">Share</a>
                                    <a href="#">Report</a>
                                </div>
                            </div>
                            <div class="community-filters-section-list" data-filter="Latest">
                                <div class="community-filters-section-list-profile">
                                    <img class="community-filters-section-list-profile-img" src="">
                                    <div class="community-filters-section-list-profile-flex">
                                        <p class="community-filters-section-list-profile-name">Clara Ade</p>
                                        <p class="community-filters-section-list-profile-time">2 hrs ago</p>
                                    </div>
                                </div>
                                <p class="community-filters-section-list-comment">Hi there! I'm a parent and I'm trying to 
                                    figure out the best way to care for my baby. I'm wondering when is the best time to 
                                    start introducing solid foods?
                                </p>
                                <div class="community-filters-section-list-links">
                                    <a href="#">Replies</a>
                                    <a href="#">Share</a>
                                    <a href="#">Report</a>
                                </div>
                            </div>
                        </div>
                        <form class="community-filters-section-array-button" action="" method="post">
                            <button type="submit" name="view" value="View more">View more questions</button>
                        </form>
                    </div>
                    <!--ask a question tags starts here-->
                    <div class="ask-a-question-tags">
                        <div class="ask-a-question-tags-member">
                            <div class="ask-a-question-tags-member-flex">
                                <img src="../assess/period.svg">
                                <span class="ask-a-question-tags-member-flex-text online-active-color"><?php
                                if ($is_online) {
                                  echo "Online";
                                } else {
                                  echo "Offline";
                                }
                                ?></span>
                            </div>
                            <p class="population-of-members ask-a-question-tags-member-flex-text"><?php echo $num_users . " " . "Registered Member(s)" ?></p>
                        </div>
                        <p class="ask-a-question-tags-questions"><a href="#">Ask a question</a></p>
                        <div class="ask-a-question-tags-trending">
                            <p class="ask-a-question-tags-trending-one">Top trending topic</p>
                            <p class="ask-a-question-tags-trending-two trending-topics"><span>#1</span> Newborncare</p>
                            <p class="ask-a-question-tags-trending-two trending-topics"><span>#2</span> proudmommy</p>
                            <p class="ask-a-question-tags-trending-two trending-topics"><span>#3</span> Smallwins</p>
                            <p class="ask-a-question-tags-trending-two"><span>#4</span> wellnesshour</p>
                        </div>
                        <div class="ask-a-question-tags-populartags">
                            <p class="ask-a-question-tags-populartags-text">Popular Tags</p>
                            <div class="ask-a-question-tags-populartags-flex ask-a-question-tags-populartags-flex-margin">
                                <p>Mental health</p>
                                <p class="ask-a-question-tags-populartags-flex-margin-right">Breast feeding</p>
                            </div>
                            <div class="ask-a-question-tags-populartags-flex ask-a-question-tags-populartags-flex-margin">
                                <p>Nutrition</p>
                                <p class="ask-a-question-tags-populartags-flex-margin-right">Exercise</p>
                                <p>Support</p>
                            </div>
                            <div class="ask-a-question-tags-populartags-flex ask-a-question-tags-populartags-flex-margin">
                                <p>Small wins </p>
                                <p class="ask-a-question-tags-populartags-flex-margin-right">Lifestyle</p>
                                <p>Sleep</p>
                            </div>
                            <div class="ask-a-question-tags-populartags-flex">
                                <p>Family</p>
                                <p class="ask-a-question-tags-populartags-flex-margin-right">Toddler</p>
                                <p>Weaning</p>
                            </div>
                        </div>
                    </div>
                    <!--ask a question tags ends here-->
                </div>
            </div>
        </div>
       </section>
        <footer class="footer">
            <div class="max_width">
                <div class="footer-flex-content">
                    <div class="footer-flex-content-one">
                        <a href="../index.php"><div class="footer-flex-content-one-logo">
                            
                        </div></a>
                        <div class="footer-flex-content-one-text">
                            <p class="footer-flex-content-one-text-one">The Mother’s Haven offers a range of resources to help mother and child find the best 
                                care for their needs.
                            </p>
                            <p class="footer-flex-content-one-text-two">Copyright &copy 2023 The Mother’s Haven Inc.</p>
                        </div>
                    </div>
                    <div class="footer-flex-content-links">
                        <p class="footer-flex-content-links-headers"><a href="../index.php">ABOUT US</a></p>
                        <p><a href="../blog/blog.php">Our Blog</a></p>
                        <p><a href="../user/login.php">Join Community</a></p>
                        <p><a href="#">Speak to Experts</a></p>
                        <p><a href="#">Terms of Use</a></p>
                        <p><a href="#">Privacy Policy</a></p>
                    </div>
                    <div class="footer-flex-content-links">
                        <p class="footer-flex-content-links-headers"><a href="../blog/blog.php">BLOG POSTS</a></p>
                        <p><a href="../blog/postpartum.php">Postpartum Care</a></p>
                        <p><a href="#">Parenting</a></p>
                        <p><a href="../blog/babycare.php">Childcare</a></p>
                        <p><a href="../blog/nutrition.php">Nutrition</a></p>
                        <p><a href="../blog/fitness.php">Fitness and Diet</a></p>
                        <p><a href="#">Child Health</a></p>
                        <p><a href="#">Mother Health</a></p>
                    </div>
                    <div class="footer-flex-content-links" id="contactus">
                        <p class="footer-flex-content-links-headers"><a href="../index.php">Connect with Us</a></p>
                        <p><a href="tel:+2348123498576">+(234)8123498576</a></p>
                        <p><a href="tel:+2348022453363">+(234)8022453363</a></p>
                        <p><a href="mailto:themothershaven@gmail.com">themothershaven@gmail.com</a></p>
                        <div class="footer-flex-content-links-flex">
                            <p><a href="#"><img src="../assess/facebook.svg"></a></p>
                            <p><a href="#"><img src="../assess/twitter.svg"></a></p>
                            <p><a href="#"><img src="../assess/instagram.svg"></a></p>
                            <p><a href="#"><img src="../assess/linkedIn.svg"></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div id="backToTop">
            <i class="fas fa-arrow-up rounded-circle shadow"></i>
        </div>
        <!--script-->
        <script src="../assess/vendors/jquery/jquery3.9.0.min.js"></script>
        <script src="../assess/vendors/aos/aos.js"></script>
        <script src="../script/script.js"></script>
    </body>
</html>