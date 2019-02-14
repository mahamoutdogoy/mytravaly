<?php $this->load->view('admin/theme/message'); ?>
<!-- Main content -->
<section class="content-header">
  <h1><i class='fa fa-pinterest-square'></i> <?php echo $this->lang->line('pinterest'); ?></h1>
</section>
<section class="content">  
  <div class="row" >
    <div class="col-xs-12">
      <div class="grid_container" style="width:100%; min-height:700px;">
        <table 
        id="tt"  
        class="easyui-datagrid" 
        url="<?php echo base_url()."admin_config_accounts/pinterest_config_data"; ?>" 

        pagination="true" 
        rownumbers="true" 
        toolbar="#tb" 
        pageSize="15" 
        pageList="[5,10,15,20,50,100]"  
        fit= "true" 
        fitColumns= "true" 
        nowrap= "true" 
        view= "detailview"
        idField="id"
        >       

        <thead>
          <tr>
            <!-- <th field="id"  checkbox="true"></th> -->
            <th field="app_name"  sortable="true" ><?php echo $this->lang->line('App Name'); ?></th>                  
            <th field="app_id"  sortable="true"><?php echo $this->lang->line('App ID'); ?></th>                     
            <th field="app_secret"  sortable="true"><?php echo $this->lang->line('App Secret'); ?></th>                     
            <th field="user_name"  sortable="true"><?php echo $this->lang->line('username'); ?></th>    
            <th field="view" align="center" formatter="force_process"><?php echo $this->lang->line("actions")?></th>
          </tr>
        </thead>
      </table>                        
    </div>

    <div id="tb" style="padding:3px">
      <a class="btn btn-info" href="<?php echo base_url('admin_config_accounts/add_pinterest_settings'); ?>">
          <i class="fa fa-plus"></i> <?php echo $this->lang->line("add"); ?>
      </a>
      <br/>  
      <form class="form-inline" style="margin-top:20px">
        <div class="form-group">
            <input id="app_id" name="app_id" value="" class="form-control" size="20" placeholder="<?php echo $this->lang->line('App ID'); ?>">
        </div>  
        <div class="form-group">
            <input id="app_name" name="app_name" value="" class="form-control" size="20" placeholder="<?php echo $this->lang->line('App Name'); ?>">
        </div> 
        <div class="form-group">
            <input id="user_name" name="user_name" value="" class="form-control" size="20" placeholder="<?php echo $this->lang->line('username'); ?>">
        </div> 
        
        <button class='btn btn-info'  onclick="doSearch(event)"><i class="fa fa-binoculars"></i> <?php echo $this->lang->line('Search'); ?></button>      
      </form> 
    </div>        
  </div>
</div>   
</section>

<?php $doyouwanttodeletethiscontact = $this->lang->line("do you want to delete this APP ?"); ?>

<script>

  var base_url="<?php echo site_url(); ?>";

  function doSearch(event)
  {
    event.preventDefault(); 
    $j('#tt').datagrid('load',{
      app_id  :     $j('#app_id').val(),         
      app_name  :     $j('#app_name').val(),         
      user_name  :     $j('#user_name').val(),     
      is_searched   :     1
    });


  }


  function force_process(value,row,index)
  {
    var edit_url=base_url+'admin_config_accounts/update_pinterest_config/'+row.id;
    var pinterest_login_button=base_url+'admin_config_accounts/pinterest_login_button/'+row.id;
        
    var str="";     
  
    str=str+"&nbsp;<a style='cursor:pointer' title='"+'Login'+"' href='"+pinterest_login_button+"'>"+' <img src="<?php echo base_url("plugins/grocery_crud/themes/flexigrid/css/images/login.png");?>" alt="Login">'+"</a>";

    str=str+"&nbsp;<a style='cursor:pointer' title='"+'Edit'+"' href='"+edit_url+"'>"+' <img src="<?php echo base_url("plugins/grocery_crud/themes/flexigrid/css/images/edit.png");?>" alt="Edit">'+"</a>";

    str=str+"&nbsp;<a style='cursor:pointer' title='"+'Delete'+"' class='delete_config' table_id='"+row.id+"' >"+' <img src="<?php echo base_url("plugins/grocery_crud/themes/flexigrid/css/images/close.png");?>" alt="Delete">'+"</a>&nbsp;";     
    
    return str;
  }

  $(document.body).on('click','.delete_config',function(){
      var doyouwanttodeletethiscontact = "<?php echo $doyouwanttodeletethiscontact;?>";
      var ans = confirm(doyouwanttodeletethiscontact);
      if(ans)
      {
        var table_id = $(this).attr('table_id');
        var delete_url=base_url+'admin_config_accounts/delete_pinterest_config';
        $.ajax({
          type:'POST' ,
          url: delete_url,
          data:{table_id:table_id},
          success:function(response)
          {
            $j('#tt').datagrid('reload');
          }
        });
      }
    });

  
</script>
