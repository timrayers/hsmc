<?php
/**
* Template Name: HSMC File Upload
*/

$upload_errors = array();

if($_POST && isset($_POST['submit'])) {
  //Upload Files parser

  $target_dir = getcwd() . "/wp-content/themes/hsmc/downloads/";

  switch($_POST['upload_type']) {
    case('notices'):
      $target_file = "notices.pdf";
      $replace_file = "notices-prev.pdf";
    break;
    case('bookings'):
      $target_file = "bookings.pdf";
      $replace_file = "bookings-prev.pdf";
    break;
    case('rota'):
      $target_file = "rota.pdf";
      $replace_file = "rota-prev.pdf";
    break;
    default:
      $upload_errors[] = "Sorry, there has been a problem with the uploader. Please contact support.";
    break;
  }

  $target_file = $target_dir . $target_file;
  $replace_file = $target_dir . $replace_file;

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 2000000) {
    $upload_errors[] = "Sorry, your file is too large (max: 2MB)";
  }
  // Check file format
  $fileType = pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);
  if($fileType != "pdf" ) {
    $upload_errors[] = "Incorrect format. Only PDFs are accepted.";
  }
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/uploader.css">
</head>
<body>
<main class="main_class content" style="padding-top: 4em;">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>

    <div class="alert info">
      <b>25/06/19</b>: Previously uploaded files will no longer be automatically overwritten; they can be accessed from the website footer or <a href="/schedule">members section</a>.
    </div>

    <?php the_content(); ?>

    <?php
    // Check if errors exist
    if (!empty($upload_errors) ) {
      echo "Sorry, your file was not uploaded because of the following errors:";
      foreach($upload_errors as $upload_error) {
        echo '<div class="alert danger">' . $upload_error . '</div>';
      }
    // if everything is ok, try to upload file
    } else if($_POST['submit']) {
      // rename previous version
      rename($target_file, $replace_file);
      // rename uploaded version
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo '<div class="alert success">The file '. basename( $_FILES["fileToUpload"]["name"]). ' has been uploaded (' . ucfirst($_POST['upload_type']) . ')</div>';
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    if ( !post_password_required() ) {
    ?>
      <form action="<?=$_SERVER['REQUEST_URI'];?>" method="post" enctype="multipart/form-data" id="file-upload-form">
        <ol>
          <li>What type of file are you uploading?
          <select name="upload_type">
            <option value="notices">Notices</option>
            <option value="bookings">Bookings</option>
            <option value="rota">Rota</option>
          </select>
        </li>
        <li>Select your file to upload
          <input type="file" name="fileToUpload" id="fileToUpload">
        </li>
      </ol>
      <input type="submit" value="Upload" name="submit" style="margin: 0 auto; display: block;">
      </form>
    <?php }
    endwhile; else : ?>
  	<p><?php _e( 'No content found.' ); ?></p>
  <?php endif; ?>
</main>

<?php wp_footer(); ?>
