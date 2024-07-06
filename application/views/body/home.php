
    
    <!--sidebar-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="<?php echo base_url()?>profile/"><img src="<?php echo base_url()."assets/"; ?>img/logo.png" class="" width="80"></a></p>
          <!-- <h5 class="centered">Home</h5> -->
          
          <li>
            <a class="active" href="<?php echo base_url()?>home/"> <!-- LOGOUT -->
              <i class="fa fa-home"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li>
            <a href="<?php echo base_url()?>login/"> <!-- LOGOUT -->
              <i class="fa fa-sign-in"></i>
              <span>Login</span>
              </a>
          </li>
        </ul>
      </div>
    </aside>
    
    <!--main content-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-book"></i> LIST OF MATERIALS</h3>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <!-- For search input  -->
              <div class="col-md-2" style="margin-left: 10px;">
                <input id="search_input" class="form-control mr-sm-2" type="text" placeholder="Search...">
              </div><br><br>  
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class="fa fa-list-ul"></i>  Activity Title</th>
                    <th><i class="fa fa-file-text"></i>  File Name</th>
                    <th><i class="fa fa-th"></i>  File Type</th>
                    <th><i class=" fa fa-folder-open"></i>  File</th>
                    <th><i class=" fa fa-calendar"></i>  Activity Start Date</th>
                    <th><i class=" fa fa-calendar"></i>  Activity End Date</th>
                    <th><i class=" fa fa-edit"></i>  Source</th>
                    <th><i class=" fa fa-user"></i>  Uploader</th>
                    <th><i class=" fa fa-question-circle"></i>  Division</th>
                    <th><i class=" fa fa-edit"></i>  Action</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="search_table">
                  <?php if(count($posts)):?>
                  <?php foreach($posts as $post):?>
                  <tr>
                    <!-- <td><?php echo $post->material_id;?></td> -->
                    <td><?php echo $post->material_title;?></td>
                    <td><?php echo $post->material_fileName;?></td>
                    <td><?php echo $post->material_fileType;?></td>
                    <td><?php echo $post->material_file;?></td>
                    <td><?php echo $post->material_startDate;?></td>
                    <td><?php echo $post->material_endDate;?></td>
                    <td><?php echo $post->material_source;?></td>
                    <td><?php echo $post->material_uploader;?></td>
                    <!-- <td><?php echo $post->material_uploaderRole;?></td> -->
                    <td><?php echo $post->material_division;?></td>
                    <td>
                      <?php
                        echo anchor('Display_controller/delete','Download',['class'=>'btn btn-danger btn-xs']);
                      ?>
                    </td>
                  </tr>
                  <?php endforeach;?>
                   <?php else:?>
                      <tr>
                         <td>No Records Found!</td>
                      </tr>
                   <?php endif;?>
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
      </section>
    </section>
    
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery/jquery.min.js"></script>

  <script src="<?php echo base_url()."assets/"; ?>lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="<?php echo base_url()."assets/"; ?>lib/common-scripts.js"></script>
  <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="<?php echo base_url()."assets/"; ?>lib/sparkline-chart.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome!',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        // (string | optional) the image to display on the left
        image: '<?php echo base_url()."assets/"; ?>img/profile.png',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });
      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>

    <!-- For search filter -->
  <script>
     $(document).ready(function(){
       $("#search_input").on("keyup", function() {
         var value = $(this).val().toLowerCase();
         $("#search_table tr").filter(function() {
           $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
         });
       });
     });
  </script>

</body>