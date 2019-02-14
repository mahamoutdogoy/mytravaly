<?php $this->load->view('admin/theme/message'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1> <?php echo $this->lang->line("package settings"); ?> </h1>  
</section>

<!-- Main content -->
<section class="content">  
  <div class="row">
    <div class="col-xs-12">
        <div class="grid_container" style="width:100%; height:700px;">
            <table 
            id="tt"  
            class="easyui-datagrid" 
            url="<?php echo base_url()."payment/package_data"; ?>" 
            
            pagination="true" 
            rownumbers="true" 
            toolbar="#tb" 
            pageSize="100" 
            pageList="[5,10,20,50,100,200]"  
            fit= "true" 
            fitColumns= "true" 
            nowrap= "true" 
            view= "detailview"
            idField="id"
            >
            
                <thead>
                    <tr>
                        <th field="package_id" checkbox="true"></th>                        
                        <th field="id" sortable="true"><?php echo $this->lang->line("package id"); ?></th>                        
                        <th field="package_name" sortable="true"><?php echo $this->lang->line("package name"); ?></th>
                        <?php if ($this->session->userdata('user_type')== 'Admin') { ?>
                        <th field="price" sortable="true" formatter="price_formatter"><?php echo $this->lang->line("price"); ?> - <?php echo $payment_config[0]['currency']; ?></th>
                        <th field="validity" sortable="true" formatter="validity_formatter"><?php echo $this->lang->line("validity"); ?> - <?php echo $this->lang->line("days"); ?></th>
                        <?php } ?>
                        <th field="is_default" formatter="is_default" sortable="true"><?php echo $this->lang->line("default package"); ?></th>
                        <th field="view" width="100px"  formatter='action_column'><?php echo $this->lang->line("actions"); ?></th>                    
                    </tr>
                </thead>
            </table>                        
         </div>
  
       <div id="tb" style="padding:3px">
            <?php if ($this->session->userdata('user_type')== 'Admin') { ?>
              <a class="btn btn-primary"  href="<?php echo site_url('payment/add_package');?>">
                  <i class="fa fa-plus-circle"></i> <?php echo $this->lang->line("add"); ?>
              </a> 
               <!-- <a class="btn btn-info pull-right" href="#" id="add_custom_pack">
                  <i class="fa fa-plus-circle"></i> <?php echo $this->lang->line("add custom pack"); ?>
              </a> --> 
            <?php } ?> 
            <br/>      
            <br/>      
        </div>
    </div>
  </div>   
</section>

<?php $user_type = $this->session->userdata('user_type');?>
<script>       
    var base_url="<?php echo site_url(); ?>" ;
    var user_type="<?php echo $user_type; ?>";

    function action_column(value,row,index)
    {               
        var url=base_url+'payment/details_package/'+row.id;        
        var edit_url=base_url+'payment/update_package/'+row.id;
        var delete_url=base_url+'payment/delete_package/'+row.id;
        var more="<?php echo $this->lang->line('more info');?>";
        var edit_str="<?php echo $this->lang->line('edit');?>";
        var delete_str="<?php echo $this->lang->line('delete');?>";
        var str="";   
        str="<a title='"+more+"' style='cursor:pointer' href='"+url+"'>"+'<img src="<?php echo base_url("plugins/grocery_crud/themes/flexigrid/css/images/magnifier.png");?>" alt="'+more+'">'+"</a>";
        
        if(user_type=="Admin")
        str=str+"&nbsp;&nbsp;&nbsp;&nbsp;<a style='cursor:pointer' title='"+edit_str+"' href='"+edit_url+"'>"+' <img src="<?php echo base_url("plugins/grocery_crud/themes/flexigrid/css/images/edit.png");?>" alt="'+edit_str+'">'+"</a>";
        
        if(row.is_default=='0' && user_type=="Admin")
        str=str+"&nbsp;&nbsp;&nbsp;&nbsp;<a onclick=\"return confirm('"+'<?php echo $this->lang->line("are you sure that you want to delete this record?"); ?>'+"')\" style='cursor:pointer' title='"+delete_str+"' href='"+delete_url+"'>"+' <img src="<?php echo base_url("plugins/grocery_crud/themes/flexigrid/css/images/close.png");?>" alt="'+delete_str+'">'+"</a>";
   		
   		return str;
    }     


    function is_default(value,row,index)
    {   
        if(value==1) return "<i class='fa fa-check' style='color:green;'></i>";            
        else return "<i class='fa fa-close' style='color:red;'></i>";     
    }

    function price_formatter(value,row,index)
    {   
        if(row.is_default=="1" && row.price=="0")
        return "Free"; 
        else return value;  
    }

    function validity_formatter(value,row,index)
    {   
        if(row.is_default=="1" && row.price=="0")
        return "Unlimited"; 
        else return value;    
    }


         

</script>

<?php 

 $Selectoneormorepackages = $this->lang->line("Select one or more packages");

 ?>

<script>
    
      $j("document").ready(function() {

        $("#add_custom_pack").click(function(){     

          var Selectoneormorepackages = "<?php echo $Selectoneormorepackages; ?>";          
          var redirect_url = "<?php echo site_url(); ?>payment/package_settings";
          var rows = $j('#tt').datagrid('getSelections');
          var info=JSON.stringify(rows);  
          if(rows=="") 
          {
            alert(Selectoneormorepackages);
            return;
          } 

          $.ajax({
          type:'POST' ,
          url: "<?php echo site_url(); ?>payment/add_custom_package_action",
          data:{info:info},
          success:function(response)
          {
            window.location.href=redirect_url;
          }
        });   
      }); 
    });
</script>

