
<?php

function get_r() {
  global $wp_roles;

  $all_roles = $wp_roles->roles;
  //$editable_roles = apply_filters('editable_roles', $all_roles);

  return $all_roles;
}

$pages = get_pages();

//echo "<pre>";
//print_r($pages);
//echo "<pre>";


// foreach(get_r() as $key => $value){
//   echo "Role : ". $key ." => name  ".$value['name']."<br>"; 
// }

?>
<div class="UD_container container">

  <div class="UD_plugin_head">
    <h3>Welcome To User's direction </h3>
    <p class="UD_plugin_quote">Easy to give direction to users on the basis of their role</p>
  </div>
  
  <div class="settig-section">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="home" aria-selected="true">General</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">

        <!-- <h1>General</h1> -->

        
        <div class="UD_section_container">
          <h2 class="UD_big_head">General setup</h2>
          <h3 class="UD_small_head">Select the user role and select the page where you want to redirect while logging in.</h2>
        </div>
        <div class="setting-forms">
            <form id="form">
              
              <div class="heading_table">
                <div>Select the role of user and the appropriate pages</div>              
              </div>

              <div class="parent_container">
                
                <div class="template_element">
                  <!-- <label for="some_input_counter">Input counter</label> -->
                  <select class="form-control" name="some_input_counter">
                    <?php
                      foreach(get_r() as $key => $value){
                        //echo "Role : ". $key ." => name  ".$value['name']."<br>"; 
                        echo "<option value='".$key."'>".$value['name']."</option>";
                      }
                      
                    ?>
                    <!-- <option>Administrator</option>                  
                    <option>Administrator</option>                  
                    <option>Administrator</option>                   -->

                  </select>
                  <select class="form-control" name="some_input_counter">
                    <?php 

                    foreach( $pages as $key_page => $value_page ){
                      echo "<option value='".$value_page->ID."'>".$value_page->post_title."</option>";
                      //echo " key page ". $value_page->ID ." => name ".$value_page->post_title."<br>";
                    }

                    ?>
                                
                  </select>
                  <!-- <a href="#" class="remove button btn btn-danger">x</a> -->
                  <button type="button" class="remove btn btn-danger">x</button>
                </div>
                
              </div>
              
              <a href="#" class="add_field btn_add_field button button-primary">Add Field</a>

              <div class="UD-btn-save mt-3">
                <button onclick="return false;" class="btn-save btn btn-success" >Save</button>
              </div>
            </form>
        </div>
      </div>
      <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">

      <div class="UD_section_container">
        <h2 class="UD_big_head">Settings </h2>
        <h3 class="UD_small_head">Select Configuration or Settings for plugin</h2>
      </div>

      <div class="setting-forms">
        <form id="form">
          
          <div class="heading_table">
            <div>Please select or check the option you want to setup</div>              
          </div>

          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
            <label class="custom-control-label" for="defaultUnchecked">Do you want to delete plugin data after the plugin has deactivated</label>
          </div>

          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
            <label class="custom-control-label" for="defaultUnchecked">Do you want to delete plugin data after the plugin has deactivated</label>
          </div>

          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
            <label class="custom-control-label" for="defaultUnchecked">Do you want to delete plugin data after the plugin has deactivated</label>
          </div>

          <div class="UD-btn-save mt-3">
              <button onclick="return false;" class="btn-save btn btn-success" >Save</button>
          </div>

        </form>
      </div>     

        

      </div>
    </div>
 
</div>


</div>

