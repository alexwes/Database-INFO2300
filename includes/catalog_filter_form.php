<form method="GET" action="/" novalidate class = 'filter-form-css'>
    <h3><strong>Filter by Tags</strong></h3>
<fieldset>
    <div class = 'feedback'>
      <?php if(!$count_valid_catalog){?>
        <p>Please select at least one tag.</p>
      <?php } ?>
    </div>
    <div>
      <div class='filter-form-sensory' id="catalog-filter-form">

        <input type="checkbox" name="fshrub" id="filter-play" <?php
        if($sticky_shrub){?>
        checked
        <?php } ?>/>
        <label for="catalog-filter">Shrubs</label>

        <input type="checkbox" name="fgrass" id="filter-play" <?php
        if($sticky_grass){?>
        checked
        <?php } ?>/>
        <label for="catalog-filter">Grass</label>


        <input type="checkbox" name="fvine" id="filter-play" <?php
        if($sticky_vine){?>
        checked
        <?php } ?>/>
        <label for="catalog-filter">Vine</label>

        <input type="checkbox" name="ftree" id="filter-play" <?php
        if($sticky_tree){?>
        checked
        <?php } ?>/>
        <label for="catalog-filter">Tree</label>

        <input type="checkbox" name="fflower" id="filter-play" <?php
        if($sticky_flower){?>
        checked
        <?php } ?>/>
        <label for="catalog-filter">Flower</label>

        <input type="checkbox" name="fground" id="filter-play" <?php
        if($sticky_ground){?>
        checked
        <?php } ?>/>
        <label for="catalog-filter">Groundcover</label>

      </div>

    </div>

    <div class="center-item">
        <input id="request-submit" type="submit" name="tag-filter" value="Filter Tags" />
    </div>
    </fieldset>

  </form>
