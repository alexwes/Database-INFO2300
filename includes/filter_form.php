<form method="GET" action="/admin" novalidate class = 'filter-form-css'>
    <h3><strong>Filter</strong></h3>
<fieldset>
    <div class = 'feedback'>
      <?php if(!$count_valid_filter){?>
        <p>Please select at least one filter.</p>
      <?php } ?>
    </div>
    <div>
      <div class='filter-form-sensory'>
        <p>Type of Play Supported:</p>

        <input for="frules" type="checkbox" name="filter-rules" id="filter-play" <?php
        if($sticky_filter_rules){?>
        checked
        <?php } ?>/>
        <label for="frules">Play by Rules</label>

        <input for="fbiop" type="checkbox" name="filter-bio" id="filter-play" <?php
        if($sticky_filter_bio){?>
        checked
        <?php } ?>/>
        <label for="fbiop">Bio Play</label>


        <input for="fphys" type="checkbox" name="filter-phys" id="filter-play" <?php
        if($sticky_filter_phys){?>
        checked
        <?php } ?>/>
        <label for="fphys">Physical</label>

      </div>

    </div>

    <div class="center-item">
        <input id="request-submit" type="submit" name="apply" value="Apply Filters" />
    </div>
    </fieldset>

  </form>
