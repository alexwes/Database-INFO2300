<form action="/admin" method="GET" novalidate>
    <h3><strong>Sort</strong></h3>
    <fieldset>
    <div class = 'vert'>


        <?php if(!$sform_valid) {?>
        <div class="feedback-sort">
            <p>Select one</p>
        </div>
        <?php }?>

        <span>
            <input id='unique' type="radio" name='sort' value='unique' <?php echo $sticky_unique?>>
            <label for="unique">Unique</label>
        </span>

        <span>
            <input id='imag' type="radio" name='sort' value='imag' <?php echo $sticky_imag?>>
            <label for="imag">Imaginative</label>
        </span>

        <div class="center-item">
            <input type="submit" name='submit' value="Sort">
            <input type="submit" name='reset' value="Reset">
        </div>
    </div>
    </fieldset>

</form>
