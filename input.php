<link rel='stylesheet' href='css/styles.css'>
<p class="title"><b>Fesenkov Astrophysical Institute</b></p>
<p class="title"><b>Astrophotoplate glass library </b></p>

<form action="form_coord.php" method="post">

    <fieldset id = "field"><legend> <b>To search by object coordinates </b></legend>
    <p class="tag"><b> Choose an instrument </b></p>
        <div id="menu_inst">
            <select name="telescope">
                <option disabled>-----Choose from list------</option>
                <option value="ASI-2">ASI-2</option>
                <option value="Shmidt_small">Small Shmidt</option>
                <option value="Shmidt_big">Big Shmidt</option>
                <option value="Any">All telescopes</option>
            </select>
            <!--            <p class="user"><button type="reset" name="telescope">Clear</button></p>-->
        </div>


    <p class="tag"><b> Input interested object coordinates </b></p>
    <div class="additional">
        <p class="additional"><b>(attention: input RA and DEC in form hh:mm:ss [using ":"-separator]) </b></p>
        RA:&nbsp<input type="text" name="obj_RA" size="10">&nbsp &nbsp
        DEC:&nbsp<input type="text" name="obj_DEC" size="10">
    </div>

    <p class="tag"><b> Select a type of observations </b></p>
    <div class="additional">
        <input type="radio" name="type_obs1" value="phot_obs">Photometric &nbsp
        <input type="radio" name="type_obs1" value="spec_obs">Spectral &nbsp
        <input type="radio" name="type_obs1" value="both">Both &nbsp
    </div>

    <p class="tag"><b> Observational period </b></p>
    <div class="additional">
        <p>Start date &nbsp <input type="date" name="calend_start" value="1950-01-01">&nbsp &nbsp End date &nbsp <input type="date" name="calend_end" value="1997-12-31">
            &nbsp <button type="reset" name="Reset">Clear</button></p>
    </div>

    <p class="tag"><button type="reset">Clear</button> &nbsp &nbsp <button type="submit" name="submission">Request</button></p>
    </fieldset>
</form>

<form action="form_obj.php" method="post">

    <fieldset id = "field"><legend> <b>To search by object name </b></legend>
        <p class="tag"><b> Choose an instrument </b></p>
        <div id="menu_inst">
            <select name="telescope">
                <option disabled>-----Choose from list------</option>
                <option value="ASI-2">ASI-2</option>
                <option value="Shmidt_small">Small Shmidt</option>
                <option value="Shmidt_big">Big Shmidt</option>
                <option value="Any">All telescopes</option>
            </select>
            <!--            <p class="user"><button type="reset" name="telescope">Clear</button></p>-->
        </div>


        <p class="tag"><b> Input an object name </b></p>
        <div class="additional">
            <input type="text" name="obj_name" size="50">
        </div>

        <p class="tag"><b> Select a type of observations </b></p>
        <div class="additional">
            <input type="radio" name="type_obs1" value="phot_obs">Photometric &nbsp
            <input type="radio" name="type_obs1" value="spec_obs">Spectral &nbsp
            <input type="radio" name="type_obs1" value="both">Both &nbsp
        </div>

        <p class="tag"><b> Observational period </b></p>
        <div class="additional">
            <p>Start date &nbsp <input type="date" name="calend_start" value="1950-01-01">&nbsp &nbsp End date &nbsp <input type="date" name="calend_end" value="1997-12-31">
                &nbsp <button type="reset" name="Reset">Clear</button></p>
        </div>

        <p class="tag"><button type="reset">Clear</button> &nbsp &nbsp <button type="submit" name="submission">Request</button></p>
    </fieldset>
</form>

<form action="form_id.php" method="post">

    <fieldset id = "field"><legend> <b>To search by photoplate ID </b></legend>
        <p class="tag"><b> Input a photoplate ID </b></p>
        <div class="additional">
            <input type="text" name="obj_id" size="50">
        </div>
        <p class="tag"><button type="reset">Clear</button> &nbsp &nbsp <button type="submit" name="submission">Request</button></p>
    </fieldset>
</form>
