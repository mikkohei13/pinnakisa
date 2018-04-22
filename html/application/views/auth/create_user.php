<?php
$title = "Luo käyttäjätunnus - 100 lintulajia";
include "application/views/page_elements/header.php";
?>

<h1><?php echo lang('create_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_user");?>

      <p class="required">
            <?php echo lang('create_user_fname_label', 'first_name');?> </p>
            <?php echo form_input($first_name);?>
      </p>


      <p class="required">
            <?php echo lang('create_user_lname_label', 'first_name');?> </p>
            <?php echo form_input($last_name);?>
      </p>


      <p class="required">
            <?php echo lang('create_user_email_label', 'email');?> </p>
            <?php echo form_input($email);?>
      </p>

      <p class="required" style="margin-top: 2em;">
            <?php echo lang('create_user_password_label', 'password');?> </p>
            <?php echo form_input($password);?> (vähintään 8 merkkiä)
      </p>


      <p class="required">
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> </p>
            <?php echo form_input($password_confirm);?>
      </p>

<p id="user_terms">
Rekisteröitymällä 100lintulajia-sovellukseen annat suostumuksen henkilötietojesi käsittelyyn.
Henkilötietoja voidaan käyttää kerrottaessa osallistujille BirdLifen ja sen paikallisjärjestöjen
tapahtumista ja tukimahdollisuuksista. Yhteydenottotapa voi olla sähköinen tai muu tapa.
Tiedot ovat vain BirdLifen ja sen jäsenyhdistysten käytössä, eikä niitä luovuteta
suoramarkkinointitarkoituksiin ulkopuolisille tahoille.
Osallistuja voi itse sovelluksessa tarkastaa henkilötietonsa, korjata ja poistaa ne.
</p>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

<?php echo form_close();?>

<?php
include "application/views/page_elements/footer.php";
?>
