<form method = "POST" action="/admin" novalidate class = 'insert-form-css centered' enctype="multipart/form-data">
<fieldset>
  <div>
    <?php if(!$form_valid){ ?>
      <div class="insert-names">
        <?php if(!$name_coll_valid){?>
            <p class= 'feedback'>Please enter the colloquial name.</p>
        <?php }?>
        <label for="name_coll">Enter the plant's name (colloquial)</label>
        <input id = "name_coll" type="text" name = 'name-coll' value = '<?php echo htmlspecialchars( $sticky_name_coll) ?>'>

        <?php if(!$name_sci_valid){?>
          <p class= 'feedback'>Please enter the scientific name.</p>
        <?php }?>
        <label for="name_sci">Enter the plant's name (genus, species)</label>
        <input id="name_sci" type="text" name = 'name-sci' value = '<?php echo htmlspecialchars( $sticky_name_sci) ?>'>

        <?php if(!$pid_valid){?>
          <p class= 'feedback'>Please enter a Plant ID</p>
        <?php }?>
        <label for="pid">Enter the Plant ID</label>
        <input id="pid" type="text" name = 'pid' value = '<?php echo htmlspecialchars( $sticky_pid) ?>'>

      </div>
      <div>
      <?php if(!$count_valid){?>
              <p class= 'feedback'>Please select at least 1 feature.</p>
      <?php }?>
      </div>

          <p><strong>Types of Play Supported: </strong></p>
          <div>
            <input id='explconst' type="checkbox" name="insert-explconst"
            <?php
            if($sticky_insert_explconst){?>
            checked
            <?php } ?>>
            <label for="explconst">Exploratory Constructive</label>
          </div>

          <div>
            <input id="explsens" type="checkbox" name="insert-explsens"
            <?php
            if($sticky_insert_explsens){?>
            checked
            <?php } ?>>
            <label for="explsens">Exploratory Sensory</label>
          </div>

          <div>
            <input id="phys" type="checkbox" name="insert-phys"
            <?php
            if($sticky_insert_phys){?>
            checked
            <?php } ?>>
            <label for="phys">Physical</label>
          </div>

          <div>
            <input id="imag" type="checkbox" name="insert-imag"
            <?php
            if($sticky_insert_imag){?>
            checked
            <?php } ?>  >
            <label for="imag">Imaginative</label>
          </div>

          <div>
            <input id="restor" type="checkbox" name="insert-restor"
            <?php
            if($sticky_insert_restor){?>
            checked
            <?php } ?> >
            <label for="restor">Restorative</label>
          </div>


          <div>
            <input id="express" type="checkbox" name="insert-express"
            <?php
           if($sticky_insert_express){?>
            checked
            <?php } ?> >
            <label for="express">Expressive</label>

          </div>

          <div>
            <input id="rules" type="checkbox" name="insert-rules"
            <?php
            if($sticky_insert_rules){?>
            checked
            <?php } ?> >
            <label for="rules">Play by Rules</label>

          </div>

          <div>
            <input id="bio" type="checkbox" name="insert-bio"
            <?php
            if($sticky_insert_bio){?>
            checked
            <?php } ?> >
            <label for="bio">Bio</label>

          </div>

          <h3 class=<?php if(!$image_valid){echo "feedback";}?> >Upload a plant image (required)</h3>
          <h6>File type <em>must</em> be '.jpg' and max size of 1MB</h6>
          <input type="hidden" name="MAX_FILE_SIZE" value="1000000000">
          <input type="file" name="image" accept=".jpg">

      <div class="align-right">
          <input id="request-submit" type="submit" name="add" value="Add Plant" />
      </div>
      <?php }else{ ?>

        <p>Thank you for adding your plant!</p>

      <?php } ?>
    </div>


    </fieldset>
</form>
