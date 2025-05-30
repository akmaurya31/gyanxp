         <?php
            $where  = array('id'=>$this->session->userdata('uk_adminLoggedinId'));
            $profileDetails  = $this->login_model->getWhere('users',$where);
         ?>
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="<?php echo base_url('Master/dashboard');?>" class="site_title">
                  <span>Atmik Foundation</span>
                </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <?php
                    if(!empty($profileDetails[0]->thumbnail)){
                      $thumbnail = base_url($profileDetails[0]->thumbnail);
                    }else{
                      $thumbnail = base_url("assets/img/2.jpg");
                    }
                ?>
                <img src="<?php echo $thumbnail;?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hi, <?php echo $profileDetails[0]->name;?></span>
                <h2 class="text-capitalize"><?php echo $this->session->userdata('uk_adminLoggedinRole');?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->




            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Dashboard</h3>
                <ul class="nav side-menu">
                  <li>
                    <a href="<?php echo base_url('Master/dashboard');?>">
                      <i class="fa fa-dashboard"></i> Dashbaord
                    </a>
                  </li>

                  <li>
                    <a href="<?php echo base_url();?>Slider/index">
                      <i class="fa fa-picture-o"></i> Manage Slider
                    </a>
                  </li>

                  <li>
                    <a href="<?php echo base_url();?>Courses/index">
                      <i class="fa fa-book"></i> Manage Courses
                    </a>
                  </li>

                  <li>
                    <a href="<?php echo base_url();?>Subjects/index">
                      <i class="fa fa-book"></i> Manage Subject
                    </a>
                  </li>

                  <li>
                    <a href="<?php echo base_url('Master/manageBlogs');?>">
                      <i class="fa fa-edit"></i>
                      <span>Manage Blogs</span>
                    </a>
                  </li>

                  <li>
                    <a href="<?php echo base_url();?>Enquiries/manageContactQuery">
                      <i class="fa fa-user-plus"></i> Enquiries List
                    </a>
                  </li>


                  <li>
                    <a href="<?php echo base_url('Quizadmin/listQuiz');?>">  <!-- addQuiz -->
                      <i class="fa fa-edit"></i>
                      <span>Manage Quiz</span>
                    </a>
                  </li>

                  <!-- <li>
                    <a href="<?php echo base_url('Quizadmin/addQues');?>">
                      <i class="fa fa-edit"></i>
                      <span>Manage Question</span>
                    </a>
                  </li> -->
                  
                  <li>
                    <a href="<?php echo base_url('Coursesadmin/multiple_upload');?>">
                      <i class="fa fa-edit"></i>
                      <span>Upload Media</span>
                    </a>
                  </li>

                  

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('Login/logout');?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <?php
                        $where  = array('id'=>$this->session->userdata('uk_adminLoggedinId'));
                      $profileDetails  = $this->login_model->getWhere('users',$where);
                     ?>
                    <img src="<?php echo base_url($profileDetails[0]->thumbnail);?>" alt=""><?php echo $profileDetails[0]->name;?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="<?php echo base_url('Master/profile');?>"> Profile</a>
                    <a class="dropdown-item"  href="<?php echo base_url('Login/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>