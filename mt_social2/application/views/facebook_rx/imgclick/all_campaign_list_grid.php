<div class="container-fluid ">
  <div class="row">
    <div class='well text-center' style="border-radius: 0;background: #fff;">
      <h2 class="blue"><i class='fa fa-th'></i> <?php echo $page_title; ?></h2> 

      <?php
      $title_seg=$this->uri->segment(3) ? $this->uri->segment(3) : 'all';
      if($title_seg=="all") $title_seg="";     
     
      $posting_status=$this->uri->segment(4) ? $this->uri->segment(4) : 'all';
      if($posting_status=="all") $posting_status="";   
      
      $schedule_type=$this->uri->segment(5) ? $this->uri->segment(5) : 'all';
      if($schedule_type=="all") $schedule_type="";             
      ?>
      
      <div class="form-inline"> 
        <div class="form-group">
          <input style="min-width:210px" class="form-control" value="<?php echo urldecode($title_seg);?>" type="text" class="" name="campaign_title" id="campaign_title" placeholder="<?php echo $this->lang->line("campaign name/tracking code");?>" />
          <?php echo form_dropdown('posting_status', array("all"=>$this->lang->line("All Campaign"),"0"=>$this->lang->line("Only Pending"),"1"=>$this->lang->line("Only Processing"),"2"=>$this->lang->line("Only Completed")),$posting_status,'id="posting_status" class="form-control"'); ?>
          <?php echo form_dropdown('schedule_type', array("all"=>$this->lang->line("Now & Later"),"now"=>$this->lang->line("Only Now"),"later"=>$this->lang->line("Only Later")),$schedule_type,'id="schedule_type" class="form-control"'); ?>                             
          <button  class="btn btn-info" id="search"><i class="fa fa-search"></i> <?php echo $this->lang->line("search"); ?></button>
        </div>
      </div>
    </div>
    <?php if(isset($pages) && $pages!="")  echo '<h4  class="pagination_link">'.$pages.'</h4>'; ?>
      <?php 
      if(!empty($video_infos))
      {
        $i=0;
        $sl=$this->uri->segment(6);
        if($sl=="") $sl=0;
        foreach($video_infos as $value)
        {
          $i++;
          $sl++;
          $post_count=$value["total_post_count"];
          ?>
          <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="box box-primary">
              <div class="box-header ui-sortable-handle text-center" style="cursor: move;">
                <i class="fa fa-map-pin"></i>

                <h3 class="box-title" title="<?php echo $value['campaign_name'];?>">
                  <?php echo $sl.". ".substr($value['campaign_name'], 0, 30); ?> 
                </h3>

                <div class="box-tools pull-right">

                </div>
              </div>
              <div class="box-body" style="height: 340px;overflow-y: auto;">
                <div>
                   <h4 class='text-center'>
                     <?php 
                      if($value['posting_status']=="0") echo "<span class='label label-danger'><i class='fa fa-clock-o'></i> ".$this->lang->line("Pending")."</span>";
                      else if($value['posting_status']=="1") echo "<span class='label label-warning'><i class='fa fa-spinner'></i> ".$this->lang->line("Processing")."</span>";
                      else echo "<span class='label label-success'><i class='fa fa-check'></i> ".$this->lang->line("Completed")."</span>"; 
                     ?>  
                   </h4> 
                </div>
                <div class="full short-info">
                    <p>
                      <a title="<?php echo $this->lang->line("Campaign Report");?>" href="<?php echo base_url().'imgclick/campaign_report/'.$value['id']; ?>">
                        <span class="blue"><i class='fa fa-share-alt'></i>                        
                          <?php echo $post_count; ?>
                        </span>
                      <br><?php echo $this->lang->line("Post Count"); ?>
                      </a>
                    </p>
                    
                    <p>

                      <?php if($value['tracking_enabled'] == '1') : ?>
                          <a title="<?php echo $this->lang->line("Traffic Report");?>" href="<?php echo base_url().'imgclick/traffic_report/'.$value['id']; ?>">
                              <span class="blue"><i class='fa fa-hand-o-up'></i> 
                                <?php if(isset($click_info[$value['id']])) echo $click_info[$value['id']]; else echo "0"; ?>
                              </span>
                              <br><?php echo $this->lang->line("Click Count"); ?>
                          </a>
                      <?php endif; ?>

                      <?php if($value['tracking_enabled'] == '0') : ?>
                          
                        <span class="blue"><i class='fa fa-remove'></i> 
                          <?php echo $this->lang->line("N/A"); ?>
                        </span>                        
                        <br><?php echo $this->lang->line("Click Count"); ?>   
                      <?php endif; ?>
                    
                    </p>                                                
                </div>
               
                <div class="clearfix"></div>
                <ul class="todo-list ui-sortable">
                    <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-circle-o blue"></i>
                      </span>
                      <span class=""><b><?php echo $this->lang->line("Campaign");?></b> : <?php echo $value['campaign_name'];?></span>                    
                    </li> 
                    <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-code blue"></i>
                      </span>
                      <span class=""><b><?php echo $this->lang->line("Tracking Code");?></b> : <?php echo $value['tracking_code'];?></span>                    
                    </li>
                    <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-link blue"></i>
                      </span>
                      <span class=""><b><?php echo $this->lang->line("Post Link");?></b> : <a target="_BLANK" href="<?php echo $value['post_link'];?>"><?php echo $this->lang->line("Visit");?></a></span>                    
                    </li> 
                     <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-clock-o blue"></i>
                      </span>
                      <span class=""><b><?php echo $this->lang->line("Schedule Type");?></b> : <?php echo $this->lang->line($value['schedule_type']);?></span>                    
                    </li>
                </ul>

                <div class="clearfix"></div>

              </div>

              <div class="box-footer clearfix no-border text-center">
                  <a title="<?php echo $this->lang->line("Campaign Report");?>" style='border-radius: 0;' class="btn btn-default btn-sm" href="<?php echo base_url().'imgclick/campaign_report/'.$value['id']; ?>"><i class="fa fa-th-list fa-2x"></i></a>
                  
                  <?php if($value['tracking_enabled'] == '1') : ?>
                    <a title="<?php echo $this->lang->line("Traffic Report");?>" style='border-radius: 0;' class="btn btn-default btn-sm blue" href="<?php echo base_url().'imgclick/traffic_report/'.$value['id']; ?>"><i class="fa fa-line-chart fa-2x"></i> </a>
                  <?php endif; ?>
                  
                  <a title="<?php echo $this->lang->line("Clone"); ?>" class="btn btn-sm btn-default" href="<?php echo base_url('imgclick/clone_campaign').'/'.$value['id']; ?>" table_id="<?php echo $value['id']; ?>"><i class="fa fa-2x fa-clone green"></i></a>

                  <?php if($value['posting_status'] == '0' && $value["schedule_type"]=="later"): ?>
                    <a title="<?php echo $this->lang->line("Edit"); ?>" class="btn btn-sm btn-default orange" href="<?php echo base_url('imgclick/edit_campaign').'/'.$value['id']; ?>" table_id="<?php echo $value['id']; ?>"><i class="fa fa-2x fa-edit orange"></i></a>
                  <?php endif; ?>

                

                  <a title="<?php echo $this->lang->line("Delete"); ?>" class="delete_campaign btn btn-sm btn-default red" table_id="<?php echo $value['id']; ?>"><i class="fa fa-2x fa-trash-o red"></i></a>                  
         
               </div>
            </div>
          </div>            
          <?php 
        }
      }
      else echo "<h4><div class='alert alert-warning text-center'>".$this->lang->line("No data to show")."</div></h4>";
      ?>   
    </div>
    <?php if(isset($pages) && $pages!="")  echo '<h4  class="pagination_link">'.$pages.'</h4>'; ?>   
    </div>

    



    <script>
      $j("document").ready(function(){

 
        var base_url = "<?php echo base_url(); ?>";

        $("#search").click(function(){
          var campaign_title = $("#campaign_title").val().trim();
          var posting_status = $("#posting_status").val().trim();
          var schedule_type = $("#schedule_type").val().trim();


          if(campaign_title == ''){
            campaign_title = 'all';
          }
          else{
            campaign_title = campaign_title.replace(/\//gi,'____');
            campaign_title = escape(campaign_title);
          }
          var link="<?php echo site_url('imgclick/all_campaign_search_result'); ?>"+"/"+campaign_title+"/"+posting_status+"/"+schedule_type; 
          // link = encodeURI(link);
          window.location.assign(link);
        });


        $(".delete_campaign").click(function(){
          var ans = confirm("<?php echo $this->lang->line('are you sure');?>?");

          if(ans)
          {
             var table_id = $(this).attr('table_id');
             $.ajax({
                   type:'POST' ,
                   url: "<?php echo site_url(); ?>imgclick/ajax_delete_campaign",
                   data:{table_id:table_id},
                   success:function(response){
                      if(response == 'success')
                      {
                        alert('<?php echo $this->lang->line("your data has been successfully deleted from the database."); ?>');
                        location.reload();
                      }
                      else alert('<?php echo $this->lang->line("something went wrong, please try again."); ?>');
                   }
               });
          }
        });

      });
    </script>



    <style>
      .full {
        width: 100%;
        float: left;
        margin: 0;
        padding: 0;
      }
      .short-info {
        border: 1px solid #e8edef;
      }

      .short-info p {
        display: inline-block;
        width: 48%;
        border-right: 1px solid #e8edef;
        font-size: 11px;
        margin: 0;
        text-align: center;
        padding: 10px 0;
        line-height: 26px;
      }


      .short-info p:last-child {
        border-right: 0px solid #e8edef;
      } 

      .short-info p span {
        font-weight: bold;
        font-size: 25px;
      } 
      .custom_progress {
        height: 2px;
        margin-top: 0px;
        margin-bottom: 10px;
        overflow: hidden;
        background-color: #f5f5f5;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
      }
      .custom_progress_bar {
        float: left;
        width: 0;
        height: 100%;
        font-size: 4px;
        line-height: 6px;
        color: #fff;
        text-align: center;
        background-color: #337ab7;
        -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
        -webkit-transition: width .6s ease;
        -o-transition: width .6s ease;
        transition: width .6s ease;
      }
      .existing_account {
        margin: 10px 0 0;
        font-size: 16px;
        font-weight: bold;
        font-style: italic;
      }
      .account_list{
        padding-left: 5%;
      }
      .individual_account_name{
        font-weight: bold;
        font-size: 14px;
      }
      .padded_ul{
        padding-left: 10%;
      }
    </style>


    <style>
      .margin_top{
        margin-top:20px;
      }

      .padding{
        padding:15px;
      } 

      .count_text{
        margin: 0px;
        padding: 0px;
        color: orange;
      }
      .cover_image{
        height: 200px;
        width: 200px;
      }

      h4.pagination_link
      {
        font-size: 12px;
        text-align: center;
        font-weight: normal;
        margin-top: 12px;
      }

      h4.pagination_link a
      {
        padding: 4px 7px 4px 7px;
        background: #238db6;
        color:#fff;
        border:1px solid #238db6;
        font-style: normal;
        text-decoration: none;
      }

      h4.pagination_link strong
      {
        padding: 4px 7px 4px 7px;
        background: #E95903;
        color:#fff;
        border:1px solid #E95903;
        font-style: normal;
      }

      h4.pagination_link a:hover
      {
        background: #77a2cc;
        border:1px solid #77a2cc; 
        color: #fff;
      }

    </style>